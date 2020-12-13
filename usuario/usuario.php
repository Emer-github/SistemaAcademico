<?php
class usuario{
	//definir variables para la clase usuario segun la tabla usuario en la base de datos
	var $id;
	var $usuario;
	var $clave;
	var $estado;
	var $intentos;
	var $bloqueado;
	var $idtipousuario;
	var $iddocente;

	//funcion que guardar los datos del usuario
	
	function guardar($usuario, $clave, $estado,$intentos,$bloqueado, $idtipousuario,$iddocente){
		try{
	 		include_once('../conexion/conexion.php');
	 		$conn = conexion();
	 		//prepare el sql and bind parameters
	 		$stmt = $conn->prepare('INSERT INTO usuario(usuario,clave,estado,intentos,bloqueado,idtipoUsuario,iddocente) VALUES(:a,md5(:b),:c,:d,:e,:f,:g)');
	 		$stmt->bindParam(':a',$a);
	 		$stmt->bindParam(':b',$b);
	 		$stmt->bindParam(':c',$c);
	 		$stmt->bindParam(':d',$d);
	 		$stmt->bindParam(':e',$e);
	 		$stmt->bindParam(':f',$f);
	 		$stmt->bindParam(':g',$g);	
	 		//insert a row
	 		$a = $usuario;
	 		$b = $clave;
	 		$c = $estado;
	 		$d = $intentos;
	 		$e = $bloqueado;
	 		$f = $idtipousuario;
	 		$g = $iddocente; 
	 		$stmt->execute();
	 		echo "<script> alert('Registro Almacenado')</script>";
	 	}catch(PDOExcepcion $e){
	 		echo "Error:".$e->getMessage();

	 	}
	}

	function editar($id,$idtipousuario){
		require_once('../conexion/conexion.php');
		$conn = conexion();
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE usuario SET idtipoUsuario = '$idtipousuario' where idusuario = '$id'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		header("location:mostrar.php");
	}
	var $nueva;
	function contra($id,$nueva)
	{
		require_once('../conexion/conexion.php');
		$conn = conexion();
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$sql = "UPDATE usuario SET clave = md5('$nueva') where idusuario = '$id'";
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		header("location:mostrar.php");
	}

	//funcion que sirve para desactivar usuario
	function desactivar($id){
		require_once('../conexion/conexion.php');
		$conn = conexion();
		try{
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE usuario SET estado = 'Inactivo' where idusuario = '$id'";
			$conn->exec($sql);
		}catch(PDOExcepcion $e){
 			echo "Error:".$e->getMessage();
	 	}		
	}

		//funcion que sirve para activar usuario
	function activar($id){
		require_once('../conexion/conexion.php');
		$conn = conexion();
		try{
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql = "UPDATE usuario SET estado = 'Activo' where idusuario = '$id'";
			$conn->exec($sql);
		}catch(PDOExcepcion $e){
 		echo "Error:".$e->getMessage();
 		}
	}
}
?>