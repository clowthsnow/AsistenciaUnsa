<?php

include '../conexion.php';

//reciviendo datos del formulario


$dni = $_POST['docentedni'];
$nombre = $_POST['docentenombre'];
$apellido = $_POST['docenteapellido'];
$telefono = $_POST['docentetelefono'];
$correo = $_POST['docentecorreo'];


if ( !isset($dni)||!isset($nombre)||!isset($apellido)||!isset($telefono)||!isset($correo)) {
    header("location:../page-crear-docente.php");
}

$insertar="INSERT INTO docente( DocenteDni,DocenteNombre,DocenteApellido,DocenteTelefono,DocenteCorreo) VALUES ('$dni','$nombre','$apellido','$telefono','$correo')";

if($conexion->query($insertar)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();



