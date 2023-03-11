<?php
    include('admin/config.php'); /*important de mettre avant la session, visiblement */
    session_start();
    $fichier = " ";

    if (!empty($_POST['nom']) && !empty($_POST['prix']) && !empty($_POST['note']) && !empty($_POST['ingredient']) && !empty($_POST['image'])) {
        
        
        
      

    if (isset($_FILES['image']) && $_FILES["image"]['error'] == 0) {
        $error = 1;

        if($_FILES["image"]['size'] <= 3000000) {

            // extensions
            $informationsImage = pathinfo($_FILES['image']['name']);
            $extensionImage = $informationsImage['extension'];
            $extensionsArray = array('jpg', 'png', 'jpeg', 'gif');

            if(in_array($extensionImage, $extensionsArray)) {
                $adresse = 'uploads/'.time().rand(). '.' .$extensionImage;
                move_uploaded_file($_FILES['image']['tmp_name'], $adresse);
                $error = 0;
                $fichier = $_FILES['image'];
            }
        }
        
        header('location: connexion.php?success=1'); 
        exit();

        }
    }  
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
    <h1>CONNEXION</h1>

    <?php
    echo "<h2>Bonjour ".$_SESSION['mail'].", vous êtes connecté</h2>";
    echo "voilà le files de l'img: ";
    echo "<pre>";
    print_r($fichier);
    echo "</pre>";
    ?>

    <form method="post" action="connexion.php" id="formulaire" enctype="multipart/form-data"> <!--attention à ne pas intervertir method correspond à get/post-->
        <div id="form-box">
            <div class="col-input">
                <label for="nom">Nom:</label><input name="nom" type="text"><br>
                <label for="prix">Prix:</label><input name="prix" type="text"><br>
                <label for="note">Note:</label><input name="note" type="text"><br>
                <label for="ingredient">Ingredients:</label><input name="ingredient" type="text"><br>
            </div>
            <div class="col-input">
                <label for="img">Image:</label><input name="image" type="file"><br>
                        <?php
                        if (isset($error) && $error == 0) {
                            echo '<img src="' .$adresse. '" id="image" />
                            <input type="text" value="http://localhost/' .$adresse. '"/>';
                            
                        } else if (isset($error) && $error == 1) {
                            echo 'Votre image ne peut pas être envoyée';
                        }
                        ?>
            </div>
        </div>
        <input id="btn-submit-form" type="submit" value="Ajouter">
    </form>

   

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
                            <td>
                            <form method="get">
                                <input type="text" name="suppression" value="'.$truc['id'].'"  />
                                <input type="submit"  id="'.$truc['id'].'" value="Supprimer"/>
                            </form>
                            </td>
                        </tr>';
                }
                echo '</table>';     
        ?>

        <?php
                if(isset($_GET['suppression'])) {
                    $index = $_GET['suppression'];
                    try {
                            $ligne = $db->prepare('SELECT * FROM cocktail WHERE id = ' .$index);
                            $ligne->execute();
                            $obj = $ligne->fetch(PDO::FETCH_ASSOC);
                            echo print_r($obj). '<br>';
                            echo $obj['ingredient'];
                            
                            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $sql2 = 'INSERT INTO savetable (id, nom, prix, note, ingredient, img) VALUES ("'.$obj['id'].'","'.$obj['nom'].'","'.$obj['prix'].'","'.$obj['note'].'","'.$obj['ingredient'].'","'.$obj['img'].'")';
                            $db->exec($sql2);

                            $suppr = $db->prepare('DELETE FROM cocktail WHERE id = ' .$index);
                            $suppr->execute();
                        } catch(PDOException $e) {
                            echo $sql2 . "<br>" . $e->getMessage();
                        }                        
                    }
        ?>
                
    

    <?php
        print_r($_SESSION);
        require 'composants/footer.php';
        require 'composants/signature.php';
    ?>
    </section>

</div>
    
</body>
</html>