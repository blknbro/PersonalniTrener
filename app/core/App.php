<?php

class App
{

    private $controller = 'Home';
    private $method = 'index';

    private function splitUrl(){
        $url = $_GET['url'] ?? "home";
        return explode("/",$url);
    }

    public function loadController()
    {
        $url = $this->splitUrl();

        $filename = "../app/controllers/" . ucfirst($url[0]) . "Controller.php";

        if(file_exists($filename)){
            require $filename;
            $this->controller = ucfirst($url[0]) . "Controller";
        }
        else{
            $filename = "../app/controllers/_404Controller.php";
            require $filename;
            $this->controller = "_404Controller";
        }

        $controller = new $this->controller;
        call_user_func_array([$controller,$this->method],[]);

    }

}