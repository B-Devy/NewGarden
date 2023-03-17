<?php
    session_start();
    include('admin/config.php');
    error_reporting(0);
    setcookie('user_pref', 'dark_theme', time() + 3600*24, '/', '', true, true);
    setcookie('user_id', '1234');
    setcookie('name', 'Bertos');

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
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/> <!--css de leaflet-->
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>  <!--js de leaflet-->
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

    echo "Information construction S_SESSION : ";
    $_SESSION['user'] = $_COOKIE['PHPSESSID'];
    $_SESSION['cookie_name'] = $_COOKIE['user_id'];
    $_SESSION['cookie_expires'] = $_COOKIE['user_pref'];
    $_SESSION['cookie_name'] = $_COOKIE['name'];
    print_r($_SESSION) /*---------------à enlever quand fini---------------*/;
    echo "<br>";
    echo "<pre>";
    print_r($_COOKIE) /*---------------à enlever quand fini---------------*/;
    echo "</pre>";
    echo $_COOKIE['expires'];
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

    <section id="sec5">
        <div id="horaire">
            <h2>Accès</h2>
            <div>
                <div id="horaire1">
                    <div id="logo3"></div>
                    <p id="presentation">Situé au coeur du quartier de la Krutenau, le nouveau restaurant bar New Garden Strasbourg vous accueille en terrasse ou à l'intérieur dans une ambiance lounge avec décors authentiques et un superbe espace billard. A 200m des quais de l'Ill, venez découvrir nos burgers maison ou partager un cocktail en happy hour.</p>
                    <div id="map"></div>
                </div>
                <div id="horaire2">
                    <h3>INFORMATIONS PRATIQUES</h3>
                    <p>Horaire</p>
                    <p>Service continu tous les jours</p>
                    <p>..........</p>
                    <p>Lundi-Vendredi 7h30 - 23h</p>
                    <p>Samedi-Dimanche 7h30 - 1h00</p>
                    <p>Petits déjeuners jusqu'à 11h30</p>
                    <p>Brunch 11h - 16h</p>
                    <p>HAPPY HOURS 17h - 20h</p>
                    <br>
                    <h3>TELEPHONE</h3>
                    <p>03 88 52 52 21 08</p>
                    <br>
                    <h3>ADRESSE</h3>
                    <p>8, route des fougères 67000 STRASBOURG</p>
                    <br>
                    <h3>ACCES</h3>
                    <p>tram A arrêt "étoile" ou tram D arrêt "Grand rue"</p>
                </div>
            </div>
            
        </div>
    </section>
<?php
    require 'composants/footer.php';
    require 'composants/signature.php';
?>

</div>    
</body>
</html>