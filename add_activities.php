<?php
session_start();
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>Ajout Activitée Neo Ness</title>
    </head>
<body>
    <div class="container_activity">
        <h1 id='h1_add_activity'>Ajout activitée</h1>

        <form class ="form_activity" name="new_activity" action="save_activity.php" method="POST" enctype="multipart/form-data">
            <table  id="table_activity">
                <tr>
                    <td >Nom de l'activitée</td>
                    <td><input type="text" name="activity_name" required></td>
                </tr>
                <tr>
                    <td>Calorie dépensée pour 1h</td>
                    <td><input type="number" name="activity_burn" required></td>
                </tr>
                <tr>
                    <td>Logo activitée</td>
                    <td><input type="file" name="activity_logo" required></td>
                </tr>
                <tr >
                    <td id="valid_new_client" colspan="2"><input type="submit" value="Valider"></td>
                </tr>
            </table>
        </form>
    </div>
</body>

