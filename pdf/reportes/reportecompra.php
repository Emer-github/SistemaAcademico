<?php

//Permite solo que ingrese el usuario que ha iniciado sesion.
session_start();
if (!$_SESSION["ok"])

{

  header("location:../");
}

include '../../conexion/conexion.php';
$connection =conexion();

if (!empty(intval($_GET['desde']!=0)) and !empty(intval($_GET['hasta']!=0))) {

        $desde= $_GET['desde'];
        $hasta= $_GET['hasta'];

//Query con l tabla compra
        $sql = "SELECT compra.idcompra,compra.fechacompra,proveedor.empresa as nombreproveedor ,concat(usuario.nombre,' ',usuario.apellido) nombreusuario FROM compra inner join proveedor on compra.idproveedor=proveedor.idproveedor INNER JOIN usuario on compra.idusuario = usuario.idusuario  where  fechacompra BETWEEN '$desde' AND '$hasta' order by idcompra desc";

        $q = $connection->prepare($sql);
        //Ejecuta la consulta
        $q->execute();
        $total = $q->rowcount();
        $model = array();
        //arrary de datos
        while($rows = $q->fetch())
        {
            $model[] = $rows;
        }
       
    }elseif(!empty(intval($_GET['desde']==0)) and !empty(intval($_GET['hasta']==0))){
        $desde ="Todos".$hasta;
   
        $sql = "SELECT compra.idcompra,compra.fechacompra,proveedor.empresa as nombreproveedor ,concat(usuario.nombre,' ',usuario.apellido) as nombreusuario FROM compra inner join proveedor on compra.idproveedor=proveedor.idproveedor INNER JOIN usuario on compra.idusuario = usuario.idusuario order by idcompra";

        $q = $connection->prepare($sql);
        //Ejecuta la consulta
        $q->execute();
        $total = $q->rowcount();
        $model = array();
        //arrary de datos
        while($rows = $q->fetch())
        {
            $model[] = $rows;
        }

    }else
    {
        echo "<script>alert('Error. El reporte no puede mostrarse!')</script>";
   echo " <style type='text/css'> body{ background: url(../../img/logo.jpg);}  </style>
   <body><center><img align='center' src='../../img/logo.jpg'><br><h1>*Lo Siento ha ocurrido un error!!!</h1></center></body>";
    echo "<script>window.close();</script>";
    exit;
    }

  //hora y fecha
      date_default_timezone_set('America/El_Salvador'); 
    $fecha = date('d-m-Y g:i:s A');


$html = '
<html>
<head>
<style>
body {font-family: sans-serif;
  font-size: 10pt;
}
p { margin: 0pt; }

td { vertical-align: top; }

#ds tr td { 
  text-align: center;
  border: 0.1mm solid #000000;
  
}


</style>

</head>
<body>

<!--mpdf
<htmlpageheader name="myheader">
<table border="0" width="100%" align="center" cellpading="0" cellspacing="0" style="" >
        <tbody><tr>
          <td width="20%" style="text-align: left;" ><img src="../../img/logo.jpg" style="width:125px;"> </td>
          <td align="center" width="60%" style="">Restaurante Tridimaía</td>
          <td a width="30%" style="text-align: right;">Fecha Impresi&oacute;n.<br /><span style="font-weight: bold; font-size: 12pt;">'.$fecha.'</span></td>
        </tr>
      </tbody></table>
</htmlpageheader>


<htmlpagefooter name="myfooter">
<div style="border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; ">
P&aacute;gina {PAGENO} de {nb}
</div>
</htmlpagefooter>

<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->



<br />

<table id="ds" width="100%" style="font-size: 10pt; border-collapse: collapse; " cellpadding="10">
<tr>
<td colspan="4" style="background-color:#5BE66F;"><b>Reporte de Compra<b>&nbsp;&nbsp;&nbsp;'.$total.'&nbsp;&nbsp;&nbsp;registros</td>

<td colspan="2" style="background-color:#5BE66F;">';
if (($desde == 0) && ($hasta==0)) {
 $html .= $desde.$hasta;
}elseif  (($desde != 0) && ($hasta!=0)){
  $html .= date("d-m-Y", strtotime($desde))."  - ".date("d-m-Y", strtotime($hasta));
}


$html .='</td>


</tr>
<thead>
<tr style="background-color:#5BE66F;">
<td>ID</td>
<td>Fecha</td>
<td>Nombre Proveedor</td>
<td>Nombre Usuario</td>
<td>Cantidad Productos</td>
<td>Total a Pagar</td>


</tr>
</thead>

<tbody><!-- END ITEMS HERE -->';
     $sumat=0;
     
if ($total !=0) {
  # code...


foreach($model as $row)


    {
      

         include_once('../../conexion/conexion.php');
      $conn = conexion();

           $consult = $conn->prepare("SELECT sum(subtotal) as totales,sum(cantidad) as cant FROM detallecompra where idcompra = ".$row['idcompra']."");
         $consult->execute();

      $daa = $consult->fetch(PDO::FETCH_ASSOC);


      $totalas = $daa['totales'];
      $cant = $daa['cant'];

      
      $html .='<tr><td>'.$row["idcompra"].'</td>';
      
        $html.='<td>'.$row['fechacompra'].'</td>';

        $html .='<td>'.$row["nombreproveedor"].'</td>';

        $html .='<td>'.$row["nombreusuario"].'</td>';

        $html.='<td>'.$cant.'</td>'; 

         $html.='<td style="background-color:#dddddd;">'.$totalas.'</td>';

         $sumat+= $totalas;        

         

        

    
  
  

    }



  }else{

        echo "<script>alert('Error. No se encontraron datos que mostrar!')</script>";
   echo " <style type='text/css'> body{ background: url(../../img/logo.jpg);}  </style>
   <body><center><img align='center' src='../../img/logo.jpg'><br><h1>*Lo Siento ha ocurrido un error!!!</h1></center></body>";
    echo "<script>window.close();</script>";
    exit;
  }
 
$html .='</tr><tr><td align="right" colspan="5"><b>'."Total".'</b></td><td style="background-color:#aae599;"><b>'.number_format($sumat,2).'</b></td></tr>';
$html .='</tr>';


$html .=' 




</tbody>
</table>


</body>
</html>
';


//==============================================================
//==============================================================
//==============================================================
//==============================================================
//==============================================================
//==============================================================

include("../lib/pdf/mpdf.php");

$mpdf=new mPDF('c','A4','','',15,15,41,41,10,10); 
$mpdf->SetProtection(array('print'));
$mpdf->SetTitle("Reporte Compra");
$mpdf->SetAuthor("Ana Vaquerano");
$mpdf->SetWatermarkText("Tridimaía");
$mpdf->showWatermarkText = true;
$mpdf->watermark_font = 'DejaVuSansCondensed';





$mpdf->WriteHTML($html);


$mpdf->Output('Reporte Compra  '.$fecha.'.pdf','I');

exit;

?>