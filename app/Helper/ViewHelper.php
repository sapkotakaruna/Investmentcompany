<?php

namespace App\Helper;


use Illuminate\Support\Facades\Session;

class ViewHelper
{

    public function formatDate($date, $format = 'jS M, Y H:i:s')
    {
        return date($format, strtotime($date));
    }

    public function getImagePath($folder = null, $image_name = null, $dimension = '')
    {
        if (!$folder || !$image_name)
            return asset('images/no-image.png');

        if (!file_exists(public_path('images' . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $image_name)))
            return asset('images/' . $folder . '/no-image.png');

        return asset('images/' . $folder . '/' . $dimension . $image_name);
    }

    public function getSiteLogo($image_name)
    {
        if (file_exists(public_path('images' . DIRECTORY_SEPARATOR . 'siteSetting' . DIRECTORY_SEPARATOR . $image_name)))
            return asset('images/siteSetting/' . $image_name);
        return asset('front/img/magazine.png');
    }
    function numberToWords($number)
    {
        $words = [
            1 => 'first', 2 => 'second', 3 => 'third', 4 => 'fourth', 5 => 'five',
            6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'ninth', 10 => 'tenth',
            11 => 'eleventh', 12 => 'twelfth', 13 => 'thirteenth', 14 => 'fourteenth',
            15 => 'fifteenth', 16 => 'sixteenth', 17 => 'seventeenth', 18 => 'eighteenth',
            19 => 'nineteenth', 20 => 'twentieth', 21 => 'twenty-first', 22 => 'twenty-second',
            23 => 'twenty-third', 24 => 'twenty-fourth', 25 => 'twenty-fifth',
            26 => 'twenty-sixth', 27 => 'twenty-seventh', 28 => 'twenty-eighth',
            29 => 'twenty-ninth', 30 => 'thirtieth', 31 => 'thirty-first', 32 => 'thirty-second',
            // Add more as needed
        ];
        return $words[$number];
    }
}
