<?php
/**
 * Created by PhpStorm.
 * User: grosloup
 * Date: 09/03/14
 * Time: 01:33
 */
function autoload($classname=""){
    if($classname[0] == "\\"){
        $classname = substr($classname, 1);
    }

    $filename = CLASS_DIR . DS . str_replace("\\", DS, $classname) . ".php";

    require_once $filename;
}

function setEnv($env = "prod"){
    define("ENVIRONEMENT", $env);
    if($env == "prod"){
        error_reporting(0);
        ini_set("display_errors", "Off");
        ini_set("display_startup_errors", "Off");
    } else {
        error_reporting(1);
        ini_set("display_errors", 1);
        ini_set("display_startup_errors", 1);
        ini_set("xdebug.var_display_max_children", -1);
        ini_set("xdebug.var_display_max_data", -1);
        ini_set("xdebug.var_display_max_depth", -1);
    }
}

function dump($datas){
    if(defined("ENVIRONEMENT") && ENVIRONEMENT == "dev"){
        var_dump($datas);
    }
}

function camelToSnake($str){
    return strtolower(preg_replace("/((?<=[a-z0-9])[A-Z]|(?<=[a-z])[0-9])/", "_$1", $str));
}

function snakeToCamel($str){
    return ucfirst(preg_replace_callback("/((?<=[a-z0-9])_[a-z0-9])/",function($matches){
        return strtoupper(str_replace("_","",$matches[0]));
    }, $str));
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

function excerpt($text="", $length=80, $end = "..."){

    if(strlen($text) > $length){
        $text = substr($text, 0 , $length) . $end;
    }

    return $text;
}

function excerpt_word($text="", $length=50, $end = "..."){
    $count = str_word_count($text);
    if($count > $length){
        $words = str_word_count($text, 1);
        $words = array_slice($words, 0 , $length);
        $text = implode(" ", $words) . $end;
    }
    return $text;
}

function logIp(){
    if(!empty($_SERVER["REMOTE_ADDR"])){
        $date = new DateTime('now',new DateTimeZone("Europe/Paris"));
        $text = $date->format("d/m/Y H:i:s") . " :: " . $_SERVER["REMOTE_ADDR"] . PHP_EOL;
        file_put_contents(ROOT.DS."logs".DS."ips.log", $text, FILE_APPEND);
    }
}
