<?php

include '../conexion.php';

//reciviendo datos del formulario
$id = $_POST['id'];
$plan = $_POST['plan'];
$nombre = $_POST['nombre'];
$silabus=$_POST['silabus'];
if (!isset($id) || !isset($plan) || !isset($nombre) || !isset($silabus)) {
    header("location:../page-ver-cursos.php");
}
$actualiza="UPDATE curso SET CursoPlan='$plan', CursoNombre='$nombre', CursoSilabus='$silabus' WHERE CursoId='$id'";
if($conexion->query($actualiza) === TRUE){
    echo '1';
}else{
    echo '0';
}
$conexion->close();