<?php

include '../conexion.php';
//var_dump($_POST);
date_default_timezone_set('America/Lima');
$fecha = new DateTime();
$id = $_GET['id'];
$fecha = $fecha->format('Y-m-d');

if (!isset($id)) {
    header("location:../page-ver-grupos.php");
}
$estado = 0;
$buscar = "SELECT * FROM asistenciadocente WHERE AsistenciaDocenteId='$id' AND AsistenciaDocenteFecha='$fecha' ";

$resultadoAsis = $conexion->query($buscar) or die($conexion->error);
//    if ($row = $discoB->fetch_assoc()) {
//        
//    }
if ($resultadoAsis->num_rows === 0) {

    $insertar = "INSERT INTO asistenciadocente ( AsistenciaDocenteId, AsistenciaDocenteFecha, AsistenciaDocenteAsistencia) VALUES ('$id','$fecha','1')";

    if ($conexion->query($insertar) == TRUE) {
        $estado = 1;
        //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
    } else {
        $estado = 0;
        //echo "Error, nombre de usuario existente";
    }
}else{
    $estado = 1;
}
$conexion->close();
echo $estado;
