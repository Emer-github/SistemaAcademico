<?php
if(!empty($_GET)){
  
    include("../security/seguridad-primary.php");

    include("../menu/principal.php");

    $connection = conexion();
    $idTipo=$_GET['idTipo'];

    $sql = "SELECT permiso.*, tipousuario.nombre as nombre FROM permiso INNER JOIN tipousuario ON permiso.idtipoUsuario=tipousuario.idtipoUsuario WHERE permiso.idtipoUsuario='$idTipo'";
    $query = $connection->prepare($sql);
    $query->execute();
    $rowcount = $query->rowcount();

    $model = array();
    while($rows = $query->fetch())
    {
        $model[] = $rows;
    }
    foreach($model as $row){

    $nombreTipoUsuario=$row['nombre'];
?>
<script type="text/javascript" src="editar.js"></script>
<div class="form-panel"><hr>
  <h1><?php echo "Permisos de usuario: ".$nombreTipoUsuario; ?></h1>
<hr>
<center>
<div class="table table-responsive">
<table class="table table-stripped table-bordered table-hover">
<tr class="success">
<th  style="text-align: center;">Módulo Usuarios</th>
<th  style="text-align: center;">Permiso</th>
</tr>
<tr>
  <td>Módulo Usuarios</td>
    <?php 
    if ($row['moduloUsuarios'] == 1 ) {
      echo "<td align='center' width='10%' class='active'><a href='on_off_Permisos.php?idPermiso=".$row['idpermiso']."&idTipo=".$idTipo."&campo=moduloUsuarios&valor=0' class='btn btn-success btn-xs;'><i style='color:white;' class='fa fa-check-circle'></i></a></td>";
    }elseif ($row['moduloUsuarios'] == 0 ){
      echo "<td align='center' width='10%' class='active'><a href='on_off_Permisos.php?idPermiso=".$row['idpermiso']."&idTipo=".$idTipo."&campo=moduloUsuarios&valor=1' class='btn btn-danger btn-xs;'><i style='color:white;' class='fa fa-times-circle'></i></a></td>";
    } 
   ?>
</tr>
<tr>
  <td>Módulo Docentes</td>
    <?php 
    if ($row['moduloDocente'] == 1 ) {
      echo "<td align='center' width='10%' class='active'><a href='on_off_Permisos.php?idPermiso=".$row['idpermiso']."&idTipo=".$idTipo."&campo=moduloDocente&valor=0' class='btn btn-success btn-xs;'><i style='color:white;' class='fa fa-check-circle'></i></a></td>";
    }elseif ($row['moduloUsuarios'] == 0 ){
      echo "<td align='center' width='10%' class='active'><a href='on_off_Permisos.php?idPermiso=".$row['idpermiso']."&idTipo=".$idTipo."&campo=moduloDocente&valor=1' class='btn btn-danger btn-xs;'><i style='color:white;' class='fa fa-times-circle'></i></a></td>";
    } 
   ?>
</tr>
<tr>
  <td>Módulo Currículum</td>
    <?php 
    if ($row['moduloCurriculum'] == 1 ) {
      echo "<td align='center' width='10%' class='active'><a href='on_off_Permisos.php?idPermiso=".$row['idpermiso']."&idTipo=".$idTipo."&campo=moduloCurriculum&valor=0' class='btn btn-success btn-xs;'><i style='color:white;' class='fa fa-check-circle'></i></a></td>";
    }elseif ($row['moduloUsuarios'] == 0 ){
      echo "<td align='center' width='10%' class='active'><a href='on_off_Permisos.php?idPermiso=".$row['idpermiso']."&idTipo=".$idTipo."&campo=moduloCurriculum&valor=1' class='btn btn-danger btn-xs;'><i style='color:white;' class='fa fa-times-circle'></i></a></td>";
    } 
   ?>
</tr>
<tr>
  <td>Módulo Ciclo</td>
    <?php 
    if ($row['moduloCiclo'] == 1 ) {
      echo "<td align='center' width='10%' class='active'><a href='on_off_Permisos.php?idPermiso=".$row['idpermiso']."&idTipo=".$idTipo."&campo=moduloCiclo&valor=0' class='btn btn-success btn-xs;'><i style='color:white;' class='fa fa-check-circle'></i></a></td>";
    }elseif ($row['moduloUsuarios'] == 0 ){
      echo "<td align='center' width='10%' class='active'><a href='on_off_Permisos.php?idPermiso=".$row['idpermiso']."&idTipo=".$idTipo."&campo=moduloCiclo&valor=1' class='btn btn-danger btn-xs;'><i style='color:white;' class='fa fa-times-circle'></i></a></td>";  
    } 
   ?>
</tr>
<tr>
  <td>Módulo Grado</td>
    <?php 
    if ($row['moduloGrado'] == 1 ) {
      echo "<td align='center' width='10%' class='active'><a href='on_off_Permisos.php?idPermiso=".$row['idpermiso']."&idTipo=".$idTipo."&campo=moduloGrado&valor=0' class='btn btn-success btn-xs;'><i style='color:white;' class='fa fa-check-circle'></i></a></td>";
    }elseif ($row['moduloUsuarios'] == 0 ){
      echo "<td align='center' width='10%' class='active'><a href='on_off_Permisos.php?idPermiso=".$row['idpermiso']."&idTipo=".$idTipo."&campo=moduloGrado&valor=1' class='btn btn-danger btn-xs;'><i style='color:white;' class='fa fa-times-circle'></i></a></td>";
    } 
   ?>
</tr>
<tr>
  <td>Módulo Año Lectivo</td>
    <?php 
    if ($row['moduloLectivo'] == 1 ) {
      echo "<td align='center' width='10%' class='active'><a href='on_off_Permisos.php?idPermiso=".$row['idpermiso']."&idTipo=".$idTipo."&campo=moduloLectivo&valor=0' class='btn btn-success btn-xs;'><i style='color:white;' class='fa fa-check-circle'></i></a></td>";
    }elseif ($row['moduloUsuarios'] == 0 ){
      echo "<td align='center' width='10%' class='active'><a href='on_off_Permisos.php?idPermiso=".$row['idpermiso']."&idTipo=".$idTipo."&campo=moduloLectivo&valor=1' class='btn btn-danger btn-xs;'><i style='color:white;' class='fa fa-times-circle'></i></a></td>";
    } 
   ?>
</tr>
<tr>
  <td>Módulo Matrícula</td>
    <?php 
    if ($row['moduloMatricula'] == 1 ) {
      echo "<td align='center' width='10%' class='active'><a href='on_off_Permisos.php?idPermiso=".$row['idpermiso']."&idTipo=".$idTipo."&campo=moduloMatricula&valor=0' class='btn btn-success btn-xs;'><i style='color:white;' class='fa fa-check-circle'></i></a></td>";
    }elseif ($row['moduloUsuarios'] == 0 ){
      echo "<td align='center' width='10%' class='active'><a href='on_off_Permisos.php?idPermiso=".$row['idpermiso']."&idTipo=".$idTipo."&campo=moduloMatricula&valor=1' class='btn btn-danger btn-xs;'><i style='color:white;' class='fa fa-times-circle'></i></a></td>";
    } 
   ?>
</tr>
<tr>
  <td>Módulo Asignatura</td>
    <?php 
    if ($row['moduloAsignatura'] == 1 ) {
      echo "<td align='center' width='10%' class='active'><a href='on_off_Permisos.php?idPermiso=".$row['idpermiso']."&idTipo=".$idTipo."&campo=moduloAsignatura&valor=0' class='btn btn-success btn-xs;'><i style='color:white;' class='fa fa-check-circle'></i></a></td>";
    }elseif ($row['moduloUsuarios'] == 0 ){
      echo "<td align='center' width='10%' class='active'><a href='on_off_Permisos.php?idPermiso=".$row['idpermiso']."&idTipo=".$idTipo."&campo=moduloAsignatura&valor=1' class='btn btn-danger btn-xs;'><i style='color:white;' class='fa fa-times-circle'></i></a></td>";
    } 
   ?>
</tr>
<tr>
  <td>Módulo Documentos</td>
    <?php 
    if ($row['moduloDocumentos'] == 1 ) {
      echo "<td align='center' width='10%' class='active'><a href='on_off_Permisos.php?idPermiso=".$row['idpermiso']."&idTipo=".$idTipo."&campo=moduloDocumentos&valor=0' class='btn btn-success btn-xs;'><i style='color:white;' class='fa fa-check-circle'></i></a></td>";
    }elseif ($row['moduloUsuarios'] == 0 ){
      echo "<td align='center' width='10%' class='active'><a href='on_off_Permisos.php?idPermiso=".$row['idpermiso']."&idTipo=".$idTipo."&campo=moduloDocumentos&valor=1' class='btn btn-danger btn-xs;'><i style='color:white;' class='fa fa-times-circle'></i></a></td>";
    } 
   ?>
</tr>
<tr>
  <td>Módulo Estudiantes</td>
    <?php 
    if ($row['moduloEstudiante'] == 1 ) {
      echo "<td align='center' width='10%' class='active'><a href='on_off_Permisos.php?idPermiso=".$row['idpermiso']."&idTipo=".$idTipo."&campo=moduloEstudiante&valor=0' class='btn btn-success btn-xs;'><i style='color:white;' class='fa fa-check-circle'></i></a></td>";
    }elseif ($row['moduloUsuarios'] == 0 ){
      echo "<td align='center' width='10%' class='active'><a href='on_off_Permisos.php?idPermiso=".$row['idpermiso']."&idTipo=".$idTipo."&campo=moduloEstudiante&valor=1' class='btn btn-danger btn-xs;'><i style='color:white;' class='fa fa-times-circle'></i></a></td>";
    } 
   ?>
</tr>
<tr>
  <td>Módulo Padres</td>
    <?php 
    if ($row['moduloPadres'] == 1 ) {
      echo "<td align='center' width='10%' class='active'><a href='on_off_Permisos.php?idPermiso=".$row['idpermiso']."&idTipo=".$idTipo."&campo=moduloPadres&valor=0' class='btn btn-success btn-xs;'><i style='color:white;' class='fa fa-check-circle'></i></a></td>";
    }elseif ($row['moduloUsuarios'] == 0 ){
      echo "<td align='center' width='10%' class='active'><a href='on_off_Permisos.php?idPermiso=".$row['idpermiso']."&idTipo=".$idTipo."&campo=moduloPadres&valor=1' class='btn btn-danger btn-xs;'><i style='color:white;' class='fa fa-times-circle'></i></a></td>";
    } 
   ?>
</tr>
<tr>
  <td>Módulo Madres</td>
    <?php 
    if ($row['moduloMadres'] == 1 ) {
      echo "<td align='center' width='10%' class='active'><a href='on_off_Permisos.php?idPermiso=".$row['idpermiso']."&idTipo=".$idTipo."&campo=moduloMadres&valor=0' class='btn btn-success btn-xs;'><i style='color:white;' class='fa fa-check-circle'></i></a></td>";
    }elseif ($row['moduloUsuarios'] == 0 ){
      echo "<td align='center' width='10%' class='active'><a href='on_off_Permisos.php?idPermiso=".$row['idpermiso']."&idTipo=".$idTipo."&campo=moduloMadres&valor=1' class='btn btn-danger btn-xs;'><i style='color:white;' class='fa fa-times-circle'></i></a></td>";
    } 
   ?>
</tr>
<tr>
  <td>Módulo Responsables</td>
    <?php 
    if ($row['moduloResponsable'] == 1 ) {
      echo "<td align='center' width='10%' class='active'><a href='on_off_Permisos.php?idPermiso=".$row['idpermiso']."&idTipo=".$idTipo."&campo=moduloResponsable&valor=0' class='btn btn-success btn-xs;'><i style='color:white;' class='fa fa-check-circle'></i></a></td>";
    }elseif ($row['moduloUsuarios'] == 0 ){
      echo "<td align='center' width='10%' class='active'><a href='on_off_Permisos.php?idPermiso=".$row['idpermiso']."&idTipo=".$idTipo."&campo=moduloResponsable&valor=1' class='btn btn-danger btn-xs;'><i style='color:white;' class='fa fa-times-circle'></i></a></td>";
    } 
   ?>
</tr>
<?php
    }

?>
</table>
</div>
</center>

<!-- FORMULARIO DEL REGISTRO DEL USUARIO-->
 
</div>
  <?php
  include("../menu/footer.php");
?> 
      <!--footer end-->
                      
  </body>

</html>
<?php 
  }else{
    header("location:mostrar.php");    
  }

 ?>



