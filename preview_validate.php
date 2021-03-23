<?php
session_start();
include_once 'database.php';
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>Page Perso Neo Ness</title>
    </head>
<body>

<?php

// on recupere les données saisies par le client
if(isset($_POST['weight_today'])){
    $weight_today = $_POST['weight_today'];
    $_SESSION['weight_today'] = $weight_today;
}      
if(isset($_POST['activity_name'])){
    $activity_name = $_POST['activity_name'];
    $_SESSION['activity_name'] = $activity_name;
} 
if(isset($_POST['duration_today'])){
    $duration_today = $_POST['duration_today'];
    $_SESSION['duration_today'] = $duration_today;
} 
//on fait une pour recuperer le logo de l'activitée choisie
$request = "SELECT activity_logo,activity_burn,activity_id 
            FROM activity 
            where `activity_name` = '".$activity_name."'";

$result = mysqli_query($db,$request);

echo"<div id=\"div_preview\"><h1 id=\"h1_preview\">Vous avez choisi pour aujourd'hui :</h1>";
echo"<form class=\"form_preview\" action=\"graph_history_process.php\" method=\"POST\">"; 
echo"<p>Activitée : "."$activity_name</p>";
echo"<p> Durée de la session : "."$duration_today"." minutes</p>";
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)){
        $calorie_burn_hour = $row['activity_burn'];
        $logo_url = $row['activity_logo'];
        $_SESSION['activity_id'] = $row['activity_id'];
    }
}
$estimate_burn = ($calorie_burn_hour * $duration_today) / 60;
echo"<p>Estimation Calorie brulée : "."$estimate_burn</p>";
echo "<img src='$logo_url'>";
$_SESSION['url_logo'] = $logo_url;

echo"<input type=\"submit\" id=\"input_validate\" value=\"Valider\">";
echo"</form>";  
echo"</div>"; 






