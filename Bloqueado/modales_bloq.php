<?php
 include("../security/seguridad-secundary.php");
 ?>
<!-- Modal para activar un dato de x valor -->
<form class="form-horizontal" action="correo.php" method="POST"  accept-charset="utf-8"   autocomplete="off" role="form">
<div class="modal fade" id="modal_verde" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
<h4 class="modal-title">Desbloquear</h4>
</div>
<div class="modal-body">
<div class="nav-tabs-custom">
<img src="../img/success.png">  <font size="4"> ¿Realmente desea desbloquear este usuario?</font>
<input type="hidden" name="mod_id" id="mod_id" value="">
<input type="hidden" name="mod_email" id="mod_email" value="">
<input type="hidden" name="mod_usuario" id="mod_usuario" value="">

<div class="modal-footer">
<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-close"> </span> Cancelar</button>
<button type="submit" id="guardar_datos" class="btn btn-success"><span class="glyphicon glyphicon-saved"> </span> Aceptar</button>
</div>
</div>
</div>
</div> 
</div>
</div>
</form>