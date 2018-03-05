<?php 

	require_once "conexion.php";
	sleep(1);
	$buscar="";
	if ($_POST['buscar']!="") {
		$buscar=$_POST['buscar'];
		$consulta="SELECT j.*,c.nombre_consola FROM juegos as j, consolas as c where c.id_consola=j.id_cosola and j.nombre_juego LIKE '%".$buscar."%' ORDER BY RAND() 
LIMIT 3";
	@$resul=ejecutar($consulta);
	if ($resul!=null) {
		echo "<li><h6 class='text-center'>Resultados</h6></li>";
		foreach ( $resul as $filas ) {
		echo ' <li>
                  <span class="item">
                    <span class="item-left">
                        <img src="../Framework/img/juegos/'.$filas['imagen_juego'].'" alt="" />
                        <span class="item-info">
                            <span>'.$filas['nombre_juego'].'</span>
                            <span>$'.$filas['precio_juego'].'</span>
                            <span>'.$filas['nombre_consola'].'</span>
                        </span>
                    </span>
                    <span class="item-right">
                        <a class="btn btn-xs btn-primary pull-right" data-toggle="modal" data-target="#see'.$filas['id_juego'].'">Ver</a>
                    </span>
                </span>
              </li>';
	}
 	echo '<li class="divider"></li>
              <li><a class="text-center" id="busget" href="buscarn.php?param='.$buscar.'">ver todos los resultados</a></li>';
	}
	else{
		echo "<li><h6 class='text-center'>No se encontraron resultados para \"".$buscar."\"</h6></li>";
	}
	}
	else{
		echo "<li><h5 class='text-center'>Ingrese un parametro para la busqueda</h5></li>";
	}



	?>