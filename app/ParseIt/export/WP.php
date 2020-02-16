<?php
/**
 * Created by PhpStorm.
 * User: klyupav
 * Date: 02.10.18
 * Time: 20:30
 */

namespace  App\ParseIt\export;

use Doctrine\DBAL\Connection;
use Gumlet\ImageResize;

class WP
{
    /*
     * Database connection
     * @var Doctrine\DBAL\Connection $conn
     */
    public $conn;
    protected $site_url;
    protected $site_root_dir;
    protected $upload_dir;

    public function __construct(Connection $connection, string $site_url = 'http://xn-----8kccgoaca5ceepgmdie3bnh6th.xn--p1ai/', $site_root_dir = '..', $upload_dir = '/wp-content/uploads/')
    {
        $this->conn = $connection;
        if (!empty($site_url))
        {
            $this->site_url = $site_url;
        }
        $this->site_root_dir = $site_root_dir;
        $this->upload_dir = $upload_dir;
    }

    public function deactivateProduct(string $sku, string $donor)
    {
        if ($pid = $this->findProductIdBySku($sku, $donor)) {
            $this->deleteProduct($pid);
            print("УДАЛЕН - " . $sku . " <br>\n");
        }
    }

    /*
     * Add product
     * @param array $product
     */
    public function addProduct(array $product)
    {
        $price_info = '';
        if ( $pid = $this->findProductIdBySku($product['sku'], $product['donor']) )
        {
            // update product
            $this->updateProduct($product, $pid);
            print("ОБНОВЛЕН - ".$product['sku']." {$price_info}<br>\n");
        }
        else
        {
            // create product
            $product['images'] = unserialize(@$product['images']);
            if(isset($product['images']) && is_array($product['images']))
            {
                foreach ($product['images'] as $key => $src)
                {
                    if ($uploadImage = $this->copyImageToUpload($src, $product['sku']))
                    {
                        $product['images'][$key] = $uploadImage;
                    }
                }
            }

            $this->createProduct($product);
            print("ДОБАВЛЕН - ".$product['sku']." {$price_info}<br>\n");
        }
    }

    /*
     * Find product ID by article
     * @param string $article
     * @return int|bool
     */
    private function findProductIdByArticle(string $article)
    {
        $sql = "SELECT post_id FROM wp_postmeta WHERE meta_key LIKE '_sku' AND meta_value LIKE '{$article}' ORDER BY meta_id DESC";
        $stmt = $this->conn->query($sql);
        if ($stmt->rowCount())
        {
            $row = $stmt->fetch();
            return $row['post_id'];
        }
        return false;
    }

    /*
     * Find product ID by SKU
     * @param string $sku
     * @param string $donor
     * @return int|bool
     */
    private function findProductIdBySku(string $sku, string $donor)
    {
        $sql = "SELECT pm1.post_id FROM wp_postmeta as pm1, wp_postmeta as pm2 WHERE pm1.meta_key LIKE '_sku' AND pm1.meta_value LIKE '{$sku}' AND pm2.meta_key LIKE 'donor' AND pm2.meta_value LIKE '{$donor}' AND pm1.post_id = pm2.post_id ORDER BY pm1.meta_id DESC";
        $stmt = $this->conn->query($sql);
        if ($stmt->rowCount())
        {
            $row = $stmt->fetch();
            return $row['post_id'];
        }
        return false;
    }

    /*
     * Update product post
     * @param array $product
     * @param integer $pid
     * @return int|bool
     */
    private function updateProduct(array $product, int $pid)
    {
        if (isset($product['stock']))
        {
            $this->updatePostMeta(['_stock_status' => $product['stock'] == 1 ? 'instock' : 'outofstock'], $pid);
        }
        $product['options'] = unserialize(@$product['options']);
        if (isset($product['options']) && is_array($product['options']))
        {
            $woocommerce_attribute_row = $this->findOrCreateWCAttr('Размеры');
            foreach ($product['options'] as $k => $option)
            {
                if ($vid = $this->findProductVariationId($option['title'], $pid))
                {
                    $stockStatus = isset($param['stock']) && $option['stock'] == 1 ? 'instock' : 'outofstock';
                    $this->updatePostMeta(['_stock_status' => $stockStatus], $vid);
                }
                else
                {
                    $vid = $this->createProductVariation($option['title'], $pid, $k+1);
                    $attr_id = $this->createAttribute($option['title'], 0, $woocommerce_attribute_row['attribute_label']);

                    $this->createPostMetaVariation([
                        'post_id' => $pid,
                        'attr_id' => $attr_id,
                        'variation_id' => $vid,
                        'option' => @$option['title'],
                        'price' => @$option['price'],
                        'stock' => @$option['stock'],
                    ]);
                }
            }

        }
    }

    /*
     * Create product post
     * @param array $product
     * @return int|bool
     */
    private function createProduct(array $product)
    {
        if (!isset($product['title']) || empty($product['title']))
        {
            return false;
        }
        $post_name = $this->getSlug($product['title']);
//        $post_name = mb_strtolower($product['title']);
//        $post_name = preg_replace('%[\d\s]+%uis', '-', $post_name);
        $post_name = mb_substr($post_name, 0, 29);
        $post_name .=  "-" . mb_strtolower(@$product['sku']);
        $post_name = preg_replace('%[\ ]+%uis', '-', $post_name);
//        $post_name = preg_replace('%[^a-bA-Bа-яА-Я0-9]+%uis', '-', $post_name);
        $post_name = preg_replace('%[\-]+%uis', '-', $post_name);
        $post_name = trim($post_name, '-');

        $param = [
            'post_author' => '1',
            'post_date' => date('Y-m-d H:i:s'),
            'post_date_gmt' => date('Y-m-d H:i:s'),
            'post_content' => isset($product['desc']) ? $product['desc'] : '',
            'post_title' => isset($product['title']) ? $product['title'] : 'пустое имя',
            'post_excerpt' => isset($product['short_desc']) ? $product['short_desc'] : '',
            'post_status' => 'publish',
            'comment_status' => 'closed',
            'ping_status' => 'closed',
            'post_password' => '',
            'post_name' => strtolower(urlencode($post_name)),
            'to_ping' => '',
            'pinged' => '',
            'post_modified' => date('Y-m-d H:i:s'),
            'post_modified_gmt' => date('Y-m-d H:i:s'),
            'post_content_filtered' => '',
            'post_parent' => '0',
            'guid' => '',
            'menu_order' => '0',
            'post_type' => 'product',
            'post_mime_type' => '',
            'comment_count' => '0',
        ];

        if ($this->conn->insert('wp_posts', $param))
        {
            $pid = $this->conn->lastInsertId();
            $this->conn->update('wp_posts', [
                'guid' => $this->site_url."/?post_type=product&#038;p={$pid}"
            ], ['ID' => $pid]);

            $gallery = [];
            if (isset($product['images']) && is_array($product['images']))
            {
                foreach ($product['images'] as $image)
                {
                    if ($image_id = $this->createProductImage($image, $pid))
                    {
                        $gallery[$image_id] = $image;
                    }
                }
            }

            $this->createPostMeta([
                'post_id' => $pid,
                'gallery' => $gallery,
                'sku' => @$product['sku'],
                'donor' => @$product['donor'],
            ]);

            $product['category'] = unserialize(@$product['category']);
            if (isset($product['category']) && is_array($product['category']))
            {
                foreach ($product['category'] as $category)
                {
                    $cat_id = $this->createCategory(mb_strtoupper($category), isset($cat_id) ? $cat_id : 0);
                    $this->conn->insert('wp_term_relationships', ['object_id' => $pid, 'term_taxonomy_id' => $cat_id, 'term_order' => '0']);
                }
            }

            $_product_attributes = [];

            $product['options'] = unserialize(@$product['options']);
            if (isset($product['options']) && is_array($product['options']))
            {
                $woocommerce_attribute_row = $this->findOrCreateWCAttr('Размеры');
                foreach ($product['options'] as $k => $option)
                {
                    $attr_id = $this->createAttribute($option['title'], 0, $woocommerce_attribute_row['attribute_label']);
                    $this->conn->insert('wp_term_relationships', ['object_id' => $pid, 'term_taxonomy_id' => $attr_id, 'term_order' => '0']);
                    $this->insertPostMeta(['_price' => $option['price']], $pid);
                    if ($vid = $this->createProductVariation($option['title'], $pid, $k+1))
                    {
                        $this->createPostMetaVariation([
                            'post_id' => $pid,
                            'attr_id' => $attr_id,
                            'variation_id' => $vid,
                            'option' => @$option['title'],
                            'price' => @$option['price'],
                            'stock' => @$option['stock'],
                        ]);
                    }
                    $_product_attributes["pa_{$woocommerce_attribute_row['attribute_label']}"] = [
                        'name' => "pa_{$woocommerce_attribute_row['attribute_label']}",
                        'value' => '',
                        'position' => 0,
                        'is_visible' => 1,
                        'is_variation' => 1,
                        'is_taxonomy' => 1,
                    ];
                }
            }

            $product['attr'] = unserialize(@$product['attr']);
            if (isset($product['attr']) && is_array($product['attr']))
            {
                foreach ($product['attr'] as $title => $attr)
                {
                    $woocommerce_attribute_row = $this->findOrCreateWCAttr($title);
                    if ($attr_id = $this->createAttribute($attr, 0, $woocommerce_attribute_row['attribute_label']))
                    {
                        $this->conn->insert('wp_term_relationships', ['object_id' => $pid, 'term_taxonomy_id' => $attr_id, 'term_order' => '0']);

                        $_product_attributes["pa_{$woocommerce_attribute_row['attribute_label']}"] = [
                            'name' => "pa_{$woocommerce_attribute_row['attribute_label']}",
                            'value' => '',
                            'position' => 0,
                            'is_visible' => 1,
                            'is_variation' => 0,
                            'is_taxonomy' => 1,
                        ];
                    }
                }
            }

            $this->updatePostMeta(['_product_attributes' => serialize($_product_attributes)], $pid);

            $this->conn->insert('wp_term_relationships', ['object_id' => $pid, 'term_taxonomy_id' => 4, 'term_order' => '0']);

            $this->conn->insert('wp_yoast_seo_meta', ['object_id' => $pid, 'internal_link_count' => '0', 'incoming_link_count' => '0']);

            return $pid;
        }
        else
        {
            return false;
        }
    }

    /*
     * Delete product post
     * @param int $post_id
     * @return int|bool
     */
    private function deleteProduct(int $post_id)
    {
        $this->conn->delete('wp_posts', ['ID' => $post_id]);
        $image_ids = $this->deleteProductImage($post_id);
        $this->conn->delete('wp_posts', ['post_parent' => $post_id]);
        $this->deletePostMeta($post_id);
//        $this->conn->delete('wp_rp4wp_cache', ['post_id' => $post_id]);
        $this->conn->update('wp_term_taxonomy', ['count' => 0 ], ['taxonomy' => 'product_cat']);
        $this->conn->update('wp_termmeta', ['meta_value' => 0 ], ['meta_key' => 'product_count_product_cat']);
        $this->conn->delete('wp_term_relationships', ['object_id' => $post_id]);

        return true;
    }


    /*
     * Increase parent category count
     * @param int $cat_id
     * @return int|bool
     */
    private function updateCategoryCount(int $cat_id = 0)
    {
        if ($cat_id)
        {
            $result = $this->conn->query("SELECT * FROM wp_term_taxonomy WHERE term_id = {$cat_id} AND taxonomy LIKE 'product_cat'");
            if ($result->rowCount())
            {
                $row = $result->fetch();
                $count = $row['count'];
                $count = (int)$count;
                $count++;
                $this->conn->update('wp_term_taxonomy', ['count' => $count ], ['term_id' => $cat_id, 'taxonomy' => 'product_cat']);
                $this->conn->update('wp_termmeta', ['meta_value' => $count ], ['term_id' => $cat_id, 'meta_key' => 'product_count_product_cat']);
            }
            return true;
        }
        return false;
    }

    private function updateAttrCount(int $attr_id = 0)
    {
        if ($attr_id)
        {
            $result = $this->conn->query("SELECT * FROM wp_term_taxonomy WHERE term_id = {$attr_id}");
            if ($result->rowCount())
            {
                $row = $result->fetch();
                $count = $row['count'];
                $count = (int)$count;
                $count++;
                $this->conn->update('wp_term_taxonomy', ['count' => $count ], ['term_id' => $attr_id]);
                $this->conn->update('wp_termmeta', ['meta_value' => $count ], ['term_id' => $attr_id]);
            }
            return true;
        }
        return false;
    }

    /*
     * Increase parent brand count
     * @param int $brand_id
     * @return int|bool
     */
    private function updateBrandCount(int $brand_id = 0)
    {
        if ($brand_id)
        {
            $result = $this->conn->query("SELECT * FROM wp_term_taxonomy WHERE term_id = {$brand_id} AND taxonomy LIKE 'yith_product_brand'");
            if ($result->rowCount())
            {
                $row = $result->fetch();
                $count = $row['count'];
                $count = (int)$count;
                $count++;
                $this->conn->update('wp_term_taxonomy', ['count' => $count ], ['term_id' => $brand_id, 'taxonomy' => 'yith_product_brand']);
                $this->conn->update('wp_termmeta', ['meta_value' => $count ], ['term_id' => $brand_id, 'meta_key' => 'product_count_yith_product_brand']);
            }
            return true;
        }
        return false;
    }

    /*
     * Create category
     * @param string $category
     * @param int $parent
     * @return int|bool
     */
    private function createCategory(string $category, int $parent = 0)
    {
        if ($cat_id = $this->findCategory($category, $parent))
        {
//            $result = $this->conn->query("SELECT `count` FROM wp_term_taxonomy WHERE term_id = {$cat_id} AND taxonomy LIKE 'product_cat' AND parent = {$parent}");
//            if ($result->rowCount())
//            {
//                $count = $result->fetch()['count'];
//                $count = (int)$count;
//                $count++;
//                $this->conn->update('wp_term_taxonomy', ['count' => $count ], ['term_id' => $cat_id, 'taxonomy' => 'product_cat', 'parent' => $parent]);
//                $this->conn->update('wp_termmeta', ['meta_value' => $count ], ['term_id' => $cat_id, 'meta_key' => 'product_count_product_cat']);
//            }
            if ($this->updateCategoryCount($cat_id))
            {
                return $cat_id;
            }
        }
        else
        {
            $uri = strtolower($this->translit_str($category));
            $slug = strtolower(urlencode($uri));
            if ($this->conn->insert('wp_terms', ['name' => $category, 'slug' => $slug, 'term_group' => 0]))
            {
                $cat_id = $this->conn->lastInsertId();
                $slug = strtolower(urlencode($uri."-{$cat_id}"));
                $this->conn->update('wp_terms', ['slug' => $slug ], ['term_id' => $cat_id]);
                $this->conn->insert('wp_term_taxonomy', ['term_id' => $cat_id, 'taxonomy' => 'product_cat', 'description' => '', 'parent' => $parent, 'count' => '1' ]);
                $this->conn->insert('wp_termmeta', ['term_id' => $cat_id, 'meta_key' => 'thumbnail_id', 'meta_value' => '0']);
                $this->conn->insert('wp_termmeta', ['term_id' => $cat_id, 'meta_key' => 'display_type', 'meta_value' => '']);
                $this->conn->insert('wp_termmeta', ['term_id' => $cat_id, 'meta_key' => 'order', 'meta_value' => $parent > 0 ? '5' : '1']);
                $this->conn->insert('wp_termmeta', ['term_id' => $cat_id, 'meta_key' => 'product_count_product_cat', 'meta_value' => '1']);
//                if ($this->updateCategoryCount($cat_id))
//                {
//                    return $cat_id;
//                }
                return $cat_id;
            }
        }
        return false;
    }

    private function findOrCreateWCAttr(string $attr)
    {
        if ($attrRow = $this->findWCAttr($attr))
        {
            if (isset($attrRow['attribute_id']))
            {
                return $attrRow;
            }
        }
        else
        {
            $slug = $this->getSlug($attr);
            $values = [
                'attribute_name' => $attr,
                'attribute_label' => $slug,
                'attribute_type' => 'select',
                'attribute_orderby' => 'menu_order',
                'attribute_public' => 0
            ];
            if ($this->conn->insert('wp_woocommerce_attribute_taxonomies', $values))
            {
                $attr_id = $this->conn->lastInsertId();
                $values['attribute_id'] = $attr_id;
                return $values;
            }
        }
        return false;
    }

    private function createAttribute(string $attr, int $parent = 0, $taxonomy = '')
    {
        $slug = $this->getSlug($attr);
        if ($attr_id = $this->getIDAttrByName($attr, $parent, $taxonomy))
        {
            if ($this->updateAttrCount($attr_id))
            {
//                die($attr_id);
                return $attr_id;
            }
        }
        else
        {
            if ($this->conn->insert('wp_terms', ['name' => $attr, 'slug' => $slug, 'term_group' => 0]))
            {
                $attr_id = $this->conn->lastInsertId();
//                $slug = strtolower(urlencode($uri."-{$attr_id}"));
//                $this->conn->update('wp_terms', ['slug' => $slug ], ['term_id' => $attr_id]);
                $this->conn->insert('wp_term_taxonomy', ['term_id' => $attr_id, 'taxonomy' => "pa_{$taxonomy}", 'description' => '', 'parent' => $parent, 'count' => '1' ]);
                $this->conn->insert('wp_termmeta', ['term_id' => $attr_id, 'meta_key' => "order_pa_{$taxonomy}", 'meta_value' => '0']);
                return $attr_id;
            }
        }
        return false;
    }

    private function getSlug($title)
    {
        $uri = strtolower($this->translit_str($title));
        return strtolower(urlencode($uri));
    }

    /*
     * Create brand
     * @param string $brand
     * @param int $parent
     * @return int|bool
     */
    private function createBrand(string $brand, int $parent = 0)
    {
        if ($brand_id = $this->findBrand($brand, $parent))
        {
//            $result = $this->conn->query("SELECT `count` FROM wp_term_taxonomy WHERE term_id = {$cat_id} AND taxonomy LIKE 'product_cat' AND parent = {$parent}");
//            if ($result->rowCount())
//            {
//                $count = $result->fetch()['count'];
//                $count = (int)$count;
//                $count++;
//                $this->conn->update('wp_term_taxonomy', ['count' => $count ], ['term_id' => $cat_id, 'taxonomy' => 'product_cat', 'parent' => $parent]);
//                $this->conn->update('wp_termmeta', ['meta_value' => $count ], ['term_id' => $cat_id, 'meta_key' => 'product_count_product_cat']);
//            }
            if ($this->updateBrandCount($brand_id))
            {
                return $brand_id;
            }
        }
        else
        {
            $uri = strtolower($this->translit_str($brand));
            $slug = strtolower(urlencode($uri));
            if ($this->conn->insert('wp_terms', ['name' => $brand, 'slug' => $slug, 'term_group' => 0]))
            {
                $brand_id = $this->conn->lastInsertId();
                $slug = strtolower(urlencode($uri."-{$brand_id}"));
                $this->conn->update('wp_terms', ['slug' => $slug ], ['term_id' => $brand_id]);
                $this->conn->insert('wp_term_taxonomy', ['term_id' => $brand_id, 'taxonomy' => 'yith_product_brand', 'description' => '', 'parent' => $parent, 'count' => '1' ]);
                $this->conn->insert('wp_termmeta', ['term_id' => $brand_id, 'meta_key' => 'thumbnail_id', 'meta_value' => '0']);
                $this->conn->insert('wp_termmeta', ['term_id' => $brand_id, 'meta_key' => 'display_type', 'meta_value' => '']);
                $this->conn->insert('wp_termmeta', ['term_id' => $brand_id, 'meta_key' => 'order', 'meta_value' => $parent > 0 ? '5' : '1']);
                $this->conn->insert('wp_termmeta', ['term_id' => $brand_id, 'meta_key' => 'product_count_yith_product_brand', 'meta_value' => '1']);
//                if ($this->updateCategoryCount($cat_id))
//                {
//                    return $cat_id;
//                }
                return $brand_id;
            }
        }
        return false;
    }

    /*
     * Find category
     * @param string $category
     * @param int $parent
     * @return int|bool
     */
    private function findCategory(string $category, int $parent = 0)
    {
        $sql = "SELECT term.term_id FROM wp_terms as term, wp_term_taxonomy as tax WHERE tax.taxonomy='product_cat' AND tax.term_id = term.term_id AND term.name LIKE '{$category}' AND tax.parent = {$parent}";
        $stmt = $this->conn->query($sql);
        if ($stmt->rowCount())
        {
            $row = $stmt->fetch();
            if (isset($row ['term_id']))
            {
                return $row['term_id'];
            }
        }
        return false;
    }

    private function getIDAttrByName(string $attr, int $parent = 0, $taxonomy = '')
    {
        $sql = "SELECT term.term_id FROM wp_terms as term, wp_term_taxonomy as tax WHERE tax.taxonomy='pa_{$taxonomy}' AND tax.term_id = term.term_id AND term.name LIKE '{$attr}' AND tax.parent = {$parent}";
//        $sql = "SELECT term.term_id FROM wp_terms as term, wp_term_taxonomy as tax WHERE tax.term_id = term.term_id AND term.name LIKE '{$attr}' AND tax.parent = {$parent}";
        $stmt = $this->conn->query($sql);
        if ($stmt->rowCount())
        {
            $row = $stmt->fetch();
            if (isset($row['term_id']))
            {
                return $row['term_id'];
            }
        }
        return false;
    }

    private function findAttr(string $attr_id, int $parent = 0)
    {
        $sql = "SELECT term.term_id, term.name, term.slug, term.term_group FROM wp_terms as term, wp_term_taxonomy as tax WHERE tax.term_id = term.term_id AND term.term_id LIKE '{$attr_id}' AND tax.parent = {$parent}";
        $stmt = $this->conn->query($sql);
        if ($stmt->rowCount())
        {
            $row = $stmt->fetch();
            if (isset($row['term_id']))
            {
                return $row;
            }
        }
        return false;
    }

    private function findWCAttr(string $attr)
    {
        $sql = "SELECT * FROM wp_woocommerce_attribute_taxonomies WHERE attribute_name LIKE '{$attr}'";
        $stmt = $this->conn->query($sql);
        if ($stmt->rowCount())
        {
            $row = $stmt->fetch();
            if (isset($row['attribute_id']))
            {
                return $row;
            }
        }
        return false;
    }

    /*
     * Find brand
     * @param string $brand
     * @param int $parent
     * @return int|bool
     */
    private function findBrand(string $brand, int $parent = 0)
    {
        $sql = "SELECT term.term_id FROM wp_terms as term, wp_term_taxonomy as tax WHERE tax.taxonomy='yith_product_brand' AND tax.term_id = term.term_id AND term.name LIKE '{$brand}' AND tax.parent = {$parent}";
        $stmt = $this->conn->query($sql);
        if ($stmt->rowCount())
        {
            $row = $stmt->fetch();
            if (isset($row ['term_id']))
            {
                return $row['term_id'];
            }
        }
        return false;
    }

    /*
     * Update category tree
     * @return array
     */
    public function updateCategoryTree()
    {
        $sql = "SELECT term.name, term.term_id FROM wp_terms as term, wp_term_taxonomy as tax WHERE tax.term_id = term.term_id AND tax.taxonomy LIKE 'product_cat'";
        $stmt = $this->conn->query($sql);
        if ($stmt->rowCount())
        {
            $rows = $stmt->fetchAll();
            $tree = [];
//            print_r($rows);die();
            foreach ($rows as $row)
            {
                if ($row['name'] === 'Uncategorized')
                {
                    continue;
                }
                if ($sub_cats = $this->findCatsByParrent($row['term_id']))
                {
                    $tree[$row['term_id']] = $sub_cats;
                }
            }
            $this->conn->update('wp_options', ['option_value' => serialize($tree) ], ['option_name' => 'product_cat_children']);
            return $tree;
        }
        return false;
    }


    /*
     * Find all sub cats
     * @return array|bool
     */
    private function findCatsByParrent($parent)
    {
        $sql = "SELECT term_id FROM wp_term_taxonomy WHERE parent = {$parent} AND taxonomy LIKE 'product_cat'";
        $stmt = $this->conn->query($sql);
        if ($stmt->rowCount())
        {
            $rows = $stmt->fetchAll();
            $cat_ids = [];
            foreach ($rows as $row)
            {
                $cat_ids[] = $row['term_id'];
            }
            return $cat_ids;
        }
        return false;
    }

    /*
     * Update post meta
     * @param array $param
     * @param integer $pid
     * @return bool
     */

    private function updatePostMeta(array $param, int $pid)
    {
        foreach ($param as $key => $value)
        {
            $this->conn->update('wp_postmeta', ['meta_value' => $value], ['post_id' => $pid, 'meta_key' => $key]);
        }
    }

    private function insertPostMeta(array $param, int $pid)
    {
        foreach ($param as $key => $value)
        {
            $this->conn->insert('wp_postmeta', ['meta_value' => $value,'post_id' => $pid, 'meta_key' => $key ]);
        }
    }

    /*
     * Create post meta
     * @param array $param
     * @return bool
     */
    private function createPostMeta(array $param)
    {
        $_product_image_gallery = [];
        if (isset($param['gallery']) && is_array($param['gallery']))
        {
            foreach ( $param['gallery'] as $post_image_id => $src )
            {
                if (!isset($_thumbnail_id))
                {
                    $_thumbnail_id = $post_image_id;
                }
                else
                {
                    $_product_image_gallery[] = $post_image_id;
                }
                $this->_wp_attachment_metadata($src, $post_image_id);
            }
        }

        $meta = [
            '_sku' => isset($param['sku']) ? $param['sku'] : '',
            '_sale_price_dates_from' => '',
            '_sale_price_dates_to' => '',
            'total_sales' => '0',
            '_tax_status' => 'taxable',
            '_tax_class' => '',
            '_manage_stock' => 'no',
            '_backorders' => 'no',
            '_low_stock_amount' => '',
            '_sold_individually' => 'no',
            '_weight' => '',
            '_length' => '',
            '_width' => '',
            '_height' => '',
            '_upsell_ids' => 'a:0:{}',
            '_crosssell_ids' => 'a:0:{}',
            '_purchase_note' => '',
            '_default_attributes' => 'a:0:{}',
            '_virtual' => 'no',
            '_downloadable' => 'no',
            '_product_image_gallery' => implode(',', $_product_image_gallery),
            '_download_limit' => '-1',
            '_download_expiry' => '-1',
            '_thumbnail_id' => isset($_thumbnail_id) ? $_thumbnail_id : '',
            '_stock' => null,
            '_stock_status' => isset($param['stock']) && $param['stock'] == 1 ? 'instock' : 'outofstock',
            '_wc_average_rating' => '0',
            '_wc_rating_count' => 'a:0:{}',
            '_wc_review_count' => '0',
            '_downloadable_files' => 'a:0:{}',
            '_product_attributes' => '',
            '_product_version' => '3.5.4',
            '_edit_lock' => '1557581172:1',
            '_edit_last' => '1',
            '_yoast_wpseo_primary_product_cat' => '',
            '_yoast_wpseo_content_score' => '90',
            '_regular_price' => '',
            '_sale_price' => '',
            'donor' => isset($param['donor']) ? $param['donor'] : '',
        ];
        foreach ($meta as $key => $value)
        {
            $this->conn->insert('wp_postmeta', ['meta_key' => $key, 'meta_value' => $value, 'post_id' => @$param['post_id'] ]);
        }
    }

    private function createPostMetaVariation(array $param)
    {

        $attrRow = $this->findAttr($param['attr_id']);
        $attribute_pa_razmery = $attrRow['slug'];

        $meta = [
            '_variation_description' => '',
            '_sku' => '',
            '_regular_price' => isset($param['price']) ? $param['price'] : '',
            '_sale_price' => '',
            '_sale_price_dates_from' => '',
            '_sale_price_dates_to' => '',
            'total_sales' => '0',
            '_tax_status' => 'taxable',
            '_tax_class' => 'parent',
            '_manage_stock' => 'no',
            '_backorders' => 'no',
            '_low_stock_amount' => '',
            '_sold_individually' => 'no',
            '_weight' => '',
            '_length' => '',
            '_width' => '',
            '_height' => '',
            '_upsell_ids' => 'a:0:{}',
            '_crosssell_ids' => 'a:0:{}',
            '_purchase_note' => '',
            '_default_attributes' => 'a:0:{}',
            '_virtual' => 'no',
            '_downloadable' => 'no',
            '_product_image_gallery' => '',
            '_download_limit' => '-1',
            '_download_expiry' => '-1',
            '_stock' => null,
            '_stock_status' => isset($param['stock']) && $param['stock'] == 1 ? 'instock' : 'outofstock',
            '_wc_average_rating' => '0',
            '_wc_rating_count' => 'a:0:{}',
            '_wc_review_count' => '0',
            '_downloadable_files' => 'a:0:{}',
            '_price' => isset($param['price']) ? $param['price'] : '',
            '_product_version' => '3.5.4',
            'attribute_pa_razmery' => $attribute_pa_razmery,
        ];
        foreach ($meta as $key => $value)
        {
            $this->conn->insert('wp_postmeta', ['meta_key' => $key, 'meta_value' => $value, 'post_id' => @$param['variation_id'] ]);
        }
    }

    /*
     * Delete post meta
     * @param int $post_id
     * @return bool
     */
    private function deletePostMeta(int $post_id)
    {
        $this->conn->delete('wp_postmeta', ['post_id' => $post_id]);
    }

    /*
     * Create image post
     * @param string $image
     * @param int $post_parent
     * @return int|bool
     */
    private function createProductImage(string $image, int $post_parent)
    {
        $image_name = pathinfo($image, PATHINFO_FILENAME);
        $url = $this->site_url.$image;
        $size = getimagesize($url);
        $param = [
            'post_author' => '1',
            'post_date' => date('Y-m-d H:i:s'),
            'post_date_gmt' => date('Y-m-d H:i:s'),
            'post_content' => '',
            'post_title' => $image_name,
            'post_excerpt' => '',
            'post_status' => 'inherit',
            'comment_status' => 'open',
            'ping_status' => 'closed',
            'post_password' => '',
            'post_name' => urlencode($image_name),
            'to_ping' => '',
            'pinged' => '',
            'post_modified' => date('Y-m-d H:i:s'),
            'post_modified_gmt' => date('Y-m-d H:i:s'),
            'post_content_filtered' => '',
            'post_parent' => $post_parent,
            'guid' => $url,
            'menu_order' => '0',
            'post_type' => 'attachment',
            'post_mime_type' => $size['mime'],
            'comment_count' => '0',
        ];
        try
        {
            if ($this->conn->insert('wp_posts', $param))
            {
                $ID = $this->conn->lastInsertId();
                return $ID;
            }
            else
            {
                return false;
            }
        }
        catch (\Exception $exception)
        {
            unlink("..".$image);
        }
    }

    /*
     * @param string $variation
     * @param int $post_parent
     * @param int $menu_order
     * @return int|bool
     */
    private function createProductVariation(string $variation, int $post_parent, $menu_order = 1)
    {

        $param = [
            'post_author' => '1',
            'post_date' => date('Y-m-d H:i:s'),
            'post_date_gmt' => date('Y-m-d H:i:s'),
            'post_content' => '',
            'post_title' => $variation,
            'post_excerpt' => '',
            'post_status' => 'publish',
            'comment_status' => 'closed',
            'ping_status' => 'closed',
            'post_password' => '',
            'post_name' => urlencode($variation),
            'to_ping' => '',
            'pinged' => '',
            'post_modified' => date('Y-m-d H:i:s'),
            'post_modified_gmt' => date('Y-m-d H:i:s'),
            'post_content_filtered' => '',
            'post_parent' => $post_parent,
            'guid' => $this->site_url."/?post_type=product&#038;p={$post_parent}",
            'menu_order' => $menu_order,
            'post_type' => 'product_variation',
            'post_mime_type' => '',
            'comment_count' => '0',
        ];
        if ($this->conn->insert('wp_posts', $param))
        {
            $ID = $this->conn->lastInsertId();
            return $ID;
        }
        else
        {
            return false;
        }
    }

    private function findProductVariationId(string $variation, int $post_parent)
    {
        $sql = "SELECT ID FROM wp_posts WHERE post_title LIKE '{$variation}' AND post_parent={$post_parent}";
        $stmt = $this->conn->query($sql);
        if ($stmt->rowCount())
        {
            $row = $stmt->fetch();
            return $row['ID'];
        }
        return false;
    }

    /*
     * Delete image post
     * @param int $post_parent
     */
    private function deleteProductImage(int $post_parent)
    {
        $stmt = $this->conn->query("SELECT ID FROM wp_posts WHERE post_parent={$post_parent} AND post_type = 'attachment'");
        $image_ids = false;
        if ($stmt->rowCount())
        {
            foreach ($stmt->fetchAll() as $row)
            {
                $this->conn->delete('wp_postmeta', ['post_id' => $row['ID'] ]);
            }
        }
        $this->conn->delete('wp_posts', ['post_parent' => $post_parent, 'post_type' => 'attachment']);

        return $image_ids;
    }

//    /*
//     * Delete all products from database
//     */
//    public function deleteAllProducts()
//    {
//        $stmt = $this->conn->query("SELECT ID FROM wp_posts WHERE post_type = 'product'");
//        if ($stmt->rowCount())
//        {
//            foreach ($stmt->fetchAll() as $row)
//            {
//                $this->deleteProduct($row['ID']);
//            }
//        }
//        $this->updateCategoryTree();
//    }

    /*
     * Delete all products from database
     */
    public function deleteAllProducts($donor)
    {
        $stmt = $this->conn->query("SELECT post_id FROM wp_postmeta WHERE meta_key = 'donor' AND meta_value = '{$donor}' GROUP BY post_id");
        if ($stmt->rowCount())
        {
            foreach ($stmt->fetchAll() as $row)
            {
                $this->deleteProduct($row['post_id']);
            }
        }
        $this->updateCategoryTree();
    }

    /*
     * Copy image to upload dir
     * @param string $src
     * @param string $article
     * @return string|bool
     */
    private function copyImageToUpload(string $src, string $article = '')
    {
        $file = str_replace(' ', '-', basename($src));

        $article = preg_replace('%\&.*?\;%uis', '', $article);
        $article = str_replace(' ', '_', basename($article));

        $upload_dir = $this->upload_dir."by_sku/{$article}/";
        $dir = $this->site_root_dir.$upload_dir;

        if (!file_exists($dir))
        {
            mkdir($dir, 0777, true);
        }

        $dest = $dir.$file;
        if (!file_exists($dest))
        {
            try
            {
                $content = file_get_contents($src);
                file_put_contents($dest, $content);
            }
            catch (\Exception $exception)
            {
                unlink($dest);
                return false;
            }
        }
        return $upload_dir.$file;
    }

    /*
     * Create thumb images
     * @param string $src
     * @return bool
     */
    private function _wp_attachment_metadata(string $src, int $post_id)
    {
        $source = $this->site_root_dir.$src;
        $size = getimagesize($source);
        $pathinfo = pathinfo($src);
        $meta = [
            'width' => 800,
            'height' => 1200,
            'file' => str_replace($this->upload_dir, '',$src),
            'size' => [
                'thumbnail' => [
                    'file' => $pathinfo['filename'].'-150x150.'.$pathinfo['extension'],
                    'width' => 150,
                    'height' => 150,
                    'mime-type' => $size['mime'],
                ],
                'medium' => [
                    'file' => $pathinfo['filename'].'-200x300.'.$pathinfo['extension'],
                    'width' => 200,
                    'height' => 300,
                    'mime-type' => $size['mime'],
                ],
                'medium_large' => [
                    'file' => $pathinfo['filename'].'-768x1152.'.$pathinfo['extension'],
                    'width' => 768,
                    'height' => 1152,
                    'mime-type' => $size['mime'],
                ],
                'large' => [
                    'file' => $pathinfo['filename'].'-683x1024.'.$pathinfo['extension'],
                    'width' => 683,
                    'height' => 1024,
                    'mime-type' => $size['mime'],
                ],
                'woocommerce_thumbnail' => [
                    'file' => $pathinfo['filename'].'-300x450.'.$pathinfo['extension'],
                    'width' => 300,
                    'height' => 450,
                    'mime-type' => $size['mime'],
                ],
                'woocommerce_single' => [
                    'file' => $pathinfo['filename'].'-600x900.'.$pathinfo['extension'],
                    'width' => 600,
                    'height' => 900,
                    'mime-type' => $size['mime'],
                ],
                'woocommerce_gallery_thumbnail' => [
                    'file' => $pathinfo['filename'].'-100x100.'.$pathinfo['extension'],
                    'width' => 100,
                    'height' => 100,
                    'mime-type' => $size['mime'],
                ],
                'shop_catalog' => [
                    'file' => $pathinfo['filename'].'-300x450.'.$pathinfo['extension'],
                    'width' => 300,
                    'height' => 450,
                    'mime-type' => $size['mime'],
                ],
                'shop_catalog' => [
                    'file' => $pathinfo['filename'].'-683x1024.'.$pathinfo['extension'],
                    'width' => 683,
                    'height' => 1024,
                    'mime-type' => $size['mime'],
                ],
                'shop_single' => [
                    'file' => $pathinfo['filename'].'-600x900.'.$pathinfo['extension'],
                    'width' => 600,
                    'height' => 900,
                    'mime-type' => $size['mime'],
                ],
                'shop_thumbnail' => [
                    'file' => $pathinfo['filename'].'-100x100.'.$pathinfo['extension'],
                    'width' => 100,
                    'height' => 100,
                    'mime-type' => $size['mime'],
                ],
            ],
            'image_meta' => [
                'aperture' => '7.1',
                'credit' => 'Igor Alekseev',
                'camera' => 'Canon EOS 5D Mark II',
                'caption' => '',
                'created_timestamp' => '1536237860',
                'copyright' => '',
                'focal_length' => '50',
                'iso' => '250',
                'shutter_speed' => '0.00625',
                'title' => '',
                'orientation' => '0',
                'keywords' => [],
            ]
        ];
        if (file_exists($source))
        {
            $upload_dir = dirname($src).'/';
            $dir = $this->site_root_dir.$upload_dir;
            if (!file_exists($dir))
            {
                mkdir($dir, 0777, true);
            }
            $ir = new ImageResize($source);
//            $dest = $dir.$pathinfo['basename'];
//            if (!file_exists($dest))
//            {
//                $ir->save($dest);
//            }
            foreach ( $meta['size'] as $img )
            {
                $file = $img['file'];
                $dest = $dir.$file;
                if (file_exists($dest))
                {
                    continue;
                }
                $ir->resizeToBestFit($img['width'], $img['height']);
                $ir->save($dest);
            }
            $this->conn->insert('wp_postmeta', ['meta_key' => '_wp_attached_file', 'meta_value' => $meta['file'], 'post_id' => $post_id ]);
            $this->conn->insert('wp_postmeta', ['meta_key' => '_wp_attachment_metadata', 'meta_value' => serialize($meta), 'post_id' => $post_id ]);
            return true;
        }
        return false;
    }

    public function translit_str($str){
        $tr = array(
            "А"=>"a","Б"=>"b","В"=>"v","Г"=>"g",
            "Д"=>"d","Е"=>"e","Ё"=>"yo","Ж"=>"zh","З"=>"z","И"=>"i",
            "Й"=>"y","К"=>"k","Л"=>"l","М"=>"m","Н"=>"n",
            "О"=>"o","П"=>"p","Р"=>"r","С"=>"s","Т"=>"t",
            "У"=>"u","Ф"=>"f","Х"=>"h","Ц"=>"c","Ч"=>"ch",
            "Ш"=>"sh","Щ"=>"shch","Ъ"=>"","Ы"=>"y","Ь"=>"",
            "Э"=>"e","Ю"=>"yu","Я"=>"ya","а"=>"a","б"=>"b",
            "в"=>"v","г"=>"g","д"=>"d","е"=>"e","ё"=>"yo","ж"=>"zh",
            "з"=>"z","и"=>"i","й"=>"y","к"=>"k","л"=>"l",
            "м"=>"m","н"=>"n","о"=>"o","п"=>"p","р"=>"r",
            "с"=>"s","т"=>"t","у"=>"u","ф"=>"f","х"=>"h",
            "ц"=>"c","ч"=>"ch","ш"=>"sh","щ"=>"shch","ъ"=>"",
            "ы"=>"y","ь"=>"","э"=>"e","ю"=>"yu","я"=>"ya",
            " "=> "-", "."=> "", ","=> "", "/"=> "", "\""=> "",
            "'"=> "", "/"=> "", ":"=> "", "("=> "", ")"=> "", "!"=> "",
            "&amp;"=> "", "&quot;"=> "", "&laquo;"=> "", "&raquo;"=> "",
            "%"=> "", "-"=> "-", "&"=> "", "$"=> "", "«"=> "", "»"=> "", "+"=> ""
        );
        return trim(strtr($str,$tr), "-");
    }
}