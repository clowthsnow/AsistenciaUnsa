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

    $buscar = "SELECT cursodetalle.*, curso.*, turno.*, semestre.* FROM cursodetalle "
            . "LEFT JOIN curso ON cursodetalle.CursoDetalleCurso=curso.CursoId "
            . "LEFT JOIN turno ON cursodetalle.CursoDetalleTurno=turno.TurnoId "
            . "LEFT JOIN semestre ON cursodetalle.CursoDetalleSemestre=semestre.SemestreId "
            . " WHERE CursoDetalleId='$id'";

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
                                        <h5 class="breadcrumbs-title">Asignar Alumnos</h5>
                                        <ol class="breadcrumb">
                                            <li class=" grey-text lighten-4">Gestion de Curso
                                            </li>
                                            <li class="active blue-text" >Asignar Alumno</li>

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
                                            <h4 class="header">Asignar Alumnos </h4>
                                            <p class="caption">
                                                En este panel usted podra realizar la asignacion de alumnos en los respectivos grupos de los cursos
                                                
                                            </p>
                                            <div class="divider"></div>
                                            <div class="row">
                                                <!-- Form with validation -->
                                                <div class="col offset-l1 s12 m12 l10">
                                                    <div class="card-panel">
                                                        <h4 class="header2">Asignar alumnos a: <b><?php echo $res['CursoNombre'] . " - " . $res['TurnoDetalle'] ?></b></h4>
                                                        <div class="row">
                                                            <form id="create" class="col s12" >
                                                                <input type="text" hidden="true" name="cursodetid" id="cursodetid" value="<?php echo $id; ?>">

                                                                <br>
                                                                <br>
                                                                <div class="row">
                                                                    <div class="input-field col s10 m10 l10">
                                                                        <input id="codigo" type="text" class="validate" name="codigo" required="" onchange="cambiar()">
                                                                        <label for="codigo" id="codigotag">CUI:</label>
                                                                    </div>
                                                                    <div class="input-field col s1 m1 l1">
                                                                        <a class="btn cyan waves-effect waves-light" onclick="vermateriales()" >
                                                                            <i class="mdi-action-search center"></i>
                                                                        </a>
                                                                    </div>

                                                                </div>
                                                                <div class="row">
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="nombre" type="text" class="validate" name="nombre" required="true" readonly="true">
                                                                        <label id="nombretag" for="nombre"  >Nombre:</label>
                                                                    </div>
                                                                    <div class="input-field col s12 m6 l6">
                                                                        <input id="apellido" type="text" class="validate" name="apellidos" required="true" readonly="true">
                                                                        <label id="apellidotag" for="apellido"  >Apellidos:</label>
                                                                    </div>
                                                                </div>

                                                                <br>
                                                                <br>
                                                                <div class="divider"></div>

                                                                <div class="row">
                                                                    <div class="input-field col s12 l6 m6">
                                                                        <a class="btn cyan waves-effect waves-light right" onclick="limpiar()" >Limpiar
                                                                            <i class="mdi-content-clear left"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="input-field col s12 l6 m6">
                                                                        <button class="btn cyan waves-effect waves-light right"  type="submit" name="action" onclick="anadirTabla($('#codigo').val(), $('#nombre').val(), $('#apellido').val())">Añadir
                                                                            <i class="mdi-content-add left"></i>
                                                                        </button>
                                                                    </div>
                                                                </div>      

                                                            </form>
                                                        </div>

                                                        <div id="tabla">
                                                            <br><br>
                                                            <div class="divider"></div>
                                                            <div class="row" >
                                                                <div class="col s12 m12 l12">
                                                                    <table class="hoverable" id="peds">
                                                                        <thead>
                                                                            <tr>
                                                                                <th data-field="id">Cui</th>
                                                                                <th data-field="name">Nombre</th>
                                                                                <th>Apellidos</th>
                                                                                <th>Eliminar</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody id="tablaReg">
                                                                        </tbody>
                                                                    </table>
                                                                </div>

                                                            </div>
                                                            <div class="row">
                                                                <div class="input-field col s12 l6 m6">
                                                                    <a class="btn cyan waves-effect waves-light right"  onclick="registrar()" >Registrar
                                                                        <i class="mdi-content-save left"></i>
                                                                    </a>
                                                                </div>
                                                                <div class="input-field col s12 l6 m6">
                                                                    <a class="btn red waves-effect waves-light right"  onclick="cancelar()" >Cancelar
                                                                        <i class="mdi-content-save left"></i>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <div class="divider"></div>
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

                        <!--modal materiales-->
                        <div id="modalM" class="modal modal-fixed-footer">
                            <div class="modal-content">
                                <h4 class="red-text">Alumnos</h4>
                                <p>Escoja el alumno que desea agregar al grupo.</p>
                                <div class="container" id="contenido-tabla">
                                    <!--DataTables example-->
                                    <div id="table-datatables">
                                        <h4 class="header">Alumnos:</h4>
                                        <div class="row">

                                            <div class="col s12 m12 l12">
                                                <table id="data-table-simple" class="responsive-table display alumno" cellspacing="0">
                                                    <thead>
                                                        <tr>
                                                            <th>Codigo</th>
                                                            <th>Nombre</th>
                                                            <th>Apellidos</th>
                                                        </tr>
                                                    </thead>

                                                    <tfoot>
                                                        <tr>
                                                            <th>Codigo</th>
                                                            <th>Nombre</th>
                                                            <th>Apellidos</th>
                                                        </tr>
                                                    </tfoot>

                                                    <tbody>
                                                        <?php
                                                        $consultaAlumnos = "SELECT * FROM estudiante WHERE EstudianteEstReg='A'";
                                                        $resultadoAlumno = $conexion->query($consultaAlumnos) or die($conexion->error);

                                                        $consultaCursoEst = "SELECT * FROM cursoestudiante WHERE CursoEstudianteCursoDet='$id'";
                                                        $resultadoCursoEst = $conexion->query($consultaCursoEst) or die($conexion->error);
                                                        if ($resultadoCursoEst->num_rows === 0) {
                                                            $estudianteCurs[] = array();
                                                        }

                                                        while ($fila = $resultadoCursoEst->fetch_assoc()) {
                                                            $estudianteCurs[] = $fila['CursoEstudianteAlumno'];
                                                        }




                                                        while ($row = $resultadoAlumno->fetch_assoc()) {

                                                            if (!(in_array($row['EstudianteCui'], $estudianteCurs))) {
                                                                echo "<tr class=\"mat\" style=\"cursor:pointer;\" onclick=\"anadirMat(this);\">
                                                                                <td>" . $row['EstudianteCui'] . "</td>"
                                                                . "<td>" . $row['EstudianteNombre'] . "</td>";

                                                                echo "<td>" . $row['EstudianteApellido'] . "</td>"
                                                                . "</tr>";
                                                            }
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-action modal-close waves-effect waves-red btn-flat">Cerrar</a>
                            </div>
                        </div>



                        <!--modal error-->
                        <div id="modal1" class="modal">
                            <div class="modal-content">
                                <h4 class="red-text">ERROR!!!</h4>
                                <p>Stock insuficiente</p>
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
                        <!--modal error-->
                        <div id="modal3" class="modal">
                            <div class="modal-content">
                                <h4 class="red-text">ERROR!!!</h4>
                                <p>No puede usar el producto para ese tipo de uso</p>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
                            </div>
                        </div>

                        <!--modal error-->
                        <div id="modal4" class="modal">
                            <div class="modal-content">
                                <h4 class="red-text">¿Desea Cancelar el registro de alumnos?</h4>
                                <p>Si usted presiona "SI" el registro se cancelara y ningun cambio sera guardado</p>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">No</a>
                                <a href="page-asignar-alumnos.php?id=<?php echo"$id"?>" class="modal-action modal-close waves-effect waves-red btn-flat">Si</a>
                            </div>
                        </div>

                        <!--modal error-->
                        <div id="modal5" class="modal">
                            <div class="modal-content">
                                <h4 class="red-text">ERROR!!!</h4>
                                <p>Se produjo un error al agregar alumnos.</p>
                            </div>
                            <div class="modal-footer">
                                <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat">Aceptar</a>
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
                                                                        var contador = 0;

                                                                        $(document).ready(function () {

                                                                            // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered

                                                                            $('#modal2').modal();
                                                                            $('#modal1').modal();
                                                                            $('#modal3').modal();
                                                                            $('#modalM').modal();
                                                                        });

                                                                        function vermateriales() {

                                                                            $('#modalM').openModal();
                                                                        }

                                                                        function ocultar() {
                                                                            $('#tabla').hide();
                                                                            $('#codigo').focus();
                                                                        }


                                                                        function anadirMat(e) {
//                                                                            console.log(e);
    //                                                                            console.log(e.cells[0].innerHTML);
    //                                                                            console.log(e.cells[1].innerHTML);
    //                                                                            console.log(e.cells[2].innerHTML);
                                                                            $("#codigo").val(e.cells[0].innerHTML);
                                                                            $('#codigotag').attr('class', 'active');
                                                                            $("#nombre").val(e.cells[1].innerHTML);
                                                                            $('#nombretag').attr('class', 'active');
                                                                            $("#apellido").val(e.cells[2].innerHTML);
                                                                            $('#apellidotag').attr('class', 'active');
                                                                            e.remove();
                                                                            $('#modalM').closeModal();
                                                                        }

                                                                        var frm = $('#create');

                                                                        frm.submit(function (ev) {
                                                                            ev.preventDefault();
                                                                        });

                                                                        function mostrar() {
                                                                            $('#tabla').show("fast");
                                                                        }

                                                                        function anadirTabla(codigo, nombre, apellido) {
                                                                            $codigos = codigo;

                                                                            contador++;
                                                                            mostrar();

    //                                                                                    console.log(codigo + " " + stock + " " + cantidad + " " + medida + " " + uso);
                                                                            var cont = "<tr><td data-codigo=\"" + codigo + "\" id=ped" + contador + ">" + $('#codigo').val() + "</td><td id=cant" + contador + ">" + nombre + "</td><td>" + apellido + "</td><td><a href=\"!#\" class=\"borrar\"><span class=\"task-cat red\">Eliminar</span></a></td></tr>";
                                                                            $('#tablaReg').append(cont);
                                                                            limpiar();
                                                                            $('#codigo').focus();
                                                                        }

                                                                        function limpiar() {
                                                                            $('#codigo').val("");
                                                                            $('#nombre').val("");
                                                                            $('#codigo').removeAttr('readonly', 'true');
                                                                            $('#nombretag').removeAttr('class', 'active');
                                                                            $('#codigotag').removeAttr('class', 'active');

                                                                            $('#apellido').val("");
                                                                            $('#apellidotag').removeAttr('class', 'active');
                                                                            $('#codigo').focus();
                                                                        }

                                                                        $(document).on('click', '.borrar', function (event) {
                                                                            event.preventDefault();

                                                                            $id = $(this).parents("tr").find("td").eq(0).data("codigo");
                                                                            $nombre = $(this).parents("tr").find("td").eq(1).html();
                                                                            $apellido = $(this).parents("tr").find("td").eq(2).html();
//                                                                            alert($id + "" + $nombre + "" + $apellido);

                                                                            $(this).closest('tr').remove();
                                                                            limpiar();
                                                                            $('#codigo').focus();
                                                                            contador--;

                                                                            var cont = "<tr class=\"mat\" style=\"cursor:pointer;\" onclick=\"anadirMat(this);\"><td>" + $id + "</td><td>" + $nombre + "</td><td>" + $apellido + "</td></tr>";
                                                                            $('.alumno').append(cont);

                                                                            var nFilas = $("#peds tr").length;
                                                                            if (nFilas == 1) {
                                                                                ocultar();
                                                                            }
    //                                                                            alert(nFilas);

                                                                        });

                                                                        function cancelar() {
                                                                            $('#modal4').openModal();
                                                                        }

                                                                        function registrar() {
                                                                            $res = "ok";
                                                                            var cursodet = "<?php echo $id; ?>"

                                                                            var alumnos = contador;
                                                                            for (var i = 1; i <= alumnos; i++) {
                                                                                $tempal = "ped".concat(i);

                                                                                $alumno = $('#' + $tempal);
                                                                                $url = "control/asignarAlumnos.php?cursoDet=" + cursodet + "&alumno=" + $alumno.text();
                                                                                console.log($url);
                                                                                $.ajax({
                                                                                    type: 'GET',
                                                                                    url: $url,
                                                                                    async: false,

                                                                                    success: function (respuesta) {
                                                                                        if (respuesta == "1") {
                                                                                            console.log("oli");
                                                                                        } else {
                                                                                            console.log("no");
                                                                                            $res = "no";
                                                                                        }
                                                                                    }
                                                                                });
                                                                            }
                                                                            if ($res == "ok") {
                                                                                $('#modal2').openModal();
                                                                            } else {
                                                                                $('#modal5').openModal();
                                                                            }
                                                                        }
                                                                        
                                                                        function cambiar() {
                                                                            $alumno = $('#codigo').val();
                                                                            $('#codigo').attr('readonly', 'true');
                                                                            $('#nombretag').attr('class', 'active');
                                                                            $('#apellidotag').attr('class', 'active');
                                                                            $url = "control/buscarAlumno.php?codigo=".concat($alumno);
                                                                            $.ajax({
                                                                                dataType: "json",
                                                                                type: "GET",
                                                                                url: $url,
                                                                                success: function (respuesta) {

                                                                                    $('#nombre').val(respuesta["nombre"]);
                                                                                    $('#apellido').val(respuesta["apellido"]);
                                                                                }
                                                                            });
                                                                            $('#cantidad').focus();
                                                                        }
                                                                        
            </script>
        </body>

    </html>
    <?php
}
?>

