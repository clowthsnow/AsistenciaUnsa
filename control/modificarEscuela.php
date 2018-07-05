<?php

include '../conexion.php';

//reciviendo datos del formulario
$id = $_POST['id'];
$nom = $_POST['nombreescuela'];
$tel = $_POST['telefonoescuela'];
$dir = $_POST['directorescuela'];
$sec = $_POST['secretariaescuela'];

if (!isset($id) || !isset($nom) || !isset($tel) || !isset($dir) || !isset($sec) ) {
    header("location:../page-ver-escuela.php");
}
$actualiza="UPDATE escuela SET EscuelaNombre='$nom', EscuelaTelefono='$tel' , EsxuelaDirector='$dir', EscuelaSecretaria='$sec' WHERE EscuelaId='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();