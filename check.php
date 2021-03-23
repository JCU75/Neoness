<?php
session_start();

// script qui vérifie que le nom et le mot de passe saisis sont bien dans la bdd. Si oui redirection vers la page perso du client (client.php)

if(isset($_POST['username']) && isset($_POST['password']))
{
    include_once 'database.php';

    // on applique les deux fonctions mysqli_real_escape_string et htmlspecialchars
    // pour éliminer toute attaque de type injection SQL et XSS
    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));
    // si username et password ne sont pas vides alors
    if($username !== "" && $password !== "")
    {
        //si username et password sont egaux à admin, redirection sur page admin.php
        if($username == "admin" && $password == "admin")
        {
            header('Location: admin.php');
        }
        else
        {   
            // requete sur table users, recupere l'id ou la colonne last_name est égale $username et ou la colonne password est égale à $password
            $request = "SELECT id 
                        FROM users 
                        where `last_name` = '".$username."' and `password` = '".$password."' ";

            // si $result renvoie TRUE et que le nombre de reponse à notre requete est superieur à 0, alors on stocke la valeur de l'id dans la variable super globale $_SESSION['id']. On redirige alors le client sur sa page perso.
            $result = mysqli_query($db,$request);
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_array($result)){
                    $_SESSION['id'] = $row["id"];
                    header('Location: client.php');
               }   
            }        
            else
            {
                // utilisateur ou mot de passe incorrect -> redirection vers la page index.php avec dans l'url error = 1 qui permettra d'afficher un message d'erreur sur la page index.php
                header('Location: index.php?error=1'); 
            }
        }
    }    
    else
    {
        // utilisateur ou mot de passe vide -> redirection vers la page index.php avec dans l'url error = 2 qui permettra d'afficher un message d'erreur sur la page index.php 
        // cas improbable puisque dans index.php les inputs username et password sont "required" !!!
       header('Location: index.php?error=2'); // utilisateur ou mot de passe vide
    }
}
else
{
   header('Location: index.php');
}
mysqli_close($db); // fermer la connexion
?>