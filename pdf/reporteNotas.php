<?php

//Permite solo que ingrese el usuario que ha iniciado sesion.
session_start();
if (!$_SESSION["ok"])

{


  header("location:../index.php");
}

include 'convertidor.php';
if (!empty(intval($_GET['idmatricula']))) {

        $id = intval($_GET['idmatricula']);
        include_once('../conexion/conexion.php');
        $conn = conexion();
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $consult = $conn->prepare("SELECT matricula.*,estudiante.nombres as estudianteNombres, estudiante.apellidos as estudianteApellidos, grado_docente.idgrado as idgrado, grado_docente.guia as iddocente, estudiante.direccion as estudianteDirec FROM matricula inner join estudiante on matricula.nie=estudiante.nie inner join grado_docente on matricula.idgradoDocente=grado_docente.idgradoDocente WHERE matricula.idmatricula = '$id' ");
        $consult->execute();
        $data = $consult->fetch(PDO::FETCH_ASSOC);
        $nie = $data['nie'];
        $estudianteApellidos = $data['estudianteApellidos'];
        $estudianteNombres = $data['estudianteNombres'];
        $idgrado = $data['idgrado'];
        $iddocente = $data['iddocente'];
        $estudianteDirec = $data['estudianteDirec'];
    }else{

      $id = 0;
        echo "<script>alert('Su factura no se puede generar!')</script>";
   echo " <style type='text/css'> body{ background: url(../img/logo.jpg);}  </style>
   <body><center><img align='center' src='../img/logo.jpg'><br><h1>*Lo Siento ha ocurrido un error!!!</h1></center></body>";
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
 $command = "SELECT * FROM notas WHERE idmatricula = '$id'";
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
    $sql = "SELECT grado_docente.*,grado.nombre as nombreGrado,docente.apellidos as apellidosDocente, docente.nombres as nombresDocente FROM grado_docente inner join grado on grado_docente.idgrado=grado.idgrado inner join docente on grado_docente.guia=docente.iddocente where grado_docente.guia = '$iddocente' and grado_docente.idgrado='$idgrado'";
    $q = $conn->prepare($sql);
    $q->execute(array($id));

    $data = $q->fetch(PDO::FETCH_ASSOC);
    $datosDocente=$data['nombresDocente']." ".$data['apellidosDocente'];
    $nombreGrado= $data['nombreGrado'];
    $ahnioGrado = $data['ahnio'];
   
    $rowcount = $q->rowcount();


    if ($rowcount==0)
    {
    echo "<script>alert('Su reporte no puede ser generado!')</script>";
   echo " <style type='text/css'> body{ background: url(../imagenes/oscuro.jpg);}  </style>
   <body><center><img align='center' src='../img/logo.jpg'><br><h1>*Lo Siento ha ocurrido un error!!!</h1></center></body>";
    echo "<script>window.close();</script>";
    exit;

    }

$dat = date('d-m-y');


/*
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
}*/

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
          <td align="center" width="60%" style="">CENTRO ESCOLAR CAT&oacute;LICO NUESTRA SEÑORA DE LOS POBRES<br><br>Av. El progreso y Av. Francisco Gavidia, Calle Francisco Gavidia, Santiago Nonualco, Depto. La Paz.<br><br>Tel&eacute;fono: 0000 - 0000 y 0000 - 0000.</td>
          <td a width="30%" style="text-align: right;">Constancia de notas<span style="font-weight: bold; font-size: 12pt;">$$codigo</span><br />
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
<td width="45%" style="border: 0.1mm solid #888888; "><span style="font-size: 7pt; color: #555555; font-family: sans;">Constancia a:</span><br /><br />NOMBRE:&nbsp;'.$nombrescompleto.'<br />NIE:&nbsp;'.$nie.'<br />TEL&Eacute;FONO:&nbsp;2334-5585<br />DIRECI&Oacute;N:&nbsp; '.$estudianteDirec.'</td>
<td width="10%">&nbsp;</td>
<td width="45%" style="border: 0.1mm solid #888888;"><span style="font-size: 7pt; color: #555555; font-family: sans;">RESTAURANTE:</span><br /><br />DOCENTE GU&Iacute;A:<br /><u>'.$datosDocente.'</u></td>
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
$mpdf->SetTitle("Factura Comercial de Venta Para: ".$clientefecha);
$mpdf->SetAuthor("CENTRO ESCOLAR CATÓLICO NUESTRA SEÑORA DE LOS POBRES");
$mpdf->SetWatermarkText("CENTRO ESCOLAR CATÓLICO NUESTRA SEÑORA DE LOS POBRES");
$mpdf->showWatermarkText = true;
$mpdf->watermark_font = 'DejaVuSansCondensed';





$mpdf->WriteHTML($html);


$mpdf->Output($clientefecha.'.pdf','I');

exit;

?>