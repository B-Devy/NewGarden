<?php
    session_start();
    include('admin/config.php');
    error_reporting(0);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Garden Bar</title>
    <link rel="stylesheet" href="design/style.css">
    <script src="design/script.js" defer></script>
</head>

<body> 
<!--Copyright BERTRAND DEVY  - @:www.bertrand-devy.ovh-->
<div id="limite">
    <?php
        require 'composants/header.php';
    ?>
    <section id="sec1">
        <div id="ombre">
            <div id="logo2"></div>
        </div>
    </section>

    <?php
    print_r($_SESSION);
    ?>

    <section id="sec2">
        <h2>Notre concept</h2>
        <div id="img_sec_2"></div>
    </section>

    <section id="sec3">
        <div id="img_sec_3">
            <div id="barman"></div>
            <div id="barmantext">
                <h2>Notre Etablissement</h2>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veritatis nemo vitae sunt omnis, itaque consequatur quaerat amet in numquam temporibus dolorem mollitia officia tempora dolor corporis! Laudantium commodi nostrum corporis.</p>
            </div>
        </div>
    </section>

    <section id="sec4">
        <h2>Nos Cocktails</h2>
        <div id="img_sec_4">

            <?php
                require 'composants/fiche.php';
            ?>

        </div>
    </section>
<?php
    require 'composants/footer.php';
    require 'composants/signature.php';
?>

</div>    
</body>
</html>