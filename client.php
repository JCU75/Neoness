<?php
session_start();
include_once 'database.php';
$request = "SELECT first_name, last_name 
            FROM users 
            where `id` = '".$_SESSION['id']."'";

 $result = mysqli_query($db,$request);
 if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_array($result)){
        echo "<h1> Hello ".$row["first_name"]." ".$row["last_name"]."<h1>";
   }   
}
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>Page Perso Neo Ness</title>
    </head>
<body>

<div class="personal">
    <form id ="form_personal" name="form_personal" action="preview_validate.php" method="POST">
        <table  id="table_personal">
                <tr>
                    <td>Quel est votre poids aujourd'hui ?</td>
                    <td><input type="number" name="weight_today" required></td>
                </tr>
                <tr>
                    <td>Choisissez une activitée</td>
                    <td>
                        <select id="select_activity" type="number" name="activity_name" required onchange="pop_logo()">
                            <option>Choix des activitées</option>
                            <?php
                                $request2 = "SELECT * FROM activity";
                                $result2 = mysqli_query($db,$request2);
                                while($row = mysqli_fetch_array($result2)){
                                    echo'<option>'.$row["activity_name"].'<option>';
                                }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Quel est la durée prévue pour cette activitée en minutes?</td>
                    <td><input type="number" name="duration_today" required></td>
                </tr>
                <!-- <tr>
                    <td>
                        <img src="http://localhost/eval/images/aviron900.jpg" >
                    </td>
                </tr> -->
                <tr >
                    <td id="valid_today_activity" colspan="2"><input type="submit" value="Valider"></td>
                </tr>
        </table>        
    </form>
</div>



<!-- <div class="history_graph">
    <img src="histogram.php">
</div>     -->
<script>

  
    
</script>