<?php
	include_once('../conexion/conexion.php');
    $conn = conexion();
  if (!empty($_POST['mod_email'])) {
  	$idusuario = $_POST['mod_id'];
    $email=$_POST['mod_email'];
    $usuario=$_POST['mod_usuario'];

    //funcion que generar contraseña aleatoria y para mostrar o enviarla al correo
	function passs_randow($length = 8){
		//Caracteres que lleva la contraseña aleatoria
		$charset ="ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijkemnopqrstuvwxyz0123456789%$/()?";
		$password= "";
		//Structura repetitiva para elegir la contraseña
		for ($i=0; $i < $length; $i++) {
			$rand = rand()%strlen($charset);
			$password .= substr($charset, $rand,1);
		}
		return $password;
	} 
	//definimos las cantidad de caracteres que quermos que tenga nuestar nueva contraseña
	$newpass = passs_randow(7);
	//Actualizamos en la base de datos la nueva contraseña
	$squery = "UPDATE usuario SET clave = MD5('$newpass'), intentos='0', bloqueado='0' where usuario = '$usuario'";
	//Ejecuta la consulta
	$stmt = $conn->prepare($squery);
	$stmt->execute();

	$from = "prograandro@gmail.com";
    $to = "martinez.emer.2015@gmail.com";
    $subject = "Correo de prueba";
    $message = "Su cuenta: ".$email.", ha sido reactivada y su nueva contraseña es: ".$newpass;
    $headers = "From:" . $from;
    mail($to,$subject,$message, $headers);
      	header("location:index.php?msg=true&ct=$newpass");
  }else{
  	header("location:index.php?msg=false");
  }
?>
