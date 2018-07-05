<?php

include '../conexion.php';

//reciviendo datos del formulario
$codigo=$_POST['codigoescuela'];
$nombre=$_POST['nombreescuela'];
$telefono = $_POST['telefonoescuela'];
$director=$_POST['directorescuela'];
$secretaria=$_POST['secretariaescuela'];


if (!isset($codigo) || !isset($nombre) || !isset($telefono) || !isset($director) || !isset($secretaria)) {
    header("location:../page-crear-escuela.php");
}

$insertar="INSERT INTO escuela(EscuelaId,EscuelaNombre, EscuelaTelefono, EscuelaDirector, EscuelaSecretaria) VALUES ('$codigo','$nombre', '$telefono', '$director' , '$secretaria')";

if($conexion->query($insertar)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();



