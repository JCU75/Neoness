<?php
session_start();
include_once 'database.php';
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>Admin Neo Ness</title>
    </head>
<body>
<?php

// page admin -> permet de visualier et de mettre à jour les clients ainsi que de rajouter des activitées


// requete sur table users ou on selectionne toutes les colonnes qu'on stocke dans la variable $request 
$request = "SELECT * FROM users";
// variable $result contient la reponse de notre requete
$result = mysqli_query($db,$request);
echo "<h1 id='h1_admin'> welcome admin </h1>";
// si on à une reponse, on affiche une table avec les reponses
if (mysqli_num_rows($result) > 0) {
    echo "<table id='table_admin'><tr><th>Numero abonné</th><th>Nom</th><th>Age</th><th>Poids</th><th>Taille</th><th>Objectif</th><th>Modifier</th></tr>";
    while($row = mysqli_fetch_array($result)){
    $id_update = $row["id"];
    echo "<tr><td>".$row["id"]."</td><td>".$row["first_name"]." ".$row["last_name"]." </td><td>".$row["age"]."</td><td>".$row["weight"]."</td><td>".$row["height"]."</td><td>".$row["weight_goal"]."</td><td><button onclick=\"document.location='update.php?id=$id_update'\">Modifier</button></td></tr>";
    }
    echo "</table>";
} else {
  echo "0 results";
}

echo "<a id ='update_link' href='add_activities.php'>Ajout activitées</a>";
echo "<a class='logoutBtn' href='logout.php'>Logout</a>";

$db->close();
?>
</body>
</html>

            
     




    