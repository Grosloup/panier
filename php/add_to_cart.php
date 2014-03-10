<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 10/03/14
 * Time: 20:56
 */

if(strtolower($_SERVER["REQUEST_METHOD"]) != "post" || empty($_SERVER["HTTP_X_REQUESTED_WITH"]) || strtolower($_SERVER["HTTP_X_REQUESTED_WITH"]) != "xmlhttprequest"){
    // error ///////////////////////////////////////////
}

if(empty($_POST) || empty($_POST["id"])){
    // error /////////////////////////////////////////
}

$id = (int) $_POST["id"];

defined("DS")           || define("DS", DIRECTORY_SEPARATOR);
defined("ROOT")         || define("ROOT", realpath(dirname(__DIR__)));
defined("ADMIN_ROOT")   || define("ADMIN_ROOT", ROOT . DS . "admin");
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


// dev //
$articles = json_decode(file_get_contents(ROOT . DS. "docs".DS."articles.json"), true);
$article = null;
foreach($articles as $art){
    if($art["id"] == $id){
        $article = $art;
        break;
    }
}

if($article == null){
    // article introuvable //////////////////////////////
} else {
    /** @var Cart $cart */
    $cart = $session->get($container["session_opts"]["cart_key_name"]);

    $quantity = (empty($_POST["quantity"])) ? 1 : (int) $_POST["quantity"];

    if($quantity <0 || $quantity>0){
        $cart->setAmount($cart->getAmount() + ($quantity * $article["prix"]));
    } else {
        $cart->setAmount($cart->getAmount() - ($cart->getItem($article["id"])["quantity"] * $article["prix"]));
    }
    $cart->updateItem($id, $quantity);
}


////////

header("Content-type: application/json");
echo json_encode(
    [
        "errorStatus"   => "ok",
        "id"            => $id,
        "newQuantity"   => $cart->getNumItems(),
        "newAmount"     => $cart->getAmount(),
    ]
);


