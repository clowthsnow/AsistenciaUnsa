<?php

include '../conexion.php';

//recibiendo datos del formulario
$dni = $_POST['dniDirector'];
$nombre = $_POST['nombreDirector'];
$ape = $_POST['apellidoDirector'];
$telefono = $_POST['telefonoDirector'];
$email = $_POST['emailDirector'];


if (!isset($dni) ||  !isset($nombre)|| !isset($ape) || !isset($telefono) || !isset($email)) {
    header("location:../page-crear-director.php");
}

$insertar="INSERT INTO director( DirectorDni,DirectorNombre, DirectorApellido, DirectorTelefono, DirectorEmail) VALUES ('$dni','$nombre','$ape','$telefono','$email')";

if($conexion->query($insertar)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();
