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
        $sql = "SELECT banquete.idbanquete,banquete.fechabanquete,concat(cliente.nombre,' ',cliente.apellido) as nombrecliente,concat(usuario.nombre,' ',usuario.apellido) as nombreusuario,banquete.estado FROM banquete inner join cliente on banquete.idcliente=cliente.idcliente INNER JOIN usuario on banquete.idusuario = usuario.idusuario where  fechabanquete BETWEEN '$desde' AND '$hasta' order by banquete.idbanquete desc";

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

        $sql1 = "SELECT venta.idventa,venta.fechaventa,concat(cliente.nombre,' ',cliente.apellido) as nombrecliente,concat(usuario.nombre,' ',usuario.apellido) as nombreusuario FROM venta inner join cliente on venta.idcliente=cliente.idcliente INNER JOIN usuario on venta.idusuario = usuario.idusuario where  fechaventa BETWEEN '$desde' AND '$hasta' order by venta.idventa desc";

        $q1 = $connection->prepare($sql1);
        //Ejecuta la consulta
        $q1->execute();
        $total1 = $q1->rowcount();
        $model1 = array();
        //arrary de datos
        while($rows1 = $q1->fetch())
        {
            $model1[] = $rows1;
        }
       $sql2 = "SELECT compra.idcompra,compra.fechacompra,proveedor.empresa as nombreproveedor ,concat(usuario.nombre,' ',usuario.apellido) nombreusuario FROM compra inner join proveedor on compra.idproveedor=proveedor.idproveedor INNER JOIN usuario on compra.idusuario = usuario.idusuario  where  fechacompra BETWEEN '$desde' AND '$hasta' order by idcompra desc";

        $q2 = $connection->prepare($sql2);
        //Ejecuta la consulta
        $q2->execute();
        $total2 = $q2->rowcount();
        $model2 = array();
        //arrary de datos
        while($rows2 = $q2->fetch())
        {
            $model2[] = $rows2;
        }
        $sql3 = "SELECT * FROM gastos where fecha BETWEEN '$desde' AND '$hasta' order by idgastos desc";

        $q3 = $connection->prepare($sql3);
        //Ejecuta la consulta
        $q3->execute();
        $total3 = $q3->rowcount();
        $model3 = array();
        //arrary de datos
        while($rows3 = $q3->fetch())
        {
            $model3[] = $rows3;
        }
    }elseif(!empty(intval($_GET['desde']==0)) and !empty(intval($_GET['hasta']==0))){
        $desde ="Todos".$hasta;
   
        $sql = "SELECT banquete.idbanquete,banquete.fechabanquete,concat(cliente.nombre,' ',cliente.apellido) as nombrecliente,concat(usuario.nombre,' ',usuario.apellido) as nombreusuario,banquete.estado FROM banquete inner join cliente on banquete.idcliente=cliente.idcliente INNER JOIN usuario on banquete.idusuario = usuario.idusuario order by banquete.idbanquete desc";

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
        $sql1 = "SELECT venta.idventa,venta.fechaventa,concat(cliente.nombre,' ',cliente.apellido) as nombrecliente,concat(usuario.nombre,' ',usuario.apellido) as nombreusuario FROM venta inner join cliente on venta.idcliente=cliente.idcliente INNER JOIN usuario on venta.idusuario = usuario.idusuario order by venta.idventa desc";

        $q1 = $connection->prepare($sql1);
        //Ejecuta la consulta
        $q1->execute();
        $total1 = $q1->rowcount();
        $model1 = array();
        //arrary de datos
        while($rows1 = $q1->fetch())
        {
            $model1[] = $rows1;
        }
       $sql2 = "SELECT compra.idcompra,compra.fechacompra,proveedor.empresa as nombreproveedor ,concat(usuario.nombre,' ',usuario.apellido) as nombreusuario FROM compra inner join proveedor on compra.idproveedor=proveedor.idproveedor INNER JOIN usuario on compra.idusuario = usuario.idusuario order by idcompra";

        $q2 = $connection->prepare($sql2);
        //Ejecuta la consulta
        $q2->execute();
        $total2 = $q2->rowcount();
        $model2 = array();
        //arrary de datos
        while($rows2 = $q2->fetch())
        {
            $model2[] = $rows2;
        }
        $sql3 = "SELECT * FROM gastos order by idgastos";

        $q3 = $connection->prepare($sql3);
        //Ejecuta la consulta
        $q3->execute();
        $total3 = $q3->rowcount();
        $model3 = array();
        //arrary de datos
        while($rows3 = $q3->fetch())
        {
            $model3[] = $rows3;
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
          <td align="center" width="60%" style="">Restaurante Tridimanía<br><br>
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

<td colspan="3" style="background-color:#5BE66F;">';
if (($desde == 0) && ($hasta==0)) {
 $html .= $desde.$hasta;
}elseif  (($desde != 0) && ($hasta!=0)){
  $html .= date("d-m-Y", strtotime($desde))."  - ".date("d-m-Y", strtotime($hasta));
}


$html .='</td>



</tr>
<thead>
<tr style="background-color:#5BE66F;">
<td>Tipo</td>
<td>Valor</td>
<td>Subtotal</td>


</tr>
</thead>

<tbody><!-- END ITEMS HERE -->';
     $sumat=0;

     
if ($total !=0) {
  # code...

include_once('../../conexion/conexion.php');
    $conn = conexion();

foreach($model as $row)
    {
         $consult = $conn->prepare("SELECT total as totales FROM banquete where idbanquete = ".$row['idbanquete']."");
       $consult->execute();

    $daa = $consult->fetch(PDO::FETCH_ASSOC);

    $totals=$daa['totales'];
    
    $totalas = $totals;
    $totalp+=$totalas;
    }
    
foreach($model1 as $row1)
    {
         $consult1 = $conn->prepare("SELECT sum(subtotal) as totales FROM detalleventa where idventa = ".$row1['idventa']."");
       $consult1->execute();
    $daa1 = $consult1->fetch(PDO::FETCH_ASSOC);
    $totals1=$daa1['totales'];    
    $totalas1 = $totals1;
    $totalp1+=$totalas1;
    }
foreach($model2 as $row2)
    {
         $consult2 = $conn->prepare("SELECT sum(subtotal) as totales,sum(cantidad) as cant FROM detallecompra where idcompra = ".$row2['idcompra']."");
       $consult2->execute();
    $daa2 = $consult2->fetch(PDO::FETCH_ASSOC);
    $totals2=$daa2['totales'];    
    $totalas2 = $totals2;
    $totalp2+=$totalas2;
    }
     foreach($model3 as $row3)
    {
         $consult3 = $conn->prepare("SELECT costo as totales FROM gastos where idgastos = ".$row3['idgastos']."");
       $consult3->execute();
    $daa3 = $consult3->fetch(PDO::FETCH_ASSOC);
    $totals3=$daa3['totales'];    
    $totalas3 = $totals3;
    $totalp3+=$totalas3;
    }
    $totalpt = $totalp + $totalp1;
    $totalpt2 = $totalp2 + $totalp3;
    $totalfinal = $totalpt - $totalpt2;
    $html .='<tr>
<td>Banquete</td>
<td style="background-color:#dddddd;">$ '.number_format($totalp,2).'</td>
<td rowspan="2" style="background-color:green;">$ '.number_format($totalpt,2).'</td></tr>';
    $html .='<tr>
<td>Venta</td>
<td style="background-color:#dddddd;">$ '.number_format($totalp1,2).'</td>

</tr>';
$html .='<tr>
<td>Compras</td>
<td style="background-color:#dddddd;">$ '.number_format($totalp2,2).'</td>
<td rowspan="2" style="background-color:red;"> $ '.number_format($totalpt2,2).'</td></tr>';
$html .='<tr>
<td>Gastos</td>
<td style="background-color:#dddddd;">$ '.number_format($totalp3,2).'</td>

</tr>';

  }else{

        echo "<script>alert('Error. No se encontraron datos que mostrar!')</script>";
   echo " <style type='text/css'> body{ background: url(../../img/logo.jpg);}  </style>
   <body><center><img align='center' src='../../img/logo.jpg'><br><h1>*Lo Siento ha ocurrido un error!!!</h1></center></body>";
    echo "<script>window.close();</script>";
    exit;
  }
 
if ($totalpt>=$totalpt2) {
  $html .='</tr><tr><td align="right" colspan="2"><b>Total:</b></td><td colspan="" style="background-color:green;"><b>$ '.number_format($totalfinal,2).'</b></td></tr>';
}elseif ($totalpt<$totalpt2) {
 $html .='</tr><tr><td align="right" colspan="2"><b>Total:</b></td><td colspan="" style="background-color:red;"><b>$ '.number_format($totalfinal,2).'</b></td></tr>';
}


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
$mpdf->SetTitle("Reporte Balance");
$mpdf->SetAuthor("Ana Vquerano");
$mpdf->SetWatermarkText("Tridimanía");
$mpdf->showWatermarkText = true;
$mpdf->watermark_font = 'DejaVuSansCondensed';



$mpdf->WriteHTML($html);


$mpdf->Output('Reporte Balance  '.$fecha.'.pdf','I');

exit;

?>