<?php
session_start();
include_once 'database.php';

?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>Update Neo Ness</title>
    </head>
<body>
<?php

//// page qui affiche un formulaire préremplie des valeurs du client à mettre à jour

// affecte à la variable $index_update la valeur de l'id recuperer dans url
$index_update = $_GET['id'];

// création de la requete, ou on choisit toutes les colonnes ou l 'id correspond à la variable $index_update
$request = "SELECT * FROM users WHERE `id` = '$index_update'";
//on affecte notre requete à la variable $result sur notre bdd $db
$result = mysqli_query($db,$request);
// si on à plus d'un resultalts on affiche un formulaire preremplie qui sera envoyé par la method POST avec id=$index_update
if (mysqli_num_rows($result) > 0) {
    echo"<div class='update_clients'>";
        echo"<h1 id='h1_update'>Mise à jour client</h1>";
        echo"<form class='form_update' action='save_update.php?id=$index_update' method='POST'>";
            while($row = mysqli_fetch_array($result)){
                $first_name_update = $row["first_name"];
                $last_name_update = $row["last_name"];
                $age_update = $row["age"];
                $weight_update = $row["weight"];
                $height_update = $row["height"];
                $weight_goal_update = $row["weight_goal"];
                echo"<label>Prénom</label>"."<br>";
                echo"<input id='first_name' type='text' value='$first_name_update' name='first_name'>
                "."<br>";
                echo"<label>Nom</label>"."<br>";
                echo"<input id='last_name' type='text' value='$last_name_update' name='last_name'>
                "."<br>";
                echo"<label>Age</label>"."<br>";
                echo"<input id='age' type='text' value='$age_update' name='age'>
                "."<br>";
                echo"<label>Poids en kg</label>"."<br>";
                echo"<input id='weight' type='text' value='$weight_update' name='weight'>
                "."<br>";
                echo"<label>Taille en cm</label>"."<br>";
                echo"<input id='height' type='text' value='$height_update' name='height'>
                "."<br>";
                echo"<label>Objecftif Poids</label>"."<br>";
                echo"<input id='weight_goal' type='text' value='$weight_goal_update' name='weight_goal'>
                "."<br>";
            }
            echo "<input type='submit' id='submit_update' value='Mettre à jour' >";
        echo"</form>";
    echo"</div>";
}
