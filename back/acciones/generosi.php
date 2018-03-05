<?php 
include '../includes/conexion.php';
	if(@$_GET['id']!=""){
		$accion="DELETE FROM generos where id_genero='".$_GET['id']."'";
	}
	else {
	
		if(@$_POST['nombre']!=""&&$_POST['descripcion']!=""){
			if($_POST['operacion']==2){
				$accion="UPDATE generos set nombre_genero='".$_POST['nombre']."',descripcion_genero='".$_POST['descripcion']."' where id_genero=".$_POST['id'];
			}
			else{
				$accion="INSERT INTO generos(id_genero,nombre_genero,descripcion_genero) values(null,'".$_POST['nombre']."','".$_POST['descripcion']."')";
			}
		}
	
	}
	@insertar($accion,"generos.php");
	
 ?>