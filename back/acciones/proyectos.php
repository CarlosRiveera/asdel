<?php 
include '../conexion.php';
	if(@$_GET['id']!=""){
		$accion="DELETE FROM proyectos where idProyecto='".$_GET['id']."'";
	}
	else {
	
		if(@$_POST['titulo']!=""&&$_POST['descripcion']!=""&&@$_POST['fechaInicio']!=""&&$_POST['fechaFin']!=""){
			$_POST['fechaInicio'] = new DateTime($_POST['fechaInicio']);
			$_POST['fechaInicio']=$_POST['fechaInicio']->format('Y/m/d');
			$_POST['fechaFin'] = new DateTime($_POST['fechaFin']);
			$_POST['fechaFin'] = $_POST['fechaFin']->format('Y/m/d');
			if($_POST['operacion']==2){
				$accion="UPDATE proyectos set tituloProyecto='".$_POST['titulo']."' , descripcionProyecto ='".$_POST['descripcion']."' , fechaInicio='".$_POST['fechaInicio']."' , fechaFin='".$_POST['fechaFin']."' where idProyecto=".$_POST['id'];
			}
			else{
				$accion="INSERT INTO `proyectos`(`idProyecto`, `tituloProyecto`, `descripcionProyecto`, `fechaInicio`, `fechaFin`) VALUES (NULL,'".$_POST['titulo']."','".$_POST['descripcion']."','".$_POST['fechaInicio']."','".$_POST['fechaFin']."')";
			}
		}
	
	}
	@insertar($accion,"../proyectos.php?action=1");
	
 ?>