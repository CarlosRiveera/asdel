<?php
		function conectaDB()
		{
			@$con = new PDO('mysql:host=localhost;dbname=asdel','root', '');
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return(@$con);
		}


		function ejecutar($consulta){
			$resultado;
			@$db=conectaDB();//Conecta con la base
			@$sentencia = @$db->prepare(@$consulta);
			
			if ($sentencia->execute()>0) {
				$resultado = $sentencia->fetchAll();
			}
			else{ 
			$resultado="Pagina en mantenimiento disculpe las molestias";
			}
			return $resultado;
		}
		function insertar($consulta,$pgmas)
		{
			$resultado;
			@$db=conectaDB();//Conecta con la base
			@$sentencia = @$db->prepare(@$consulta);
			if(@$sentencia->execute() > 0)
	  		{
	  	 echo "
				<script type=\"text/javascript\" >
				alert('Se ha ingresado con exito el registro'); 
			    setTimeout(\"location.href='../".$pgmas."'\",10);
				</script>";
	  		}
		}
?>