<?php

include '../conexion.php';

//reciviendo datos del formulario
$id = $_POST['id'];
$dni = $_POST['estudiantedni'];
$nombre = $_POST['estudiantenombre'];
$apellido = $_POST['estudianteapellido'];
$anio = $_POST['estudianteanio'];
$correo = $_POST['estudiantecorreo'];

if (!isset($id) || !isset($dni)||!isset($nombre)||!isset($apellido)||!isset($anio)||!isset($correo) ) {
    header("location:../page-ver-estudiantes.php");
}
$actualiza="UPDATE estudiante SET EstudianteDni='$dni',EstudianteNombre='$nombre',EstudianteApellido='$apellido',EstudianteAnio='$anio',EstudianteCorreo='$correo' WHERE EstudianteCui='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();