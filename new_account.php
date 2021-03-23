<?php
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>Nouveau client Neo Ness</title>
    </head>
<body>
    <div class="container_new_client">
        <form id ="form_new_client" name="new_client" action="add_client.php" method="POST">
            <table  id="table_new_client">
                <tr>
                    <td>nom</td>
                    <td><input type="text" name="last_name" required></td>
                </tr>
                <tr>
                    <td>prenom</td>
                    <td><input type="text" name="first_name" required></td>
                </tr>
                <tr>
                    <td>age</td>
                    <td><input type="number" name="age" required></td>
                </tr>
                <tr>
                    <td>poids en kg</td>
                    <td><input type="number" name="weight" required></td>
                </tr>
                <tr>
                    <td>taille en cm</td>
                    <td><input type="number" name="height" required></td>
                </tr>
                <tr>
                    <td>objectif de poids</td>
                    <td><input type="number" name="weight_goal" required></td>
                </tr>
                <tr>
                    <td>sexe H /F </td>
                    <td><input type="text" name="gender" required></td>
                </tr>
                <tr>
                    <td>password</td>
                    <td><input type="password" name="password" required></td>
                </tr>
                <tr id="valid_new_client">
                    <td colspan="2"><input type="submit" value="Valider"></td>
                </tr>
            </table>
        </form>
    </div>
</body>