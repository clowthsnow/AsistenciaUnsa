<?php

include '../conexion.php';

//reciviendo datos del formulario
$id = $_POST['id'];
$nombre = $_POST['nombresemestre'];
$inicio = $_POST['semestreinicio'];
$fin = $_POST['semestrefin'];

if (!isset($id) || !isset($nombre)||!isset($inicio)||!isset($fin)) {
    header("location:../page-ver-semestres.php");
}
$actualiza="UPDATE semestre SET SemestreDetalle='$nombre',SemestreInicio='$inicio',SemestreFin='$fin' WHERE SemestreId='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();