<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link href='http://fonts.googleapis.com/css?family=Arimo' rel='stylesheet' type='text/css'>    <link rel="shortcut icon" type="image/x-icon" href="../Framework/img/icono.ico">  
    <link rel="stylesheet" href="../Framework/css/bootstrap.css">
    <link rel="stylesheet" href="../Framework/css/estilo.css">
</head>
<body id="body">
	

	<div class="container">    
        
    <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3"> 
        
        <div class="panel panel-default" >
            <div class="panel-heading">
                <div class="panel-title text-center">Asdel</div>
            </div>     

            <div class="panel-body" >

                <form action="ini.php" name="form" id="form" class="form-horizontal" enctype="multipart/form-data" method="POST">
                   
                    <div class="input-group col-md-10 col-md-offset-1">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="user" type="text" class="form-control" name="usuario" value="" placeholder="Usuarios">                                        
                    </div>

                    <div class="input-group col-md-10 col-md-offset-1">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="contrasena" placeholder="Contraseña">
                    </div>                                                                  

                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 col-md-4  col-md-offset-3 controls">
                            <button type="submit" href="#" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Log in</button>                          
                        </div>
                    </div>

                </form>     

            </div>                     
        </div>  
    </div>
</div>

<div id="particles"></div>
<script type="text/javascript" src="../Framework/js/vendor/jquery.js"></script>
<script type="text/javascript" src="../Framework/js/vendor/particle.js"></script>
</body>
</html>