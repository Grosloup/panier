<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 06/03/14
 * Time: 14:18
 */
?>
<div id="top-bar">
    <div class="title">
        <a href="<?php echo $router->getRoute("home"); ?>">ZooBeauvalBoutique</a>
    </div>
    <div class="navs">
        <div class="nav">
            <ul>
                <li><a href="<?php echo $router->getRoute("admin_home"); ?>">Accueil de l'admin</a></li>
            </ul>
        </div>
    </div>
</div>
