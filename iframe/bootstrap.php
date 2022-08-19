<?php

namespace ButtonApi;

require dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/Config.php';

use Config;
use Josantonius\Request\Request;
use RajWebConsulting\JsonSdk\App as Converter;


if (Request::isGet())
{
    $vid = Request::get('vid');
    $color = Request::get('color');

    require __DIR__ . '/colorHandler.php';

    if (isset($vid) && !empty($vid))
    {
        $url = 'https://youtu.be/' . $vid;
        $converter = new Converter(['API_URL' => Config::_CONVERTER_URL]);
        $data = $converter->GenerateDownloadHash($url, 'mp3');
    }
}
