<?php 
include 'conexion.php';
	if(@$_GET['id']!=""){
		$accion="DELETE FROM juegos where id_juego='".$_GET['id']."'";
	}
	else {
	
		if(@$_POST['nombre']!=""&&$_POST['descripcion']!=""&&$_POST['cantidad']!=""&&$_POST['precio']!=""&&$_POST['plataforma']!=""&&$_POST['consola']!=""&&$_POST['genero']!=""){
			if($_POST['operacion']==2){
				$accion="UPDATE juegos set nombre_juego='".$_POST['nombre']."',descripcion_juego='".$_POST['descripcion']."',existencias_juego='".$_POST['cantidad']."',precio_juego='".$_POST['precio']."',id_plataforma='".$_POST['plataforma']."',id_cosola='".$_POST['consola']."', id_genero='".$_POST['genero']."' where id_juego=".$_POST['id'];
			}
			else{
				$accion="INSERT INTO juegos(id_juego,nombre_juego,descripcion_juego,existencias_juego,precio_juego,id_plataforma,id_cosola,id_genero,imagen_juego) values(null,'".$_POST['nombre']."','".$_POST['descripcion']."','".$_POST['cantidad']."','".$_POST['precio']."','".$_POST['plataforma']."','".$_POST['consola']."','".$_POST['genero']."', '".$_POST['nombre'].".png')";
			}
		}
	
	}
	@insertar($accion,"juegos.php");
	
 ?>