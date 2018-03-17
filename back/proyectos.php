<?php 
session_start();
if(@$_SESSION['id']!="")
{
 include 'conexion.php'; ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
 	<title>Proyectos</title>
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
							<br><center>
				<h1> Registro de proyectos </h1>
			</center><br>
			<form method="POST" action="./acciones/proyectos.php">
				<div class="form-group">
					<label for="titulo">Titulo</label>
		      <input type="text" class="form-control" id="titulo" placeholder="Titulo proyecto" name="titulo" required>
		      <div class="invalid-tooltip">
		        Porfavor ingrese un Titulo
		      </div>
			  </div>
				<div class="form-group">
					<label for="descripcion">Descripcion del proyecto</label>
					<textarea class="form-control" id="descripcion" name="descripcion" rows="3" placeholder="Descripcion del proyecto" required></textarea>
					<div class="invalid-tooltip">
		        Profavor ingrese una Descripcion
		      </div>
			  </div>
				<div class="form-group">
					<label for="fechaInicio">Fecha de inicio</label>
					<input class="form-control" type="date" name="fechaInicio" required>
			  </div>
				<div class="form-group">
					<label for="fechaFin">Fecha de finalizacion</label>
					<input class="form-control" type="date" name="fechaFin" required>
			  </div>
				<button class="btn btn-primary" type="submit" name="submit">Agregar</button>
			</form>
			</div>
		</div>
	 <?php 
			}
			else if(@$_GET['action']==1){
				?>
				<br><br>
			<div class="jumbotron jumbotron-fluid">
					<h1 class="display-4">Lista Proyectos</h1>
					<?php	$consulta="SELECT * from proyectos ORDER BY idProyecto Desc";
			        $res=ejecutar($consulta);
			        if(count($res)>0){
					?>
					<a href="index.php" class="btn btn-secondary">Inicio</a>
				    <table class="table table-hover">
				      <thead>
				        <tr>
				          <th>#Cod</th>
				          <th>Nombre</th>
				          <th>Fecha de Inicio</th>
				          <th>Fecha de Finalización</th>
				          <th>opciones</th>
				        </tr>
				      </thead>
				      <tbody>
				<?php 
        
		        foreach ($res as $filas) {
		          echo "<tr>
		          <td>".$filas['idProyecto']."</td>
		          <td>".$filas['tituloProyecto']."</td>
		          <td>".$filas['fechaInicio']."</td>
		          <td>".$filas['fechaFin']."</td>		          
		          <td>
		          	<div class='btn-group btn-group-sm' role='group' aria-label='...'>
		            <button type='button' class='btn btn-primary btn-lg' data-toggle='modal' data-target='#see".$filas['idProyecto']."'>Ver</button>
		            <button type='button' class='btn btn-success btn-lg' data-toggle='modal' data-target='#upd".$filas['idProyecto']."'>Modificar</button>
		            <a class='btn btn-danger btn-lg' href='./acciones/proyectos.php?id=".$filas['idProyecto']."'>Eliminar</a></div></td>
		          </tr>";
		        }
       ?>        
	      </tbody>
    	</table>  

		<?php 
		   $consulta="SELECT * from proyectos ORDER BY idProyecto Desc";
		  $res=ejecutar($consulta);
		  foreach ($res as $filas) {
		  		echo '<div class="modal fade" id="see'.$filas['idProyecto'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					  <div class="modal-dialog modal-dialog-centered" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLongTitle">Proyecto: '.$filas['tituloProyecto'].'</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        Definición:<br>'.$filas['descripcionProyecto'].'<br>
					        Fecha de Inicio:<br>'.$filas['fechaInicio'].'<br>
					        Fecha de Finalización:<br>'.$filas['fechaFin'].'<br>
					      </div>
					      <div class="modal-footer">
					        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					      </div>
					    </div>
					  </div>
					</div> 
					
					<div class="modal fade" id="upd'.$filas['idProyecto'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
					  <div class="modal-dialog modal-dialog-centered" role="document">
					    <div class="modal-content">
					      <div class="modal-header">
					        <h5 class="modal-title" id="exampleModalLongTitle">¿Que significa '.$filas['tituloProyecto'].'?</h5>
					        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					          <span aria-hidden="true">&times;</span>
					        </button>
					      </div>
					      <div class="modal-body">
					        <form method="POST" action="./acciones/proyectos.php">
							  <div class="form-group">
							    <label for="exampleInputEmail1">Proyecto</label>
							    <input value="'.$filas['tituloProyecto'].'" type="text" class="form-control" id="tituloProyecto" name="titulo" aria-describedby="ProyectoHelp" placeholder="ingrese el Proyecto">
							    <small id="ProyectoHelp" class="form-text text-muted">Proyecto a aclarar</small>
							  </div>
							  <input type="hidden" name="operacion" value="2">
							  <input type="hidden" name="id" value="'.$filas['idProyecto'].'">
							  <div class="form-group">
							    <label for="Descripcion">Descripcion</label>
							    <textarea   type="textarea" class="form-control" id="descripcionProyecto" name="descripcion" aria-describedby="DescripcionHelp" placeholder="ingrese la Descripcion" row="3">'.$filas['descripcionProyecto'].'</textarea >
							    <small id="DescripcionHelp" class="form-text text-muted">Descripcion del Proyecto</small>
							  </div>
							  <div class="form-group">
									<label for="fechaInicio">Fecha de inicio</label>
									<input class="form-control" value="'.$filas['fechaInicio'].'" type="date" name="fechaInicio" data-format="yyyy-MM-dd" required>
							  </div>
								<div class="form-group">
									<label for="fechaFin">Fecha de finalizacion</label>
									<input class="form-control" value="'.$filas['fechaFin'].'" type="date" name="fechaFin" data-format="yyyy-MM-dd" required>
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
  			<h2 class="display-5">No existe ningun Proyecto</h2>
  			<a href="index.php" class="btn btn-secondary">Inicio</a>
  			<a href="proyectos.php?action=0" class="btn btn-primary">Agregar</a>
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