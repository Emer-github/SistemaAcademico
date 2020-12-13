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
        include_once('../conexion/conexion.php');
        $conn = conexion();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consult = $conn->prepare("SELECT * FROM factura WHERE idfactura = '$id' ");
        $consult->execute();
        $data = $consult->fetch(PDO::FETCH_ASSOC);
        $idfactura = $data['idfactura'];
        $fechafac = $data['fecha'];
        $codigo = $data['codigo'];
        $tipo = $data['tipo'];
        $idtipo = $data['idtipo'];
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
 $command = "SELECT detallebanquete.cantidad,producto.nombre as nombrepr,producto.descripcion as descri,detallebanquete.precioactual,detallebanquete.subtotal FROM detallebanquete inner join producto
  on detallebanquete.idproducto = producto.idproducto WHERE idbanquete = '$idtipo'";
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
    $sql = "SELECT banquete.*,usuario.nombre as nombreusua,usuario.apellido as apellidousua, cliente.nombre as nombreclie,cliente.apellido as apellidoclie,cliente.direccion,cliente.telefono,cliente.dui FROM banquete inner join usuario on 
    banquete.idusuario= usuario.idusuario inner join cliente on banquete.idcliente = cliente.idcliente where idbanquete = $idtipo";
    $q = $conn->prepare($sql);
    $q->execute(array($id));

    $data = $q->fetch(PDO::FETCH_ASSOC);
    $nombres=$data['nombreusua']." ".$data['apellidousua'];
    $tele= $data['telefono'];
   
    $rowcount = $q->rowcount();


    if ($rowcount==0)
    {
    echo "<script>alert('Su factura no se puede generar!')</script>";
   echo " <style type='text/css'> body{ background: url(../imagenes/oscuro.jpg);}  </style>
   <body><center><img align='center' src='../imagenes/cerrito.png'><br><h1>*Lo Siento ha ocurrido un error!!!</h1></center></body>";
    echo "<script>window.close();</script>";
    exit;

    }


$que ="SELECT sum(cantidad) as cant,sum(subtotal) as totaldinero FROM detallebanquete  WHERE idbanquete = $idtipo";
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
  font-size: 10pt;
}
p { margin: 0pt; }
table.items {
  border: 0.1mm solid #000000;
}
td { vertical-align: top; }
.items td {
  border-left: 0.1mm solid #000000;
  border-right: 0.1mm solid #000000;
}
table thead td { background-color: #EEEEEE;
  text-align: center;
  border: 0.1mm solid #000000;
  font-variant: small-caps;
}
.items td.blanktotal {
  background-color: #EEEEEE;
  border: 0.1mm solid #000000;
  background-color: #FFFFFF;
  border: 0mm none #000000;
  border-top: 0.1mm solid #000000;
  border-right: 0.1mm solid #000000;
}
.items td.totals {
  text-align: right;
  border: 0.1mm solid #000000;
}
.items td.cost {
  text-align: "." center;
}
</style>
</head>
<body>

<!--mpdf
<htmlpageheader name="myheader">
<table border="0" width="100%" align="center" cellpading="0" cellspacing="0" style="" >
        <tbody><tr>
          <td width="20%" style="text-align: left;" ><img src="../img/logo.jpg" style="width:125px;"> </td>
          <td align="center" width="60%" style="">Restaurante Tridiman&iacute;a<br><br>Av. El progreso y Av. Francisco Gavidia, Calle Francisco Gavidia, Santiago Nonualco, Depto. La Paz.<br><br>Tel&eacute;fono: 0000 - 0000 y 0000 - 0000.</td>
          <td a width="30%" style="text-align: right;">Factura Comercial No.<span style="font-weight: bold; font-size: 12pt;">'.$codigo.'</span><br />
          <h3>REGISTRO No. 135486-5</h3>
          <h3>NIT: 0821-050869-107-0</h3><br />
          </td>
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

<div style="text-align: right">Fecha:&nbsp;'.$fecha.'</div>

<table width="100%" style="font-family: serif;" cellpadding="10"><tr>
<td width="45%" style="border: 0.1mm solid #888888; "><span style="font-size: 7pt; color: #555555; font-family: sans;">FACTURA A:</span><br /><br />NOMBRE:&nbsp;'.$nombrescompleto.'<br />DUI:&nbsp;'.$dui.'<br />TEL&Eacute;FONO:&nbsp;'.$telefonos.'<br />DIRECI&Oacute;N:&nbsp; '.$direcciones.'</td>
<td width="10%">&nbsp;</td>
<td width="45%" style="border: 0.1mm solid #888888;"><span style="font-size: 7pt; color: #555555; font-family: sans;">RESTAURANTE:</span><br /><br />RESPONSABLE VENTA:<br /><u>'.$nombres.'</u></td>
</tr></table>

<br />

<table class="items" width="100%" style="font-size: 9pt; border-collapse: collapse; " cellpadding="8">
<thead>
<tr>

<td width="10%">CANTIDAD</td>
<td width="55%">DESCRIPCI&Oacute;N</td>
<td width="20%">PRECIO UNITARIO</td>
<td width="15%">SUBTOTAL</td>
</tr>
</thead>
<tbody>';

    foreach($datoss as $row)
    {
        $html .='<!-- END ITEMS HERE --><tr>

<td align="center">'.$row['cantidad'].'</td>
<td align="center">'.$row['nombrepr'].'</td>
<td class="cost">$ '.$row['precioactual'].'</td>
<td class="cost">$ '.$row['subtotal'].'</td>
</tr>';
     }

$html .='
<!-- ITEMS HERE -->



<tr>
<td class="totals cost" colspan="0" ></td>
<td class="totals" style="text-align:left;">TOTAL (LETRAS) <b>'.numtoletras($totaldiner) .'</b></td>
<td class="totals">Subtotal:</td>
<td class="totals cost">$ '.number_format($totaldiner,2).'</td>

</tr>


<tr>
<td class="blanktotal" colspan="2"><center><b>LLENAR SI LA OPERACI&Oacute;N ES IGUAL O MAYOR A $200.00</b></center></td>
<td class="totals"><b>Total:</b></td>
<td class="totals cost"><b>$ '.number_format($totaldiner,2).'</b></td>
</tr>
<tr>
<td class="blanktotal" colspan="4" ><center>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Recibido por:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Entregado por:<br>
Nombre:&nbsp;_____________________&nbsp;&nbsp;Nombre:&nbsp;_____________________<br>
DUI:&nbsp;_____________________&nbsp;&nbsp;DUI:&nbsp;_____________________<br>
Firma:&nbsp;_____________________&nbsp;&nbsp;Firma:&nbsp;_____________________<br>
</center></td>

</tr>
</tbody>
</table>


<div style="text-align: center; font-style: italic;"><br><center>Gracias por su compra!<br></center></div>


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

$mpdf=new mPDF('c','A4','','',15,15,41,41,10,10); 
$mpdf->SetProtection(array('print'));
$mpdf->SetTitle("Factura Comercial de Banquete Para: ".$clientefecha);
$mpdf->SetAuthor("Ana Vaquerano");
$mpdf->SetWatermarkText("Tridimanía");
$mpdf->showWatermarkText = true;
$mpdf->watermark_font = 'DejaVuSansCondensed';





$mpdf->WriteHTML($html);


$mpdf->Output($clientefecha.'.pdf','I');

exit;

?>