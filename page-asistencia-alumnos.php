<?php
SESSION_START();

if (!isset($_SESSION['usuario'])) {
    //si no hay sesion activa 
    header("location:index.php");
} else {
    include 'conexion.php';
    date_default_timezone_set('America/Lima');
    $fecha = new DateTime();

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

        <head onload="ocultar()">
            <title>Asignar Alumnos</title>
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

        <body onload="ocultar()">

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
                                <div class="col s12 m12 l12">
                                    <div class="section">
                                        <div id="roboto">
                                            <h4 class="header">Asistencia Alumnos </h4>
                                            <p class="caption">
                                                En este panel usted podra realizar la asistencia de alumnos en los respectivos grupos de los cursos
                                                <br><?php
//                                                print_r($res);
//                                                echo $buscar;
                                                ?>
                                            </p>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <!-- Form with validation -->
                                                <div class="col offset-l1 s12 m12 l10">
                                                    <div class="card-panel">
                                                        <h4 class="header2">Asistencia alumnos<br> Curso: <b><?php echo $res['CursoNombre'] . " - " . $res['TurnoDetalle'] ?></b> <br>Semestre: <?php echo$res['SemestreDetalle']; ?></h4>
                                                        <div class="row">
                                                            <form id="create" class="col s12" action="control/asistenciaAlumno.php" method="POST">
                                                                <input type="text" hidden="true" name="cursodetid" id="cursodetid" value="<?php echo $id; ?>">
                                                                <input type="text" hidden="true" name="fecha" id="fecha" value="<?php echo $fecha->format('Y-m-d'); ?>">

                                                                <br>
                                                                <br>
                                                                <div class="row">

                                                                    <div class="col s12 m12 l12">
                                                                        <table id="data-table-simple" class="responsive-table display " cellspacing="0">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Codigo</th>
                                                                                    <th>Nombres</th>
                                                                                    <th>Asistencia</th>
                                                                                </tr>
                                                                            </thead>

                                                                            <tfoot>
                                                                                <tr>
                                                                                    <th>Codigo</th>
                                                                                    <th>Nombres</th>
                                                                                    <th>Asistencia</th>
                                                                                </tr>
                                                                            </tfoot>

                                                                            <tbody>
                                                                                <?php
//                                                                                $consultaUser = "SELECT * FROM plan WHERE PlanEstReg='A'";
//                                                                                $resultado = $conexion->query($consultaUser) or die($conexion->error);

                                                                                $cursodetalle2 = $conexion->query($buscar) or die($conexion->error);
                                                                                $cont = 0;
                                                                                while ($row = $cursodetalle2->fetch_assoc()) {
                                                                                    echo "<tr>
                                                                        <td data-codigo=" . $row['CursoEstudianteId'] . " id=\"alumno" . $cont . "\">" . $row['EstudianteCui'] . "</td>
                                                                                <td>" . $row['EstudianteApellido'] . " " . $row['EstudianteNombre'] . "</td>"
                                                                                    . "<td>  <input type=\"checkbox\" name=\"asistencia[]\" value=\"" . $row['CursoEstudianteId'] . "\" id=\"" . $row['CursoEstudianteId'] . "\" checked><label for=\"" . $row['CursoEstudianteId'] . "\" ></label></td>";

//
//                                                                                    echo "<td><a href=\"page-configurar-plan.php?id=" . $row['PlanId'] . "\"><span class=\"task-cat cyan\">Configurar</span></a></td>
//                                                                        <td><a href=\"control/eliminarPlan.php?id=" . $row['PlanId'] . "\" class=\"delete\"><span class=\"task-cat red\">Eliminar</span></a></td>
//                                                                        </tr>";
                                                                                    $cont++;
                                                                                }
//                                                                                
                                                                                ?>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>


                                                                </div>


                                                                <br>
                                                                <br>
                                                                <div class="divider"></div>

                                                                <div class="row">

                                                                    <div class="input-field col s12 l6 m6">
                                                                        <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Guardar
                                                                            <i class="mdi-image-edit left"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="input-field col s12 l6 m6">
                                                                        <a class="btn red waves-effect waves-light right"  onclick="cancelar()" >Cancelar
                                                                            <i class="mdi-content-save left"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>      

                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <!--end container-->


                            <!--modal error-->
                            <div id="modal1" class="modal">
                                <div class="modal-content">
                                    <h4 class="red-text">ERROR!!!</h4>
                                    <p>Intente de nuevo</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                                </div>
                            </div>
                            <!--modal error-->
                            <div id="modal2" class="modal">
                                <div class="modal-content">
                                    <h4 class="green-text">EXITO!!!</h4>
                                    <p>Registro exitoso.</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="page-ver-grupos.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                                </div>
                            </div>


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
                                                                            var contador = <?php echo $cont; ?>;

                                                                            $(document).ready(function () {

                                                                                // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered

                                                                                $('#modal2').modal();
                                                                                $('#modal1').modal();
                                                                            });





                                                                            var frm = $('#create');

                                                                            frm.submit(function (ev) {
                                                                                ev.preventDefault();
                                                                                $.ajax({
                                                                                    type: frm.attr('method'),
                                                                                    url: frm.attr('action'),
                                                                                    data: frm.serialize(),
                                                                                    success: function (respuesta) {
                                                                                        if (respuesta == 1) {
                                                                                            $('#modal2').openModal();
                                                                                            //document.location.href = "page-crear-proveedor.php";
                                                                                        } else {

                                                                                            $('#modal1').openModal();
                                                                                        }
                                                                                    }
                                                                                });
                                                                            });




            </script>
        </body>

    </html>
    <?php
}
?>



