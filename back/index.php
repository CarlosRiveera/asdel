<?php 
session_start();
if(@$_SESSION['id']!="")
{
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container-fluid">
		<div class="row justify-content-end">
			<a href="./acciones/logout.php" class="btn btn-danger ">Salir</a>
		</div>
	</div>
	<div class="container">
		<div class="card" style="width: 33%;">
		  <div class="card-body">
		    <h5 class="card-title">Conceptos</h5>
		    <h6 class="card-subtitle mb-2 text-muted">Menu de Conceptos.</h6>
		    <p class="card-text">Definir conceptos financieros y/o aclarar terminos.</p>
		    <a class="btn btn-primary" href="wiki.php?action=0">Agregar</a>
		    <a href="wiki.php?action=1" class="btn btn-success">Ver Existentes</a>
		  </div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
<?php 
}
else{

	?>

<meta http-equiv="Refresh" content="1;url=login.php">

	<?php
}

 ?>