<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;filename=Reporte_Cursos.xls");
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
    <td colspan="4" bgcolor="skyblue"><CENTER><strong>REPORTE DE CURSOS</strong></CENTER></td>
  </tr>
  <tr bgcolor="red">
    <td><strong>CODIGO</strong></td>
    <td><strong>PLAN DE ESTUDIOS</strong></td>
    <td><strong>NOMBRE</strong></td>
    <td><strong>SILABUS</strong></td>
  </tr>
<?php
$sql = "SELECT * FROM curso WHERE CursoEstReg='A'";
$resultado = $conexion->query($sql) or die($conexion->error);
while ($res = $resultado->fetch_assoc()) {
    echo "<tr>
        <td>" . $res['CursoId'] . "</td>
        <td>" . $res['CursoPlan'] . "</td>
        <td>" . $res['CursoNombre'] . "</td>
        <td>" . $res['CursoSilabus'] . "</td>
    </tr>";
}
?>﻿
</table>
</body>
</html>