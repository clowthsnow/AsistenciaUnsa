<?php

include '../conexion.php';

//reciviendo datos del formulario

$nombre = $_POST['nombresemestre'];
$inicio = $_POST['semestreinicio'];
$fin = $_POST['semestrefin'];


if (!isset($nombre) || !isset($inicio) || !isset($fin)) {
    header("location:../page-crear-semestre.php");
}

$insertar="INSERT INTO semestre( SemestreDetalle,SemestreInicio,SemestreFin) VALUES ('$nombre','$inicio','$fin')";

if($conexion->query($insertar)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();



