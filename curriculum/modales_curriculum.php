
 <script type="text/javascript">

 //Funcion de validacion para que un input solo acepte letras

    function soloLetras(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
</script>

<script type="text/javascript">
//Funcion de validacion para que un input solo acepte numeros.
function justNumbers(e)
        {
        var keynum = window.event ? window.event.keyCode : e.which;
        if ((keynum == 8) || (keynum == 37) || (keynum == 39) || (keynum == 46))
        return true;

        return /\d/.test(String.fromCharCode(keynum));
        }
</script>
<!-- <script type="text/javascript">
function validate(){
	if(document.getElementById('minchar').value.length < 5) {
		alert('El campo debe tener al menos 5 carácteres.');
		}else{
		document.getElementById('form').submit();
	}
}
</script> -->
<?php
include "../security/seguridad-secundary.php";
?>
<form class="form-horizontal" action="guardar.php" method="POST" enctype="multipart/form-data" accept-charset="utf-8"   autocomplete="off" role="form">
<!-- Metodo POST envia los valores a guardar.php-->
<div class="modal fade" id="modal_curriculum" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
<center><h4 class="modal-title">Nuevo Currículum</h4></center>
</div>
<div class="modal-body">
<div class="nav-tabs-custom">
<ul class="nav nav-tabs">
<li class="active"><a href="#activity" data-toggle="tab">Ingrese Datos</a></li>
</ul>
<div class="tab-content">
<div class="active tab-pane" id="activity"><br>

<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Docente:</label>
<div class="col-sm-9">
<select class="form-control" name="docente" required="">
    <option disabled="" selected=""></option>
    <?php
require_once '../conexion/conexion.php';
$conn   = conexion();
$sql    = "SELECT * FROM docente WHERE idestado='1'";
$result = $conn->query($sql);
$rows   = $result->fetchAll();
foreach ($rows as $per) {
    echo "<option value='";
    echo $per['iddocente'];
    echo "'>";
    echo $per['nombres']." ".$per['apellidos'];
    echo "</option>";
}
?>
</select>
</div>
</div>
<div class="form-group"><br>
<label for="bussines_name" class="col-sm-3 control-label">Subir currículum (formato pdf o .docx):</label>
<div class="col-sm-9">
<input type="file" class="form-control" name="pdf_grd" required="">
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"> </span> Cerrar</button>
<button type="submit" id="guardar_datos" class="btn btn-primary"><span class="fa fa-save"> </span> Registrar</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</form>