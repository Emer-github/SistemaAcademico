<?php
class curriculum{
	//definir variables para la clase usuario segun la tabla usuario en la base de datos
	var $id;
	var $año;
	var $curriculum;
	var $iddocente;

	//funcion que guardar los datos del usuario
	function guardar($año, $curriculum, $iddocente){
		try{
	 		include_once('../conexion/conexion.php');
	 		$conn = conexion();
	 		//prepare el sql and bind parameters
	 		$stmt = $conn->prepare('INSERT INTO curriculum(ahnio,curriculum,iddocente)VALUES(:a,:b,:c)');	
	 		$stmt->bindParam(':a',$a);
	 		$stmt->bindParam(':b',$b);
	 		$stmt->bindParam(':c',$c);
	 		//insert a row
	 		$a = $año;
	 		$b = $curriculum;
	 		$c = $iddocente;
	 
	 		$stmt->execute();
	 		echo "<script> alert('Registro Almacenado')</script>";
 	 	}catch(PDOExcepcion $e){
 			echo "Error:".$e->getMessage();
 		}
	}

	function editar($dui, $nombres, $apellidos, $nacimiento, $profesion, $telefono, $direccion){
		require_once('../conexion/conexion.php');
		$conn = conexion();
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE madre SET nombres = '$nombres', apellidos = '$apellidos', nacimiento = '$nacimiento', profesion = '$profesion', telefono = '$telefono', direccion = '$direccion' where dui = '$dui'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		header("location:mostrar.php");
	}
}
?>