<?php

include '../conexion.php';

//reciviendo datos del formulario
$id = $_POST['id'];
$escuela = $_POST['aulaescuela'];
$numero = $_POST['numeroaula'];
$ubicacion = $_POST['ubicacionaula'];


if (!isset($id) || !isset($escuela) || !isset($numero) || !isset($ubicacion) ) {
    header("location:../page-ver-aula.php");
}
$actualiza="UPDATE aula SET AulaEscuela='$escuela', AulaNumero='$numero', AulaUbiacion='$ubicacion' WHERE AulaId='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();