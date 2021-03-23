<?php
session_start();
include_once 'database.php';

// Création du dossier contenant les logo !!! ne fonctionne pas !!! probleme de droit
// $folder_path='/var/www/html/eval/logo';
// if( !is_dir($folder_path) ) {
//     if( !mkdir($folder_path, 0755) ) {
//         exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous disposé des droits suffisants pour le faire ou créez le manuellement !');
//     }
// }
if(isset($_POST['activity_name'])){
    $activity_name = $_POST['activity_name'];
}      
if(isset($_POST['activity_burn'])){
    $activity_burn = $_POST['activity_burn'];
} 
$activity_duration = 60;

$tempory_name_path_logo = $_FILES['activity_logo']['tmp_name'];
$path_logo = 'http://localhost/eval/images/'.$_FILES['activity_logo']['name'];
echo"$path_logo";

//$name_path_logo = 'images'.$_FILES['activity_logo']['name'];
// $move_logo_ok = move_uploaded_file($tempory_name_path_logo,$name_path_logo);

// if($move_logo_ok){
//     $message = "logo copié avec succes dans ".$name_path_logo;
// }else{
//     $message = "Erreur dans la copie du fichier";
// }

$sql = "INSERT INTO activity (activity_name,activity_burn,activity_duration,activity_logo) 
VALUES ('$activity_name','$activity_burn','$activity_duration','$path_logo')";

// affichage des messages
    if (mysqli_query($db, $sql)) {
        //si reussite 
        header('location: admin.php');
    } else {
        // si erreur
        echo "Error: " . $sql . "<br>" . mysqli_error($db);    
    }
// fermeture de la connection    
    mysqli_close($conn);
?>