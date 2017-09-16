<?php

class Boot {

    //default value for the controller
    private $controller = 'home';

    //default value for the method
    private $method = 'index';

    private $param = [];

    public function __construct() {

        $url = $this->url();

        //setting the controllers from url
        //first value in the url will be the controller
        //default value will be 'home' if other value doesn't exist
        if(file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        include '../app/controllers/' . $this->controller . '.php';

        //calling the controller from url
        $this->controller = new $this->controller;

        //setteing the method from url
        if(isset($url[1])) {
            if(method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->param = $url ? array_values($url) : [];

        call_user_func_array([$this->controller, $this->method], $this->param);

    }

    //geting the URL from htaccess file
    public function url() {
        if(isset($_GET['url'])) {
            return $url = explode('/', $_GET['url']);
        }
    }

}