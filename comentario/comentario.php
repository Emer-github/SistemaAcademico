<?php 
	class comentario{
		//definir variables para la clase comentario
		var $id;
		var $comentario;
		var $fecha;
		//funcion que guardar los datos del comentario
		function guardar($nombre){
			try{
				//dar formato a la fecha actual
                    date_default_timezone_set('America/El_Salvador');
                    $fecha = date('Y-m-d');
		 		include_once('../conexion/conexion.php');
		 		$conn = conexion();
		 		//prepare el sql and bind parameters
		 		$stmt = $conn->prepare('INSERT INTO comentario(comentario,fecha)
		 		 VALUES(:a,:b)');
		 		$stmt->bindParam(':a', $a);
		 		$stmt->bindParam(':b', $b);
		 		//insert a row
		 		$a = $nombre;
		 		$b = $fecha;
		 		$stmt->execute();
		 		echo "<script> alert('Registro Almacenado')</script>";
		 	}catch(PDOExcepcion $e){
		 		echo "Error:".$e->getMessage();
		 	}
		}
		//Función para eliminar comentario
		function eliminar($id){
			require_once('../conexion/conexion.php');
			$conn = conexion();
			try{
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "DELETE FROM comentario WHERE idcomentario='$id'";
				$conn->exec($sql);
			}catch(PDOExcepcion $e){
	 			echo "Error:".$e->getMessage();
	 		}
		}
	}
?>