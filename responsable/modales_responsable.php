
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
<!-- Modal para actualizar datos desde la bd -->
<form class="form-horizontal" action="editar.php" method="POST"  accept-charset="utf-8"   autocomplete="off" role="form">
<div class="modal fade" id="modal_update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
<center><h4 class="modal-title">Editar</h4></center>
</div>
<div class="modal-body">
<div class="nav-tabs-custom">
<ul class="nav nav-tabs"><br>
<li class="active"><a href="#activity" data-toggle="tab">Modifique Datos</a></li>
</ul>
<div class="tab-content">
<div class="active tab-pane" id="activity">
<input type="hidden" name="mod_dui" id="mod_dui" value="">

<div class="form-group"><br>
<label for="bussines_name" class="col-sm-3 control-label">Nombres:</label>
<div class="col-sm-9">
<!-- Evento solo minusculas-->
<input type="text" class="form-control" onkeypress="return soloLetras(event);" title="Ingresar más de 3 letras" placeholder="Ingresar nombres del padre de familia." pattern=".{3,44}" name="mod_nombres" id="mod_nombres" required="">

</div>
</div>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Apellidos:</label>
<div class="col-sm-9">
<!-- Evento solo minusculas-->
<input type="text" class="form-control" onkeypress="return soloLetras(event);" pattern=".{3,44}" placeholder="Ingresar apellidos del padre de familia." title="Ingresar más de 3 letras" name="mod_apellidos" id="mod_apellidos" required="">
</div>
</div>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Fecha de nacimiento:</label>
<div class="col-sm-9">
<!-- Evento solo minusculas-->
<input type="date" class="form-control" name="mod_nacimiento" id="mod_nacimiento" required="">
</div>
</div>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Estado Civil:</label>
<div class="col-sm-9">
<select class="form-control" name="mod_estadoCivil" id="mod_estadoCivil" required="">
  <option disabled="" selected=""></option>
  <option value="Soltero/a"> Soltero/a </option>
  <option value="Casado/a"> Casado/a </option>
  <option value="Acompañado/a"> Acompañado/a </option>
  <option value="Viudo/a"> Viudo/a </option>
  <option value="Divorciado/a"> Divorciado/a </option>
</select>
</div>
</div>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Profesión u Oficio:</label>
<div class="col-sm-9">
<!-- Evento solo minusculas-->
<input type="text" class="form-control" title="Ingresar más de 3 letras" placeholder="Ingresar la Profesión u oficio." pattern=".{3,44}" name="mod_profesion" id="mod_profesion" required="">

</div>
</div>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Grado de Estudio:</label>
<div class="col-sm-9">
<select class="form-control" name="mod_ultimoGrado" id="mod_ultimoGrado" required="">
  <option disabled="" selected=""></option>
  <option value="Ninguno"> Ninguno </option>
  <option value="Primer Grado"> Primer Grado </option>
  <option value="Segundo Grado"> Segundo Grado </option>
  <option value="Tercer Grado"> Tercer Grado </option>
  <option value="Cuarto Grado"> Cuarto Grado </option>
  <option value="Quinto Grado"> Quinto Grado </option>
  <option value="Sexto Grado"> Sexto Grado </option>
  <option value="Séptimo Grado"> Séptimo Grado </option>
  <option value="Octavo Grado"> Octavo Grado </option>
  <option value="Noveno Grado"> Noveno Grado </option>
  <option value="Bachillerato (Incompleto)"> Bachillerato (Incompleto) </option>
  <option value="Bachillerato (Completo)"> Bachillerato (Completo) </option>
  <option value="Técnico (Incompleto)"> Técnico (Incompleto) </option>
  <option value="Técnico (Completo)"> Técnico (Completo) </option>
  <option value="Universidad (Incompleta)"> Universidad (Incompleta) </option>
  <option value="Universidad (Completa)"> Universidad (Completa) </option>
</select>
</div>
</div>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Teléfono:</label>
<div class="col-sm-9">
<!-- Evento solo minusculas-->
<input type="text" class="form-control" title="Ingresa 8 digitos" placeholder="Ingresar el número de teléfono." pattern=".{8}" name="mod_telefono" id="mod_telefono" required="">

</div>
</div>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Zona de residencia:</label>
<div class="col-sm-9">
<select class="form-control" name="mod_zona" id="mod_zona" required="">
  <option disabled="" selected=""></option>
  <option value="Rural"> Rural </option>
  <option value="Urbana"> Urbana </option>
</select>
</div>
</div>
<div class="form-group">
<label for="bussines_name" class="col-sm-3 control-label">Dirección:</label>
<div class="col-sm-9">
<!-- Evento solo minusculas-->
<input type="text" class="form-control" title="Ingresar más de 20 letras" placeholder="Ingresar dirección." pattern=".{20,200}" name="mod_direccion" id="mod_direccion" required="">

</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal"><span class="fa fa-close"> </span> Cerrar</button>
<button type="submit" id="guardar_datos" class="btn btn-primary"><span class="fa fa-refresh"> </span> Actualizar</button>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</form>