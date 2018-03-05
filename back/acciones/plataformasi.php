<?php 
include '../includes/conexion.php';
	if(@$_GET['id']!=""){
		$accion="DELETE FROM plataformas where id_plataforma='".$_GET['id']."'";
	}
	else {
	
		if(@$_POST['nombre']!=""&&$_POST['descripcion']!=""){
			if($_POST['operacion']==2){
				$accion="UPDATE plataforma set nombre_plataforma='".$_POST['nombre']."',descripcion_plataforma='".$_POST['descripcion']."' where id_plataforma=".$_POST['id'];
			}
			else{
				$accion="INSERT INTO plataformas(id_plataforma,nombre_plataforma,descripcion_plataforma) values(null,'".$_POST['nombre']."','".$_POST['descripcion']."')";
			}
		}
	
	}
	@insertar($accion,"plataformas.php");
	
 ?>