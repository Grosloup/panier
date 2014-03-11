<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 10/03/14
 * Time: 18:43
 */
?>

<!-- start -->
<div class="article" id="article-<?php echo $article->id; ?>">
    <div class="article-picture">
        <img src="<?php echo $article->img ?>" alt="<?php echo $article->designation; ?>" title="<?php echo $article->designation; ?>"/>
    </div>
    <div class="article-details">
        <h3 class="article-name"><a href="<?php echo $router->getRoute("home_pages_article",["article_id"=>$article->id]); ?>"><?php echo $article->designation;?></a></h3>

        <div class="row">
            <div class="col col-7 article-description">
                <p><?php echo excerpt_word($article->description, 15); ?></p>
                <a class="btn" href="<?php echo $router->getRoute("home_pages_article",["article_id"=>$article->id]); ?>">Détails <i class="fa fa-hand-o-right"></i></a>
            </div>
            <div class="col col-2 article-price">
                <p><?php echo $article->prix ?> <i class="fa fa-eur"></i></p>
            </div>
            <div class="col col-2 article-stock" >
                <?php if($article->stock > 5): ?>
                    <p class="success">En Stock</p>
                <?php elseif($article->stock > 0 && $article->stock < 6): ?>
                    <p class="warn">En Stock quantité limité (< 5pièces )</p>
                <?php else: ?>
                    <p class="alert">Rupture</p>
                <?php endif; ?>
            </div>
            <div class="col col-1 article-to-cart">
                <?php if($article->stock > 0):?>
                    <a href="" class="btn cart-btn" data-article-id="<?php echo $article->id; ?>"><i class="fa fa-shopping-cart"></i></a>
                <?php else:?>
                    <span class="btn cart-btn disabled" data-article-id="<?php echo $article->id; ?>"><i class="fa fa-shopping-cart"></i></span>
                <?php endif;?>

            </div>
        </div>
    </div>
</div>
<!-- end -->
