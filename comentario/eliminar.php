<?php
	include("../security/seguridad-secundary.php");
	if (!empty($_POST['mod-del'])) {
		$id=$_POST['mod-del'];
		
		include 'comentario.php';
		$enviar = new comentario();
		$enviar->eliminar($id);
		header("location:index.php");

	}
?>