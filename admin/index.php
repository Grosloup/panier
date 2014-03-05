<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 05/03/14
 * Time: 05:31
 */
include_once "php/bases.php";

if(!$session->exists("user")){
    $session->set("url", $_SERVER["REQUEST_URI"]);
    header("Location: /admin/login/login.php");
}
echo "admin page";
