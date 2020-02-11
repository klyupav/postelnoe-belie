<?php

namespace App\Http\Controllers;

use App\Donors\BsOptRuCategory;
use App\Donors\BsOptRuProduct;
use App\Donors\TextiloptomNet;
use App\Donors\TextiloptomNetCategory;
use App\Donors\TextiloptomNetProduct;
use App\Models\Category;
use App\Models\Product;
use App\Models\Source;
use App\ParseIt\export\WP;
use Doctrine\DBAL\Configuration;
use Doctrine\DBAL\DriverManager;
use Illuminate\Http\Request;
Use Validator;
use YoastSEO_Vendor\GuzzleHttp\Handler\Proxy;

class ParseitController extends Controller
{
    public function start(Request $request)
    {
        $donor = new TextiloptomNetCategory();
        $opt['cookieFile'] = $donor->cookieFile;
//        $opt['url'] = 'http://b2b.divehouse.ru/catalog/lodochnye_motory_grebnye_vinty_raskhodniki_i_zapchasti/';
        $categories = $donor->getSources($opt);
//        print_r(count($categories));
        foreach ( $categories as $category )
        {
            $validator = Validator::make($category, Category::rules());
            if ($validator->fails())
            {
                $message = $validator->errors()->first();
                LoggerController::logToFile($message, 'info', $category, true);
            }
            else
            {
                Category::saveOrUpdate([
                    'title' => $category['title'],
                    'source' => $category['source'],
                    'hash' => $category['hash'],
                    'parent_id' => 0,
                ]);
            }
        }
    }

    public function product_sources(Request $request)
    {
        $donor_product = new TextiloptomNetProduct();
        $opt['cookieFile'] = $donor_product->cookieFile;
        $opt['url'] = 'https://textiloptom.net/satin-pechatnyy-art-s';
        $product_sources = $donor_product->getSources($opt);
        foreach ( $product_sources as $source )
        {
            $validator = Validator::make($source, Source::rules());
            if ($validator->fails())
            {
                $message = $validator->errors()->first();
                LoggerController::logToFile($message, 'info', $source, true);
            }
            else
            {
                Source::saveOrUpdate([
                    'source' => $source['source'],
                    'hash' => $source['hash'],
                ]);
            }
        }
    }

    public function product_data(Request $request)
    {
        $donor_product = new TextiloptomNetProduct();
        $opt['cookieFile'] = $donor_product->cookieFile;
        $opt['url'] = 'https://textiloptom.net/satin-pechatnyy-art-sl/kpb-cl-1006';
        $products = $donor_product->getData($opt['url'], $opt);
        if (is_array($products))
        {
            foreach ($products as $product)
            {
                $validator = Validator::make($product, Product::rules());
                if ($validator->fails())
                {
                    $message = $validator->errors()->first();
                    LoggerController::logToFile($message, 'info', $product, true);
                }
                else
                {
                    $pid = Product::saveOrUpdate($product);
                }
            }
        }
        print_r(@$products);die('da');
    }

    public function sources(Request $request)
    {
        $exec_time = env('RUN_TIME', 0);
        $start = time();
        @set_time_limit($exec_time);
        $donor_product = new TextiloptomNetProduct();
        $opt['cookieFile'] = $donor_product->cookieFile;
        do
        {
            $next_cat = Category::where(['parseit' => 0])->get()->first();
            if ($next_cat)
            {
                $next_cat->update(['parseit' => 1]);
                $opt['url'] = $next_cat->source;
                if ($product_sources = $donor_product->getSources($opt))
                {
                    foreach ( $product_sources as $source )
                    {
                        $validator = Validator::make($source, Source::rules());
                        if ($validator->fails())
                        {
                            $message = $validator->errors()->first();
                            LoggerController::logToFile($message, 'info', $source, true);
                        }
                        else
                        {
                            Source::saveOrUpdate([
                                'source' => $source['source'],
                                'hash' => $source['hash'],
                            ]);
                        }
                    }
                }
            }
            else
            {
                die('Done');
            }
            if ($start < time() - ($exec_time - 30))
            {
                die('End exec time');
            }
        }
        while( true );
    }

    public function products(Request $request)
    {
        $exec_time = env('RUN_TIME', 0);
        $start = time();
        @set_time_limit($exec_time);
        $donor_product = new TextiloptomNetProduct();
        $opt['cookieFile'] = $donor_product->cookieFile;
        do
        {
            $next_source = Source::where(['parseit' => 0, 'available' => 1])->get()->first();
            if ($next_source)
            {
                $next_source->update(['parseit' => 1]);
                $opt['url'] = $next_source->source;
                $products = $donor_product->getData($opt['url'], $opt);
                if (is_array($products) && !empty($products))
                {
                    foreach ($products as $product)
                    {
                        $validator = Validator::make($product, Product::rules());
                        if ($validator->fails())
                        {
                            $next_source->update(['available' => 0]);
                            $message = $validator->errors()->first();
                            LoggerController::logToFile($message, 'info', $product, true);
                        }
                        else
                        {
                            $pid = Product::saveOrUpdate($product);
                            Source::whereId($next_source->id)->update(['product_id' => $pid]);
                        }
                    }
                }
            }
            else
            {
                die('Done');
            }
            if ($start < time() - ($exec_time - 30))
            {
                die('End exec time');
            }
        }
        while( true );
    }

    public function exportToWp(Request $request)
    {
        header('Content-Type: text/html; charset=utf-8');
//        die(base_path().'/../wp-config.php');
//        require base_path().'/../wp-config.php';

        $config = new Configuration();
        $connectionParams = array(
            'dbname' => env('DB_DATABASE'),
            'user' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'host' => env('DB_HOST'),
            'driver' => env('DB_DRIVER'),
            'charset' => 'utf8mb4',
        );
        $conn = DriverManager::getConnection($connectionParams, $config);
        $site_url = env('PARSER_SITE_URL');
        $site_root_dir = base_path().'/..';

        $wp = new WP($conn, $site_url, $site_root_dir);

        $exec_time = env('RUN_TIME', 0);
        $start = time();
        @set_time_limit($exec_time);
        do
        {

            if ($next_product = Product::getNotExportedProduct())
            {
                $next_product->update(['exported' => 1]);

                $product = $next_product->toArray();
                $product['donor'] = 'textiloptom.net';
                $wp->addProduct($product);
            }
            else
            {
                die('Done');
            }
            if ($start < time() - ($exec_time - 30))
            {
                die('End exec time');
            }
        }
        while( true );

        $wp->conn->delete('wp_options', ['option_value' => '_transient_wc_term_counts']);
        $tree = $wp->updateCategoryTree();
    }

    public function removeAll(Request $request)
    {
        header('Content-Type: text/html; charset=utf-8');
        require base_path().'/../wp-config.php';

        $config = new Configuration();
        $connectionParams = array(
            'dbname' => DB_NAME,
            'user' => DB_USER,
            'password' => DB_PASSWORD,
            'host' => DB_HOST,
            'driver' => PARSER_DB_DRIVER,
            'charset' => DB_CHARSET,
        );
        $conn = DriverManager::getConnection($connectionParams, $config);
        $site_url = PARSER_SITE_URL;
        $site_root_dir = base_path().'/..';

        $wp = new WP($conn, $site_url, $site_root_dir);
        $wp->deleteAllProducts('bs-opt.ru');
    }
}