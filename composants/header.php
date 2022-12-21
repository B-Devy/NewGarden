
<?php
    include './admin/config.php';
        
    if(!empty($_GET['mail']) && !empty($_GET['pass'])){
        $_SESSION['mail'] = $_GET['mail'];
        $_SESSION['pass'] = $_GET['pass'];
        $mail = $_GET['mail'];
        $pass = $_GET['pass'];
        
        $req = $db->prepare('SELECT adressemail, motdepasse FROM users WHERE adressemail = ? AND motdepasse = ?');
        $req->execute(array($mail, $pass));
        $teste = $req->fetch(PDO::FETCH_ASSOC);
        
        if ($mail === $teste['adressemail'] && $pass === $teste['motdepasse']) {
            header('location: connexion.php');
            exit();
        } 
    }

?>    

<div id="headeretendu"> 
    <header>
        <div id="logo">
            <div></div>
        </div>

        <div id="menu">
            <ul>
                <li class="rubrique"><a href="../newgarden">Accueil</a></li>    
                <li class="rubrique">Notre Concept</li>    
                <li class="rubrique">Le Bar</li>    
                <li class="rubrique">Nos Cocktails</li>    
                <li class="rubrique">Accès</li>    
            </ul>
        </div>

        <div id="connex">
            <div id="favconnex"></div>
            <p>Se Connecter</p>
        </div>   
    </header>

    <div id="connecbox"> 
        <form method="GET" action="index.php">
            <label for="mail">Votre mail :</label><br><input type="email" name="mail" placeholder="Adresse mail"><br>
            <label for="pass">Mot-de-passe :</label><br><input type="password" name="pass" placeholder="****">
            <input type="submit" value="Se Connecter" id="btn_conn">
        </form>
    </div>
</div>



