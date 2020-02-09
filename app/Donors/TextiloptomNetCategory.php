<?php

namespace App\Donors;

use ParseIt\nokogiri;
use ParseIt\ParseItHelpers;

Class TextiloptomNetCategory extends TextiloptomNet {

    public function getSources($opt = [])
    {
        $categories = [];

        $content = $this->loadUrl($this->source);

        $nokogiri = new nokogiri($content);

        $cats = $nokogiri->get(".level1 li.nav-item a")->toArray();

        foreach ($cats as $title => $cat)
        {
            $url = $cat['href'];
            $title = trim($cat['__ref']->nodeValue);
            $hash = md5($url);
            $categories[] = [
                'source' => $url,
                'hash' => $hash,
                'title' => $title,
                'parent' => '',
            ];
        }

        return $categories;
    }
}
