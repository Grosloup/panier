<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 05/03/14
 * Time: 16:02
 */
include_once "../php/bases.php";

if(     empty($_POST)
    ||  empty($_POST["login_form"]["password"])
    ||  empty($_POST["login_form"]["username"])
    ||  !$session->validateFormCsrfToken($_POST[$session->getTokenName()]))
{
    header("Location: /admin/login/login.php");
    die();
}
$datas = $_POST["login_form"];
// verification de l'utilisateur
    // oui
        // alors
            // remember ?
                // oui
                // de toute façon
    // non
        // alors
// TODO[Nicolas] verification en db de user
if($datas["username"] == "admin" && $datas["password"] == "password"){// oui
    // alors
        // remember ?
    if(isset($datas["remember"])){// oui
        // setcookie
    }
    // de toute façon
    // redirect
    $session->set("user", ["username"=>"admin"]);
    header("Location: " . $session->get("url"));
    die();

} else {// non
    // alors
    // redirect
    $session->setFlashMessage("Identifiants incorrects.");
    header("Location: /admin/login/login.php");
    die();
}


