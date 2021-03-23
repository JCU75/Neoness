<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="styles.css" >
        <title>NEO-NESS</title>
    </head>
    <!-- page d'acceuil qui affiche le menu de connection et un lien pour creer un nouveau compte -->
    <body>
        <div class="navbar"></div>
        <!-- création d'une div avec une id container qui est le cadre contenant la zone de connection à partir d'un formulaire -->
        <div class="container">
            <!-- le formulaire envoie les données au fichier check.php qui verifie les données et qui oriente l'utilisateur, si le user et le password sont correctes, 2 possibilitées, le combo user/password correspondent à un utilisateur lamba,il est alors redirigé vers sa page perso. Soit le combo user/password correspondent à l'admin, dans ce cas il est redirigé vers la page admin. -->
            <form action="check.php" method="POST">
            <h1>Connexion</h1>
            <!-- saisie du nom de l'utilisateur -->
            <label>Votre nom</label>
            <input id="username" type="text" placeholder="Entrer le votre nom " name="username" required>
            <!-- saisie du password -->
            <label>Mot de passe</label>
            <input id="password" type="password" placeholder="Entrer le mot de passe" name="password" required>
            <!-- envoie du formulaire -->
            <input type="submit" id="submit" value="LOGIN" >
            <a  id ="new_user" href="new_account.php">Créer un compte</a>
            <!-- envoie message d'erreur de saisie si nom utilisateur ou mot de passe incorrect. En effet le fichier check.php retourne une variable error avec la valeur 1 ou 2 en cas d'erreur-->
            <?php
                if(isset($_GET['error'])){
                    $error = $_GET['error'];
                    if($error == 1 || $error == 2){
                        echo "<p> Utilisateur ou mot de passe incorrect</p>";
                    }
                }
            ?>
            </form>
        </div>
    </body>
</html>