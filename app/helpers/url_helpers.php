<?php
namespace Sajjad\Ecommerce\Helpers;

use Sajjad\Ecommerce\Config;

class Redirect {
    public static function to($page) {
        $config = new Config();
        header('Location: ' . $config->getUrlRoot() . '/' . $page);
        exit();
    }
}

