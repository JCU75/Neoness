<?php
session_start();
include_once 'database.php';
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <title>Historique Perso Neo Ness</title>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
        // utilisation des graphique de google pour les graphiques
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            
            var data = google.visualization.arrayToDataTable([
                ['Dates', 'IMC'],
                <?php
                $user2=$_SESSION['id'];
                $request3 = "SELECT * 
                FROM activity_history 
                WHERE activity_history.user_id = '".$user2."'";

            $result3 = mysqli_query($db,$request3);
            if (mysqli_num_rows($result3) > 0) {
                while($row = mysqli_fetch_array($result3)){
                 $bmi = $row["current_bmi"];
                 $fullday_activity = $row["date_activity"];
                 $day_activity = substr(strrchr($fullday_activity, "-"), 1);
                ?>
                ['<?php echo $day_activity; ?>', <?php echo $bmi; ?>],
                <?php 
               }     
             }
            ?>           
        ]);
            var options = {
            title: 'Indice Masse Corporel',
            curveType: 'function',
            legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

            chart.draw(data, options);
        }
        </script>
    </head>
    <body>
        <h1 id="h1_line_chart" >Récapitulatif activitées et IMC</h1>
        <a class="logoutBtn" href="logout.php" >Logout</a>

        <div id="container_line_chart">
        <?php
        $user = $_SESSION['id'];

        // requete avec jointure pour recuperer le nom de l'activitée par son id, ainsi que la date et la duree associées par user_id
        $request = "SELECT date_activity,activity_history.activity_duration AS ac_dur ,activity_name
                    FROM activity_history 
                    INNER JOIN activity ON activity_history.activity_id = activity.activity_id
                    WHERE activity_history.user_id = '".$user."'
                    ORDER BY  activity_history.date_activity DESC";

        $result = mysqli_query($db,$request);

        // affichage des statistiques dans un tableaux
        echo"<div id='div_graph'>";
        echo"<table class='table_graph'><thead><tr><th>Date</th><th>Activitée</th><th>Durée Activitée</th></tr></thead>";
        echo"<tbody>";
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)){
                $date_hist = $row["date_activity"];
                $activity_hist = $row["activity_name"];
                $duration_hist = $row["ac_dur"];
                echo"<tr><td>$date_hist</td><td>$activity_hist</td><td>$duration_hist</td></tr>"; 
            }     
        }
        echo"</tbody></table>";
        echo"</div>";
        if (mysqli_query($db, $request)) {
            //si reussite 
            //echo "request ok!";
        } else {
            // si erreur
            echo "Error: " . $request . "<br>" . mysqli_error($db);    
        }
        ?>
        <div id="curve_chart" style="width: 700px; height: 300px"></div>
        </div>
        Click here to <a href="logout.php" title="Logout">Logout.

    </body>
</html>