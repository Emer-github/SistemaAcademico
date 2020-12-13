<?php
  if (!empty($_POST['comentario'])) {
    $comentario=$_POST['comentario'];
      include("comentario.php");
      $send = new comentario();
      $save = $send->guardar($comentario);
      header("location:comentar.php");
  }
?>
