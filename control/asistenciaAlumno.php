<?php

include '../conexion.php';
//var_dump($_POST);

$id = $_POST['cursodetid'];
$fecha = $_POST['fecha'];

    foreach ($_POST['asistencia'] as $valor) {
//        echo $valor;
        $insertar = "INSERT INTO asistenciaestudiante( AsistenciaEstudianteCursoEst, AsistenciaEstudianteFecha, AsistenciaEstudianteAsistencia) VALUES ('$valor', '$fecha', '1')";
//        echo $insertar;
//        echo "<br>";
        if ($conexion->query($insertar) == TRUE or die($conexion->error)) {
            echo '1';
            //echo "Registro exitoso";
            //header("location:../page-asignar-permisos-user.php?usuario=$user"."&nombre=$nombre"."&apellidos=$apellidos");
        } else {
            
            //echo "Error, nombre de usuario existente";
        }
        
    }


