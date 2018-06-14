<?php
	$servername = "localhost";
	$username = "huefer_admin";
	$password = "quimica1";
	$dbname = "huefer_registroriego";
	
    //Variables de la tabla
    $usuario = $_POST["usuarioPost"];
    $dia = $_POST["diaPost"];
    $mes = $_POST["mesPost"];
    $ano = $_POST["anoPost"];
    $hora = $_POST["horaPost"];
    $minuto = $_POST["minutoPost"];
	$sectorRiego = $_POST["sectorRiegoPost"];
	$caudalMatriz = $_POST["caudalMatrizPost"];
	$litrosMatriz = $_POST["litrosMatrizPost"];
	$caudalFert = $_POST["caudalFertPost"];
	$litrosFert = $_POST["litrosFertPost"];

	$conn = new mysqli($servername,$username,$password,$dbname);
	
	if(!$conn) die("Connection Failed ".mysqli_connect_error());
	

	$sql = "INSERT INTO " . $usuario . " (Dia, Mes, Ano, Hora, Minuto ,SectorRiego, CaudalMatriz, LitrosMatriz, CaudalFert, LitrosFert)
			VALUES ('".$dia."','".$mes."','".$ano."','".$hora."','".$minuto."','".$sectorRiego."','".$caudalMatriz."','".$litrosMatriz."','".$caudalFert."','".$litrosFert."')";
	
	$result = mysqli_query($conn,$sql);		
	
	if(!$result) echo "There was an error";
	else echo "Everything ok";




?>