<?php

include '../conexion.php';
//var_dump($_POST);

$id = $_POST['cursodetid'];
$fecha = $_POST['fecha'];
$estado = 0;

//var_dump($id);

//**************************************************************
//asistencia Docente
$buscar = "SELECT * FROM asistenciadocente WHERE AsistenciaDocenteId='$id' AND AsistenciaDocenteFecha='$fecha' ";

$resultadoAsis1 = $conexion->query($buscar) or die($conexion->error);
//    if ($row = $discoB->fetch_assoc()) {
//        
//    }
if ($resultadoAsis1->num_rows === 0) {

    $insertar = "INSERT INTO asistenciadocente ( AsistenciaDocenteId, AsistenciaDocenteFecha, AsistenciaDocenteAsistencia) VALUES ('$id','$fecha','1')";
    $conexion->query($insertar);
}

//**************************************************************
//    if ($row = $discoB->fetch_assoc()) {
//        
//    }
//if ($resultadoAsis->num_rows === 0) {

$buscarAlumnos = "SELECT * FROM cursoestudiante WHERE CursoEstudianteEstReg='A' AND CursoEstudianteCursoDet='$id'";
$cursodetalle = $conexion->query($buscarAlumnos) or die($conexion->error);
while ($res = $cursodetalle->fetch_assoc()) {
//    var_dump($res);
    $AsisCursoEst = $res['CursoEstudianteId'];

    $insertar = "INSERT INTO asistenciaestudiante( AsistenciaEstudianteCursoEst, AsistenciaEstudianteFecha, AsistenciaEstudianteAsistencia) VALUES ('$AsisCursoEst', '$fecha', '0')";
    if ($conexion->query($insertar) == TRUE) {

        foreach ($_POST['asistencia'] as $valor) {


            $actualiza = "UPDATE asistenciaestudiante SET AsistenciaEstudianteAsistencia='1' WHERE AsistenciaEstudianteCursoEst='$valor' AND AsistenciaEstudianteFecha='$fecha'";


            if ($conexion->query($actualiza) == TRUE or die($conexion->error)) {
                $estado = 1;
            } else {
                $estado = 0;
            }
        }
    } else {// ya existe y se quiere modificar la asistencia
        $buscar = "SELECT * FROM asistenciaestudiante WHERE AsistenciaEstudianteCursoEst='$AsisCursoEst' AND AsistenciaEstudianteFecha='$fecha' ";

        $resultadoAsis = $conexion->query($buscar) or die($conexion->error);
        $asistencia = $resultadoAsis->fetch_assoc();
//        var_dump($asistencia);
//        echo"modifica";
        
        $valor2 = $asistencia['AsistenciaEstudianteCursoEst'];
//        var_dump($asistencia);
//        var_dump($_POST['asistencia'] );
        if (in_array($asistencia['AsistenciaEstudianteCursoEst'], $_POST['asistencia'])) {


            $actualiza = "UPDATE asistenciaestudiante SET AsistenciaEstudianteAsistencia='1' WHERE AsistenciaEstudianteCursoEst='$valor2' AND AsistenciaEstudianteFecha='$fecha'";


            if ($conexion->query($actualiza) == TRUE or die($conexion->error)) {
                $estado = 1;
            } else {
                $estado = 0;
            }
        } else {

            $actualiza = "UPDATE asistenciaestudiante SET AsistenciaEstudianteAsistencia='0' WHERE AsistenciaEstudianteCursoEst='$valor2' AND AsistenciaEstudianteFecha='$fecha'";


            if ($conexion->query($actualiza) == TRUE or die($conexion->error)) {
                $estado = 1;
            } else {
                $estado = 0;
            }
        }
        
    }
}


echo $estado;
