<?php
namespace Sajjad\Ecommerce\Libraries;
  /**
   * App Core Class
   * Creates URL & loads core controller
   * URL FORMAT - /controller/method/params
   */
  class Core {
    protected $currentController = 'Categories';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct(){

      $url = $this->getUrl();
      // Look in controllers for first value
      if(isset($url[0]) && file_exists('../app/controllers/' . ucwords($url[0]). '.php')){
        // If exists, set as controller
        $this->currentController = ucwords($url[0]);
        // Unset 0 Index
        unset($url[0]);
      }

      // Require the controller
      require_once '../app/controllers/'. $this->currentController . '.php';

      // Instantiate controller class
      $this->currentController = new $this->currentController;

      // Check for second part of url
      if(isset($url[1]) && count($url) > 1){
        // Check to see if method exists in controller
          if(method_exists($this->currentController,  end($url))){
            $this->currentMethod =  end($url);
            // Unset 1 index
            array_pop($url);
          }
      }

      // Get params
      $this->params = $url ? array_values($url) : [];
      // Call a callback with array of params
      call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl(){
     
      if(isset($_SERVER['REQUEST_URI'])){
        $url = rtrim($_SERVER['REQUEST_URI'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
      }
    }
  }
