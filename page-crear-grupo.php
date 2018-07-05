<?php
SESSION_START();

if (!isset($_SESSION['usuario'])) {
    //si no hay sesion activa 
    header("location:index.php");
} else {
    include 'conexion.php';
    $buscarCurso = "SELECT * FROM curso WHERE CursoEstReg='A'";
    $resultCurso = $conexion->query($buscarCurso);
    $buscarDocente = "SELECT * FROM docente WHERE DocenteEstReg='A'";
    $resultDocente = $conexion->query($buscarDocente);
    $buscarTurno = "SELECT * FROM turno WHERE TurnoEstReg='A'";
    $resultTurno = $conexion->query($buscarTurno);
    $buscarSemestre = "SELECT * FROM  semestre WHERE SemestreEstReg='A'";
    $resultSemestre = $conexion->query($buscarSemestre);
    $buscarAula = "SELECT * FROM aula WHERE AulaEstReg='A'";
    $resultAula = $conexion->query($buscarAula);

    $rs = $conexion->query("SELECT MAX(CursoDetalleId) AS id FROM cursodetalle");
    if ($row = $rs->fetch_assoc()) {
        $id = $row;
        $cod = $id['id'];
        if ($cod == NULL) {
            $codigo = 1;
        } else {
            $codigo = $cod + 1;
        }
    } else {
        $codigo = 1;
    }
    ?>
    <!DOCTYPE html>
    <html lang="es">

        <head>
            <title>Crear Grupos</title>
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

        <body>

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
                                        <h5 class="breadcrumbs-title">Crear Grupo</h5>
                                        <ol class="breadcrumb">
                                            <li class=" grey-text lighten-4">Gestion de Cursos
                                            </li>
                                            <li class="active blue-text" >Crear Grupo</li>

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
                                            <h4 class="header">Creación de Nuevos Grupos</h4>
                                            <p class="caption">
                                                En este panel usted podra crear nuevos grupos por cada curso existente respectivamente almacenados.
                                            </p>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <!-- Form with validation -->
                                                <div class="col offset-l2 s12 m12 l8">
                                                    <div class="card-panel">
                                                        <h4 class="header2">Nuevo Grupo</h4>
                                                        <div class="row">
                                                            <form id="create" class="col s12" action="control/crearGrupo.php" method="POST">

                                                                <div class="row">
                                                                    <div class="col s12 m12 l12">
                                                                        <label>Curso:</label>
                                                                        <select id="curso" class="browser-default" name="curso" required="">
                                                                            <option value="" disabled selected>Escoge el curso.</option>
                                                                            <?php while ($row = $resultCurso->fetch_assoc()) { ?>
                                                                                <option value="<?php echo $row['CursoId']; ?>"><?php echo $row['CursoNombre']; ?></option>
                                                                            <?php }
                                                                            ?>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="col s12 m12 l12">
                                                                        <label>Docente:</label>
                                                                        <select id="docente" class="browser-default" name="docente" required="">
                                                                            <option value="" disabled selected>Escoge el Docente.</option>
                                                                            <?php while ($row = $resultDocente->fetch_assoc()) { ?>
                                                                                <option value="<?php echo $row['DocenteDni']; ?>"><?php echo $row['DocenteNombre'] . " " . $row['DocenteApellido']; ?></option>
                                                                            <?php }
                                                                            ?>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <br>

                                                                <div class="row">
                                                                    <div class="col s12 m12 l12">
                                                                        <label>Turno:</label>
                                                                        <select id="turno" class="browser-default" name="turno" required="">
                                                                            <option value="" disabled selected>Escoge el Turno.</option>
                                                                            <?php while ($row = $resultTurno->fetch_assoc()) { ?>
                                                                                <option value="<?php echo $row['TurnoId']; ?>"><?php echo $row['TurnoDetalle']; ?></option>
                                                                            <?php }
                                                                            ?>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <br>

                                                                <div class="row">
                                                                    <div class="col s12 m12 l12">
                                                                        <label>Semestre:</label>
                                                                        <select id="semestre" class="browser-default" name="semestre" required="">
                                                                            <option value="" disabled selected>Escoge el Semestre.</option>
                                                                            <?php while ($row = $resultSemestre->fetch_assoc()) { ?>
                                                                                <option value="<?php echo $row['SemestreId']; ?>"><?php echo $row['SemestreDetalle']; ?></option>
                                                                            <?php }
                                                                            ?>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <br>

                                                                <div class="row">
                                                                    <div class="col s12 m12 l12">
                                                                        <label>Aula:</label>
                                                                        <select id="aula" class="browser-default" name="aula" required="">
                                                                            <option value="" disabled selected>Escoge el Aula.</option>
                                                                            <?php while ($row = $resultAula->fetch_assoc()) { ?>
                                                                                <option value="<?php echo $row['AulaId']; ?>"><?php echo $row['AulaUbicacion'] . "-" . $row['AulaNumero']; ?></option>
                                                                            <?php }
                                                                            ?>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <br>

                                                                <div class="divider"></div>
                                                                <div class="row">
                                                                    <div class="input-field col s12">
                                                                        <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Registrar
                                                                            <i class="mdi-image-edit left"></i>
                                                                        </button>
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


                        </div>
                        <!--end container-->

                        <!--modal error-->
                        <div id="modal1" class="modal">
                            <div class="modal-content">
                                <h4 class="red-text">ERROR!!!</h4>
                                <p>Grupo no creado correctamente.</p>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                            </div>
                        </div>
                        <!--modal error-->
                        <div id="modal2" class="modal">
                            <div class="modal-content">
                                <h4 class="green-text">EXITO!!!</h4>
                                <p>Grupo creado correctamente.</p>
                            </div>
                            <div class="modal-footer">
                                <a href="page-crear-grupo.php" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                                <a href="page-asignar-alumnos.php?id=<?php echo "$codigo"; ?>" class="modal-action modal-close waves-effect waves-green btn-flat">Asignar Alumnos</a>
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

            <!--plugins.js - Some Specific JS codes for Plugin Settings-->
            <script type="text/javascript" src="js/plugins.js"></script>

            <script>
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
                                //$('#modal2').openModal();
                                //document.location.href = "page-crear-proveedor.php";
                                $('#modal2').openModal();

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

