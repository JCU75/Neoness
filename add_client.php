<?php

// script qui rajoute un client dans notre base de donnée

// on recupere les données saisies par le client par la methode post qu'on affecte à des variables
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
if(isset($_POST['gender'])){
    $gender = $_POST['gender'];
}   
if(isset($_POST['password'])){
    $password = $_POST['password'];
}  

// connection à la base de données
    $db_username = 'jc75';
    $db_password = 'beweb2020';
    $db_name     = 'neoness_bdd';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
    or die('could not connect to database');
// requete sql qui rajoute un client dans la table users dans toutes les colonnes
    $sql = "INSERT INTO users (last_name,first_name,age,weight,height,weight_goal,gender,password) 
            VALUES ('$last_name','$first_name','$age','$weight','$height','$weight_goal','$gender','$password')";
// affichage des messages
    if (mysqli_query($db, $sql)) {
        //si reussite 
        echo "Bienvenue ". $first_name." ".$last_name. " chez Neo Ness";
        sleep(10);
        header('location: client.php');
    } else {
        // si erreur
        echo "Error: " . $sql . "<br>" . mysqli_error($db);
        sleep(10);
    }
// fermeture de la connection    
    mysqli_close($conn);
    ?>