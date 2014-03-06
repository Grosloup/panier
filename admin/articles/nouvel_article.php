<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 05/03/14
 * Time: 05:33
 */
include_once "../php/bases.php";

// il y a t il un cookie ?
    // oui -> recup user ->mis en session

if(!$session->exists("user")){
    $session->set("url", $_SERVER["REQUEST_URI"]);
    header("Location: /admin/login/login.php");
    die();
}
?>


<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="fr"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="fr"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title></title>

    <script src="../js/vendor/modernizr.min.js"></script>

    <link rel="stylesheet" href="../../css/font-awesome.min.css"/>
    <link rel="stylesheet" href="../css/admin.css"/>
</head>
<body class="new-item">
<script>
    if (!document.all) {
        document.body.className += " gt-ie10";
    }
    if (document.all) {
        if(!document.addEventListener){
            document.body.className += " lt-ie9";
        }
        if(document.addEventListener && !window.atob){
            document.body.className += " ie9";
        }
    }
</script>
<p class="browserhappy">
    Vous utilisez une version d'internet explorer incompatible avec ce site. Mettez à jour internet explorer vers la version 11, ou utilisez des navigateurs tels que Google Chrome, Firefox,...
</p>
<div id="left-nav-wrapper">
    <ul class="menu-accordeon">
        <li>
            <h5 class="titre">Gestion des Articles<span><i class="fa fa-chevron-circle-down"></i></span></h5>
            <ul>
                <li>Ajouter</li>
                <li>Supprimer</li>
                <li>Rechercher</li>
            </ul>
        </li>
        <li>
            <h5 class="titre">Les commandes<span><i class="fa fa-chevron-circle-down"></i></span></h5>
            <ul>
                <li>En cours</li>
                <li>Archives</li>
                <li>Rechercher</li>
            </ul>
        </li>
        <li>
            <h5 class="titre">Gestion des Admin.<span><i class="fa fa-chevron-circle-down"></i></span></h5>
            <ul>
                <li>Ajouter</li>
                <li>Supprimer</li>
                <li>Rechercher</li>
            </ul>
        </li>
    </ul>
</div>
<div class="container">
    <div class="row">
        <div class="col col-3">

        </div>
        <div class="col col-9">
        </div>
    </div>
</div>
<script src="../js/vendor/jquery-1.11.0.min.js"></script>
<script src="../js/jquery-plugins/menu-accordeon.js"></script>
<script>
    $(".menu-accordeon").menuAccordeon();
</script>
</body>
</html>
