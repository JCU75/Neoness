<?php
// connexion à la base de données

// affectation des differents variables pour la connection à la base de donnée
$db_username = 'jc75';
$db_password = 'beweb2020';
$db_name     = 'neoness_bdd';
$db_host     = 'localhost';
// variable $db contient la connection à notre bdd neoness_bdd
$db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
        or die('could not connect to database');