<?php


if($_SERVER['SERVER_NAME'] === 'localhost'){
    define('DATABASE',"it");
    define('USER',"root");
    define('HOST',"localhost");
    define('PASSWORD',"");
    define('ROOT', 'http://localhost/ProjectMvc/mvc/public');
}else{
    define('ROOT', 'https://www.website.com');
}
