<?php
  if(!empty($_POST)){
      include_once('../conexion/conexion.php');
      $conn = conexion();
      $nombre = $_POST["tipo_grd"];
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $consult = $conn->prepare("SELECT * FROM tipousuario where nombre = '$nombre'");
      $consult->execute();
      $data = $consult->fetch(PDO::FETCH_ASSOC);
      $nombres = $data['nombre'];
      if(($nombres ==  "") or ($nombre != $nombres)){
        include("tipo.php");
        $send = new tipo();
        $save = $send->guardar($nombre);

        $conn1 = conexion();
        $consult1 = $conn1->prepare("SELECT MAX(idtipoUsuario) as idmax FROM tipousuario");
        $consult1->execute();
        $data1 = $consult1->fetch(PDO::FETCH_ASSOC);
        $maxId = $data1['idmax'];
        echo $maxId;
        $save1 = $send->guardarMax($maxId);
        header("location:mostrar.php");
      }elseif($nombres == $nombre){
        echo "<script> alert('Ya existe $nombre. No puede repetir datos')</script>";
        echo"<meta http-equiv='refresh' content='0; url=http://localhost/SistemaAcademico/tipousuario/mostrar.php'/ >";
    }
  }else{
    header("location:mostrar.php");    
  }
?>
