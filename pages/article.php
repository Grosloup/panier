<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 10/03/14
 * Time: 17:31
 */

if(empty($_GET["article_id"])){
    header("Location:/");
    die();
}
include_once "../php/bases.php";

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

$article_id = (int) $_GET["article_id"];
// pour dev
$articles_origin = json_decode(file_get_contents(ROOT.DS."docs".DS."articles.json"));
$article = null;
foreach($articles_origin as $art){
    if($art->id == $article_id){
        $article = $art;
    }
}

if(!$article){
    // error article inexistant //
    header("Location:/");
    die();
}

echo getHeader(["titre"=> $article->designation . " - ZooBeauvalBoutique"]);
?>

<body class="single-article">
<?php include_once ADMIN_ROOT . DS . "common" . DS . "browserapi.php"; ?>
<?php include_once ROOT . DS . "common" . DS . "topbar.php"; ?>

<div id="main">
    <div class="container">
        <div class="row">
            <div class="col col-12">
                <!-- article <?php echo $article->id; ?> -->
                <div id="article" >
                    <h3><?php echo $article->designation; ?></h3>

                    <div class="row">
                        <div class="col col-2 article-picture">
                            <img src="<?php echo $article->img; ?>" alt="<?php echo $article->designation; ?>" title="<?php echo $article->designation; ?>"/>
                        </div>
                        <div class="col col-7 article-description">
                            <p><?php echo $article->description; ?></p>
                        </div>
                        <div class="col col-3">
                            <div class="article-price">
                                <p><?php echo $article->prix ?> €</p>
                            </div>
                            <div class="article-stock" >
                                <?php if($article->stock > 5): ?>
                                    <p class="success">En Stock</p>
                                <?php elseif($article->stock > 0 && $article->stock < 6): ?>
                                    <p class="warn">Quantité limité</p>
                                    <p class="warn"><span class="small">(< 5pièces )</span></p>
                                <?php else: ?>
                                    <p class="alert">Rupture</p>
                                <?php endif; ?>
                            </div>
                            <div class="article-quantity">
                                <?php if($article->stock>0):?>
                                    <div class="wrapper">
                                        <span class="label">Quantité: </span><input type="text" id="article-quantity-field" value="0"/> <a href="" class="article-plus"><i class="fa fa-plus-circle"></i></a> <a href=""  class="article-minus"><i class="fa fa-minus-circle"></i></a>
                                    </div>

                                <?php endif;?>
                            </div>
                            <div class="article-command">
                                <?php
                                    $dataLimited = "data-article-limited='"  . $article->stock . "'";
                                ?>
                                <a class="btn" href="" data-article-id="<?php echo $article->id; ?>" <?php echo $dataLimited; ?>>Ajouter au panier</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="footer">
</div>
<script src="/js/vendor/jquery-1.11.0.min.js"></script>
<script src="/js/vendor/spin.min.js"></script>
<script src="/js/vendor/jquery.spin.js"></script>
<script src="/js/apps/cart-manager-single.js"></script>
</body>
