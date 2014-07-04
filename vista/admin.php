<?php
include_once '../controlador/Sistema.php';
include_once '../controlador/Session.php';

$control = Sistema::getInstancia();
$session = $control->getSession();

$empleado = $session->getNombreEmpleado();

if (!isset($empleado)) {
    $direccion = $session->securityCheck();
    header('Location: ' . $direccion);
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Subsistema Patrimonial</title>
        <link href="../assets/jquery-ui-1.11.0/jquery-ui.css" rel="stylesheet" type="text/css">
        <link href="../assets/jquery-ui-1.11.0/jquery-ui.theme.css" rel="stylesheet" type="text/css">
        <link href="../assets/jquery-ui-1.11.0/jquery-ui.structure.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href='../assets/ico/favicon.png' type='image/x-icon' rel='shortcut icon' />
        <!-- Bootstrap core CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!-- Add custom CSS here -->
        <link href="../assets/css/sb-admin.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
        <style>
            .demoHeaders {
                margin-top: 2em;
            }
            #dialog-link {
                padding: .4em 1em .4em 20px;
                text-decoration: none;
                position: relative;
            }
            #dialog-link span.ui-icon {
                margin: 0 5px 0 0;
                position: absolute;
                left: .2em;
                top: 50%;
                margin-top: -8px;
            }
            #icons {
                margin: 0;
                padding: 0;
            }
            #icons li {
                margin: 2px;
                position: relative;
                padding: 4px 0;
                cursor: pointer;
                float: left;
                list-style: none;
            }
            #icons span.ui-icon {
                float: left;
                margin: 0 4px;
            }
            .fakewindowcontain .ui-widget-overlay {
                position: absolute;
            }
            select {
                width: 200px;
            }
        </style>
        <style>
            .ui-autocomplete-loading {
                background: white url('../assets/ico/ajax.gif') right center no-repeat;
            }
            .ui-autocomplete {
                max-height: 100px;
                overflow-y: auto;
                /* prevent horizontal scrollbar */
                overflow-x: hidden;
            }
            /* IE 6 doesn't support max-height
             * we use height instead, but this forces the menu to always be this tall
             */
            * html .ui-autocomplete {
                height: 100px;
            }

            #columna_rodal{
                background-color: #428bca;
            }

        </style>
        <script type="text/javascript">
            function validarFechas() {
                fi = document.getElementById("fechaInicio").value;
                ff = document.getElementById("fechaFin").value;
                if (fi.toString() > ff.toString()) {
                    alert("La fecha de inicio debe ser menor que la fecha actual");
                    return false;

                } else {
                    return true;
                }

            }
        </script>
        <script type="text/javascript">
            function validarSeleccionReporteRodal() {
                seleccion = document.getElementById("seleccionFiltro").value;
                if (seleccion == -1) {
                    alert("Para generar el reporte de Rodal debe escoger un tipo de ordenamiento");
                    return false;

                } else {
                    return true;
                }

            }
        </script>

    </head>

    <body>

        <div id="wrapper">

            <!-- Sidebar -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <img src="../assets/img/Logo.png" width="150px" height="50px" style="float: left;">
                    <a class="navbar-brand" style="float: left;" href="admin.php">SB Admin</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li><a href="admin.php"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-tree-deciduous"></i> Predio <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:predio.cargarTabla();" class="fa fa-table"> Ver todos</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-tree-conifer"></i> Rodal <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:rodal.cargarTabla();" class="fa fa-table"> Ver todos</a></li>                               
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-user"></i> Empleados <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:empleado.cargarTabla();" class="fa fa-table"> Ver todos</a></li>                                
                            </ul>
                        </li>

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-cog"></i> Administrar Cuentas <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:cuenta.cargarTabla();" class="fa fa-table"> Ver todos</a></li>

                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-desktop"></i> Flora y Fauna <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:fauna.cargarTabla();" class="fa fa-table"> Fauna Predio</a></li>
                                <li><a href="javascript:flora.cargarTabla();" class="fa fa-table"> Flora Predio</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-road"></i> Caminos <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:camino.cargarTabla();" class="fa fa-table"> Ver todos</a></li>
                            </ul>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right navbar-user">
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo " " . $empleado; ?><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="fa fa-user"></i> Perfil</a></li>
                                <li><a href="#"><i class="fa fa-gear"></i> Configuracion</a></li>
                                <li class="divider"></li>
                                <li><a href="Seguridad.php?id=cerrar"><i class="fa fa-power-off"></i> Cerrar sesion</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- /.navbar-collapse -->
            </nav>

            <div id="page-wrapper">
                <div class="col-sm-9">
                    <h1>Bienvenido!<small><?php echo " " . $empleado; ?></small></h1>

                    <!--    
                    <br><center><embed src="http://www.relojesflash.com/swf/5.swf" quality="high" width="325" height="250" type="application/x-shockwave-flash" allownetworking="internal" allowscriptaccess="never" autoplay="false" wmode="transparent"></center>
                    -->
                    <br>
                    
                    <img src="../assets/img/fogooo.jpg" width="95%" height="77%" ><!--width="800px" height="500px">-->

                </div>

            </div><!-- /#page-wrapper -->

        </div><!-- /#wrapper -->



    </body> 
    <!-- jQuery core JS -->
    <script type="text/javascript" src="../assets/js/jquery-2.1.1.js"></script>
    <!-- jQuery UI (estilos) -->
    <script type="text/javascript" src="../assets/jquery-ui-1.11.0/jquery-ui.min.js"></script>

    <!-- Boostrap core JS -->
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
    <!-- BlockUI core JS -->
    <script type="text/javascript" src="../assets/js/jquery.blockUI.js"></script>
    <!-- Eventos subsistema patrimonial JS -->
    <script type="text/javascript" src="../assets/js/rodal.js"></script>
    <script type="text/javascript" src="../assets/js/inventario.js"></script>
    <script type="text/javascript" src="../assets/js/predio.js"></script>
    <script type="text/javascript" src="../assets/js/empleado.js"></script>
    <script type="text/javascript" src="../assets/js/cuenta.js"></script>
    <script type="text/javascript" src="../assets/js/camino.js"></script>
    <script type="text/javascript" src="../assets/js/fauna.js"></script>
    <script type="text/javascript" src="../assets/js/flora.js"></script>
    <!-- DataTable JS -->
    <script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../assets/js/dataTables.bootstrap.min.js"></script>

</html>
