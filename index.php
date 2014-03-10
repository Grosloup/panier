<?php
include_once "php/bases.php";

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
                <h1>La Boutique</h1>
            </div>
            <div class="navs">
                <div class="nav-right">
                    <ul>
                        <li>
                            <div class="nav-box">
                                <h5><i class="fa fa-user"></i> Mon Compte</h5>
                                <div><a class="btn" href="">Me connecter</a></div>
                                <div><a class="btn" href="">Créer un compte</a></div>

                            </div>
                        </li> <!-- <a href=""><i class="fa fa-user"></i> Mon Compte</a> -->
                        <li>
                            <div class="nav-box">
                                <h5><i class="fa fa-shopping-cart"></i> Mon Panier</h5>
                                <p><span>0</span> article(s)</p>
                                <p><span>0,00</span> €</p>
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
                <div id="articles">
                    <!-- start -->
                    <div class="article" id="">
                        <div class="article-picture">
                            <img src="http://placekitten.com/g/150/150" alt=""/>
                        </div>
                        <div class="article-details">
                            <h3 class="article-name"><a href="<?php echo $router->getRoute("home_pages_article",["article_id"=>1]); ?>">Lorem ipsum dolor sit</a></h3>

                            <div class="row">
                                <div class="col col-7 article-description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos excepturi maxime
                                        possimus...</p>
                                    <a class="btn" href="<?php echo $router->getRoute("home_pages_article",["article_id"=>1]); ?>">Détails <i class="fa fa-hand-o-right"></i></a>
                                </div>
                                <div class="col col-2 article-price">
                                    <p>00,00 €</p>
                                </div>
                                <div class="col col-2 article-stock" >
                                    <p class="success">En Stock</p>
                                </div>
                                <div class="col col-1 article-to-cart">
                                    <a href="" class="btn"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end -->

                    <!-- start -->
                    <div class="article" id="">
                        <div class="article-picture">
                            <img src="http://placekitten.com/g/150/150" alt=""/>
                        </div>
                        <div class="article-details">
                            <h3 class="article-name"><a href="<?php echo $router->getRoute("home_pages_article",["article_id"=>2]); ?>">Lorem ipsum dolor sit</a></h3>

                            <div class="row">
                                <div class="col col-7 article-description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos excepturi maxime
                                        possimus...</p>
                                    <a class="btn" href="<?php echo $router->getRoute("home_pages_article",["article_id"=>2]); ?>">Détails <i class="fa fa-hand-o-right"></i></a>
                                </div>
                                <div class="col col-2 article-price">
                                    <p>00,00 €</p>
                                </div>
                                <div class="col col-2 article-stock" >
                                    <p class="alert">Rupture</p>
                                </div>
                                <div class="col col-1 article-to-cart">
                                    <a href="" class="btn"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end -->

                    <!-- start -->
                    <div class="article" id="">
                        <div class="article-picture">
                            <img src="http://placekitten.com/g/150/150" alt=""/>
                        </div>
                        <div class="article-details">
                            <h3 class="article-name"><a href="">Lorem ipsum dolor sit</a></h3>

                            <div class="row">
                                <div class="col col-7 article-description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos excepturi maxime
                                        possimus...</p>
                                    <a class="btn" href="">Détails <i class="fa fa-hand-o-right"></i></a>
                                </div>
                                <div class="col col-2 article-price">
                                    <p>00,00 €</p>
                                </div>
                                <div class="col col-2 article-stock" >
                                    <p class="warn">Sous 5 jours</p>
                                </div>
                                <div class="col col-1 article-to-cart">
                                    <a href="" class="btn"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end -->

                    <!-- start -->
                    <div class="article" id="">
                        <div class="article-picture">
                            <img src="http://placekitten.com/g/150/150" alt=""/>
                        </div>
                        <div class="article-details">
                            <h3 class="article-name"><a href="">Lorem ipsum dolor sit</a></h3>

                            <div class="row">
                                <div class="col col-7 article-description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos excepturi maxime
                                        possimus...</p>
                                    <a class="btn" href="">Détails <i class="fa fa-hand-o-right"></i></a>
                                </div>
                                <div class="col col-2 article-price">
                                    <p>00,00 €</p>
                                </div>
                                <div class="col col-2 article-stock" >
                                    <p class="success">En Stock</p>
                                </div>
                                <div class="col col-1 article-to-cart">
                                    <a href="" class="btn"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end -->

                    <!-- start -->
                    <div class="article" id="">
                        <div class="article-picture">
                            <img src="http://placekitten.com/g/150/150" alt=""/>
                        </div>
                        <div class="article-details">
                            <h3 class="article-name"><a href="">Lorem ipsum dolor sit</a></h3>

                            <div class="row">
                                <div class="col col-7 article-description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos excepturi maxime
                                        possimus...</p>
                                    <a class="btn" href="">Détails <i class="fa fa-hand-o-right"></i></a>
                                </div>
                                <div class="col col-2 article-price">
                                    <p>00,00 €</p>
                                </div>
                                <div class="col col-2 article-stock" >
                                    <p class="success">En Stock</p>
                                </div>
                                <div class="col col-1 article-to-cart">
                                    <a href="" class="btn"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end -->

                    <!-- start -->
                    <div class="article" id="">
                        <div class="article-picture">
                            <img src="http://placekitten.com/g/150/150" alt=""/>
                        </div>
                        <div class="article-details">
                            <h3 class="article-name"><a href="">Lorem ipsum dolor sit</a></h3>

                            <div class="row">
                                <div class="col col-7 article-description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos excepturi maxime
                                        possimus...</p>
                                    <a class="btn" href="">Détails <i class="fa fa-hand-o-right"></i></a>
                                </div>
                                <div class="col col-2 article-price">
                                    <p>00,00 €</p>
                                </div>
                                <div class="col col-2 article-stock" >
                                    <p class="success">En Stock</p>
                                </div>
                                <div class="col col-1 article-to-cart">
                                    <a href="" class="btn"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end -->

                    <!-- start -->
                    <div class="article" id="">
                        <div class="article-picture">
                            <img src="http://placekitten.com/g/150/150" alt=""/>
                        </div>
                        <div class="article-details">
                            <h3 class="article-name"><a href="">Lorem ipsum dolor sit</a></h3>

                            <div class="row">
                                <div class="col col-7 article-description">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eos excepturi maxime
                                        possimus...</p>
                                    <a class="btn" href="">Détails <i class="fa fa-hand-o-right"></i></a>
                                </div>
                                <div class="col col-2 article-price">
                                    <p>00,00 €</p>
                                </div>
                                <div class="col col-2 article-stock" >
                                    <p class="success">En Stock</p>
                                </div>
                                <div class="col col-1 article-to-cart">
                                    <a href="" class="btn"><i class="fa fa-shopping-cart"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end -->
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>


