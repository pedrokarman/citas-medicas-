<?php

if (isset($_COOKIE['user']) && $_COOKIE['pass']) {
    
} else {
    $dominio = $_SERVER["HTTP_HOST"];
    setcookie("user", null, time() + 3600, "/", $dominio);
    setcookie("pass", null, time() + 3600, "/", $dominio);
}
ini_set('display_errors', 1);
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
try {
    require_once ROOT . 'core/Autoload.php';
    require_once ROOT . 'core/Config.php';
    $registry = Registry::getInstancia();
    Session::init();
    Bootstrap::run($registry->_request);
} catch (Exception $e) {
    echo $e->getMessage();
}