<?php
SESSION_START();

if (!isset($_SESSION['usuario'])) {
    //si no hay sesion activa 
    header("location:index.php");
} else {
    include 'conexion.php';
    date_default_timezone_set('America/Lima');
    $fecha = new DateTime();
    $fecha = $fecha->format('Y-m-d');
    $id = $_GET['id'];

    if (!isset($id)) {
        header("location:../page-ver-grupos.php");
    }

    $buscar = "SELECT cursoestudiante.*, cursodetalle.*, curso.*, turno.*, semestre.*, estudiante.* FROM cursoestudiante "
            . "LEFT JOIN cursodetalle ON cursoestudiante.CursoEstudianteCursoDet=cursodetalle.CursoDetalleId "
            . "LEFT JOIN estudiante ON cursoestudiante.CursoEstudianteAlumno=estudiante.EstudianteCui "
            . "LEFT JOIN curso ON cursodetalle.CursoDetalleCurso=curso.CursoId "
            . "LEFT JOIN turno ON cursodetalle.CursoDetalleTurno=turno.TurnoId "
            . "LEFT JOIN semestre ON cursodetalle.CursoDetalleSemestre=semestre.SemestreId "
            . "WHERE cursoestudiante.CursoEstudianteCursoDet='$id' ";

    $cursodetalle = $conexion->query($buscar) or die($conexion->error);
//    if ($row = $discoB->fetch_assoc()) {
//        
//    }
    if ($cursodetalle->num_rows === 0) {
        header("location:page-ver-grupos.php");
    }
    $res = $cursodetalle->fetch_assoc();
    ?>
    <!DOCTYPE html>
    <html lang="es">

        <head >
            <title>Asistencia Alumnos</title>
            <!--Let browser know website is optimized for mobile-->
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <!-- Favicons-->
            <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">


            <!-- CORE CSS-->    
            <link href="css/materialize.css" type="text/css" rel="stylesheet">
            <link href="css/style.css" type="text/css" rel="stylesheet" >
            <link href="css/estilos.css" type="text/css" rel="stylesheet" >


            <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->    
            <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" >


        </head>

        <body >

            <!-- //////////////////////////////////////////////////////////////////////////// -->

            <!-- START MAIN -->
            <div id="main">
                <!-- START WRAPPER -->
                <div class="wrapper">

                    <!-- START LEFT SIDEBAR NAV-->
                    <?php include 'inc/menu.inc'; ?>
                    <!-- END LEFT SIDEBAR NAV-->

                    <!-- //////////////////////////////////////////////////////////////////////////// -->

                    <!-- START CONTENT -->
                    <section id="content">

                        <!--breadcrumbs start-->
                        <div id="breadcrumbs-wrapper" class=" grey lighten-3">
                            <div class="container">
                                <div class="row">
                                    <div class="col s12 m12 l12">
                                        <h5 class="breadcrumbs-title">Asistencia Alumnos</h5>
                                        <ol class="breadcrumb">
                                            <li class=" grey-text lighten-4">Gestion de Curso
                                            </li>
                                            <li class="active blue-text" >Asistencia Alumno</li>

                                        </ol>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--breadcrumbs end-->

                        <!--start container-->
                        <div class="container">
                            <div class="row">



                                <div class="section">

                                    <div id="roboto">


                                        <div class="row">
                                            <div class="col s12 m12 l12">
                                                <h4 class="header2">Asistencia de alumnos<br> Curso: <b><?php echo $res['CursoNombre'] . " - " . $res['TurnoDetalle'] ?></b> <br>Semestre: <?php echo$res['SemestreDetalle']; ?></h4>
                                            </div>
                                            <div class="col s12 m12 l12">

                                                <?php
                                                $consultaCantAlumnos = "SELECT asistenciaestudiante.*, cursoestudiante.*,cursodetalle.*,estudiante.* FROM `asistenciaestudiante`
    LEFT JOIN cursoestudiante ON cursoestudiante.CursoEstudianteId=asistenciaestudiante.AsistenciaEstudianteCursoEst
    LEFT JOIN cursodetalle ON cursoestudiante.CursoEstudianteCursoDet=cursodetalle.CursoDetalleId
    LEFT JOIN estudiante ON cursoestudiante.CursoEstudianteAlumno=estudiante.EstudianteCui
    WHERE cursodetalle.CursoDetalleId='$id'
    GROUP BY CursoEstudianteId";
                                                $resultadoAlumnos = $conexion->query($consultaCantAlumnos) or die($conexion->error);
                                                $consultaCantFechas = "SELECT asistenciaestudiante.*, cursoestudiante.*,cursodetalle.* FROM `asistenciaestudiante`
LEFT JOIN cursoestudiante ON cursoestudiante.CursoEstudianteId=asistenciaestudiante.AsistenciaEstudianteCursoEst
LEFT JOIN cursodetalle ON cursoestudiante.CursoEstudianteCursoDet=cursodetalle.CursoDetalleId
WHERE cursodetalle.CursoDetalleId='$id'
GROUP BY asistenciaestudiante.AsistenciaEstudianteFecha";
                                                $resultadoFechas = $conexion->query($consultaCantFechas) or die($conexion->error);
                                                ?>

                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th>CUI</th>
                                                            <th>Estudiante</th>
                                                            <?php
                                                            while ($columna = $resultadoFechas->fetch_assoc()) {
                                                                echo"<th>" . $columna['AsistenciaEstudianteFecha'] . "</th>";
                                                            }
                                                            ?>

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        while ($fila = $resultadoAlumnos->fetch_assoc()) {

                                                            echo "<tr>";
                                                            echo "<td>" . $fila['CursoEstudianteAlumno'] . "</td>";
                                                            echo "<td>" . $fila['EstudianteNombre'] . " " . $fila['EstudianteApellido'] . "</td>";
                                                            $alumnoCurso = $fila['AsistenciaEstudianteCursoEst'];
                                                            $consultaFechaAlumno = "SELECT asistenciaestudiante.*, cursoestudiante.*,cursodetalle.* FROM `asistenciaestudiante`
    LEFT JOIN cursoestudiante ON cursoestudiante.CursoEstudianteId=asistenciaestudiante.AsistenciaEstudianteCursoEst
    LEFT JOIN cursodetalle ON cursoestudiante.CursoEstudianteCursoDet=cursodetalle.CursoDetalleId
    WHERE cursodetalle.CursoDetalleId='$id' AND asistenciaestudiante.AsistenciaEstudianteCursoEst='$alumnoCurso'";
                                                            $resultadoFechaAlumno = $conexion->query($consultaFechaAlumno) or die($conexion->error);
                                                            while ($asis = $resultadoFechaAlumno->fetch_assoc()) {
                                                                echo "<td>" . $asis['AsistenciaEstudianteAsistencia'] . "</td>";
                                                            }
                                                            echo "</tr>";
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>
                        <!--end container-->




                    </section>
                    <!-- END CONTENT -->

                    <!-- //////////////////////////////////////////////////////////////////////////// -->
                    <!-- START RIGHT SIDEBAR NAV-->
                    <aside id="right-sidebar-nav">

                    </aside>
                    <!-- LEFT RIGHT SIDEBAR NAV-->

                </div>
                <!-- END WRAPPER -->

            </div>
            <!-- END MAIN -->



            <!-- //////////////////////////////////////////////////////////////////////////// -->

            <!-- START FOOTER -->
            <?php include 'inc/footer.inc'; ?>
            <!-- END FOOTER -->


            <!-- ================================================
            Scripts
            ================================================ -->

            <!-- jQuery Library -->
            <script type="text/javascript" src="js/jquery-1.11.2.min.js"></script>    
            <!--materialize js-->
            <script type="text/javascript" src="js/materialize.js"></script>
            <!--scrollbar-->
            <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>

            <!-- data-tables -->
            <script type="text/javascript" src="js/plugins/data-tables/js/jquery.dataTables.min.js"></script>
            <script type="text/javascript" src="js/plugins/data-tables/data-tables-inventario.js"></script>

            <!--plugins.js - Some Specific JS codes for Plugin Settings-->
            <script type="text/javascript" src="js/plugins.js"></script>

            <script>




            </script>
        </body>

    </html>
    <?php
}
?>





