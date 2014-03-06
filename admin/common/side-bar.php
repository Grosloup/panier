<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 06/03/14
 * Time: 12:16
 */
?>
<div id="left-nav-wrapper">
    <ul class="menu-accordeon">
        <li>
            <h5 class="titre">Gestion des Articles<span><i class="fa fa-chevron-circle-down"></i></span></h5>
            <ul>
                <li><a href="<?php echo $router->getRoute("nouvel_article"); ?>">Ajouter</a></li>
                <li>Supprimer</li>
                <li>Rechercher</li>
                <li>Statistiques</li>
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
