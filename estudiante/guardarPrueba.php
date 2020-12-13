<?php

    $dui = "879546213";
    $nombres = "Tony";
    $apellidos = "Romas";
    $nacimiento = "1998-01-21";
    $estadoCivil = "Soltero/a";
    $profesion = "Chef";
    $ultimoGrado = "Técnico (Completo)";
    $telefono = "22558899";
    $zona = "Rural";
    $direccion = "San Vicente";
      include("responsable.php");
      $send = new responsable();
      $save = $send->guardar($dui,$nombres,$apellidos,$nacimiento,$estadoCivil,$profesion,$ultimoGrado,$telefono,$zona,$direccion);
      echo $save;

?>
