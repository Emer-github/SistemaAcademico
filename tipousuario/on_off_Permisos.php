<?php
	include("../security/seguridad-primary.php");
	if (!empty($_GET['idPermiso'])) {
		echo $idPermiso=$_GET['idPermiso'];
		echo $idTipo=$_GET['idTipo'];
		echo $campo=$_GET['campo'];
		echo $valor=$_GET['valor'];
		include 'tipo.php';
		$enviar = new tipo();
		$enviar->editarPermisos($idPermiso,$campo,$valor,$idTipo);
		header("location:editarPermisos.php?idTipo=$idTipo");
	}else{
		header("location:mostrar.php");
	}

?>