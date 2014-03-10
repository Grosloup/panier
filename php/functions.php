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
