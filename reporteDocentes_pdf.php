<?Php
require_once("dompdf/dompdf_config.inc.php");
include 'conexion.php';

$codigoHTML = '
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin tÃ­tulo</title>
</head>
<body>
<table width="100%" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="5" bgcolor="skyblue"><CENTER><strong>REPORTE DE DOCENTES</strong></CENTER></td>
  </tr>
  <tr bgcolor="red">
    <td><strong>DNI</strong></td>
    <td><strong>NOMBRE</strong></td>
    <td><strong>APELLIDO</strong></td>
    <td><strong>TELEFONO</strong></td>
    <td><strong>CORREO</strong></td>
  </tr>';

$sql = "SELECT * FROM docente WHERE DocenteEstReg='A'";
$resultado = $conexion->query($sql) or die($conexion->error);
while ($res = $resultado->fetch_assoc()) {

$codigoHTML.='
<tr>
    <td>'.$res['DocenteDni'].'</td>
    <td>'.$res['DocenteNombre'].'</td>
    <td>'.$res['DocenteApellido'].'</td>
    <td>'.$res['DocenteTelefono'].'</td>
    <td>'.$res['DocenteCorreo'].'</td>
</tr>';
}

$codigoHTML.='
</table>
</body>
</html>';
$codigoHTML=utf8_encode($codigoHTML);
$dompdf=new DOMPDF();
$dompdf->load_html($codigoHTML);
ini_set("memory_limit","128M");
$dompdf->render();
//$dompdf->stream("Reporte_tabla_usuarios.pdf");
$dompdf->stream("Reporte_Docentes.pdf");
?>﻿