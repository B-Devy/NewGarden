<?php
try {
    $db = new PDO('mysql:host=localhost;dbname=newgardendb;charset=utf8', 'root', '');
}
catch (PDOException $e) {
    die("Error: " .$e->getMessage());
}

?>

