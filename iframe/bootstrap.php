<?php

namespace ButtonApi;

require dirname(__DIR__) . '/vendor/autoload.php';

use Josantonius\Request\Request;
use RajWebConsulting\JsonSdk\App;


if (Request::isGet())
{
   $vid = Request::get('vid');
   $color = Request::get('color');

   if (isset($color) && !empty($color))
   {
      if ($color == 'blue' || $color == 'green' || $color == 'purple' || $color == 'red' || $color == 'yellow' || $color == 'indigo' || $color == 'pink' || $color == 'gray')
      {
         $colorClass = 'class="bg-' . htmlspecialchars($color, ENT_QUOTES, 'utf-8'). '-500 text-white"';
      }
      else if($color == 'white')
      {
         $colorClass = 'class="bg-white text-gray-800"';
      }
      else if (preg_match('/^[a-zA-Z0-9]/', $color))
      {
         $colorClass = 'style="background-color: #' . htmlspecialchars($color, ENT_QUOTES, 'utf-8') . '"';
      }
   }
   else
   {
      $colorClass = 'class="bg-blue-600"';
   }
}