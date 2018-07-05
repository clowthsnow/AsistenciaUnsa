<?php

include '../conexion.php';

//reciviendo datos del formulario
$id = $_POST['id'];
$nombre = $_POST['nombreturno'];

if (!isset($id) || !isset($nombre) ) {
    header("location:../page-ver-turnos.php");
}
$actualiza="UPDATE turno SET TurnoDetalle='$nombre' WHERE TurnoId='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();