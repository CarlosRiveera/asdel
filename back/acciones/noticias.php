<?php 
include '../conexion.php';
	if(@$_GET['id']!=""){
		$accion="DELETE FROM Noticias where idNoticia='".$_GET['id']."'";
		$link = mysqli_connect("localhost", "root", "", "asdel");
	}
	else {
	
		if(@$_POST['Titulo']!=""&&$_POST['Descripcion']!=""){
			// leemos datos de la imagen
			$imagen= $_FILES["Imagen"]["tmp_name"];
			$nombreimagen  = $_FILES["Imagen"]["name"];
			//este es el archivo que añadiremosal campo blob
  			$imagen  = $_FILES['Imagen']['tmp_name'];
  			//lo comvertimos en binario antes de guardarlo
  			$foto=mysqli_real_escape_string($link,file_get_contents($imagen));
  			mysqli_close();
			if(@$_POST['operacion']==2){
				$accion="UPDATE `Noticias` SET `Titulo`=".$_POST['Titulo'].",`Descripcion`=".$_POST['Descripcion'].".,`Imagen`=".$foto." WHERE idNoticia=".$_POST["idNoticia"];
			}
			else{
				$accion="INSERT INTO `Noticias`( `idNoticia`,`Titulo`, `Descripcion`, `Imagen`) VALUES (null,".$_POST['Titulo'].",".$_POST['Descripcion'].",".$foto.")";
			}
		}
	
	}
	@insertar($accion,"../proyectos.php?action=1");
	
 ?>