<?php
 $req = $db->prepare('SELECT * FROM cocktail');
 $req->execute();
 $tab_boisson = $req->fetchAll();

foreach($tab_boisson as $index) {
    echo '<div class="fiche">
            <h3>' .$index['nom']. '</h3>
            <div class="fiche_img" style="background-image: url(uploads/' .$index['img'].')"></div>
            <p>Note: ' .$index['note']. '</p>
            <div class="price"><p>' .$index['prix']. '€00</p></div>
            <p class="recette">' .$index['ingredient']. '</p>
        </div>';
}

?>

