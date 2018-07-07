<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;filename=Reporte_Docentes.xls");
include 'conexion.php';
?>
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
  </tr>
<?php
$sql = "SELECT * FROM docente WHERE DocenteEstReg='A'";
$resultado = $conexion->query($sql) or die($conexion->error);
while ($res = $resultado->fetch_assoc()) {
    echo "<tr>
        <td>" . $res['DocenteDni'] . "</td>
        <td>" . $res['DocenteNombre'] . "</td>
        <td>" . $res['DocenteApellido'] . "</td>
        <td>" . $res['DocenteTelefono'] . "</td>
        <td>" . $res['DocenteCorreo'] . "</td>
    </tr>";
}
?>﻿
</table>
</body>
</html>