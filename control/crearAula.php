<?php

include '../conexion.php';

//recibiendo datos del formulario

$escuela = $_POST['aulaescuela'];
$numero = $_POST['numeroaula'];
$ubicacion = $_POST['ubicacionaula'];



if (!isset($escuela) ||  !isset($numero)|| !isset($ubicacion)) {
    header("location:../page-crear-aula.php");
}

$insertar="INSERT INTO aula( AulaEscuela, AulaNumero, AulaUbiacion) VALUES ('$escuela','$numero','$ubicacion')";

if($conexion->query($insertar)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();

