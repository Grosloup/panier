<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 05/03/14
 * Time: 05:52
 */
function autoload($classname=""){
    if($classname[0] == "\\"){
        $classname = substr($classname, 1);
    }

    $filename = CLASS_DIR . DS . str_replace("\\", DS, $classname) . ".php";

    require_once $filename;
}

function getHeader($datas = [], $filename = ""){
    if(!$filename){
        $filename = realpath(dirname(__DIR__)) . DS . "common" . DS . "header.php";
    }
    extract($datas);

    ob_start();

    include_once $filename;

    return ob_get_clean();
}


