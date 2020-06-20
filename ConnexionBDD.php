<?php
$serveur = "localhost";
$user= "root";
$pw = "root";
$bdd = "multimediadb";

$result = mysqli_connect($serveur,$user,$pw) or die ("Erreur de connexion a la base de donnees");
$result2 = mysqli_select_db($result, $bdd) or die ("Erreur selection de la bdd");

?>