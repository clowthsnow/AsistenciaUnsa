<?php
SESSION_START();

if (!isset($_SESSION['usuario'])) {
    //si no hay sesion activa 
    header("location:index.php");
} else {
    include 'conexion.php';
    //echo $usuario;
    ?>
    <!DOCTYPE html>
    <html lang="es">

        <head>
            <title>Ver Reportes</title>
            <!--Let browser know website is optimized for mobile-->
            <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
            <!-- Favicons-->
            <link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">


            <!-- CORE CSS-->    
            <link href="css/materialize.css" type="text/css" rel="stylesheet">
            <link href="css/style.css" type="text/css" rel="stylesheet" >
            <link href="css/estilos.css" type="text/css" rel="stylesheet" >

            <!-- INCLUDED PLUGIN CSS ON THIS PAGE -->    
            <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
            <link href="js/plugins/data-tables/css/jquery.dataTables.min.css" type="text/css" rel="stylesheet" media="screen,projection">



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
                                        <h5 class="breadcrumbs-title">Ver Reportes</h5>
                                        <ol class="breadcrumb">
                                            <li class=" grey-text lighten-4">Gestion de Reportes
                                            </li>
                                            <li class="active blue-text">Ver Reportes</li>
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
                                            <h4 class="header">Ver Reportes</h4>
                                            <p class="caption">
                                                En este panel usted podra ver todos los Reportes de Estudio almacenadas en el sistema y poder gestionarlas.
                                            </p>
                                            <div class="divider"></div>
                                            <div class="container">
                                                <!--DataTables example-->
                                                <div id="table-datatables">
                                                    <h4 class="header">Reportes:</h4>
                                                    <div class="row">

                                                        <div class="col s12 m12 l12">
                                                            <table id="data-table-simple" class="responsive-table display " cellspacing="0">
                                                                <tr>
                                                                    <td align="center" colspan="2"> 
                                                                        <center>
                                                                        <strong>EXPORTAR REPORTES DE ESTUDIANTES </strong>
                                                                        </center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> EXPORTAR REPORTE DE ESTUDIANTES EN PDF </td>
                                                                    <td><a href="reporteAlumnos_pdf.php"><img src="images/pdf.png" width="30" height="25"></a> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> EXPORTAR REPORTE DE ESTUDIANTES EN EXCEL </td>
                                                                    <td><a href="reporteAlumnos_excel.php"><img src="images/excel.png" width="30" height="25"></a> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> EXPORTAR REPORTE DE ESTUDIANTES EN WORD </td>
                                                                    <td><a href="reporteAlumnos_word.php"><img src="images/word.png" width="30" height="25"></a> </td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td align="center" colspan="2"> 
                                                                        <center>
                                                                        <strong>EXPORTAR REPORTES DE DOCENTES </strong>
                                                                        </center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> EXPORTAR REPORTE DE DOCENTES EN PDF </td>
                                                                    <td><a href="reporteDocentes_pdf.php"><img src="images/pdf.png" width="30" height="25"></a> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> EXPORTAR REPORTE DE DOCENTES EN EXCEL </td>
                                                                    <td><a href="reporteDocentes_excel.php"><img src="images/excel.png" width="30" height="25"></a> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> EXPORTAR REPORTE DE DOCENTES EN WORD </td>
                                                                    <td><a href="reporteDocentes_word.php"><img src="images/word.png" width="30" height="25"></a> </td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td align="center" colspan="2"> 
                                                                        <center>
                                                                        <strong>EXPORTAR REPORTES DE CURSOS </strong>
                                                                        </center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> EXPORTAR REPORTE DE CURSOS EN PDF </td>
                                                                    <td><a href="reporteCursos_pdf.php"><img src="images/pdf.png" width="30" height="25"></a> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> EXPORTAR REPORTE DE CURSOS EN EXCEL </td>
                                                                    <td><a href="reporteCursos_excel.php"><img src="images/excel.png" width="30" height="25"></a> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> EXPORTAR REPORTE DE CURSOS EN WORD </td>
                                                                    <td><a href="reporteCursos_word.php"><img src="images/word.png" width="30" height="25"></a> </td>
                                                                </tr>
                                                                
                                                                <tr>
                                                                    <td align="center" colspan="2"> 
                                                                        <center>
                                                                        <strong>EXPORTAR REPORTES DE CURSO-GRUPO-DOCENTE </strong>
                                                                        </center>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> EXPORTAR REPORTE DE CURSO-GRUPO-DOCENTE EN PDF </td>
                                                                    <td><a href="reporteGrupos_pdf.php"><img src="images/pdf.png" width="30" height="25"></a> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> EXPORTAR REPORTE DE CURSO-GRUPO-DOCENTE EN EXCEL </td>
                                                                    <td><a href="reporteGrupos_excel.php"><img src="images/excel.png" width="30" height="25"></a> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> EXPORTAR REPORTE DE CURSO-GRUPO-DOCENTE EN WORD </td>
                                                                    <td><a href="reporteGrupos_word.php"><img src="images/word.png" width="30" height="25"></a> </td>
                                                                </tr>
                                                                
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>  
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

            
        </body>

    </html>
    <?php
}
?>

