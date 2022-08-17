<?php

namespace ButtonApi;

require dirname(__DIR__) . '/vendor/autoload.php';
require_once dirname(__DIR__) . '/Config.php';

use Config;
use Josantonius\Request\Request;
use RajWebConsulting\JsonSdk\App as Converter;

// Takes raw data from the request
$json = file_get_contents('php://input');

// Converts it into a PHP object
$data = json_decode($json);

if (!empty($data))
{
    $converter = new Converter(['API_URL' => Config::_CONVERTER_URL]);
    $output = $converter->GetStatus(Config::_CONVERTER_URL, $data->taskId);
    echo json_encode($output);
}
