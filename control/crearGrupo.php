<?php

include '../conexion.php';

//reciviendo datos del formulario

$curso = $_POST['curso'];
$docente= $_POST['docente'];
$turno=$_POST['turno'];
$semestre=$_POST['semestre'];
$aula=$_POST['aula'];

if (  !isset($curso) || !isset($docente) || !isset($turno) || !isset($semestre) || !isset($aula)) {
    header("location:../page-crear-grupo.php");
}

$insertar="INSERT INTO cursodetalle( CursoDetalleCurso, CursoDetalleDocente, CursoDetalleTurno, CursoDetalleSemestre, CursoDetalleAula) VALUES ('$curso', '$docente', '$turno', '$semestre', '$aula')";

if($conexion->query($insertar)==TRUE){
    echo '1';
    //echo "Registro exitoso";
        //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
}else{
    echo '0';
    //echo "Error, nombre de usuario existente";
}
$conexion->close();





