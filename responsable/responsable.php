<?php
class responsable{
	//definir variables para la clase usuario segun la tabla usuario en la base de datos
	var $dui;
	var $nombres;
	var $apellidos;
	var $nacimiento;
	var $estadoCivil;
	var $profesion;
	var $ultimoGrado;
	var $telefono;
	var $zona;
	var $direccion;

	//funcion que guardar los datos del usuario
	function guardar($dui,$nombres,$apellidos,$nacimiento,$estadoCivil,$profesion,$ultimoGrado,$telefono,$zona,$direccion){
		try{
	 		include_once('../conexion/conexion.php');
	 		$conn = conexion();
	 		//prepare el sql and bind parameters
	 		$stmt = $conn->prepare('INSERT INTO responsable(dui,nombres,apellidos,nacimiento,estadoCivil,profesion,ultimoGrado,telefono,zona,direccion) VALUES(:a,:b,:c,:d,:e,:f,:g,:h,:i,:j)');	
	 		$stmt->bindParam(':a',$a);
	 		$stmt->bindParam(':b',$b);
	 		$stmt->bindParam(':c',$c);
	 		$stmt->bindParam(':d',$d);
	 		$stmt->bindParam(':e',$e);
	 		$stmt->bindParam(':f',$f);
	 		$stmt->bindParam(':g',$g);
	 		$stmt->bindParam(':h',$h);	
	 		$stmt->bindParam(':i',$i);
	 		$stmt->bindParam(':j',$j);	
	 		//insert a row
	 		$a = $dui;
	 		$b = $nombres;
	 		$c = $apellidos;
	 		$d = $nacimiento;
	 		$e = $estadoCivil;
	 		$f = $profesion;
	 		$g = $ultimoGrado;
	 		$h = $telefono;
	 		$i = $zona;
	 		$j = $direccion;
	 
	 		$stmt->execute();
	 		echo "<script> alert('Registro Almacenado')</script>";
 	 	}catch(PDOExcepcion $e){
 			echo "Error:".$e->getMessage();
 		}
	}

	function editar($dui,$nombres,$apellidos,$nacimiento,$estadoCivil,$profesion,$ultimoGrado,$telefono,$zona,$direccion){
		require_once('../conexion/conexion.php');
		$conn = conexion();
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE responsable SET nombres = '$nombres', apellidos = '$apellidos', nacimiento = '$nacimiento', estadoCivil = '$estadoCivil', profesion = '$profesion', ultimoGrado = '$ultimoGrado', telefono = '$telefono', zona = '$zona', direccion = '$direccion' where dui = '$dui'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		header("location:mostrar.php");
	}
}
?>