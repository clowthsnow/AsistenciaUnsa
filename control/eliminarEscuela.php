<?php

include '../conexion.php';

//reciviendo datos del formulario
$id = $_GET['id'];;
if (!isset($id) ) {
    header("location:../page-ver-escuela.php");
}
$actualiza="UPDATE escuela SET EscuelaEstReg='*' WHERE EscuelaId='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();
