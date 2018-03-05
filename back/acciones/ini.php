<?php 
include 'conexion.php';
session_start();

$contador=0;
$resultado=ejecutar("SELECT * FROM users WHERE pass_user ='".$_POST['contrasena']."' AND email_user='".$_POST['usuario']."'");
foreach ($resultado as $key) {
	if($key['pass_user']==$_POST['contrasena']&&$key['email_user']==$_POST['usuario']){
		$contador++;
		$_SESSION['id']=$key['id_user'];
	}
}
if($contador!=0){
	echo '<html>
<head>
  <meta http-equiv="REFRESH" content ="0;url=../index.php">
</head>
</html>';
  }
  else if($contador==0){
	
	$_SESSION['mensaje']="Datos erroneos";
	echo '<html>
<head>
	<meta http-equiv="REFRESH" content ="0;url=../login.php">
</head>
</html>';
}

 ?>