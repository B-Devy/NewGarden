<?php
include('admin/config.php'); /*important de mettre avant la session, visiblement */
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
    <section id="secconn">
    <?php
        $req = $db->prepare('SELECT * FROM cocktail');
        $req->execute();
        $testee = $req->fetchAll(PDO::FETCH_ASSOC);

        echo'<table>
                <tr>
                    <th>id</th>
                    <th>nom</th>
                    <th>prix</th>
                    <th>note</th>
                    <th>ingredient</th>
                    <th>image</th>
                    <th>bouton</th>
                </tr>';
                foreach($testee as $truc) {
                    echo '<tr>
                            <td>'.$truc['id'].'</td>
                            <td>'.$truc['nom'].'</td>
                            <td>'.$truc['prix'].'</td>
                            <td>'.$truc['note'].'</td>
                            <td>'.$truc['ingredient'].'</td>
                            <td>'.$truc['img'].'</td>
                            <td><button>Supprimer</button></td>
                        </tr>';
                }
                echo';
                </table>';
    ?>
                
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