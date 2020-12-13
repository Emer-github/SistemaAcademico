<?php

//Permite solo que ingrese el usuario que ha iniciado sesion.
session_start();
if (!$_SESSION["ok"])

{


  header("location:../index.php");
}

include 'convertidor.php';
if (!empty(intval($_GET['idfac']))) {

        $id = intval($_GET['idfac']);
        
    }else{

      $id = 0;
        echo "<script>alert('Su factura no se puede generar!')</script>";
   echo " <style type='text/css'> body{ background: url(../img/logo.jpg);}  </style>
   <body><center><img align='center' src='../../img/logo.jpg'><br><h1>*Lo Siento ha ocurrido un error!!!</h1></center></body>";
    echo "<script>window.close();</script>";
    exit;
    }

  //hora y fecha
      date_default_timezone_set('America/El_Salvador'); 
    $fecha = date('d-m-Y g:i:s A');



require_once  '../conexion/conexion.php'; 
    $conn = conexion();
//consult para seleccionar todos los datos de la venta

    //Consulta a la tabla y le damos un limite
 $command = "SELECT detalleventa.cantidad,producto.nombre as nombrepr,producto.descripcion as descri,detalleventa.precioactual,detalleventa.subtotal FROM detalleventa inner join producto
  on detalleventa.idproducto = producto.idproducto WHERE idventa = '$id'";
//Conexion donde ejecuta
$resultado = $conn->prepare($command);
$resultado->execute();
//Total de registros encontrados
$total = $resultado->rowcount();
//array
$data = array();

//Estructura ciclica de repeticion
while($rowss = $resultado->fetch())
{
    $datoss[] = $rowss;
}

  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT venta.*,usuario.nombre as nombreusua,usuario.apellido as apellidousua, cliente.nombre as nombreclie,cliente.apellido as apellidoclie,cliente.direccion,cliente.telefono,cliente.dui FROM venta inner join usuario on 
    venta.idusuario= usuario.idusuario inner join cliente on venta.idcliente = cliente.idcliente where idventa = $id";
    $q = $conn->prepare($sql);
    $q->execute(array($id));

    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nombres=$data['nombreusua']." ".$data['apellidousua'];
    $tele= $data['telefono'];
    $nom=$data['nombreusua'];
    $rowcount = $q->rowcount();


    if ($rowcount==0)
    {
    echo "<script>alert('Su factura no se puede generar!')</script>";
   echo " <style type='text/css'> body{ background: url(../imagenes/oscuro.jpg);}  </style>
   <body><center><img align='center' src='../imagenes/cerrito.png'><br><h1>*Lo Siento ha ocurrido un error!!!</h1></center></body>";
    echo "<script>window.close();</script>";
    exit;

    }


$que ="SELECT sum(cantidad) as cant,sum(subtotal) as totaldinero FROM detalleventa  WHERE idventa = $id";
 $qu = $conn->prepare($que);
    $qu->execute(array($id));

    $dato = $qu->fetch(PDO::FETCH_ASSOC);
    $totaldiner=$dato['totaldinero'];
     $cant=$dato['cant'];
    $mesr = $totaldiner*0.1;



   /* $query ="SELECT * FROM pago  WHERE idorden = $id";
 $quer= $conn->prepare($query);
    $quer->execute(array($id));

    $pagodata = $quer->fetch(PDO::FETCH_ASSOC);
    $pagocliente=$pagodata['pagocliente'];
    $cambiocliente=$pagodata['cambio'];
      $idord=$pagodata['idorden'];*/
     

date_default_timezone_set('America/El_Salvador'); 
    $fecha = date('d-m-Y g:i:s A');
  

$dat = date('d-m-y');



if ((($data['nombreclie']) =="&") && (($data['apellidoclie'])=="&")) {
 $nombrescompleto ="________________________________<br>";
 $clientefecha ="Cliente no registrado".$dat;
}else{
  $nombrescompleto=$data['nombreclie']." ".$data['apellidoclie'];
  $clientefecha =$nombrescompleto." ".$dat;
}

if ($data['dui'] == "") {
  $dui ="____________________________________<br>";
}else{
  $dui=$data['dui'];
}

if ($data['telefono'] == "") {
  $telefonos ="______________________________<br>";
}else{
  $telefonos=$data['telefono'];
}


if ($data['direccion'] == "") {
  $direcciones ="______________________________<br>";
}else{
  $direcciones=$data['direccion'];
}

$html = '
<html>
<head>
<style>
body {font-family: sans-serif;
  font-size: 8pt;
}
p { margin: 0pt; }

.items td.cost {
  text-align: "." center;
}
</style>
</head>
<body>

<!--mpdf
<htmlpageheader name="myheader">
</htmlpageheader>

<htmlpagefooter name="myfooter">

</htmlpagefooter>

<sethtmlpageheader name="myheader" value="on" show-this-page="1" />
<sethtmlpagefooter name="myfooter" value="on" />
mpdf-->


<table class="items" width="20%" border="" cellpadding="8">
<thead>
<tr><td width="100%" colspan="3"><center>RESTAURANTE TRIDIMAIA</center></td></tr>
<tr><td width="100%" colspan="3"><center>VUELVA PRONTO</center></td></tr>
<tr><td width="100%" colspan="3"><center>CONTROL INTERNO</center></td></tr>
<tr><td width="100%" colspan="3">AV.15 DE JUNIO CALLE</td></tr>
<tr><td width="100%" colspan="3">GALVEZ A SANTIAGO</td></tr>
<tr><td width="100%" colspan="3">NONUALCO, LA PAZ</td></tr>
<tr><td width="100%" colspan="3"><center>'.$fecha.'</center></td></tr>
<tr><td width="100%" colspan="3"><center>'.$nom.'&nbsp;&nbsp;&nbsp;&nbsp;'.$id.'</center></td></tr>
</thead>
<tbody>';

    foreach($datoss as $row)
    {
        $html .='<!-- END ITEMS HERE --><tr>
<td align="center" width="60%">'.$row['nombrepr'].'</td>
<td align="center" width="20%">'.$row['cantidad'].'</td>
<td class="cost" width="20%">$ '.$row['precioactual'].'</td>
</tr>';
     }

$html .='
<!-- ITEMS HERE -->



<tr>
<td class="totals cost"  >Subtotal</td>
<td></td>
<td class="totals cost">$ '.number_format($totaldiner,2).'</td>
</tr>


<tr>
<td class="totals"><b>Total:</b></td><td></td>
<td class="totals cost"><b>$ '.number_format($totaldiner,2).'</b></td>
</tr>

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


include("lib/pdf/mpdf.php");

$mpdf=new mPDF('c','A4','','',15,15,5,5,10,10); 
$mpdf->SetProtection(array('print'));
$mpdf->SetTitle("Factura Comercial de Venta Para: ".$clientefecha);
$mpdf->SetAuthor("Ana Vaquerano");
//$mpdf->SetWatermarkText("Tridimanía");
$mpdf->showWatermarkText = true;
$mpdf->watermark_font = 'DejaVuSansCondensed';





$mpdf->WriteHTML($html);


$mpdf->Output($clientefecha.'.pdf','I');

exit;

?>