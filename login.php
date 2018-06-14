<?php 
    
    session_start();
    $usuario_wrong = false;
    $pass_wrong = false;
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
        <link rel="stylesheet" type="text/css" href="styles.css">
    </head>

    <?php

        $servername = "localhost";
        $username = "username"; 
        $password = "password";
        $dbname = "data_base";

        if($_SERVER['REQUEST_METHOD']=='POST'){

            $usuario_in = $_POST["usernamePost"];
            $password_in = $_POST["passwordPost"];
            $habilita = 0;

            $conn = new mysqli($servername,$username,$password,$dbname);

            if(!$conn) die("Connection Failed ".mysqli_connect_error());

            $sql = "SELECT password FROM usuario WHERE usuario = '".$usuario_in."'";
            $result = mysqli_query($conn, $sql);	
            
            
            if($result -> num_rows == 0){
                
                $usuario_wrong = true;
            }
            else{
            while($row = mysqli_fetch_assoc($result)){
                    if($row['password'] == $password_in){
                        $_SESSION['logged_in'] = true;
                        $_SESSION['usuario'] = $usuario_in;
                        header("location: cuenta.php");
                    }
                    else { $pass_wrong = true; }
                }
            }
            
            
        }

    ?>
    <body>
        <meta charset="UTF-8"/>
        <form class="Myform" action="login.php" method="post">
        
            <div class="imgcontainer">
                <img src="Logo_HT.png" alt="Avatar" class="avatar" style="width:15%;">
            </div>

            <div class="container">
                <label><b>Usuario</b></label>
                <input type="text" placeholder="Username" name="usernamePost">

                <label><b>Contraseña</b></label>
                <input type="password" placeholder="Password" name="passwordPost">

                <button type="submit">Login</button>
                <!--input type="checkbox" checked="checked"> Remember me-->
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" class="cancelbtn"><a  href="http://www.domain.com/">Cancel</a></button> 
                <span class="psw">Forgot <a href="#">password?</a></span>
            </div>  
        

        </form>

        <p id="mensaje", style= "display:none;"><?php
                if ($pass_wrong){
                    echo "Incorrect password";
                    $pass_wrong = false;
                }
                if($usuario_wrong){
                    echo "Non-existent username";
                    $usuario_wrong = false;
                }
            ?></p>
        <script>
            var m = document.getElementById("mensaje");
            var mensaje = m.textContent;
            if(mensaje == "Non-existent username" || mensaje == "Incorrect password"){
                alert(mensaje);
            }

        </script>


    </body>
</html>
