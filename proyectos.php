<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>ASDEL</title>
    <!-- START THE STYLES -->
    <link rel="stylesheet" type='text/css' href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans|Quicksand" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:200,100,400" rel="stylesheet" type="text/css" />
  </head>
  <!-- START THE BODY -->
  <body>
    <!-- START THE SOCIAL ICONS AND CONTACT -->
    <header>
      <div class="container">
        <div class="row row-menu">
          <div class="col col-sm text-sm-center">
            <ul class="social-list-01">
              <li>
                <a href="#">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-linkedin" aria-hidden="true"></i>
                </a>
              </li>
              <li>
                <a href="#">
                  <i class="fa fa-youtube-play" aria-hidden="true"></i>
                </a>
              </li>
            </ul>
          </div>
          <div class="col col-sm text-right">
            <div class="contact-block-01">
            <a class="contact-block-01__email" href="mailto:thesmart@edu.com">
              <i>info@asdel.com</i>
            </a>
            <a class="contact-block-01__phone" href="#">
              <i>2222-2222</i>
            </a>
          </div>
          </div>
        </div>
      </div>
    </header>
    <!-- START THE MENU -->
    <div class="menu">
      <div class="container">
        <div class="cont-subMenu">
          <nav class="navbar navbar-expand-lg navbar-light bg-faded">
            <a class="logo navbar-brand" href="index.html"><img src="img/logoAsdel.png" /></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div id="navbarNavDropdown" class="navbar-collapse collapse justify-content-end">
              <ul class="navbar-nav ">
                <li class="nav-item">
                    <a class="nav-link" href="index.html">Incio</a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Servicios</a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="localdev.html">Desarrollo local</a>
                    <a class="dropdown-item" href="training.html">Formación insaforp</a>
                    <a class="dropdown-item" href="sindical.html">Formación sindical</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="geomarketing.html">Geomarketing</a>
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="us.html">Nosotros</a>
                </li>
                 <li class="nav-item">
                  <a class="nav-link" href="contact.html">Contacto</a>
                </li>
                 <li class="nav-item">
                  <a class="nav-link" href="concepts.html">Conceptos</a>
                </li>
                <li>
                  <a class="nav-link" href="projects.html">Albúm de proyectos</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
		<div class="container">
			<br><center>
				<h1> Registro de proyectos </h1>
			</center><br>
			<form method="POST" action="">
				<div class="form-group">
					<label for="validationTooltip05">Titulo</label>
		      <input type="text" class="form-control" id="validationTooltip05" placeholder="Titulo proyecto" name="titulo" required>
		      <div class="invalid-tooltip">
		        Please provide a valid zip.
		      </div>
			  </div>
				<div class="form-group">
					<label for="validationTooltip05">Descripcion del proyecto</label>
					<textarea class="form-control" id="validationTooltip05" name="descripcion" rows="3" placeholder="Descripcion del proyecto" required></textarea>
					<div class="invalid-tooltip">
		        Please provide a valid zip.
		      </div>
			  </div>
				<div class="form-group">
					<label for="validationTooltip05">Fecha de inicio</label>
					<input class="form-control" type="date" name="fechaInicio" data-format="yyyy-MM-dd" required>
			  </div>
				<div class="form-group">
					<label for="validationTooltip05">Fecha de finalizacion</label>
					<input class="form-control" type="date" name="fechaFin" data-format="yyyy-MM-dd" required>
			  </div>
				<button class="btn btn-primary" type="submit" name="submit">Guardar</button>
			</form>
		</div>
		<br>
		<?php
			if (isset($_POST['submit'])) {
				include "conexion.php";
				$con=conectar();
				registrar($_POST['titulo'], $_POST['descripcion'], $_POST['fechaInicio'], $_POST['fechaFin']);
			}
		?>
		<?php
			include "conexion.php";
			$consulta = consulta();
		?>
		<div class="container">
			<br><center>
				<h1> Tabla de proyectos </h1>
			</center><br>
			<div class="table-responsive">
				<table class="table table-sm table-striped">
					<thead>
						<tr>
							<th scope="col">ID</th>
							<th scope="col">Titulo</th>
							<th scope="col">Descripcion</th>
							<th scope="col">Fecha inicio</th>
							<th scope="col">Fecha fin</th>
							<th scope="col">Modificar</th>
							<th scope="col">Eliminar</th>
						</tr>
					</thead>
					<tbody>
						<?php
							while ($proyecto = $consulta->fetch_assoc())
							{
							?>
								<tr>
									<td scope="row"><?php echo $proyecto['idProyecto']; ?></td>
									<td scope="row"><?php echo $proyecto['tituloProyecto']; ?></td>
									<td scope="row"><?php echo $proyecto['descripcionProyecto']; ?></td>
									<td scope="row"><?php echo $proyecto['fechaInicio']; ?></td>
									<td scope="row"><?php echo $proyecto['fechaFin']; ?></td>
									<td scope="row"><?php echo "
									<a href='modificarProyecto.php?idProyecto=".$proyecto['idProyecto']."'>
									<button class='btn btn-primary' type='button' name=/submit/>Modificar</button> " ?></td>
									<td scope="row"><?php echo "
									<a href='eliminarProyecto.php?idProyecto=".$proyecto['idProyecto']."'>
									<button class='btn btn-primary' type='button' name=/submit/>Eliminar</button> " ?></td>
								</tr>
								<?php
							}
							 ?>
					</tbody>
				</table>
			</div>

		</div>
		<hr class="featurette-divider">
		<footer>
			<div class="container footer-box-01">
				<div class="row featurette">
					<div class="col-sm">
						<h3>About us</h3>
						<p>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
						</p>
					</div>
					<div class="col-sm">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3876.184806633633!2d-89.19453838551877!3d13.707254302018043!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f633094f8b7c9a5%3A0x202b3ca37d8dbc2a!2sASDEL!5e0!3m2!1ses!2ssv!4v1519189055213" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
					<div class="col-sm">
						<h3>Contact Us</h3>
						<ul>
							<li>Phone : 123 - 456 - 789</li>
							<li>E-mail : info@comapyn.com</li>
							<li>Fax : 123 - 456 - 789</li>
						</ul>
						<p>
							Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
						</p>
					</div>
				</div>
				<div class="text-center">
					<span></span>
				</div>
			</div>
			<div class="footer-box-02">
				<div class="container">
					<div class="row">
						<div class="col-sm-9 col-md-9 col-lg-9">
							<p class="copy-info">© 2018 ASDEL. Todos los derechos reservados.</p>
						</div>
						<div class="col-sm-3 col-md-3 col-lg-3">
							<div class="footer-info">
								<a class="footer-info__01">Made by Novum SV-2018</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- START THE SCRIPTS -->
		<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
			crossorigin="anonymous"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
		 crossorigin="anonymous"></script>
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
		 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
		<script src="js/bootstrap.min.js"></script>

	</body>
</html>
