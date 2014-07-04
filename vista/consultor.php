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
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href='../assets/ico/favicon.png' type='image/x-icon' rel='shortcut icon' />
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!-- Add custom CSS here -->
        <link href="../assets/css/sb-admin.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
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
                    <a class="navbar-brand" href="consultor.php">SB Consultor</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li><a href="consultor.php"><i class="glyphicon glyphicon-home"></i> Inicio</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-tree-deciduous"></i> Predio <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:consultor_predio.cargarTabla();" class="fa fa-table"> Ver todos</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-tree-conifer"></i> Rodal <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:consultor_rodal.cargarTabla();" class="fa fa-table"> Ver todos</a></li>
                            </ul>
                        </li>                        

                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-desktop"></i> Flora y Fauna <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:consultor_fauna.cargarTabla();" class="fa fa-table"> Fauna Predio</a></li>
                                <li><a href="javascript:consultor_flora.cargarTabla();" class="fa fa-table"> Flora Predio</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-road"></i> Caminos <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:consultor_camino.cargarTabla();" class="fa fa-table"> Ver todos</a></li>
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
                <h1>Bienvenido!<small><?php echo " " . $empleado; ?></small></h1>
                <br>                    
                <img src="../assets/img/fogooo.jpg" width="95%" height="77%" ><!--width="800px" height="500px">-->
            </div><!-- /#page-wrapper -->

        </div><!-- /#wrapper -->



    </body> 
    <!-- jQuery core JS -->
    <script type="text/javascript" src="../assets/js/jquery-2.1.1.js"></script>
    <!-- jQuery UI (estilos) -->
    <script type="text/javascript" src="../assets/js/jquery-ui-1.10.4.custom.min.js"></script>
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

    <script type="text/javascript" src="../assets/js/consultor_camino.js"></script>
    <script type="text/javascript" src="../assets/js/consultor_fauna.js"></script>
    <script type="text/javascript" src="../assets/js/consultor_flora.js"></script>
    <script type="text/javascript" src="../assets/js/consultor_rodal.js"></script>
    <script type="text/javascript" src="../assets/js/consultor_predio.js"></script>
    <!-- DataTable JS -->
    <script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../assets/js/dataTables.bootstrap.min.js"></script>
</html>