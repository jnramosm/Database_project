<?php

if(!isset($_SESSION)) 
{ 
    session_start(); 
} 



if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: login.php");    
}
else {$_SESSION['logged_in'] = false;}

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Title</title>
        <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
        <style>
            canvas{
                -moz-user-select: none;
                -webkit-user-select: none;
                -ms-user-select: none;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>
    <body>
        <meta charset="UTF-8"/>
        
        <div class="contenedorImagen">
            <img src="Logo_HT.png" alt="Avatar" class="avatar2" style="width:8em;float:left;"/>
            <h1>Data Base</h1><br>
            <p>Your username is: <?php echo $_SESSION['usuario'] ?></p>
        </div>
        <div id="data" style="display: none;">
            <?php
                require "generaDatos.php";
            ?>

        </div>
        
        <div id="Mydiv" style="width:100%;">
            
            
        </div>
        <div class="cuadroCierre">
            <p>Developed by JR</p>
        </div>
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        
        <p id="usuario", style="display: none;">
            <?php
                echo $_SESSION['usuario'];
            ?>

        </p>
        
        <script>
            var div = document.getElementById("data");
            var mydata = div.textContent;
            var p = document.getElementById("usuario");
            var usuario = p.textContent;
            var items = mydata.split(';');
            var temporal;
            var usoDatos = new Array();
            
            for(var i=0; i < items.length - 1; i++){
                temporal = items[i].split('|');
                usoDatos[i] = new Array();
                
                for(var j=0; j < 11; j++){
                    usoDatos[i][j] = temporal[j];
                }
                
            }
            
            var tiempo = new Array();
            var tiempo_label =new Array();
            var matrizTemp = new Array();
            var fertTemp = new Array();
            
            for(var i=0; i < items.length - 1; i++){
                tiempo[i] = new Date(usoDatos[i][3],usoDatos[i][2]-1,usoDatos[i][1],usoDatos[i][4],usoDatos[i][5]);
                matrizTemp[i] = usoDatos[i][7];
                fertTemp[i] = usoDatos[i][9];
            }
            
            var matriz = {
                x: tiempo,
                y: matrizTemp,
                type: 'scatter',
                name: 'Matriz'
            };
            var fert = {
                x: tiempo,
                y: fertTemp,
                type: 'scatter',
                yaxis: 'y2',
                name: 'Fertilizante'
            };
            
            
            var data = [matriz,fert];
            var layout = {
                title: "Caudal instantáneo",
                yaxis: {title: 'Matriz'},
                yaxis2: {
                    title: 'Fertilizante',
                    titlefont: {color: 'rgb(148, 103, 189)'},
                    tickfont: {color: 'rgb(148, 103, 189)'},
                    overlaying: 'y',
                    side: 'right'
                },
                font: {size: 10},
                showlegend: true,
                legend: {"orientation": "h"}
            };


            Plotly.newPlot('Mydiv',data,layout);
            


            
            
            
            

        </script>
        
    </body>
</html>
