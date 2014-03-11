<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 10/03/14
 * Time: 17:31
 */
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

// pour dev
$articles_origin = json_decode(file_get_contents(ROOT.DS."docs".DS."articles.json"));

$cartRows = [];

if($cart->getNumItems() < 1){

} else {
    $items = $cart->getItems();
    foreach($items as $k=>$v){
        foreach($articles_origin as $art){
            if($art->id == $k){
                $cartRows[] = ["article"=> $art, "quantity"=> $v["quantity"]];
                break;
            }
        }
    }

}


echo getHeader(["titre"=> "Votre panier - ZooBeauvalBoutique"]);
?>

<body class="cart">
<?php include_once ADMIN_ROOT . DS . "common" . DS . "browserapi.php"; ?>
<?php include_once ROOT . DS . "common" . DS . "topbar.php"; ?>

<div id="main">
    <div class="container">
        <div class="row">
            <div class="col col-12">
                <div id="articles-list">
                    <?php foreach($cartRows as $row):?>
                        <div class="row article " id="cart-article-<?php echo $row["article"]->id; ?>">
                            <div class="col col-1 article-picture">
                                <img src="<?php echo $row["article"]->img; ?>"
                                     alt="<?php echo $row["article"]->designation; ?>" title="<?php echo $row["article"]->designation; ?>"/>
                            </div>
                            <div class="col col-3 article-name">
                                <h6><a href="<?php echo $router->getRoute("home_pages_article",["article_id"=>$row["article"]->id]); ?>"><?php echo $row["article"]->designation; ?></a></h6>
                            </div>
                            <div class="col col-1 article-stock">
                                <?php if($row["article"]->stock > 5): ?>
                                    <p class="success">En Stock</p>
                                <?php elseif($row["article"]->stock > 0 && $row["article"]->stock < 6): ?>
                                    <p class="warn">Stock limité</p>
                                <?php else: ?>
                                    <p class="alert">Rupture</p>
                                <?php endif; ?>
                            </div>
                            <div class="col col-2 article-price">
                                <p><?php echo $row["article"]->prix; ?> <span class="small">€ TTC</span></p>
                            </div>
                            <div class="col col-2 article-quantity" data-article-uprice="<?php echo $row["article"]->prix; ?>" data-article-id="<?php echo $row["article"]->id; ?>" data-article-stock="<?php echo $row["article"]->stock; ?>">
                                <input type="text" class="article-quantity-field" value="<?php echo $row["quantity"]; ?>"/> <a href="" class="article-plus"><i class="fa fa-plus-circle"></i></a> <a href=""  class="article-minus"><i class="fa fa-minus-circle"></i></a>
                            </div>
                            <div class="col col-2 article-row-amount">
                                <p><span class="row-amount">0</span> <span class="small"><i class="fa fa-eur"></i> TTC</span></p>
                            </div>
                            <div class="col col-1">

                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col col-12">
                <div id="total">
                    <div class="row">
                        <div class="col col-9" id="label">
                            Total de votre panier:
                        </div>
                        <div class="col col-2" id="amount">
                            <span id="total-amount"><?php echo $cart->getAmount(); ?></span> <span class="small"><i class="fa fa-eur"></i> TTC</span>
                        </div>
                        <div class="col col-1"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="cart-final-controls">
            <div class="col col-3"></div>
            <div class="col col-3"></div>
            <div class="col col-3">
                <a class="btn back-shopping" href="<?php echo $router->getRoute("home"); ?>"><i class="fa fa-chevron-left"></i> Continuez vos achats</a>
            </div>
            <div class="col col-3">
                <a class="btn payment" href="#">Passez votre commande <i class="fa fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
</div>



<div id="footer">
</div>
<script src="/js/vendor/jquery-1.11.0.min.js"></script>
<script src="/js/vendor/spin.min.js"></script>
<script src="/js/vendor/jquery.spin.js"></script>
<script src="/js/apps/cart-manager.js"></script>
</body>
