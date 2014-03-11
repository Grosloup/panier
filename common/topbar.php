<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 11/03/14
 * Time: 01:15
 */
?>
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
                        </li>
                        <li>
                            <div class="nav-box" id="panier">
                                <h5><i class="fa fa-shopping-cart"></i> Mon Panier</h5>
                                <p><span id="num-articles"><?php echo $cart->getNumItems(); ?></span> article(s)</p>
                                <p><span id="montant-total"><?php echo $cart->getAmount(); ?></span> €</p>
                                <a class="btn" href="<?php echo $router->getRoute("cart"); ?>">Voir</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
