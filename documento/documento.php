<?php
class documento{
	//definir variables para la clase usuario segun la tabla usuario en la base de datos
	var $id;
	var $año;
	var $tipo;
	var $descripcion;
	var $documento;
	var $idusuario;

	//funcion que guardar los datos del usuario
	function guardar($año, $tipo, $descripcion, $documento, $idusuario){
		try{
	 		include_once('../conexion/conexion.php');
	 		$conn = conexion();
	 		//prepare el sql and bind parameters
	 		$stmt = $conn->prepare('INSERT INTO documento(ahnio,tipo,descripcion,documento,idusuario)VALUES(:a,:b,:c,:d,:e)');	
	 		$stmt->bindParam(':a',$a);
	 		$stmt->bindParam(':b',$b);
	 		$stmt->bindParam(':c',$c);
	 		$stmt->bindParam(':d',$d);
	 		$stmt->bindParam(':e',$e);
	 		//insert a row
	 		$a = $año;
	 		$b = $tipo;
	 		$c = $descripcion;
	 		$d = $documento;
	 		$e = $idusuario;
	 
	 		$stmt->execute();
	 		echo "<script> alert('Registro Almacenado')</script>";
 	 	}catch(PDOExcepcion $e){
 			echo "Error:".$e->getMessage();
 		}
	}

	function editar($id, $tipo, $descripcion){
		require_once('../conexion/conexion.php');
		$conn = conexion();
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE documento SET tipo = '$tipo', descripcion = '$descripcion' where iddocumento = '$id'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		header("location:mostrar.php");
	}
}
?>