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
$user = $_SESSION['id'];
// requete avec jointure pour recuperer le nom de l'activitée par son id, ainsi que la date et la duree associées par user_id
$request = "SELECT activity_history.date_activity,activity_history.activity_duration,activity.activity_name 
            FROM activity_history 
            INNER JOIN activity ON activity_history.activity_id = activity.activity_id
            WHERE activity_history.user_id = '".$user."'
            ORDER BY  activity_history.date_activity DESC";

$result = mysqli_query($db,$request);

echo"<div id='div_graph'>";
echo"<table class='table_graph'><thead><tr><th>Date</th><th>Activitée</th><th>Durée Activitée</th></tr></thead>";
echo"<tbody>";
if (mysqli_num_rows($result) > 0) {
   while($row = mysqli_fetch_array($result)){
    $date_hist = $row["date_activity"];
    $activity_hist = $row["activity_name"];
    $duration_hist = $row["activity_duration"];
    echo"<tr><td>$date_hist</td><td>$activity_hist</td><td>$duration_hist</td></tr>"; 
  }     
}
echo"</tbody></table>";
echo"</div>";
if (mysqli_query($db, $request)) {
    //si reussite 
    echo "request ok!";
} else {
    // si erreur
    echo "Error: " . $request . "<br>" . mysqli_error($db);    
}