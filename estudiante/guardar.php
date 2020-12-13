<?php
if(!empty($_POST)){
    include_once('../conexion/conexion.php');
    $conn = conexion();
    //DATOS DEL ESTUDIANTE
    $nie = $_POST["estudianteNie"];
    $estudianteNombres = $_POST["estudianteNombres"];
    $estudianteApellidos = $_POST["estudianteApellidos"];
    $foto = $_POST["wizard-picture"];
    $estudianteNacimiento = $_POST["estudianteNacimiento"];
    $estudianteGenero = $_POST["estudianteGenero"];
    $estudianteNacionalidad = $_POST["estudianteNacionalidad"];
    $estudianteVive = $_POST["estudianteVive"];
    $estudianteTelefono = $_POST["estudianteTelefono"];
    $estudianteZona=$_POST["estudianteResidencia"];
    $estudianteDireccion=$_POST["estudianteDireccion"];
    $estudianteEnfermedades=$_POST["estudianteEnfermedades"];
    $estudianteAlergico=$_POST["estudianteAlergico"];

    //DATOS PADRE
    $padreDui=$_POST["padreDui"];
    $padreNombres=$_POST["padreNombres"];
    $padreApellidos=$_POST["padreApellidos"];
    $padreNacimiento=$_POST["padreNacimiento"];
    $padreProfesion=$_POST["padreProfesion"];
    $padreTelefono=$_POST["padreTelefono"];
    $padreDireccion=$_POST["padreDireccion"];

    //DATOS MADRE
    $madreDui=$_POST["madreDui"];
    $madreNombres=$_POST["madreNombres"];
    $madreApellidos=$_POST["madreApellidos"];    
    $madreNacimiento=$_POST["madreNacimiento"];
    $madreProfesion=$_POST["madreProfesion"];
    $madreTelefono=$_POST["madreTelefono"];
    $madreDireccion=$_POST["madreDireccion"];

    //DATOS RESPONSABLE
    $responsableDui=$_POST["responsableDui"];
    $responsableParentesco=$_POST["responsableParentesco"];
    $responsableNombres=$_POST["responsableNombres"];
    $responsableApellidos=$_POST["responsableApellidos"];
    $responsableNacimiento=$_POST["responsableNacimiento"];
    $responsableEstadoCivil=$_POST["responsableEstadoCivil"];
    $responsableProfesion=$_POST["responsableProfesion"];
    $responsableUltimoGrado=$_POST["responsableUltimoGrado"];
    $responsableTelefono=$_POST["responsableTelefono"];
    $responsableZona=$_POST["responsableResidencia"];
    $responsableDireccion=$_POST["responsableDireccion"];

    //conexion
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //GUARDAR ESTUDIANTE
    //verificar si el estudiante ya existe
    $consult = $conn->prepare("SELECT * FROM estudiante where nie = '$nie'");
    $consult->execute();
    $data = $consult->fetch(PDO::FETCH_ASSOC);
    $nieEst = $data['nie'];
    $nieEst;
    if(($nieEst ==  "") or ($nie != $nieEst)){
      include("estudiante.php");
      $sendEst = new estudiante();
      $saveEst = $sendEst->guardar($nie,$estudianteNombres,$estudianteApellidos,$foto,$estudianteNacimiento,$estudianteGenero,$estudianteNacionalidad,$estudianteVive,$responsableParentesco,$estudianteTelefono,$estudianteZona,$estudianteDireccion,$estudianteEnfermedades,$estudianteAlergico,$padreDui,$madreDui,$responsableDui);
    }else{
      echo "<script> alert('Ya existe el alumno. No puede repetir datos')</script>";
    }

    //GUARDAR PADRE
    //verificar si el padre ya existe
    $consultPadre = $conn->prepare("SELECT * FROM padre where dui='$padreDui'");
    $consultPadre->execute();
    $dataPadre = $consultPadre->fetch(PDO::FETCH_ASSOC);
    $duiP = $dataPadre['dui'];
    if(($duiP ==  "") or ($padreDui != $duiP)){
      include("../padre/padre.php");
      $sendPadre = new padre();
      $savePadre = $sendPadre->guardar($padreDui, $padreNombres, $padreApellidos,$padreNacimiento, $padreProfesion, $padreTelefono, $padreDireccion);
    }else{
      echo "<script> alert('Ya existe el padre. No puede repetir datos')</script>";
    }

    //GUARDAR MADRE
    //verificar si el padre ya existe
    $consultMadre = $conn->prepare("SELECT * FROM madre where dui='$madreDui'");
    $consultMadre->execute();
    $dataMadre = $consultMadre->fetch(PDO::FETCH_ASSOC);
    $duiM = $dataMadre['dui'];
    if(($duiM ==  "") or ($madreDui != $duiM)){
      include("../madre/madre.php");
      $sendMadre = new madre();
      $saveMadre = $sendMadre->guardar($madreDui, $madreNombres, $madreApellidos, $madreNacimiento, $madreProfesion, $madreTelefono, $madreDireccion);
    }else{
      echo "<script> alert('Ya existe el madre. No puede repetir datos')</script>";
    }

    //GUARDAR RESPONSABLE
    //verificar si el responsable ya existe
    $consultResp = $conn->prepare("SELECT * FROM responsable where dui='$responsableDui'");
    $consultResp->execute();
    $dataResp = $consultResp->fetch(PDO::FETCH_ASSOC);
    $duiR = $dataResp['dui'];
    if(($duiR ==  "") or ($responsableDui != $duiR)){
      include("../responsable/responsable.php");
      $sendResp = new responsable();
      $saveResp = $sendResp->guardar($responsableDui,$responsableNombres,
      $responsableApellidos,$responsableNacimiento,$responsableEstadoCivil,$responsableProfesion,$responsableUltimoGrado,$responsableTelefono,$responsableZona,$responsableDireccion);
    }else{
      echo "<script> alert('Ya existe el responsable. No puede repetir datos')</script>";
    }
    header("location:mostrar.php");
}else{
  header("location:mostrar.php");
}
?>
