<?php 

	require_once ('../../back/conexion.php');
	sleep(1);
	$buscar="";
	if ($_POST['buscar']!="") {
		$buscar=$_POST['buscar'];
		$consulta="SELECT * FROM conceptos where nombre_concepto LIKE '%".$buscar."%' ORDER BY RAND() 
LIMIT 3";
	@$resul=ejecutar($consulta);
	if ($resul!=null) {
		echo "<li><h6 class='text-center'>Resultados</h6></li>";
		foreach ( $resul as $filas ) {
		echo ' <li>
                  <span class="item">
                    <span class="item-left">
                        <span class="item-info">
                            <span>'.$filas['nombre_concepto'].'</span>
                            <span>$'.$filas['definicion_concepto'].'</span>
                        </span>
                    </span>
                </span>
              </li>';
	}
	}
	else{
		echo "<li><h6 class='text-center'>No se encontraron resultados para \"".$buscar."\"</h6></li>";
	}
	}
	else{
		echo "<li><h5 class='text-center'>Ingrese un parametro para la busqueda</h5></li>";
	}



	?>