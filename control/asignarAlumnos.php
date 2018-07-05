<?php

include '../conexion.php';

//reciviendo datos del formulario

$cursodet = $_GET['cursoDet'];
$alumno= $_GET['alumno'];


if (  !isset($cursodet) || !isset($alumno) ) {
    header("location:../page-asignar-alumnos.php?id=$cursodet");
}

$insertar="INSERT INTO cursoestudiante( CursoEstudianteCursoDet, CursoEstudianteAlumno) VALUES ('$cursodet', '$alumno')";

if($conexion->query($insertar)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();





