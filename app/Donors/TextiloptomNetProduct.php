<?php

namespace App\Donors;

use ParseIt\_String;
use ParseIt\nokogiri;
use ParseIt\ParseItHelpers;

class TextiloptomNetProduct extends TextiloptomNet {

    private $exportDataXml;

    public function getSources($opt = [])
    {
        $sources = [];

        $url = @$opt['url'];

        if (!preg_match('%nastr=%uis', $url, $match))
        {
            $url .= '?nastr=100';
        }

        do
        {
            $countBefore = count($sources);
            $content = $this->loadUrl($url, $opt);
            $nokogiri = new nokogiri($content);
            $products = $nokogiri->get(".products-grid .item h3 a")->toArray();
            foreach ($products as $product)
            {
                if (!isset($product['href']))
                {
                    continue;
                }
                $hash = md5($product['href']);
                $sources[$hash] = [
                    'source' => $product['href'],
                    'hash' => $hash,
                ];
            }

            if (preg_match('%page(\d*)%uis', $url, $match))
            {
                $currPage = _String::parseNumber($match[1]);
                $nextPage = $currPage + 1;
                $url = str_replace("page{$currPage}", "page{$nextPage}", $url);
            }
            else
            {
                $url = str_replace("?nastr", "/page2/?nastr", $url);
            }

            $countAfter = count($sources);

        } while($countAfter != $countBefore);

        return $sources;
    }

    public function getData($url, $source = [])
    {
        $product = false;
        $content = $this->loadUrl($url, $source);
        $nokogiri = new nokogiri($content);

        $specsLabel = $nokogiri->get("#product-attribute-specs-table .label")->toArray();
        $specsData = $nokogiri->get("#product-attribute-specs-table .data")->toArray();
        $attr = [];
        foreach ($specsData as $key => $spec)
        {
            $attr[$specsLabel[$key]['__ref']->nodeValue] = $specsData[$key]['__ref']->nodeValue;
        }

        $paramsTitle = $nokogiri->get(".product-shop div[param48=1163] .js_shop_form .param_val .title")->toArray();
        $paramsPrice = $nokogiri->get(".product-shop div[param48=1163] .js_shop_form .param_val .price .shop_price_value")->toArray();
        $toCart = $nokogiri->get(".product-shop div[param48=1163] .js_shop_form .to-cart")->toArray();
        $options = [];
        foreach ($paramsTitle as $key => $param)
        {
            $subCatTitle = trim($paramsTitle[$key]['__ref']->nodeValue);
            $subCatTitle = trim($subCatTitle, ':');

            $price = trim($paramsPrice[$key]['__ref']->nodeValue);
            $price = _String::parseNumber($price);

            if (isset($toCart[$key]['input']))
            {
                $stock = 1;
            }
            else
            {
                $stock = 0;
            }

            $options[] = [
                'title' => $subCatTitle,
                'price' => $price,
                'stock' => $stock,
            ];
        }

        if (empty($options))
        {
            return [];
        }

        $productName = $nokogiri->get(".product-name h1")->toArray();
        $title = trim($productName[0]['__ref']->nodeValue);

        $tabAdditional = $nokogiri->get("#tab-additional")->toArray();
        $desc = trim($tabAdditional[0]['__ref']->nodeValue);

        $breadcrumbs = $nokogiri->get(".breadcrumbs li a")->toArray();
        $category = [];
        foreach ($breadcrumbs as $key => $bread)
        {
            if ($key == 0)
            {
                continue;
            }
            $category[] = $bread['__ref']->nodeValue;
        }

        if ($productFromXml = $this->findProductFromXml($title))
        {
            $model = trim($productFromXml->article->__toString());
        }

        $gallery = @$nokogiri->get("#itemslider-zoom .item a")->toArray();
        foreach ($gallery as $img)
        {
            $images[] = $img['href'];
        }

        $hash = md5($url);

        $product[] = [
            'source' => $url,
            'title' => $title,
            'desc' => $desc,
            'short_desc' => '',
            'brand' => '',
            'sku' => @$model,
            'category' => $category,
            'price' => @$price,
            'hash' => $hash,
            'images' => @$images,
            'options' => @$options,
            'attr' => $attr
        ];

        return $product;
    }

    /**
     * @param string $productName
     * @return \SimpleXMLElement
     */
    private function findProductFromXml(string $productName)
    {
        if (empty($this->exportDataXml))
        {
            $xmlData = file_get_contents('https://textiloptom.net/userfiles/export_data.xml');
            $this->exportDataXml = new \SimpleXMLElement($xmlData);;
        }

        foreach ($this->exportDataXml->list as $item)
        {
            if (trim($item->name->__toString()) == $productName)
            {
                return $item;
            }
        }
        return false;
    }
}
