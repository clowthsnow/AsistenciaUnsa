<?php

include '../conexion.php';

//reciviendo datos del formulario
$id = $_GET['id'];;
if (!isset($id) ) {
    header("location:../page-ver-docentes.php");
}
$actualiza="UPDATE docente SET DocenteEstReg='*' WHERE DocenteDni='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();