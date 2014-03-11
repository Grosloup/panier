<?php
include_once "php/bases.php";
// cart & client //

if(!$session->exists($container["session_opts"]["client_key_name"])){
    $clientClassname = $container["session_opts"]["client_class"];
    /** @var Client $client */
    $client =( new $clientClassname())->setStatus(Client::IS_ANONYMOUS);
    $session->set($container["session_opts"]["client_key_name"], $client);
} else {
    $client = $session->get($container["session_opts"]["client_key_name"]);
}

if(!$session->exists($container["session_opts"]["cart_key_name"])){
    $cartClass = $container["session_opts"]["cart_class"];
    /** @var Cart $cart */
    $cart = new $cartClass();
    $session->set($container["session_opts"]["cart_key_name"], $cart);
} else {
    $cart = $session->get($container["session_opts"]["cart_key_name"]);
}

// pour dev
$articles_origin = json_decode(file_get_contents(ROOT.DS."docs".DS."articles.json"));
// pagination
$articles_per_page = 10;
$countArticles = count($articles_origin);
$maxPage = ceil($countArticles/$articles_per_page);
if(!empty($_GET["page"])){
    $page = (int) $_GET["page"];
    if($page < 0){
        $page = 1;
    }
    if($page > $maxPage){
        $page = $maxPage;
    }
} else {
    $page = 1;
}
$start = ($page-1)*$articles_per_page;
$articles = array_slice($articles_origin, $start, $articles_per_page );
//
echo getHeader(["titre"=> "Bienvenue - ZooBeauvalBoutique"]);
?>

<body class="home">
<?php include_once ADMIN_ROOT . DS . "common" . DS . "browserapi.php"; ?>

<div id="topbar">
    <div class="container">
        <div class="row">
            <div class="logo">
                <a href="http://www.zoobeauval.com"><img src="/img/logo.png" alt=""/></a>
            </div>
            <div class="title">
                <h1><a href="<?php echo $router->getRoute("home"); ?>">La Boutique</a></h1>
            </div>
            <div class="navs">
                <div class="nav-right">
                    <ul>
                        <li>
                            <div class="nav-box" id="compte">
                                <h5><i class="fa fa-user"></i> Mon Compte</h5>
                                <div><a class="btn" href="">Me connecter</a></div>
                                <div><a class="btn" href="">Créer un compte</a></div>

                            </div>
                        </li> <!-- <a href=""><i class="fa fa-user"></i> Mon Compte</a> -->
                        <li>
                            <div class="nav-box" id="panier">
                                <h5><i class="fa fa-shopping-cart"></i> Mon Panier</h5>
                                <p><span id="num-articles"><?php echo $cart->getNumItems(); ?></span> article(s)</p>
                                <p><span id="montant-total"><?php echo $cart->getAmount(); ?></span> €</p>
                                <a class="btn" href="">Voir</a>
                            </div>
                        </li> <!-- <a href=""><i class="fa fa-shopping-cart"></i> Mon Panier</a> -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="main">
    <div class="container">
        <div class="row">
            <div class="col col-3">

            </div>
            <div class="col col-9">
                <div class="articles_nav">
                    <?php if($page == 1): ?>
                        <a class="btn next" href="<?php echo $router->getRoute("home", ["page"=>$page+1])?>">page suivante <i class="fa fa-chevron-right"></i></a>
                    <?php elseif($page > 1 && $page < $maxPage): ?>
                        <a class="btn prev" href="<?php echo $router->getRoute("home", ["page"=>$page-1])?>"><i class="fa fa-chevron-left"></i> page précédente</a><a class="btn next" href="<?php echo $router->getRoute("home", ["page"=>$page+1])?>">page suivante <i class="fa fa-chevron-right"></i></a>
                    <?php else: ?>
                        <a class="btn prev" href="<?php echo $router->getRoute("home", ["page"=>$page-1])?>"><i class="fa fa-chevron-left"></i> page précédente</a>
                    <?php endif; ?>
                </div>
                <div id="articles">

                    <?php foreach($articles as $article): ?>

                    <?php include ROOT.DS."pages".DS."front_article_partial.php"; ?>

                    <?php endforeach; ?>
                </div>
                <div class="articles_nav">
                    <?php if($page == 1): ?>
                        <a class="btn next" href="<?php echo $router->getRoute("home", ["page"=>$page+1])?>">page suivante <i class="fa fa-chevron-right"></i></a>
                    <?php elseif($page > 1 && $page < $maxPage): ?>
                        <a class="btn prev" href="<?php echo $router->getRoute("home", ["page"=>$page-1])?>"><i class="fa fa-chevron-left"></i> page précédente</a><a class="btn next" href="<?php echo $router->getRoute("home", ["page"=>$page+1])?>">page suivante <i class="fa fa-chevron-right"></i></a>
                    <?php else: ?>
                        <a class="btn prev" href="<?php echo $router->getRoute("home", ["page"=>$page-1])?>"><i class="fa fa-chevron-left"></i> page précédente</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="footer">
    <?php dump($_SESSION); ?>
</div>

<script src="/js/vendor/jquery-1.11.0.min.js"></script>
<script src="/js/apps/cart-manager.js"></script>
</body>
</html>


