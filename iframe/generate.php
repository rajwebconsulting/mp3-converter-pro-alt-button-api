<?php

namespace ButtonApi;

require dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/Config.php';

use Config;
use Josantonius\Request\Request;
use RajWebConsulting\JsonSdk\App as Converter;

if (Request::isPost())
{
    $hash = Request::post('hash');
    print_r($hash);

    $converter = new Converter(['API_URL' => Config::_CONVERTER_URL]);
    $data = $converter->StartTask($hash);
    print_r($data);
}
?>
