<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 05/03/14
 * Time: 05:55
 */

defined("DS")           || define("DS", DIRECTORY_SEPARATOR);
defined("ADMIN_ROOT")   || define("ADMIN_ROOT", realpath(dirname(__DIR__)));
defined("CLASS_DIR")    || define("CLASS_DIR", ADMIN_ROOT . DS . "php" . DS . "classes");

include_once "functions.php";

if(!function_exists("autoload")){
    die("Pas d'autoloader de classes défini !");
}

spl_autoload_register("autoload");

include_once ADMIN_ROOT . DS ."configs" . DS . "config.php";

/** @var Session $session */
$session = $container["session"];
$session->start();
