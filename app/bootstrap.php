<?php
 namespace Sajjad\Ecommerce;
 use Sajjad\Ecommerce\Config\Config;

 class Autoloader {

  public function __construct () {
    new \Sajjad\Ecommerce\Helpers\Redirect();
  }
     public static function register() {
        $config = new Config();
         spl_autoload_register(function($className) use($config) {
             $classPath = str_replace('\\', '/', $className);
             require_once $config->getAppRoot() . '/libraries/' . $classPath . '.php';
         });
     }
 }
 
 \Sajjad\Ecommerce\Autoloader::register();
 
  
