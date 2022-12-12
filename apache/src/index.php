<?php
require 'application/lib/dev.php'; // debug
use application\core\Router;
use application\lib\Db;

//autoload classes
spl_autoload_register(function($class){
//    echo '<p>'.$class.'<p>';
    $path = str_replace('\\', '/', $class .'.php');
//    #debug($path);
//    #echo $path;
    if (file_exists($path)) {
        require $path;
    }
});

session_start();
$router = new Router;
$router->run();
//$db = new Db;