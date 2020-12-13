<?php
class madre{
	//definir variables para la clase usuario segun la tabla usuario en la base de datos
	var $dui;
	var $nombres;
	var $apellidos;
	var $nacimiento;
	var $profesion;
	var $telefono;
	var $direccion;

	//funcion que guardar los datos del usuario
	function guardar($dui, $nombres, $apellidos, $nacimiento, $profesion, $telefono, $direccion){
		try{
	 		include_once('../conexion/conexion.php');
	 		$conn = conexion();
	 		//prepare el sql and bind parameters
	 		$stmt = $conn->prepare('INSERT INTO madre(dui,nombres,apellidos,nacimiento,profesion,telefono,direccion) VALUES(:a,:b,:c,:d,:e,:f,:g)');	
	 		$stmt->bindParam(':a',$a);
	 		$stmt->bindParam(':b',$b);
	 		$stmt->bindParam(':c',$c);
	 		$stmt->bindParam(':d',$d);
	 		$stmt->bindParam(':e',$e);
	 		$stmt->bindParam(':f',$f);
	 		$stmt->bindParam(':g',$g);
	 		//insert a row
	 		$a = $dui;
	 		$b = $nombres;
	 		$c = $apellidos;
	 		$d = $nacimiento;
	 		$e = $profesion;
	 		$f = $telefono;
	 		$g = $direccion;
	 
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