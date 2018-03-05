<?php

function conectar() {
	$user="root";
	$pass="";
	$server="localhost";
	$database="asdel";
	$con=mysqli_connect($server, $user, $pass, $database ) or die ("Error al conectar a la base de datos".mysqli_error());
	return $con;
}

function registrar ($titulo, $descripcion, $fechaInicio, $fechaFin) {

	$reqlen = strlen($titulo) * strlen($descripcion) * strlen($fechaInicio) * strlen($fechaFin);

	$fecha = $_POST['fechaInicio'];
	$fechaBD = date("d-m-Y", strtotime($fecha));

	$fechaFin = $_POST['fechaFin'];
	$fechaBDFin = date("d-m-Y", strtotime($fechaFin));

	if ($reqlen > 0) {

			$link = conectar();

			$query = "INSERT INTO proyectos VALUES('','$titulo','$descripcion','$fechaInicio','$fechaFin')";
			$result = mysqli_query($link, $query);
			mysqli_close($link);

			echo 'Se ha registrado exitosamente.';
	} else {
		echo 'Por favor, rellene todos los campos requeridos.';
	}
}


$user="root";
$pass="";
$server="localhost";
$database="asdel";
$conexion=new mysqli($server, $user, $pass, $database );
$consulta ='';

function consulta() {
	global $conexion, $consulta;
	$sql = "SELECT * FROM proyectos";
	return $conexion->query($sql);
}

?>
