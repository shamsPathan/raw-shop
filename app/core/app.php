<?php

Define("CONTPATH",'../app/controllers/');
define("EXT",".php");

class App
{   
 protected $controller 	= 	'ui';
 protected $method 	   	= 	'index';
 protected $params 		  = 	array();



 function __construct()
 {

    $this->helper = new Helper();
    
    $url = $this->parseUrl();
        //var_dump($url);exit;
    $targetController = CONTPATH. $url[0] .EXT;
        //print_r($targetController);exit;
        if(file_exists($targetController))             // test if controller exists
        {
          $this->controller = $url[0];
          unset($url[0]);
        } else 
            $this->helper->error(true);

        require_once CONTPATH. $this->controller .EXT;      // include controller file

        $this->controller = new $this->controller;      // make object
        
        $_SESSION['method'] = null;
        
        if(isset($url[1]) AND $url[1]!='')
        {
          $method = explode("?",$url[1]);
          // var_dump($method);exit;
          if (method_exists ( $this->controller , $method[0] ) )
          { 
            
            if(isset($method[1])){
              $get = explode("=",$method[1]);
              $_GET[$get[0]] = $get[1]??null;
            }

            $_SESSION['method'] = $method[0];
             $this->method = $method[0];
            unset($url[1]);
          } else $this->helper->error(true);
        }

        $this->params = $url ? array_values($url):[];
        
        
        call_user_func_array([$this->controller , $this->method],$this->params );
        

      }

    /**************************
    * Done with construct
    * finding options
    ****************************/
    public function parseUrl()
    {

      $tempURL = ltrim($_SERVER['REQUEST_URI'], '/');
      // it removes first "/" from the string
      //print_r($tempURL);exit;
      
      if($tempURL!="") //if empty it returns only "/" .. removed with ltrim
      return $url = explode(
        '/',
        filter_var(
         rtrim( $tempURL, '/'),
         FILTER_SANITIZE_URL
       )
      );
      else return array("ui");
    }
  }