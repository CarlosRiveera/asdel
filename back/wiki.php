<?php 
session_start();
if(@$_SESSION['id']!="")
{
 include 'conexion.php'; ?>
 <!DOCTYPE html>
 <html lang="es">
 <head>
 	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
 	<title>Conceptos</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

 </head>
 <body>
 	<div class="container-fluid">
	<?php 
		if(isset($_GET['action'])){
			if(@$_GET['action']==0){
	?>
			<div class="jumbotron jumbotron-fluid">
			  <div class="container">
			    <h1 class="display-4">Agregar Concepto</h1>
					<a href="index.php" class="btn btn-secondary">Inicio</a>
			    <form method="POST" action="acciones/wiki.php">
				  <div class="form-group">
				    <label for="exampleInputEmail1">Concepto</label>
				    <input type="text" class="form-control" id="nombre_concepto" name="nombre_concepto" aria-describedby="conceptoHelp" placeholder="ingrese el concepto">
				    <small id="conceptoHelp" class="form-text text-muted">Concepto a aclarar</small>
				  </div>
				  <input type="hidden" name="operacion" value="0">
				  <div class="form-group">
				    <label for="definicion">Definicion</label>
				    <textarea   type="textarea" class="form-control" id="definicion_concepto" name="definicion_concepto" aria-describedby="definicionHelp" placeholder="ingrese la definicion" row="3"></textarea >
				    <small id="definicionHelp" class="form-text text-muted">Definicion del concepto</small>
				  </div>
				  <button type="submit" class="btn btn-primary">Crear</button>
				</form>
			  </div>
			</div>
	 <?php 
			}
			else if(@$_GET['action']==1){
				?>
				<br><br>
			<div class="jumbotron jumbotron-fluid">
					<h1 class="display-4">Lista Concepto</h1>
							<?php	$consulta="SELECT * from conceptos ORDER BY id_concepto Desc";
        $res=ejecutar($consulta);
        if(count($res)>0){
				?>
					<a href="index.php" class="btn btn-secondary">Inicio</a>
				    <table class="table table-hover">
				      <thead>
				        <tr>
				          <th>#Cod</th>
				          <th>Nombre</th>
				          <th>Definición</th>
				          <th>opciones</th>
				        </tr>
				      </thead>
				      <tbody>
				<?php 
        
        foreach ($res as $filas) {
          echo "<tr>
          <td>".$filas['id_concepto']."</td>
          <td>".$filas['nombre_concepto']."</td>
          <td>".$filas['definicion_concepto']."</td>
          <td>
          	<div class='btn-group btn-group-sm' role='group' aria-label='...'>
            <button type='button' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#see".$filas['id_concepto']."'>Ver</button>
            <button type='button' class='btn btn-success btn-lg' data-toggle='modal' data-target='#upd".$filas['id_concepto']."'>Modificar</button>
            <a class='btn btn-danger btn-lg' href='./acciones/wiki.php?id=".$filas['id_concepto']."'>Eliminar</a></div></td>
          </tr>";
        }
       ?>        
	      </tbody>
    	</table>  

		<?php 
		   $consulta="SELECT * from conceptos ORDER BY id_concepto Desc";
		  $res=ejecutar($consulta);
		  foreach ($res as $filas) {
		  		echo '<div class="modal fade" id="see'.$filas['id_concepto'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					  <div class="modal-dialog modal-dialog-centered" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLongTitle">¿Que significa '.$filas['nombre_concepto'].'?</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        Definición:<br>'.$filas['definicion_concepto'].'
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					      </div>
					    </div>
					  </div>
					</div> 
					
					<div class="modal fade" id="upd'.$filas['id_concepto'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					  <div class="modal-dialog modal-dialog-centered" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLongTitle">¿Que significa '.$filas['nombre_concepto'].'?</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <form method="POST" action="./acciones/wiki.php">
							  <div class="form-group">
							    <label for="exampleInputEmail1">Concepto</label>
							    <input value="'.$filas['nombre_concepto'].'" type="text" class="form-control" id="nombre_concepto" name="nombre_concepto" aria-describedby="conceptoHelp" placeholder="ingrese el concepto">
							    <small id="conceptoHelp" class="form-text text-muted">Concepto a aclarar</small>
							  </div>
							  <input type="hidden" name="operacion" value="2">
							  <input type="hidden" name="id" value="'.$filas['id_concepto'].'">
							  <div class="form-group">
							    <label for="definicion">Definicion</label>
							    <textarea   type="textarea" class="form-control" id="definicion_concepto" name="definicion_concepto" aria-describedby="definicionHelp" placeholder="ingrese la definicion" row="3">'.$filas['definicion_concepto'].'</textarea >
							    <small id="definicionHelp" class="form-text text-muted">Definicion del concepto</small>
							  </div>
							  <button type="submit" class="btn btn-primary">Modificar</button>
							</form>
					      </div>
					    </div>
					  </div>
					</div> 
					';
  			}
  		}
  		else{
  			?>
  			<h2 class="display-5">No existe ningun concepto</h2>
  			<a href="index.php" class="btn btn-secondary">Inicio</a>
  			<a href="wiki.php?action=0" class="btn btn-primary">Agregar</a>
  		</div>
 <?php
  		}
			}
			else{
	?>
			<br><br><br><br><br><br><br>
			<div class="jumbotron jumbotron-fluid">
			  <div class="container">
			    <h1 class="display-4">404</h1>
			    <p class="lead">Esta pagina no existe.</p>
			    <a href="index.php" class="btn btn-primary">Regresar al incio</a>
			  </div>
			</div>
	<?php 
			}

		}
		else{
	?>
			<br><br><br><br><br><br><br>
			<div class="jumbotron jumbotron-fluid">
			  <div class="container">
			    <h1 class="display-4">404</h1>
			    <p class="lead">Esta pagina no existe.</p>
			    <a href="index.php" class="btn btn-primary">Regresar al incio</a>
			  </div>
			</div>
	 <?php 
		}
	 ?>
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