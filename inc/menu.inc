<?php
if ('1' == $_SESSION['permisos']) {
?>
<p class="caption">Accesos Directos</p>

<div class="divider"></div>
<div id="basic-card" class="section">
    <div class="row">
        <div class="col s6 m4 l4">
            <div class="card  light-blue">
                <div class="card-content white-text">
                    <span class="card-title">Usuarios</span>
                    <p>Crea u observa los usuarios que van a usar el sistema</p>
                </div>
                <div class="card-action">
                    <a href="page-crear-usuario.php" class="lime-text text-accent-1">Crear Usuario</a>
                    <a href="page-ver-usuarios.php" class="lime-text text-accent-1">Ver Usuarios</a>
                </div>
            </div>

        </div>

        <div class="col s6 m4 l4">
            <div class="card  light-blue">
                <div class="card-content white-text">
                    <span class="card-title">Director</span>
                    <p>Crea u observa al director de la escuela.</p>
                    </li>
                    <li class="bold"><a href="index.php" class="waves-effect waves-cyan"><i class="mdi-action-dashboard"></i>Inicio</a>
                    </li>
                    <li class="no-padding">
                        <ul class="collapsible collapsible-accordion">
                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-account-box"></i>Gestion de Usuarios</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="page-crear-usuario.php">Crear Nuevo Usuario</a>
                                        </li>                                        
                                        <li><a href="page-ver-usuarios.php">Ver Usuarios</a>
                                        </li>
                                        <li><a href="page-ver-sistemas.php">Ver Sistemas</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-account-box"></i>Gestion de Director</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="page-crear-director.php">Crear Nuevo Director</a>
                                        </li>                                        
                                        <li><a href="page-ver-director.php">Ver Director</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>


                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-account-box"></i>Gestion de Secretaria</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="page-crear-secretaria.php">Crear Nueva Secretaria</a>
                                        </li>                                        
                                        <li><a href="page-ver-secretaria.php">Ver Secretaria</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-account-box"></i>Gestion de Escuela</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="page-crear-escuela.php">Crear Nueva Escuela</a>
                                        </li>                                        
                                        <li><a href="page-ver-escuela.php">Ver Escuela</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-account-box"></i>Gestion de Aula</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="page-crear-aula.php">Crear Nueva Aula</a>
                                        </li>                                        
                                        <li><a href="page-ver-aula.php">Ver aula</a>
                                        </li>

                                    </ul>
                                </div>
                            </li>

                            <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-shopping-cart"></i>Gestion de Deposito</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="page-ingreso-mercaderia.php">Ingreso de Licores</a>
                                        </li>
                                        <li><a href="page-salida-mercaderia-notap.php">Salida de Licores</a>
                                        </li>
                                        <li><a href="page-inventario.php">Inventario</a>
                                        </li>
                                        <li><a href="page-consumo.php">Inventario</a>
                                        </li>
                                        <li><a href="page-ver-consumo.php">Inventario</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="pedido-mes.php">Pedido Mensual</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="page-ver-ingresoMercaderia.php">Ver Ingreso Licores</a>
                                        </li>
                                        <li><a href="page-ver-salidaMercaderia.php">Ver Salidas Licores </a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="page-crear-licor.php">Crear Nuevo Licor</a>
                                        </li>    
                                        <li><a href="page-ver-licores.php">Ver Licores</a>
                                        </li> 
                                        <!--                                <li><a href="page-crear-producto.php">Crear Nuevo Producto</a>
                                                                        </li>  
                                                                         
                                                                        <li><a href="page-ver-productos.php">Ver Productos</a>
                                                                        </li>-->


                                    </ul>
                                </div>
                            </li>
                            <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-account-balance-wallet"></i> Gestion de Gastos</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="page-crear-ingresoEconomico.php">Registrar Ingreso</a>
                                        </li>
                                        <li><a href="page-crear-gasto.php">Registrar Gasto</a>
                                        </li>
                                        <li><a href="page-gastos-vs-ingresos.php">Gastos Vs Ingresos</a>
                                        </li>
                                        <li class="divider"></li>
                                        <!--                                <li><a href="page-filtrar-gastos.php">Ver Gastos Detallado</a>
                                                                        </li>-->
                                        <li><a href="page-filtrar-gastosDia.php">Ver Gastos Diarios</a>
                                        </li>
                                        <li><a href="page-filtrar-gastosMes.php">Ver Gastos Mensuales</a>
                                        </li>
                                        <li><a href="page-ver-ingresosEconomicos.php">Ver Ingresos</a>
                                        </li>
                                        <li><a href="page-ver-gastos.php">Ver Gastos</a>
                                        </li>
                                        <li class="divider"></li>
                                        <li><a href="page-crear-proveedor.php">Registrar Proveedores</a>
                                        </li>  
                                        <li><a href="page-ver-proveedores.php">Ver Proveedores</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-assignment"></i> Kardex</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="page-ver-kardexGenerales.php">Kardex Generales</a>
                                        </li>
                                        <li><a href="page-ver-kardexDiario.php">Kardex Diarios</a>
                                        </li>
                                        <li><a href="page-verfecha-kardexDiario.php">Ver Kardex por Fecha</a>
                                        </li>
                                        <li><a href="page-verMes-kardexDiario.php">Ver Kardex por Mes</a>
                                        </li>
                                        <li><a href="page-ver-cartas.php">Cartas</a>
                                        </li>
                                        <li class="divider"></li>

                                        <li><a href="page-crear-discoteca.php">Registrar Discotecas</a>
                                        </li>
                                        <li><a href="page-crear-barra.php">Registrar Barras</a>
                                        </li>
                                        <li><a href="page-ver-discotecas.php">Ver Discotecas</a>
                                        </li>

                                        <li><a href="page-ver-barras.php">Ver Barras</a>
                                        </li>


                                    </ul>
                                </div>
                            </li>
            <!--                    <li class="bold"><a class="collapsible-header  waves-effect waves-cyan"><i class="mdi-action-credit-card"></i> Gestion de Entradas</a>
                                <div class="collapsible-body">
                                    <ul>
                                        <li><a href="page-404.html">Crear Cliente</a>
                                        </li>
                                        <li><a href="page-404.html">Ver Clientes</a>
                                        </li>
                                        <li><a href="page-404.html">Asistencias</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>-->
                        </ul>
                    </li>
                    <li class="li-hover"><div class="divider"></div></li>
                    <li class="li-hover"><p class="ultra-small margin more-text">MAS</p></li>

                    <li><a href="page-mi-cuenta.php"><i class="mdi-action-perm-identity"></i> Mi Cuenta</a>
                    </li>

                    <li><a href="logout.php"><i class="mdi-hardware-keyboard-tab"></i> Salir</a>
                    </li>
                    </ul>
                    <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only darken-2"><i class="mdi-navigation-menu" ></i></a>
                    </aside>
                    <?php
                    } else {
                    ?>

                    <aside id="left-sidebar-nav">
                        <ul id="slide-out" class="side-nav fixed leftside-navigation">
                            <li class="user-details cyan darken-2">
                                <div class="row">
                                    <div class="col col s4 m4 l4">
                                        <img src="images/user.png" alt="" class="circle responsive-img valign profile-image">

                                    </div>
                                    <div class="card-action">
                                        <a href="page-crear-director.php" class="lime-text text-accent-1">Crear Director</a>
                                        <a href="page-ver-director.php" class="lime-text text-accent-1">Ver Director</a>
                                    </div>
                                </div>
                                </div>


                                <div class="col s6 m4 l4">
                                    <div class="card  light-blue">
                                        <div class="card-content white-text">
                                            <span class="card-title">Secretaria</span>
                                            <p>Crea u observa a la secretaria de la escuela.</p>
                                        </div>
                                        <div class="card-action">
                                            <a href="page-crear-secretaria.php" class="lime-text text-accent-1">Crear Secretaria</a>
                                            <a href="page-ver-secretaria.php" class="lime-text text-accent-1">Ver Secretaria</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col s6 m4 l4">
                                    <div class="card  light-blue">
                                        <div class="card-content white-text">
                                            <span class="card-title">Escuela</span>
                                            <p>Crea u observa a la escuela.</p>
                                        </div>
                                        <div class="card-action">
                                            <a href="page-crear-escuela.php" class="lime-text text-accent-1">Crear Escuela</a>
                                            <a href="page-ver-escuela.php" class="lime-text text-accent-1">Ver Escuela</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col s6 m4 l4">
                                    <div class="card  light-blue">
                                        <div class="card-content white-text">
                                            <span class="card-title">Aula</span>
                                            <p>Crea u observa al aula.</p>
                                        </div>
                                        <div class="card-action">
                                            <a href="page-crear-aula.php" class="lime-text text-accent-1">Crear Aula</a>
                                            <a href="page-ver-aula.php" class="lime-text text-accent-1">Ver Aula</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col s6 m4 l4">
                                    <div class="card  light-green">
                                        <div class="card-content white-text">
                                            <span class="card-title">Licores</span>
                                            <p>Registra un Ingreso o Salida de Licores del Deposito</p>
                                            </divs>
                                            <div class="card-action">
                                                <a href="page-ingreso-mercaderia.php" class="lime-text text-accent-1">Ingreso</a>
                                                <a href="page-salida-mercaderia.php" class="lime-text text-accent-1">Salida</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col s6 m4 l4">
                                    <div class="card  light-green">
                                        <div class="card-content white-text">
                                            <span class="card-title">Inventario</span>
                                            <p>Observa la cantidad total de Licores en el deposito</p>
                                        </div>
                                        <div class="card-action">
                                            <a href="page-inventario.php" class="lime-text text-accent-1">Ver Inventario</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s6 m4 l4">
                                    <div class="card  light-green">
                                        <div class="card-content white-text">
                                            <span class="card-title">Pedido Mensual de Productos</span>
                                            <p>El sistema te dira cuanto se vendio de cada producto en el mes para que pueda hacer su pedido respectivo</p>
                                        </div>
                                        <div class="card-action">
                                            <a href="pedido-mes.php" class="lime-text text-accent-1">Consultar Pedido</a>

                                        </div>

                                    </div>
                                </div>
                                <div class="col s6 m4 l4">
                                    <div class="card  red ">
                                        <div class="card-content white-text">
                                            <span class="card-title">Registros Economicos</span>
                                            <p>Registra un ingreso o gasto de dinero </p>
                                        </div>
                                        <div class="card-action">
                                            <a href="page-crear-ingresoEconomico.php" class="lime-text text-accent-1">Ingreso </a>
                                            <a href="page-crear-gasto.php" class="lime-text text-accent-1">Gasto </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col s6 m4 l4">
                                    <div class="card  red">
                                        <div class="card-content white-text">
                                            <span class="card-title">Gastos vs Ingresos</span>
                                            <p>Vea la grafica de Gastos contra Ingresos hasta el momento</p>
                                        </div>
                                        <div class="card-action">
                                            <a href="page-gastos-vs-ingresos.php class="lime-text text-accent-1">Ver Grafica</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s6 m4 l4">
                                    <div class="card  red">
                                        <div class="card-content white-text">
                                            <span class="card-title">Ver Movimientos de Dinero</span>
                                            <p>Observa la cantidad de dinero que ingresa y se gasta</p>
                                        </div>
                                        <div class="card-action">
                                            <a href="page-ver-ingresosEconomicos.php" class="lime-text text-accent-1">Ver Ingresos</a>
                                            <a href="page-ver-gastos.php" class="lime-text text-accent-1">Ver Gastos</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s6 m4 l4">
                                    <div class="card  red">
                                        <div class="card-content white-text">
                                            <span class="card-title">Ver Gastos de Dinero</span>
                                            <p>Observa la cantidad de dinero que se gasta diaramente y por mes, escogiendo en que se gasta y el monto total</p>
                                        </div>
                                        <div class="card-action">
                                            <a href="page-filtrar-gastosDia.php" class="lime-text text-accent-1">Gasto Diario</a>
                                            <a href="page-filtrar-gastosMes.php" class="lime-text text-accent-1">Gasto Mensual</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s6 m4 l4">
                                    <div class="card  blue-grey">
                                        <div class="card-content white-text">
                                            <span class="card-title">Kardex Diarios</span>
                                            <p>Crea y gestiona los kardex con los que se trabaja en las noches.</p>
                                        </div>
                                        <div class="card-action">
                                            <a href="page-ver-kardexDiario.php" class="lime-text text-accent-1">Gestionar Kardex Diarios</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s6 m4 l4">
                                    <div class="card  blue-grey">
                                        <div class="card-content white-text">
                                            <span class="card-title">Ver Kardex</span>
                                            <p>Busca y ve los Kardex por una fecha especifica u observa los kardex de todo el mes</p>
                                        </div>
                                        <div class="card-action">
                                            <a href="page-verfecha-kardexDiario.php" class="lime-text text-accent-1">Ver por Fecha</a>
                                            <a href="page-verMes-kardexDiario.php" class="lime-text text-accent-1">Ver por Mes</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col s6 m4 l4">
                                    <div class="card  blue-grey">
                                        <div class="card-content white-text">
                                            <span class="card-title">Carta</span>
                                            <p>Ve y configura los precios respectivos de cada carta por Discoteca</p>
                                        </div>
                                        <div class="card-action">
                                            <a href="page-ver-cartas.php" class="lime-text text-accent-1">Ver Cartas</a>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <?php
                                } 
                                    ?>
                                    