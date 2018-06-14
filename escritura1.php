<?php
	$servername = "localhost";
	$username = "huefer_admin";
	$password = "quimica1";
	$dbname = "huefer_registroriego";
	
    //Variables de la tabla
    $usuario = $_GET["usuarioPost"];
    $dia = $_GET["diaPost"];
    $mes = $_GET["mesPost"];
    $ano = $_GET["anoPost"];
    $hora = $_GET["horaPost"];
    $minuto = $_GET["minutoPost"];
	$sectorRiego = $_GET["sectorRiegoPost"];
	$caudalMatriz = $_GET["caudalMatrizPost"];
	$litrosMatriz = $_GET["litrosMatrizPost"];
	$caudalFert = $_GET["caudalFertPost"];
	$litrosFert = $_GET["litrosFertPost"];

	$conn = new mysqli($servername,$username,$password,$dbname);
	
	if(!$conn) die("Connection Failed ".mysqli_connect_error());
	

	$sql = "INSERT INTO " . $usuario . " (Dia, Mes, Ano, Hora, Minuto ,SectorRiego, CaudalMatriz, LitrosMatriz, CaudalFert, LitrosFert)
			VALUES ('".$dia."','".$mes."','".$ano."','".$hora."','".$minuto."','".$sectorRiego."','".$caudalMatriz."','".$litrosMatriz."','".$caudalFert."','".$litrosFert."')";
	
	$result = mysqli_query($conn,$sql);		
	
	if(!$result) echo "There was an error";
	else echo "Everything ok";




?>