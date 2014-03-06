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
?>


<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="fr"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="fr"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="fr"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="fr"> <!--<![endif]-->
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <title></title>

    <script src="../js/vendor/modernizr.min.js"></script>

    <link rel="stylesheet" href="/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/admin/css/admin.css"/>
</head>
<body class="new-item">
<script>
    if (!document.all) {
        document.body.className += " gt-ie10";
    }
    if (document.all) {
        if(!document.addEventListener){
            document.body.className += " lt-ie9";
        }
        if(document.addEventListener && !window.atob){
            document.body.className += " ie9";
        }
    }
</script>
<p class="browserhappy">
    Vous utilisez une version d'internet explorer incompatible avec ce site. Mettez à jour internet explorer vers la version 11, ou utilisez des navigateurs tels que Google Chrome, Firefox,...
</p>
<?php include_once "../common/side_bar.php"; ?>
<div id="top-bar">
    nanana
</div>

<div id="page">

    <div class="container">
        <div class="row">
            <div class="col col-3">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores delectus dolorem eum incidunt
                    inventore, ipsam labore laboriosam maiores pariatur, placeat quaerat quos saepe sequi, sint sit? A
                    ducimus explicabo mollitia nam odit quas quidem quis rem temporibus vero. Aut laudantium repellat
                    rerum suscipit ut voluptas. A asperiores beatae consectetur deserunt dignissimos ducimus ea earum
                    enim est ex explicabo facere, facilis id ipsa iusto laudantium libero minima minus molestias
                    mollitia nemo nobis nostrum odio quia quisquam reiciendis repellendus, repudiandae sed sunt tempore,
                    temporibus vel velit voluptatum. Animi, at harum libero magnam maiores natus placeat praesentium rem
                    repellat similique? Assumenda corporis doloremque dolorum perferendis quas qui repellendus similique
                    vel? A alias aliquid aperiam at atque commodi consectetur cum dolor et excepturi expedita explicabo
                    hic illum maiores minima molestias nam natus necessitatibus nesciunt nisi numquam odio omnis placeat
                    possimus praesentium, quia quisquam repellat rerum, similique tempore veritatis vero voluptas,
                    voluptatem! Dolore explicabo ipsa molestiae nam odit. Commodi debitis labore non officiis quam.
                    Alias aliquid commodi cum distinctio dolorum eius illum libero magnam modi molestiae necessitatibus
                    quibusdam, sit vero! Accusamus accusantium aliquam aperiam architecto beatae consequuntur cum
                    cupiditate delectus deleniti dolor dolore ea eius et, expedita, hic magnam magni modi molestias
                    natus neque nobis nulla officia placeat qui quia ratione rem soluta tempora tempore ullam ut vero
                    voluptas, voluptate! Adipisci autem debitis doloribus ea hic impedit in incidunt maiores molestiae
                    natus, necessitatibus non optio perferendis quas quia quo, recusandae sapiente, tempora velit
                    veniam! A autem blanditiis commodi dolorem doloremque et expedita, hic minus officia quidem ratione
                    tenetur voluptatibus! A adipisci aliquam aperiam assumenda atque corporis dolor ex fuga in ipsum
                    laborum laudantium molestiae necessitatibus odit, provident quisquam sint unde vel veniam vero?
                    Aliquid cupiditate ducimus molestias nisi provident sequi soluta velit vitae voluptatem? Ad alias,
                    distinctio doloribus eius eos et id inventore labore laborum libero maxime minus optio placeat,
                    recusandae repellat repudiandae, sapiente similique suscipit tempore ullam? A assumenda dolorum
                    neque quidem totam. Asperiores aut consequuntur corporis dignissimos dolor earum enim est eveniet
                    illo inventore iste laboriosam magnam magni nihil non, suscipit voluptas voluptatibus. Adipisci
                    deleniti ex magni quos saepe, sint vel! Adipisci consectetur debitis doloremque ex exercitationem
                    molestiae recusandae reprehenderit rerum sit veritatis? Enim explicabo fugit hic illo laudantium
                    quis sit sunt tempore voluptas. Accusantium aliquam architecto, dolor eveniet exercitationem
                    explicabo ipsa maxime natus nemo obcaecati placeat, repellendus sunt voluptatibus. Ab accusamus
                    accusantium architecto atque deserunt dolor dolorem earum fugiat illum, incidunt, ipsam magnam
                    maxime minima nemo nesciunt nihil nostrum obcaecati omnis optio quaerat qui quisquam reiciendis
                    rerum similique vitae. Adipisci amet culpa deleniti eveniet labore laborum magnam nulla placeat quia
                    veritatis? Impedit maxime quasi sit. Aperiam consequatur ex exercitationem ipsam iusto laboriosam
                    nihil, nulla quia rem, repellendus, reprehenderit sunt ut! Debitis est excepturi ipsum molestiae
                    optio provident sequi! Alias amet animi debitis earum, enim error est minus obcaecati possimus, quis
                    sapiente tempora vitae voluptates. Amet aut dolorem eaque exercitationem, illo laboriosam maiores
                    maxime odio quia repudiandae tempore unde velit vitae? Assumenda dolore dolores exercitationem
                    harum, in molestias nam saepe sequi ullam vero.</p>
            </div>
            <div class="col col-9">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad autem dolore, dolorum ea excepturi id
                    ipsa iste iusto laborum maxime molestias nobis non officiis quasi quidem quos sapiente sint sit
                    soluta ullam. Ab aliquam, aspernatur delectus deleniti dolore expedita iusto maxime minima nobis
                    odit omnis porro quaerat quasi, recusandae sint, velit vero voluptatem voluptatibus. Autem dolor et
                    incidunt odio odit repellat reprehenderit sit unde. Aut ducimus minima nemo non quisquam! Aperiam
                    deleniti doloremque enim ex hic illo, minima molestiae optio qui, repellendus repudiandae tempore
                    veniam voluptates. Aliquid corporis culpa cum dolorum fugit ipsa iste nesciunt perferendis sit,
                    suscipit temporibus voluptatibus?</p>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam amet architecto culpa debitis
                    delectus deserunt distinctio dolores earum, eum explicabo fugiat id impedit itaque modi molestiae
                    nesciunt non, nostrum officia omnis perspiciatis, quos recusandae rem suscipit tempora tempore unde
                    voluptate voluptatum. Accusamus aperiam cum cupiditate excepturi facere hic, inventore ipsa iusto
                    labore maxime natus nemo odit perferendis placeat quia quis, quod rem sapiente suscipit unde ut
                    veritatis voluptatem voluptatum. Ad adipisci amet aperiam architecto beatae culpa debitis delectus
                    dolores earum, enim exercitationem illo itaque libero magni minima modi mollitia nam nobis, officia
                    optio porro possimus provident qui quia quibusdam quod rerum saepe sapiente sequi similique sit
                    tempora vel vero. Aliquid cumque cupiditate dicta dolor eaque earum ipsam officiis omnis quaerat,
                    voluptatem! Ab accusamus accusantium aperiam architecto blanditiis cupiditate deleniti, dicta
                    doloremque eaque enim excepturi facere fugiat iure laborum nam nemo nobis, nulla omnis provident qui
                    quidem rerum sapiente similique sint sit totam ut voluptatibus. Adipisci animi architecto commodi
                    cum deleniti earum et illo, iste magni molestiae molestias nihil odio optio sit tenetur vel velit?
                    Alias eligendi eum expedita labore nihil pariatur quia repudiandae suscipit tempora voluptatum!
                    Cumque ducimus expedita iure labore mollitia. Aperiam cumque, ducimus eveniet fugiat harum illo ipsa
                    iusto laboriosam molestias neque nesciunt odit omnis placeat porro quia repellat rerum sint tempora
                    vitae voluptate. Aliquam aliquid amet architecto asperiores beatae consequatur corporis culpa cumque
                    cupiditate debitis doloribus ducimus, enim eveniet ex facilis fugit ipsa iste iure libero magni
                    maxime minus nisi nobis, obcaecati perferendis porro quas quibusdam quos soluta ullam ut vitae
                    voluptate, voluptates. A aspernatur blanditiis commodi consectetur dolore ea, eos impedit itaque
                    iure labore laborum natus neque odio pariatur perspiciatis quam quos reprehenderit sed soluta velit
                    veritatis voluptates voluptatum! Consequuntur esse et explicabo nemo officiis. Assumenda
                    consequuntur cum deleniti deserunt eos error facilis ipsam, iure maxime mollitia non obcaecati omnis
                    pariatur quasi reiciendis, soluta totam. Alias aliquid, asperiores aspernatur consectetur deleniti
                    dolores, facilis hic libero nostrum pariatur quam quos ratione veritatis. Aliquam corporis dicta
                    exercitationem fugiat, in inventore labore, nam nulla perferendis placeat porro qui sapiente totam
                    vel, voluptatum! Architecto fuga in nulla. Ab accusamus adipisci asperiores autem blanditiis
                    consequuntur cum cumque, delectus deserunt ea eaque enim et ex facere, facilis fugit hic impedit in
                    ipsa labore molestiae molestias nam nemo non odit officia omnis provident quisquam rerum saepe sit
                    tenetur vero vitae. Adipisci alias aperiam aut distinctio dolor doloremque eligendi facilis, fugiat
                    fugit ipsum iste minima minus modi molestias nemo nobis nostrum numquam quae quas quidem ratione,
                    reprehenderit saepe sed, sint voluptatibus. A cumque eligendi eos explicabo fugiat mollitia
                    perferendis porro, reprehenderit rerum voluptatibus? Consectetur consequatur deleniti ducimus eaque,
                    ex molestiae nulla odio, quas quod, reiciendis saepe soluta veniam voluptates. Eaque id placeat quod
                    vitae. Aperiam eos iste, magni porro provident tenetur vitae voluptas voluptatum? A adipisci atque
                    beatae commodi consequatur distinctio dolores fuga fugit labore maiores nam numquam pariatur
                    perspiciatis placeat quidem, reiciendis voluptatum. Minus reiciendis vel veniam. Eaque est
                    exercitationem inventore quo sed? Deleniti eum ipsa itaque iure modi necessitatibus non quod sint.
                    Cum, cupiditate hic illum laudantium nihil porro quis unde vitae. Adipisci alias, aspernatur aut
                    autem beatae, excepturi exercitationem expedita fugit illo in incidunt ipsum magni necessitatibus
                    non nulla obcaecati odit pariatur quasi quia quidem quos reiciendis reprehenderit similique veniam
                    vitae. Commodi dolorum eum nesciunt odit officia recusandae rerum! Ad excepturi molestiae optio quas
                    veritatis voluptas. A accusamus aliquid aperiam asperiores beatae blanditiis cupiditate, debitis
                    delectus dicta, dolor ea error et explicabo laudantium modi nam nemo porro provident recusandae
                    saepe sed tempora unde voluptas? Aspernatur earum eos harum id ipsam, sit temporibus. Adipisci
                    aliquam, consectetur consequuntur corporis cumque delectus eum illum ipsam libero maiores maxime
                    minus nihil numquam officia porro quia reiciendis reprehenderit similique soluta unde? Accusamus
                    alias animi atque, autem beatae cum deserunt dolores hic maiores nam nulla qui sequi veniam! Ab
                    accusantium aliquid architecto asperiores atque cum laboriosam laudantium minima, molestiae possimus
                    quas reiciendis, repellat reprehenderit voluptas voluptatibus! Amet beatae, commodi culpa debitis
                    eos id iure iusto odio quae quasi repellat sed velit vitae? Adipisci, culpa eos exercitationem
                    expedita officiis pariatur perferendis provident quidem? Architecto at commodi dolorum neque
                    officiis, suscipit? Ad error est, eveniet in nobis possimus qui quos unde voluptate. A aliquid amet,
                    animi, assumenda, atque aut beatae commodi deleniti eius eligendi eos error harum illum ipsa iste
                    itaque iure iusto libero numquam odio quae quasi quidem rem repudiandae temporibus veritatis
                    voluptatem voluptatum. Beatae eaque nam pariatur quia quibusdam quo, reiciendis veritatis
                    voluptatibus! Blanditiis corporis doloribus iusto libero nisi odio porro ut veritatis voluptate
                    voluptatibus? Adipisci alias aspernatur iusto magnam possimus provident ratione rerum soluta. Animi
                    consectetur consequuntur eveniet perspiciatis quod rem sint veritatis? Amet cum distinctio enim et
                    exercitationem facere impedit laboriosam libero maxime, odit optio placeat recusandae reiciendis,
                    sapiente sequi? Consectetur eligendi esse ex pariatur quae. Amet fugit illum incidunt laborum nobis
                    odio odit ratione reiciendis repellendus. A accusantium architecto dolorem doloremque doloribus
                    eaque eos explicabo facilis in molestiae nisi obcaecati omnis pariatur possimus quae reprehenderit
                    tempore tenetur unde, veniam voluptate? Ab, alias animi dignissimos eum excepturi id iure molestiae
                    molestias necessitatibus optio perferendis quisquam quo reprehenderit? Accusantium consequuntur
                    culpa debitis dolorum error illum ipsa ipsum laudantium molestias, natus nihil odit quia quidem rem
                    repellendus totam voluptates? Animi consectetur culpa distinctio doloribus dolorum eos eum,
                    necessitatibus neque nesciunt odit reiciendis repellendus suscipit ullam! Asperiores enim, impedit
                    iure labore magni nihil porro ratione rerum saepe voluptatibus. Aliquid assumenda ducimus eum id
                    laudantium. Aliquid, animi aspernatur blanditiis consectetur culpa dolore ea error eveniet explicabo
                    hic, laboriosam magnam magni maiores obcaecati odio omnis quae quisquam sed soluta sunt suscipit
                    veniam vitae voluptatum? At hic numquam optio quidem quod. Amet aperiam assumenda blanditiis cumque
                    dolorum enim error explicabo facere illum impedit ipsam minus placeat, quidem quo rerum sapiente ut
                    voluptatem. Accusamus ad amet animi architecto, assumenda delectus deleniti dolorem eaque enim eos
                    esse expedita illo illum in ipsam ipsum itaque iure laboriosam libero magni maxime mollitia nam
                    natus, neque odio perspiciatis quaerat repellat sit soluta suscipit tempora vero vitae voluptatem.
                    Cupiditate dolorem fuga natus neque odio porro voluptates. Commodi.</p>
            </div>
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
