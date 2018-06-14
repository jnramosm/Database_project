<?php

    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
    
	$servername = "localhost";
    $username = "username"; 
    $password = "password";
    $dbname = "data_base";
	
	$usuario_in = $_SESSION['usuario'];	
	$conn = new mysqli($servername,$username,$password,$dbname);
	
	if(!$conn) die("Connection Failed ".mysqli_connect_error());
	
	$sql = "SELECT id, Dia, Mes, Ano, Hora, minuto, SectorRiego, CaudalMatriz, LitrosMatriz, CaudalFert, LitrosFert FROM " . $usuario_in . "";
	$result = mysqli_query($conn, $sql);	
	
	
	if(mysqli_num_rows($result) > 0){
		while($row = mysqli_fetch_assoc($result)){
			echo "".$row['id']."|".$row['Dia']."|".$row['Mes']."|".$row['Ano']."|".$row['Hora']."|".$row['minuto']."|".
			     $row['SectorRiego']."|".$row['CaudalMatriz']."|".$row['LitrosMatriz']."|".$row['CaudalFert']."|".$row['LitrosFert'].";";
		}
	}



?>
