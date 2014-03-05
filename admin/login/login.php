<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 05/03/14
 * Time: 15:54
 */
include_once "../php/bases.php";

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

    <link rel="stylesheet" href="../css/admin.css"/>
</head>
<body>
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
<div class="container">
    <div class="row">
        <div class="col col-3"></div>
        <div class="col col-6">
            <form action="process_login.php" method="post">

                <label for="username">Nom d'utilisateur ou email</label>
                <input type="text" id="username" name="login_form[username]"/>

                <label for="password">Mot de passe</label>
                <input type="login_form[password]" name="password" id="password"/>

                <button type="submit">Connexion</button>
            </form>
        </div>
        <div class="col col-3"></div>
    </div>
</div>
</body>
</html>
