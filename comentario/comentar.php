<?php
 include("../security/seguridad-primary.php");
 ?>
<?php
  include("../menu/principal.php");
?>
<!-- clase para dar fondo blanco a los dialogos segun categoria -->
<?php require_once("modales_comentario.php");?>
<script type="text/javascript" src="editar.js"></script>
<div class="form-panel">
  <hr>
  <center>
    <h1>¡En este espacio puede realizar sus comentarios dirigidos a la Directora!</h1>
  </center>
  <hr>
    <button type="button" class="btn btn-default tooltips" data-toggle="modal" data-target="#modal_register" data-placement="right" data-original-title="Agrega nuevo comentario."><i class="fa fa-plus"></i>&nbsp;Realizar Comentario</button>
  <hr>
<!-- FORMULARIO DEL REGISTRO DEL COMENTARIO-->
 
</div>
  <?php
  include("../menu/footer.php")
?> 
      <!--footer end-->
                      
  </body>

</html>



