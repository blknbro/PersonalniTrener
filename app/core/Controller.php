<?php

class Controller
{
    public function view($name)
    {
        $filename = "../app/views/" . $name . "View.php";

        if(file_exists($filename)){
            require $filename;
        }
        else{
            $filename = "../app/views/404View.php";
            require $filename;
        }
    }
}