<?php

include '../conexion.php';

//reciviendo datos del formulario

$cui = $_POST['estudiantecui'];
$dni = $_POST['estudiantedni'];
$nombre = $_POST['estudiantenombre'];
$apellido = $_POST['estudianteapellido'];
$anio = $_POST['estudianteanio'];
$correo = $_POST['estudiantecorreo'];


if ( !isset($nombre)||!isset($dni)||!isset($nombre)||!isset($apellido)||!isset($anio)||!isset($correo)) {
    header("location:../page-crear-estudiante.php");
}

$insertar="INSERT INTO estudiante( EstudianteCui,EstudianteDni,EstudianteNombre,EstudianteApellido,EstudianteAnio,EstudianteCorreo) VALUES ('$cui','$dni','$nombre','$apellido','$anio','$correo')";

if($conexion->query($insertar)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();



