<?php

include '../conexion.php';

//reciviendo datos del formulario
$codigo = $_GET['codigo'];

if (!isset($codigo)) {
    header("location:../page-asignar-alumnos.php");
}

$buscar = "SELECT * FROM estudiante WHERE EstudianteCui='$codigo'";
//echo "$buscar";
$result = $conexion->query($buscar);

$fila=$result->fetch_assoc();
    $licor=array("codigo"=>$fila['EstudianteCui'],"nombre"=>$fila['EstudianteNombre'],"apellido"=>$fila['EstudianteApellido']);

    //print_r($licor);
    echo json_encode($licor);

$conexion->close();

