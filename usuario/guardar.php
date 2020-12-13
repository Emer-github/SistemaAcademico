<?php
if(!empty($_POST)){
    include_once('../conexion/conexion.php');
    $conn = conexion();
    $clave = $_POST["clave_grd"];
    $estado = $_POST["estado_grd"];
    $iddocente = $_POST["iddocente_grd"];
    $idtipousuario = $_POST["idtipousuario_grd"];
    $intentos = "0";
    $bloqueado ="0";

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $consu = $conn->prepare("SELECT * FROM docente where iddocente = '$iddocente'");
       $consu->execute();

    $da = $consu->fetch(PDO::FETCH_ASSOC);
    $usu = $da['dui'];

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //$consult = $conn->prepare("SELECT * FROM usuario where (usuario = '$usuario') or (iddocente = '$iddocente')");
    $consult = $conn->prepare("SELECT usuario.*, docente.nombres as docenteNombre, docente.apellidos as docenteApellido, docente.dui as dui FROM usuario inner join docente on usuario.iddocente = docente.iddocente where (usuario.usuario = '$usu') or (usuario.iddocente = '$iddocente')");
       $consult->execute();

    $data = $consult->fetch(PDO::FETCH_ASSOC);
    $usuarios = $data['usuario'];
    $iddoc = $data['iddocente'];
    $datos = $data['docenteNombre']." ".$data['docenteApellido'];
    $usuario = $data['dui'];
    if((($usuarios ==  "") or ($usuario != $usuarios)) and (($iddoc ==  "") or ($iddocente != $iddoc))){ 

      
         include("usuario.php");
      $send = new usuario();

      $save = $send->guardar($usu,$clave,$estado,$intentos,$bloqueado,$idtipousuario,$iddocente);
      echo $save;
      header("location:mostrar.php");
    }elseif ($iddoc == $iddocente or $usuarios == $usuario) {
      if($iddoc == $iddocente){
      echo "<script> alert('Ya existe un registro para éste docente: $datos. No puede repetir datos')</script>";
      echo"<meta http-equiv='refresh' content='0; url=http://localhost/SistemaAcademico/usuario/mostrar.php'/ >";
    }
      if($usuarios == $usuario){
      echo "<script> alert('Ya existe el usuario $usuario. No puede repetir datos')</script>";
      echo"<meta http-equiv='refresh' content='0; url=http://localhost/SistemaAcademico/usuario/mostrar.php'/ >";
    }
    }
}

?>
