<?php

include '../conexion.php';

//reciviendo datos del formulario
$id = $_POST['id'];
$nombre = $_POST['nombredirector'];
$ape = $_POST['apellidodirector'];
$telefono = $_POST['telefonodirector'];
$email = $_POST['emaildirector'];

if (!isset($id) || !isset($nombre) || !isset($ape) || !isset($telefono) || !isset($email) ) {
    header("location:../page-ver-director.php");
}
$actualiza="UPDATE director SET DirectorNombre='$nombre' , DirectorApellido='$ape' , DirectorTelefono='$telefono', DirectorEmail='$email' WHERE DirectorDni='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();