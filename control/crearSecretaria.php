<?php

include '../conexion.php';

//recibiendo datos del formulario
$dni = $_POST['dniSecretaria'];
$nombre = $_POST['nombreSecretaria'];
$ape = $_POST['apellidoSecretaria'];
$telefono = $_POST['telefonoSecretaria'];
$email = $_POST['emailSecretaria'];


if (!isset($dni) ||  !isset($nombre)|| !isset($ape) || !isset($telefono) || !isset($email)) {
    header("location:../page-crear-secretaria.php");
}

$insertar="INSERT INTO secretaria( SecretariaDni,SecretariaNombre, SecretariaApellido,SecretariaCorreo, SecretariaTelefono ) VALUES ('$dni','$nombre','$ape','$email','$telefono')";

if($conexion->query($insertar)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();
