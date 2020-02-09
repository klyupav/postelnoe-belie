<?php

namespace App\Donors;

use App\Donors\ParseIt\simpleParser;
use ParseIt\nokogiri;
use ParseIt\ParseItHelpers;

Class TextiloptomNet extends simpleParser {
    
    public $project = 'textiloptom.net';
    public $project_link = 'https://textiloptom.net';
    public $source = 'https://textiloptom.net/';
    public $cache = false;
    public $proxy = false;
    public $cookieFile = '';

    function __construct()
    {
        $this->cookieFile = __DIR__.'/cookie/'.class_basename(get_class($this)).'/'.class_basename(get_class($this)).'.txt';
    }
}
