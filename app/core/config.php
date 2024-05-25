<?php


if($_SERVER['SERVER_NAME'] === 'localhost'){
    define('DATABASE',"it");
    define('USER',"root");
    define('HOST',"localhost");
    define('PASSWORD',"");
    define('ROOT', 'http://localhost/MVCV2/public');
}else{
    define('ROOT', 'https://nm.stud.vts.su.ac.rs/');
}

