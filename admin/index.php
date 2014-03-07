<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 05/03/14
 * Time: 05:31
 */
include_once "php/bases.php";

// il y a t il un cookie ?
    // oui -> recup user ->mis en session

if(!$session->exists("user")){

    $session->set("url", $_SERVER["REQUEST_URI"]);
    header("Location: /admin/login/login.php");
    die();
}

    echo getHeader(["titre"=>"Accueil - Admin - ZooBeauvalBoutique"]);
?>

<body class="admin-home">
<?php include_once "common/browserapi.php"; ?>
<?php include_once "common/side-bar.php"; ?>
<?php include_once "common/top-bar.php"; ?>

<div class="container">
    <div class="row">
        <div class="col col-3">
            <a href="/admin/login/logout.php">logout</a>

        </div>
        <div class="col col-9">


        </div>
    </div>
</div>
<script src="/admin/js/vendor/jquery-1.11.0.min.js"></script>
<script src="/admin/js/jquery-plugins/menu-accordeon.js"></script>
<script>
    $(".menu-accordeon").menuAccordeon();
</script>
</body>
</html>
