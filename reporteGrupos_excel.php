<?php
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment;filename=Reporte_Grupos.xls");
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
    <td colspan="4" bgcolor="skyblue"><CENTER><strong>REPORTE CURSO-GRUPO-DOCENTE-AULA</strong></CENTER></td>
  </tr>
  <tr bgcolor="red">
    <td><strong>CURSO</strong></td>
    <td><strong>GRUPO</strong></td>
    <td><strong>DOCENTE</strong></td>
    <td><strong>AULA</strong></td>
  </tr>
<?php
$sql = "SELECT * FROM cursodetalle WHERE CursoDetalleEstReg='A'";
$resultado = $conexion->query($sql) or die($conexion->error);
while ($res = $resultado->fetch_assoc()) {
    echo "<tr>
        <td>" . $res['CursoDetalleCurso'] . "</td>
        <td>" . $res['CursoDetalleTurno'] . "</td>
        <td>" . $res['CursoDetalleDocente'] . "</td>
        <td>" . $res['CursoDetalleAula'] . "</td>
    </tr>";
}
?>﻿
</table>
</body>
</html>