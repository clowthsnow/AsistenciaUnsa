<?php
header("Content-type: application/vnd.ms-word");
header("Content-Disposition: attachment;filename=Reporte_Alumnos.doc");
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
    <td colspan="6" bgcolor="skyblue"><CENTER><strong>REPORTE DE ESTUDIANTES</strong></CENTER></td>
  </tr>
  <tr bgcolor="red">
    <td><strong>CODIGO</strong></td>
    <td><strong>DNI</strong></td>
    <td><strong>NOMBRE</strong></td>
    <td><strong>APELLIDO</strong></td>
    <td><strong>AÑO</strong></td>
    <td><strong>CORREO</strong></td>
  </tr>
<?php
$sql = "SELECT * FROM estudiante WHERE EstudianteEstReg='A'";
$resultado = $conexion->query($sql) or die($conexion->error);
while ($res = $resultado->fetch_assoc()) {
    echo "<tr>
        <td>" . $res['EstudianteCui'] . "</td>
        <td>" . $res['EstudianteDni'] . "</td>
        <td>" . $res['EstudianteNombre'] . "</td>
        <td>" . $res['EstudianteApellido'] . "</td>
        <td>" . $res['EstudianteAnio'] . "</td>
        <td>" . $res['EstudianteCorreo'] . "</td>
    </tr>";
}
?>﻿
</table>
</body>
</html>