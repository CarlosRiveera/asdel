<?php
//Archivo de conexión a la base de datos
require('./back/conexion.php');

//Variable de búsqueda
$consultaBusqueda = $_POST['valorBusqueda'];

//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("& lt;", "& gt;", "& quot;", "& #x27;", "& #x2F;", "& #060;", "& #062;", "& #039;", "& #047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";


//Comprueba si $consultaBusqueda está seteado
if (isset($consultaBusqueda)) {

	//Selecciona todo de la tabla mmv001 
	//donde el nombre sea igual a $consultaBusqueda, 
	//o el apellido sea igual a $consultaBusqueda, 
	//o $consultaBusqueda sea igual a nombre + (espacio) + apellido
	$consulta = ejecutar("SELECT * FROM conceptos	WHERE nombre_concepto COLLATE UTF8_SPANISH_CI LIKE '%$consultaBusqueda%' 
	");

	//Obtiene la cantidad de filas que hay en la consulta
	$filas = count($consulta);

	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($filas === 0) {
		$mensaje = "<p>No hay ningún concepto que coincida</p>";
	} else {
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		echo '<li>Resultados para <strong>'.$consultaBusqueda.'</strong></li>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		$resultados = ejecutar($consulta)
		foreach ($resultados as $datos) {
			$nombre = $datos['nombre_concepto'];
			$apellido = $datos['definicion_concepto'];

			//Output
			$mensaje .= '<li>
			<p>
			<strong>' . $nombre . '</strong> <br>
			<strong>' . $apellido . '</strong> <br>
			</p></li>';

		};//Fin while $resultados

	}; //Fin else $filas

};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>