<?php
    include('admin/config.php'); /*important de mettre avant la session, visiblement */
    session_start();

    $fichier = "";
    $nomErreur = "PAS POSTEE";
    
    $cock_nom = "";
    $cock_prix = "";
    $cock_note = "";
    $cock_ingredient = "";
    $cock_img = "";
    $succes = true;
    $upload = false;
    $adresse = "";
    
/*isset vérifie si la variable existe,Détermine si une variable est considérée définie, ceci signifie qu'elle est déclarée et est différente de null. 
!empty vérifie si la variable existe et n'est pas vide */

    if(isset($_GET['suppression'])) {
        $index = $_GET['suppression'];
        try {
                

                $ligne = $db->prepare('SELECT * FROM cocktail WHERE id = ' .$index);
                $ligne->execute();
                $obj = $ligne->fetch(PDO::FETCH_ASSOC);
                /*
                echo print_r($obj). '<br>';
                echo $obj['ingredient'];
                echo $obj['img'];*/

                $fich_a_suppr = $obj['img'];
                unlink('uploads/' .$fich_a_suppr);
                /*
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql2 = 'INSERT INTO savetable (id, nom, prix, note, ingredient, img) VALUES ("'.$obj['id'].'","'.$obj['nom'].'","'.$obj['prix'].'","'.$obj['note'].'","'.$obj['ingredient'].'","'.$obj['img'].'")';
                $db->exec($sql2);*/
                $suppr = $db->prepare('DELETE FROM cocktail WHERE id = ' .$index);
                $suppr->execute();
                
            } catch(PDOException $e) {
                echo $sql2 . "<br>" . $e->getMessage();
            }    
        header('location: connexion.php');
        exit();                    
    }

    if (!empty($_POST)) {
        
        $cock_nom = test_input($_POST['nom']);
        $cock_prix = test_input($_POST['prix']);
        $cock_note = test_input($_POST['note']);
        $cock_ingredient = test_input($_POST['ingredient']);
        
        
        if(empty($cock_nom)||empty($cock_prix)||empty($cock_note)||empty($cock_ingredient)) {
            $nomErreur = "Champ à remplir";
            $succes = false;
        }


        /*if(empty($POST['image'])) {
            $nomErreur = "Veuillez selectionner une image";
            $succes = false;
        } else*/
        if (!empty($_FILES['image']) && $_FILES["image"]['error'] == 0) {
                $nomErreur = "Image envoyée";
                $upload = true;
                $error = 1;
    
                if($_FILES["image"]['size'] <= 3000000) {
    
                    // extensions
                    $informationsImage = pathinfo($_FILES['image']['name']);
                    $extensionImage = $informationsImage['extension'];
                    $extensionsArray = array('jpg', 'png', 'jpeg', 'gif');
    
                    if(in_array($extensionImage, $extensionsArray)) {
                        $adresse = $_FILES['image']['name'];
                        move_uploaded_file($_FILES['image']['tmp_name'], 'uploads/' .$adresse);
                        $error = 0;
                        $fichier = $_FILES['image'];
                    }
                } 
            }
        
      
        if($succes && $upload) {
            
            $req = $db->prepare("INSERT INTO cocktail (nom, prix, note, ingredient, img) VALUES (?, ?, ?, ?, ?)");
            $req->execute(array($cock_nom, $cock_prix, $cock_note, $cock_ingredient, $adresse));
            
            header('location: connexion.php?success=1'); 
            exit();
        }
        
    }  

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
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
    echo $nomErreur;
    echo $adresse;
    echo boolval($upload);
    ?>

    <form method="post" action="connexion.php" id="formulaire" enctype="multipart/form-data"> <!--attention à ne pas intervertir method correspond à get/post-->
        <div id="form-box">
            <div class="col-input">
                <label for="nom">Nom:</label><input name="nom" type="text"><br>
                <label for="prix">Prix:</label><input name="prix" type="number" min="0" max="100" step="0.01"><br>
                <label for="note">Note:</label><input name="note" type="number" min="0" max="5" step="0.01"><br>
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
        print_r($_SESSION);
        require 'composants/footer.php';
        require 'composants/signature.php';
    ?>
    </section>

</div>
    
</body>
</html>