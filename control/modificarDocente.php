<?php

include '../conexion.php';

//reciviendo datos del formulario
$id = $_POST['id'];
$nombre = $_POST['docentenombre'];
$apellido = $_POST['docenteapellido'];
$telefono = $_POST['docentetelefono'];
$correo = $_POST['docentecorreo'];

if (!isset($id) || !isset($nombre)||!isset($apellido)||!isset($telefono)||!isset($correo)) {
    header("location:../page-ver-docentes.php");
}
$actualiza="UPDATE docente SET DocenteNombre='$nombre',DocenteApellido='$apellido',DocenteTelefono='$telefono',DocenteCorreo='$correo' WHERE DocenteDni='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();