<?php
 include("../security/seguridad-primary.php");
 require_once("../conexion/conexion.php");
//Variables de la conexión.    
$conn = conexion();
$usuario = $_SESSION['usuario'];
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $consult = $conn->prepare("SELECT * FROM usuario where usuario = '$usuario'");
       $consult->execute();

    $data = $consult->fetch(PDO::FETCH_ASSOC);
    $idusu = $data['idusuario'];
 ?>
<!DOCTYPE html>
  <meta charset="utf-8">  
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-compatible" content="IE-edge">
  <!-- script src="../js/listardatos.js"></script -->
    <!-- script src="../js/eliminar.js"></script -->
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/css.css">
  <link rel="shortcut icon" href="../img/logo.ico" />
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
  <script src="../bootstrap/js/bootstrap.min.js"></script>  
  <script src="../bootstrap/js/jQuery-2.1.4.min.js"></script>
  <!-- Bootstrap core CSS -->
  <!-- Latest compiled and minified JavaScript -->
<!-- FORMULARIO DEL REGISTRO DEL USUARIO-->
  </head>
  <body>
  <?php
   require_once("../menu/principal.php");
   ?>
   <div class="form-panel">
    <div class="container-fluid">
    <div class="row">
    <div class="col-xs-12">
    <div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="index.php" data-toggle="tab">Bloqueados</a></li>
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="Activos">
    <?php if (!empty($_GET['msg'])) { 
      $mensaje = $_GET['msg'];
      $contra = $_GET['ct'];
      if ($mensaje == 'false') {
        echo '<div  class="alert alert-danger">Contraseña no se actualizo</div>';
      }elseif ($mensaje == 'true') {
        echo '<div  class="alert alert-success">Contraseña actualizada<br>Nueva Contraseña: <strong>'.$contra.'</strong></div>';
      }
    } ?>
    <center><h3> Listado de usuarios bloqueados</h3></center>
    <div id="loader" class="text-center">
      <img src="../img/loader.gif"></div>
      <form class="form-horizontal">
            <div class="form-group">
            <div class="col-sm-6">
              <input type="text" class="form-control" id="q" placeholder="Buscar usuario" onkeyup="load(1)">
            </div>
            <button type="button" class="btn btn-default" onclick="load(1)"><span class='fa fa-search'></span> Buscar</button>
                        <div class="right">
            
            </div>
            </div>
          </form>
          <div id="loader" style="position: absolute; text-align: center; top: 55px;  width: 100%;display:none;"></div><!-- Carga gif animado--> 
          <div class="outer_div"></div><!-- Datos ajax Final-->
          </div>
    
    </div>
    </div>

                       </div>
                    </div>
                </div>
            </div>
    
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <!-- Latest compiled and minified JavaScript -->

    <?php
      include("busca.php"); 
      include("modales_bloq.php");
    ?> 
    </div>
</div>
  <?php
  include("../menu/footer.php")
?> 
  </body>
</html>

  <script>
  $(document).ready(function(){
    load(1);
  });
    function load(page){
      var q= $("#q").val();
      $("#loader").fadeIn('slow');
      $.ajax({
        url:'busca.php?action=ajax&page='+page+'&q='+q,
         beforeSend: function(objeto){
         $('#loader').html('<img src="../img/loader.gif"> Espere por favor...');
        },
        success:function(data){
          $(".outer_div").html(data).fadeIn('slow');
          $('#loader').html('');
          
        }
      })
    }
  </script>
