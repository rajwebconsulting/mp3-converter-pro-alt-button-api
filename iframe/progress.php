<?php

namespace ButtonApi;

require dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/Config.php';

use Config;
use RajWebConsulting\JsonSdk\App as Converter;

// Takes raw data from the request
$json = file_get_contents('php://input');

// Converts it into a PHP array
$data = json_decode($json, true);

if(json_last_error() == JSON_ERROR_NONE)
{
    if (!empty($data) && isset($data['taskId']))
    {
        $converter = new Converter(['API_URL' => Config::_CONVERTER_URL]);
        $output = $converter->GetStatus($data['taskId']);
        echo json_encode($output);
    }
}