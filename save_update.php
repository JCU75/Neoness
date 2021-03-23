<?php
session_start();
include_once 'database.php';


// script qui sauvegarde les données de mise à jour des clients

// on recupere les données saisies mise à jour par admin
if(isset($_POST['last_name'])){
    $last_name = $_POST['last_name'];
}      
if(isset($_POST['first_name'])){
    $first_name = $_POST['first_name'];
} 
if(isset($_POST['age'])){
    $age = $_POST['age'];
} 
if(isset($_POST['weight'])){
    $weight = $_POST['weight'];
} 
if(isset($_POST['height'])){
    $height = $_POST['height'];
} 
if(isset($_POST['weight_goal'])){
    $weight_goal = $_POST['weight_goal'];
}    
$id = $_GET['id'];

echo "$id"."<br>";
echo "$last_name"."<br>";
echo "$first_name"."<br>";
echo "$weight"."<br>";
echo "$height"."<br>";
echo "$weight_goal"."<br>";

// on applique une requete de mise à jour de la table users sur les colonnes last_name, first_name, age, weight, height et weight_goal
$request = "UPDATE users 
            SET `last_name` = '$last_name', `first_name` = '$first_name', `age` = '$age', `weight` = '$weight', `height` = '$height', `weight_goal` = '$weight_goal'
            WHERE `id` = '$id'";
if (mysqli_query($db, $request)) {
    // si mise a jour reussi redirection vers la page admin.php
    header('Location: admin.php');
} else {
    // si echec de mise à jour, on affiche un message d'erreur
    echo "Error updating record: " . mysqli_error($db);
  }
  //fermeture de la connection à la base de donnée
  mysqli_close($db);
?>