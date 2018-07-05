<?php

include '../conexion.php';

//reciviendo datos del formulario
$codigo=$_POST['cursocodigo'];
$plan = $_POST['cursoplan'];
$nombre=$_POST['cursonombre'];
$silabus=$_POST['cursosilabus'];

if (!isset($codigo) || !isset($plan) || !isset($nombre) || !isset($silabus)) {
    header("location:../page-crear-curso.php");
}

$insertar="INSERT INTO curso(CursoId, CursoPlan, CursoNombre, CursoSilabus) VALUES ('$codigo', '$plan', '$nombre', '$silabus')";

if($conexion->query($insertar)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();



