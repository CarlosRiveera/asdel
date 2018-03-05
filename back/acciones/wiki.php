<?php 
include '../conexion.php';
	if(@$_GET['id']!=""){
		$accion="DELETE FROM conceptos where id_concepto='".$_GET['id']."'";
	}
	else {
	
		if(@$_POST['nombre_concepto']!=""&&$_POST['definicion_concepto']!=""){
			if($_POST['operacion']==2){
				$accion="UPDATE conceptos set nombre_concepto='".$_POST['nombre_concepto']."',definicion_concepto='".$_POST['definicion_concepto']."' where id_concepto=".$_POST['id'];
			}
			else{
				$accion="INSERT INTO `conceptos` (`id_concepto`, `nombre_concepto`, `definicion_concepto`) VALUES (NULL,'".$_POST['nombre_concepto']."','".$_POST['definicion_concepto']."')";
			}
		}
	
	}
	@insertar($accion,"../wiki.php?action=1");
	
 ?>