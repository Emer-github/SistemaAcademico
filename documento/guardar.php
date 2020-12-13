<?php
  ob_start();
  session_start();
  if(!empty($_POST)){
      $tipo = $_POST["tipo"];
      $descripcion = $_POST["descripcion"];
      $usuario = $_SESSION['idusuario'];
      //dar formato a la fecha actual
      date_default_timezone_set('America/El_Salvador');
      $año = date('Y');
        //Inicio PDF
        $target_dir1 = "../img/documentos/";
        $carpeta1=$target_dir1;
        if (!file_exists($carpeta1)) {
            mkdir($carpeta1, 0777, true);
        }
            $image_name1 = time()."_".basename($_FILES["pdf_grd"]["name"]);
            $target_file1 = $target_dir1 . $image_name1;
            //datos del arhivo
              //$nombre_archivo = $_FILES['pdf_grd']['name'];
              //echo $tipo_archivo = $_FILES['pdf_grd']['type'];
              //echo $tipo_archivo = pathinfo($target_file1,PATHINFO_EXTENSION);
              $tamano_archivo = $_FILES['pdf_grd']['size'];
                
              //compruebo si las características del archivo son las que deseo
              if ($tamano_archivo > 10485760) {//10 mg
                  echo "La extensión o el tamaño de los archivos no es correcta. <br><br><table><tr><td><li>Se permiten archivos pdf o .docx<br><li>se permiten archivos de 10 mg máximo.</td></tr></table>";
              }else{
                  if (move_uploaded_file($_FILES['pdf_grd']['tmp_name'],$target_file1)){
                    $pdf=$target_dir1.$image_name1;
                      include("documento.php");
                      $send = new documento();
                      $save = $send->guardar($año,$tipo,$descripcion, $pdf, $usuario);
                      echo "El archivo ha sido cargado correctamente.";
                      header("location:mostrar.php");
                  }else{
                        $pdf="";
                        echo "<script> alert('Ocurrió algún error al subir el fichero. No pudo guardarse.')</script>";
                        header("location:mostrar.php");
                  }
              }
  }else{
    header("location:mostrar.php");    
  }
?>

