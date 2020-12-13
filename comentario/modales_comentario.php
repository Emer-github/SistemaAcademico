<?php
 include("../security/seguridad-secundary.php");
 ?>
<!-- Para mayor información acerca de los modales visite www.bootstrap.com-->
<form class="form-horizontal" action="guardar.php" method="POST"  accept-charset="utf-8"   autocomplete="off" role="form">
<!-- Metodo POST envia los valores a guardar.php-->
<div class="modal fade" id="modal_register" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
<center><h4 class="modal-title">Nuevo comentario.</h4></center>
</div>
<div class="modal-body">
<div class="nav-tabs-custom">
<ul class="nav nav-tabs"><br>
<li class="active"><a href="#activity" data-toggle="tab">Ingrese Datos</a></li>
</ul>
<div class="tab-content">
<div class="active tab-pane" id="activity">

<div class="form-group"><br>
	<label for="bussines_name" class="col-sm-3 control-label">Comentario:</label>
	<div class="col-sm-9">
		<textarea class="form-control" name="comentario" placeholder="Ingresar comentario." rows="4" required></textarea>
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
<!-- Modal para eliminar comentario -->
<form class="form-horizontal" action="eliminar.php" method="POST"  accept-charset="utf-8"   autocomplete="off" role="form">
<div class="modal fade" id="modal_rojo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
<h4 class="modal-title">Eliminar</h4>
</div>
<div class="modal-body">
<div class="nav-tabs-custom">
<img src="../img/warning.png">  <font size="4"> ¿Realmente desea eliminar el comentario?</font>
<input type="hidden" name="mod-del" id="mod-del" value="">

<div class="modal-footer">
<button type="button" class="btn btn-success" data-dismiss="modal"><span class="fa fa-close"> </span> Cancelar</button>
<button type="submit" id="guardar_datos" class="btn btn-danger"><span class="glyphicon glyphicon-saved"> </span> Aceptar</button>
</div>
</div>
</div>
</div> 
</div>
</div>
</form>
