<?php
	if(!empty($_POST)){
	    $mod_dui = $_POST["mod_dui"];
	 	$mod_nombres = $_POST['mod_nombres'];
	 	$mod_apellidos = $_POST['mod_apellidos'];
	 	$mod_nacimiento = $_POST['mod_nacimiento'];
	 	$mod_profesion = $_POST['mod_profesion'];
	 	$mod_telefono = $_POST['mod_telefono'];
	 	$mod_direccion = $_POST['mod_direccion'];
	    	include("padre.php");
	      	$send = new padre();
	      	$save = $send->editar($mod_dui, $mod_nombres, $mod_apellidos, $mod_nacimiento, $mod_profesion, $mod_telefono, $mod_direccion);
	      	header("location:mostrar.php");
	}else{
	    header("location:mostrar.php");		
	}

?>