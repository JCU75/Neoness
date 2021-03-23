<?php
session_start();
include_once 'database.php';
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>Historique Perso Neo Ness</title>
    </head>
<body>
<?php
$activity_id = $_SESSION['activity_id'];
$weight_today = $_SESSION['weight_today'];
$duration_today = $_SESSION['duration_today'];
$user_id = $_SESSION['id'];
//echo $user_id;
$request = "SELECT height 
            FROM users 
            where `id` = '".$_SESSION['id']."'";
$result = mysqli_query($db,$request);
if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_array($result)){
       $_SESSION["height"] = $row["height"];
  }     
}
$height_cm = $_SESSION["height"];
$height_m = $height_cm / 100;
$bmi = round($weight_today / ($height_m * $height_m),2);
// echo $bmi;
$today_date = date("Y.m.d");
// echo $today_date;
// requete sql qui ajoute l'id de utilisateur, l'id de l'activitée, la durée, le poids actuel,son bmi ainsi que le date dans la table activity_history
$request2 = "INSERT 
            INTO activity_history(user_id,activity_id,activity_duration,current_weight,current_bmi,date_activity) 
            VALUES ('$user_id','$activity_id','$duration_today','$weight_today','$bmi','$today_date')";
         
// affichage des messages
if (mysqli_query($db, $request2)) {
        //si reussite 
        //echo " insertion réussi, activité ajouté dans table historique !";
        //header('Location: graph_history.php');
        header('Location: line_chart.php');
    } else {
        // si erreur
        echo "Error: " . $request2 . "<br>" . mysqli_error($db);    
    }
// fermeture de la connection  
mysqli_close($db); // fermer la connexion
?>