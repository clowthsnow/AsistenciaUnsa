<?php

include '../conexion.php';

//reciviendo datos del formulario
$id = $_POST['id'];
$nombre = $_POST['nombreplan'];

if (!isset($id) || !isset($nombre) ) {
    header("location:../page-ver-planes.php");
}
$actualiza="UPDATE plan SET PlanNombre='$nombre' WHERE PlanId='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();