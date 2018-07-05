<?php

include '../conexion.php';

//reciviendo datos del formulario
$id = $_POST['id'];
$nombre = $_POST['nombresecretaria'];
$ape = $_POST['apellidosecretaria'];
$telefono = $_POST['telefonosecretaria'];
$email = $_POST['emailsecretaria'];

if (!isset($id) || !isset($nombre) || !isset($ape) || !isset($telefono) || !isset($email) ) {
    header("location:../page-ver-secretaria.php");
}
$actualiza="UPDATE secretaria SET SecretariaNombre='$nombre' , SecretariaApellido='$ape' , SecretariaCorreo='$email',SecretariaTelefono='$telefono' WHERE SecretariaDni='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();