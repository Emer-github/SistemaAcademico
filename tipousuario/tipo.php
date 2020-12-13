<?php 
//Permite solo que ingrese el usuario que ha iniciado sesion.
if (!$_SESSION["ok"]){
  header("location:../index.php");
}

class tipo{
	//definir variables para la clase usuario segun la tabla usuario en la base de datos
	var $nombre;
	var $idestado;
	//funcion que guardar los datos del usuario
	function guardar($nombre)
	{
		try{
	 		include_once('../conexion/conexion.php');
	 		$conn = conexion();
	 		$idestado = "1";
	 		//prepare el sql and bind parameters
	 		$stmt = $conn->prepare('INSERT INTO tipousuario(nombre,idestado)
	 		 VALUES(:a,:b)');
	 		$stmt->bindParam(':a', $a);
	 		$stmt->bindParam(':b', $b);
	 		//insert a row
	 		$a = $nombre;
	 		$b = $idestado;
	 		$stmt->execute();
	 		echo "<script> alert('Registro Almacenado')</script>";
	 	}catch(PDOExcepcion $e){
	 		echo "Error:".$e->getMessage();
	 	}
	}
	var $idMax;
	function guardarMax($idMax)
	{
		try{
	 		include_once('../conexion/conexion.php');
	 		$conn = conexion();
	 		$idestado = "1";
	 		//prepare el sql and bind parameters
	 		$stmt = $conn->prepare('INSERT INTO permiso(moduloUsuarios,moduloDocente,moduloCurriculum,moduloCiclo,moduloGrado,moduloLectivo,moduloMatricula,moduloAsignatura,moduloDocumentos,moduloEstudiante,moduloPadres,moduloMadres,moduloResponsable,idtipoUsuario) VALUES(:a,:b,:c,:d,:e,:f,:g,:h,:i,:j,:k,:l,:m,:n)');
	 		$stmt->bindParam(':a', $a);
	 		$stmt->bindParam(':b', $b);
	 		$stmt->bindParam(':c', $c);
	 		$stmt->bindParam(':d', $d);
	 		$stmt->bindParam(':e', $e);
	 		$stmt->bindParam(':f', $f);
	 		$stmt->bindParam(':g', $g);
	 		$stmt->bindParam(':h', $h);
	 		$stmt->bindParam(':i', $i);
	 		$stmt->bindParam(':j', $j);
	 		$stmt->bindParam(':k', $k);
	 		$stmt->bindParam(':l', $l);
	 		$stmt->bindParam(':m', $m);
	 		$stmt->bindParam(':n', $n);
	 		//insert a row
	 		$a = 0;
	 		$b = 0;
	 		$c = 0;
	 		$d = 0;
	 		$e = 0;
	 		$f = 0;
	 		$g = 0;
	 		$h = 0;
	 		$i = 0;
	 		$j = 0;
	 		$k = 0;
	 		$l = 0;
	 		$m = 0;
	 		$n = $idMax;
	 		$stmt->execute();
	 		echo "<script> alert('Registro Almacenado')</script>";
	 	}catch(PDOExcepcion $e){
	 		echo "Error:".$e->getMessage();
	 	}
	}
	var $id;
	function editar($nombre,$id){
		require_once('../conexion/conexion.php');
		$conn = conexion();
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE tipousuario SET nombre = '$nombre' where idtipoUsuario = '$id'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		header("location:mostrar.php");
	}
	//Editar permisoso
	var $idPermiso;
	var $campo;
	var $valor;
	var $idTipo;
	function editarPermisos($idPermiso,$campo,$valor,$idTipo){
		require_once('../conexion/conexion.php');
		$conn = conexion();
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE permiso SET $campo = '$valor' where idpermiso = '$idPermiso'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		//header("location:editarPermisos.php?idTipo='$idTipo'");
	}
	//funcion que sirve para desactivar registro
	function desactivar($id){
		require_once('../conexion/conexion.php');
		$conn = conexion();
		try{
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE tipousuario SET idestado = '2' where idtipoUsuario = '$id'";
			$conn->exec($sql);
		}catch(PDOExcepcion $e){
 			echo "Error:".$e->getMessage();
 		}
	}

	//funcion que sirve para activar registro
	function activar($id){
		require_once('../conexion/conexion.php');
		$conn = conexion();
		try{
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE tipousuario SET idestado = '1' where idtipoUsuario = '$id'";
			$conn->exec($sql);
		}catch(PDOExcepcion $e){
 			echo "Error:".$e->getMessage();
		}
	}
}
?>