<?php
session_start()
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
<div id="limite">
    <?php
        require 'composants/header.php';
    ?>
    <section id="sec2">
        <h1>CONNEXION</h1>
        <h2>Bravo vous etes connecter</h2>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Corporis, labore ipsum quos vel eveniet accusamus aperiam fuga iste commodi a tenetur error nobis, impedit itaque officia at? Magni, officiis. Explicabo!</p>
    </section>

    <?php
        print_r($_SESSION);
        require 'composants/footer.php';
    ?>

</div>
    
</body>
</html>