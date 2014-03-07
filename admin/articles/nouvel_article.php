<?php
/**
 * Created by PhpStorm.
 * User: Nicolas
 * Date: 05/03/14
 * Time: 05:33
 */
include_once "../php/bases.php";

// il y a t il un cookie ?
    // oui -> recup user ->mis en session

if(!$session->exists("user")){
    $session->set("url", $_SERVER["REQUEST_URI"]);
    header("Location: /admin/login/login.php");
    die();
}

    echo getHeader(["titre"=>"Nouvel Article - Admin - ZooBeauvalBoutique"]);
?>



<body class="new-item">

<?php include_once "../common/browserapi.php"; ?>
<?php include_once "../common/side-bar.php"; ?>
<?php include_once "../common/top-bar.php"; ?>

<div id="page" ng-app="newArticle">
    <div class="container">
        <h1>Nouvel Article</h1>
    </div>
    <div class="container">
        <div class="row">
            <div class="col col-9" ng-controller="NewAricleFormCtrl">
                <form class="form" action="" method="post">

                    <label for="designation">Désignation/nom de l'article*</label>
                    <input type="text" name="new_item_form[designation]" id="designation" ng-blur="designationBlur()" ng-model="item.name"/>

                    <label for="reference">Référence*</label>
                    <input type="text" name="new_item_form[reference]" id="reference" ng-blur="referenceBlur()" ng-model="item.reference"/>

                    <label for="desription" ng-blur="descriptionBlur()" ng-model="item.description">Description</label>
                    <textarea name="new_item_form[description]" id="desription"></textarea>

                    <div class="row">
                        <div class="col col-6">
                            <label for="stock">Nombre d'articles mis en stock</label>
                            <input type="text" name="new_item_form[stock]" id="stock" ng-blur="stockBlur()" ng-model="item.stock"/>
                        </div>
                        <div class="col col-6">
                            <label for="prix">Prix de vente hors taxe*</label>
                            <input type="text" name="new_item_form[prix]" id="prix"/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col col-6">
                            <label for="category">Type de l'article</label>
                            <select name="new_item_form[item_categories_id]" id="category" ng-model="item.category_id" ng-options="c.name for c in categories " ng-change="onChangeType()">
                                <option value="">Choisissez un type</option>
                            </select>
                        </div>
                        <div class="col col-6">
                            <label for="new_category">Ou créer un nouveau type</label>
                            <input type="text" name="new_item_form[new_category]" id="new_category" ng-blur="newtypeBlur()" ng-model="newtype"/>
                        </div>
                    </div>


                    <!-- TODO[Nicolas] media associé -->

                    <button class="btn simple-blue" ng-click="submit()">Enregister</button>

                    <p>(*) Champs obligatoires</p>
                </form>
            </div>
            <div class="col col-3">

            </div>
        </div>
    </div>
</div>

<script src="/admin/js/vendor/jquery-1.11.0.min.js"></script>
<script src="/admin/js/vendor/angular.min.js"></script>
<script src="/admin/js/jquery-plugins/menu-accordeon.js"></script>
<script>
    $(".menu-accordeon").menuAccordeon();
</script>
<script src="/admin/js/apps/new-article/main.js"></script>
</body>
</html>
