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

      if (isset($color) && !empty($color) && !is_array($color))
      {
            if ($color == 'blue' || $color == 'green' || $color == 'purple' || $color == 'red' || $color == 'yellow' || $color == 'indigo' || $color == 'pink' || $color == 'gray')
            {
                  $colorClass = 'class="bg-' . htmlspecialchars($color, ENT_QUOTES, 'utf-8') . '-500 text-white"';
            }
            else if ($color == 'white')
            {
                  $colorClass = 'class="bg-white text-gray-800"';
            }
            else if (preg_match('/^[a-zA-Z0-9]/', $color))
            {
                  function getContrastColor($hex)
                  {
                        $length   = strlen($hex);
                        // hexColor RGB
                        $R1 = hexdec($length == 6 ? substr($hex, 0, 2) : ($length == 3 ? str_repeat(substr($hex, 0, 1), 2) : 0));
                        $G1 = hexdec($length == 6 ? substr($hex, 2, 2) : ($length == 3 ? str_repeat(substr($hex, 1, 1), 2) : 0));
                        $B1 = hexdec($length == 6 ? substr($hex, 4, 2) : ($length == 3 ? str_repeat(substr($hex, 2, 1), 2) : 0));

                        // Black RGB
                        $blackColor = "#000000";
                        $R2BlackColor = hexdec(substr($blackColor, 1, 2));
                        $G2BlackColor = hexdec(substr($blackColor, 3, 2));
                        $B2BlackColor = hexdec(substr($blackColor, 5, 2));

                        // Calc contrast ratio
                        $L1 = 0.2126 * pow($R1 / 255, 2.2) +
                              0.7152 * pow($G1 / 255, 2.2) +
                              0.0722 * pow($B1 / 255, 2.2);

                        $L2 = 0.2126 * pow($R2BlackColor / 255, 2.2) +
                              0.7152 * pow($G2BlackColor / 255, 2.2) +
                              0.0722 * pow($B2BlackColor / 255, 2.2);

                        $contrastRatio = 0;
                        if ($L1 > $L2)
                        {
                              $contrastRatio = (int)(($L1 + 0.05) / ($L2 + 0.05));
                        }
                        else
                        {
                              $contrastRatio = (int)(($L2 + 0.05) / ($L1 + 0.05));
                        }

                        // If contrast is more than 5, return black color
                        if ($contrastRatio > 5)
                        {
                              return '#000000';
                        }
                        else
                        {
                              // if not, return white color.
                              return '#FFFFFF';
                        }
                  }

                  $textColor = getContrastColor(htmlspecialchars($color, ENT_QUOTES, 'utf-8'));
                  $colorClass = 'style="color:' . $textColor . '; background-color: #' . htmlspecialchars($color, ENT_QUOTES, 'utf-8') . '"';
            }
      }
      else
      {
            $colorClass = 'class="bg-blue-600 text-white"';
      }

      if (isset($vid) && !empty($vid))
      {
            $url = 'https://youtu.be/' . $vid;
            $converter = new Converter(['API_URL' => Config::_CONVERTER_URL]);
            $data = $converter->GenerateDownloadHash($url, 'mp3');
      }
}
