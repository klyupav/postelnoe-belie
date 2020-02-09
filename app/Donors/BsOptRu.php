<?php

namespace App\Donors;

use App\Donors\ParseIt\simpleParser;
use ParseIt\nokogiri;
use ParseIt\ParseItHelpers;

Class BsOptRu extends simpleParser {
    
    public $project = 'bs-opt.ru';
    public $project_link = 'https://bs-opt.ru';
    public $source = 'https://bs-opt.ru/';
    public $cache = false;
    public $proxy = false;
    public $cookieFile = '';
    protected $login = 'jumper-shop';
    protected $password = 'RFVsCT2018TGfdCv';

    function __construct()
    {
        $this->cookieFile = __DIR__.'/cookie/'.class_basename(get_class($this)).'/'.class_basename(get_class($this)).'.txt';
        $this->login();
    }

    protected function login()
    {
//        $opt['cookieFile'] = $this->cookieFile;
//        $content = $this->loadUrl($this->source, $opt);
//        $content = preg_replace( "%windows-1251%is", 'UTF-8', $content );
//        $content = iconv('windows-1251', 'UTF-8', $content);
//        $content = ParseItHelpers::fixEncoding($content);
//        $nokogiri = new nokogiri($content);
//        $action = @$nokogiri->get("form[name=form_auth]")->toArray()[0]['action'];
//        $inputs = @$nokogiri->get("form[name=form_auth] input")->toArray();
//        $opt['post'] = [];
//        foreach ($inputs as $input)
//        {
//            $opt['post'][@$input['name']] = @$input['value'];
//        }
//        $opt['post']['USER_LOGIN'] = $this->login;
//        $opt['post']['USER_PASSWORD'] = $this->password;
//        $opt['post'] = build_query($opt['post']);
//        $content = $this->loadUrl($this->fixUrl($action), $opt);
    }
}
