<?php
/**
 * Created by PhpStorm.
 * User: grosloup
 * Date: 09/03/14
 * Time: 01:40
 */
defined("DS")           || define("DS", DIRECTORY_SEPARATOR);
defined("ROOT")         || define("ROOT", realpath(dirname(__DIR__)));
defined("ADMIN_ROOT")   || define("ADMIN_ROOT", ROOT . DS . "admin");
defined("CLASS_DIR")    || define("CLASS_DIR", ADMIN_ROOT . DS . "php" . DS . "classes");

include_once "php/functions.php";

if(!function_exists("autoload")){
    die("Pas d'autoloader de classes défini !");
}

spl_autoload_register("autoload");

include_once ADMIN_ROOT . DS ."configs" . DS . "config.php";

$routes = include_once ADMIN_ROOT . DS ."configs" . DS . "routes.php";
/** @var Router $router */
$router = $container["router"];
$router->setRoutes($routes);

/** @var Session $session */
$session = $container["session"];
$session->start();