<?php

namespace App\Donors;

use ParseIt\_String;
use ParseIt\nokogiri;
use ParseIt\ParseItHelpers;

Class BsOptRuProduct extends BsOptRu{

    public function getSources($opt = [])
    {
        $sources = [];
        $url = @$opt['url'];
        $parts = parse_url($url);
        if (!isset($parts['query']))
        {
            $url .= '?limit=100';
        }
        else
        {
            if (preg_match('%(limit=\d*)%uis', $url, $match))
            {
                $url = str_replace($match[1], 'limit=100', $url);
            }
            else
            {
                $url .= '&limit=100';
            }
        }
        $content = $this->loadUrl($url, $opt);
        $nokogiri = new nokogiri($content);
        $products = $nokogiri->get("table.catalog div.name a")->toArray();
        foreach ($products as $product)
        {
            if (!isset($product['href']))
            {
                continue;
            }
            $sources[] = [
                'source' => $product['href'],
                'hash' => md5($product['href']),
            ];
        }

        $pages = $nokogiri->get(".pages a")->toArray();

        if (preg_match('%page=(\d*)%uis', $url, $match))
        {
            $currPage = _String::parseNumber($match[1]);
        }
        else
        {
            $currPage = 1;
            $url .= '&page=1';
        }
        foreach ($pages as $page)
        {
            $nextPage = _String::parseNumber($page['#text']);
            if ($nextPage > $currPage)
            {
                $opt['url'] = str_replace("page={$currPage}", "page={$nextPage}", $url);
                foreach ( $this->getSources($opt) as $source )
                {
                    $sources[] = $source;
                }
                break;
            }
        }

        return $sources;
    }

    public function getData($url, $source = [])
    {
        $product = false;
        $content = $this->loadUrl($url, $source);
        $nokogiri = new nokogiri($content);
        $title = trim(@$nokogiri->get("#content h2")->toArray()[0]['__ref']->nodeValue);
        $gallery = @$nokogiri->get("a.fancybox")->toArray();
        foreach ($gallery as $img)
        {
            $images[] = $img['href'];
        }
        $desc = '';
        if (preg_match("%<div id\=\"tab\-description\".*?>(.*?)</div>%uis", $content, $match))
        {
            $desc = trim($match[1]);
        }
        $short_desc = trim(@$nokogiri->get("#tab-description p")->toArray()[0]['__ref']->nodeValue);
        $brand = '';
        if (preg_match("%<span>Производитель:</span>\s+<a[^>]*>(.*?)</a>%uis", $content, $match))
        {
            $brand = trim($match[1]);
        }
        $model = '';
        if (preg_match("%<span>Модель:</span>(.*?)<%uis", $content, $match))
        {
            $model = trim($match[1]);
        }
        $price = '';
        if (preg_match("%Цена:\s+(.*?)<img%uis", $content, $match))
        {
            $price = trim($match[1]);
            $price = str_replace(',', '', $price);
            $price = _String::parseNumber($price);
        }
        $breads = $nokogiri->get(".breadcrumbs .breadcrumb a")->toArray();
        foreach ($breads as $key => $bread)
        {
            if ($key === 0)
                continue;
            $cat = trim($bread['__ref']->nodeValue);
            if (preg_match('%(сетевые карты)%uis', $cat))
            {
                $category[] = 'Контроллеры, адаптеры';
            }
            else
            {
                $category[] = $cat;
            }
            if (preg_match('%(процессоры|системы охлаждения)%uis', $cat))
            {
                break;
            }
        }
        if (isset($category[0]) && $category[0] === 'Прочее')
        {
            if (preg_match('%рельсы%uis', $title))
            {
                $category[] = 'Рельсы';
            }
            else if (preg_match('%(салазки|салазка)%uis', $title))
            {
                $category[] = 'Салазки';
            }
            else if (preg_match('%Трансивер%uis', $title))
            {
                $category[] = 'Трансиверы';
            }
            else if (preg_match('%Riser%uis', $title))
            {
                $category[] = 'Райзеры';
            }
            else if (preg_match('%Кабель%uis', $title))
            {
                $category[] = 'Кабель';
            }
            else if (preg_match('%Корзина%uis', $title))
            {
                $category[] = 'Корзины';
            }
        }
        $hash = md5($url);
        $product = [
            'source' => $url,
            'title' => $title,
            'desc' => $desc,
            'short_desc' => $short_desc,
            'brand' => $brand,
            'model' => @$model,
            'price' => @$price,
            'hash' => $hash,
            'images' => @$images,
            'category' => @$category,
        ];
//        print_r($product);die();

        return $product;
    }
}
