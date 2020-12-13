<?php  
ob_start();
//Permite solo que ingrese el usuario que ha iniciado sesion.
session_start();
  if (!$_SESSION["ok"]){
    //Direcciona a inicio /*Index.php
    header("location:../index.php");
  }
$usuario = $_SESSION['usuario'];
/*if ($user == 1) {
  echo "<script> alert('Bienvenido al sistema Sr@:  $usuario')</script>";
  echo"<meta http-equiv='refresh' content='0; url=http://localhost/EBooks/menu/menu.php'/ >";
}*/
include('../conexion/conexion.php');
$usuario = $_SESSION['usuario'];
$clave = $_SESSION['pass'];

$conn = conexion();
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $qg = $conn->prepare("SELECT usuario.*,tipousuario.nombre as nombretipo FROM usuario INNER JOIN tipousuario ON usuario.idtipoUsuario = tipousuario.idtipoUsuario where usuario = '$usuario' and clave = MD5('$clave')");
      $qg->execute();
      $tipo = $qg->fetch(PDO::FETCH_ASSOC)['nombretipo'];
?>

   <?php

   include("principal.php");


   ?>


<!-- Imagen que muestra el menu principal-->

 <div class="form-panel">  
 <div class="table-responsive">
<center><div class="responsive"><table class="responsive">
<tr>
<?php if ($tipo=='Directora'){ ?>
  <td><a href="../cliente/mostrar.php"><img class="producto responsive" src="../img/imagenes/clientes.jpg" title="CLIENTES"  width="170px" height="130px"></a>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
<?php } ?>

<td rowspan="20"><div id="galeria" class="producto responsive">
    </div>
</td>
<?php if ($tipo=='Directora'){ ?>
  <td>
    <a href="../produccion/mostrar.php"><img class="producto responsive" src="../img/imagenes/produccion.jpeg" title="PRODUCCIÓN" width="170px" height="130px"></a></td>
<?php } ?>
</tr>
<?php if ($tipo=='Directora'){ ?>
  <tr>
<td><a href="../proveedor/mostrar.php"><img class="producto responsive"  src="../img/imagenes/proveedor.jpg" title="PROVEEDOR" width="170px" height="130px"></a></td>
<td><a href="../venta/mostrar.php">
  <img class="producto responsive" src="../img/imagenes/compras.jpg" title="VENTA" width="170px" height="130px"></a></td>
</tr>
<tr>
<td><a href="../producto/mostrar.php"><img class="producto responsive" src="../img/imagenes/producto.jpeg" title="PRODUCTOS" width="170px" height="130px"></a></td>
<td><a href="../banquete/mostrar.php">
  <img class="producto responsive" src="../img/imagenes/banquete.jpg" title="BANQUETE" width="170px" height="120px"></a></td>
</tr>
<tr>
<td><a href="../usuario/mostrar.php"><img class="producto responsive" src="../img/imagenes/usuario.jpg" title="USUARIOS" width="170px" height="130px"></a></td>
<td><a href="../compra/mostrar.php">
  <img class="producto responsive" src="../img/imagenes/caja.jpg" title="COMPRA" width="170px" height="130px"></a></td>
</tr>
<?php } ?>


</div>
</div>
</div>
</center>
</table>
</div>
<p align="center">CENTRO ESCOLAR CATÓLICO NUESTRA SEÑORA DE LOS POBRES &copy; 2020</p>
<?php
include("footer.php")
?>
      <!--link rel="stylesheet" type="text/css" href="../css/estilos.css"-->
