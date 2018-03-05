<?php
//Conectamos a la base de datos
require('./back/conexion.php');

//Evitamos que salgan errores por variables vacías
error_reporting(E_ALL ^ E_NOTICE);

//Cantidad de resultados por página (debe ser INT, no string/varchar)
$cantidad_resultados_por_pagina = 3;

//Comprueba si está seteado el GET de HTTP
if (isset($_GET["pagina"])) {

  //Si el GET de HTTP SÍ es una string / cadena, procede
  if (is_string($_GET["pagina"])) {

    //Si la string es numérica, define la variable 'pagina'
     if (is_numeric($_GET["pagina"])) {

       //Si la petición desde la paginación es la página uno
       //en lugar de ir a 'index.php?pagina=1' se iría directamente a 'index.php'
       if ($_GET["pagina"] == 1) {
         header("Location: concepts.php");
         die();
       } else { //Si la petición desde la paginación no es para ir a la pagina 1, va a la que sea
         $pagina = $_GET["pagina"];
      };

     } else { //Si la string no es numérica, redirige al index (por ejemplo: index.php?pagina=AAA)
       header("Location: index.html");
      die();
     };
  };

} else { //Si el GET de HTTP no está seteado, lleva a la primera página (puede ser cambiado al index.php o lo que sea)
  $pagina = 1;
};

//Define el número 0 para empezar a paginar multiplicado por la cantidad de resultados por página
$empezar_desde = ($pagina-1) * $cantidad_resultados_por_pagina;
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
     <link rel="stylesheet" type='text/css' href="css/bootstrap.min.css" >
      <!--Custom CSS-->
    <link rel="stylesheet" href="css/style.css">
      <!--Fonts options-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <title>Hello, world!</title>
  </head>
  <body>
    <header>
      <div class="container">
            <div class="row">
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
                  <i>thesmart@edu.com</i>
                </a>
                <a class="contact-block-01__phone" href="#">
                  <i>2222-2222</i>
                </a>
              </div>
              </div>
            </div>
      </div>
      <div class="menu">
        <div class="cont-subMenu">
        <nav class="navbar navbar-expand-lg navbar-light bg-faded">
          <a class="logo navbar-brand" href="#"><img src="img/logoAsdel.png" /></a>
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
                  <a class="dropdown-item" href="#">Geomarketing</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Nosotros</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="contact.html">Contacto</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" href="concepts.php">Conceptos</a>
              </li>
              <li>
                <a class="nav-link" href="projects.html">Albúm de proyectos</a>
              </li>  
            </ul>
          </div>
        </nav>
        </div>
      </div>
    </header>
      <div class="container">
        <br>
        <div class="row">
          <div class="col-4">
            <h3>Conceptos</h3>
          </div>
          <div class="col-8">
            <div class="d-flex flex-row-reverse">
              <form class="navbar-form navbar-left" accept-charset="utf-8" method="POST">
                <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                      <input type="text" class="dropdown-toggle form-control" name="busqueda" id="busqueda" value="" placeholder="Buscar..." maxlength="30" autocomplete="off" />
                    <ul class="dropdown-menu dropdown-cart" role="menu" id="resultadoBusqueda">
                        
                    </ul>
                  </li>
                </ul>
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
              <!-- List group -->
              <?php
        //Obtiene TODO de la tabla
        $consulta="SELECT * from conceptos";
        $res=ejecutar($consulta);

        //Cuenta el número total de registros
        $total_registros = count($res);
        if($total_registros>0){
        //Obtiene el total de páginas existentes
        $total_paginas = ceil($total_registros / $cantidad_resultados_por_pagina); 

        //Realiza la consulta en el orden de ID ascendente (cambiar "id" por, por ejemplo, "nombre" o "edad", alfabéticamente, etc.)
        //Limitada por la cantidad de cantidad por página
        $consulta_resultados =ejecutar("
        SELECT * FROM conceptos 
        ORDER BY id_concepto ASC 
        LIMIT $empezar_desde, $cantidad_resultados_por_pagina");

        //Crea un bluce 'while' y define a la variable 'datos' ($datos) como clave del array
        //que mostrará los resultados por nombre
        echo "<div id='accordion'>";
          foreach ($consulta_resultados as $datos) {
?>

        <div class="card">
          <div class="card-header" id="headingOne">
            <h5 class="mb-0">
              <button class="btn btn-link" data-toggle="collapse" data-target=<?php echo '#'. $datos['id_concepto'] ?> aria-expanded="true" aria-controls=<?php echo $datos['id_concepto'] ?>>
                ¿Que Significa "<?php echo $datos['nombre_concepto']; ?>"
              </button>
            </h5>
          </div>

          <div id=<?php echo $datos['id_concepto'] ?> class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
            <div class="card-body">
              <?php echo $datos['definicion_concepto'] ?>
            </div>
          </div>
        </div>
<?php
}

echo "</div>";
?>

<hr>

<?php
//Crea un bucle donde $i es igual 1, y hasta que $i sea menor o igual a X, a sumar (1, 2, 3, etc.)
  //Nota: X = $total_paginas
  for ($i=1; $i<=$total_paginas; $i++) {
    //En el bucle, muestra la paginación
    echo "<a href='concepts.php?pagina=".$i."' class='btn btn-prymari'>".$i."</a>";
  }
}
else{
  ?>
  <div class="jumbotron">
          <h2 class="display-5">No existe ningun concepto</h2>
        
      </div>
<?php
}
?>
          </div>
        </div>
      </div>

        <!-- FOOTER -->
      <div class="container">
        <div class="row featurette">
            <div class="col-sm">
                 <h3>About us</h3>
        <p>
            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
        </p>
            </div>
            <div class="col-sm">
                  <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.uk/maps?f=q&source=s_q&hl=en&geocode=&q=15+Springfield+Way,+Hythe,+CT21+5SH&aq=t&sll=52.8382,-2.327815&sspn=8.047465,13.666992&ie=UTF8&hq=&hnear=15+Springfield+Way,+Hythe+CT21+5SH,+United+Kingdom&t=m&z=14&ll=51.077429,1.121722&output=embed"></iframe>
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
                <span>Made by Novum SV--2018</span>
            </div>
      </div>

      <script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
      crossorigin="anonymous"></script>
      <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
      crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js">        </script>
      <script>
        function buscar() {
            var textoBusqueda = $("input#busqueda").val();
          
            if (textoBusqueda != "") {
                $.post("buscar.php", {valorBusqueda: textoBusqueda}, function(mensaje) {
                    $("#resultadoBusqueda").html(mensaje);
                }); 
            } else { 
                ("#resultadoBusqueda").html('');
          };
        };
      </script>
  </body>
</html>