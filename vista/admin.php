<?php
    include_once '../controlador/Sistema.php';
    include_once '../controlador/Session.php';
    
    $control = Sistema::getInstancia();
    $session = $control->getSession();
    $empleado = $session->getNombreEmpleado();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Subsistema Patrimonial</title>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/menu.css" rel="stylesheet" type="text/css">
          <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">

        <link href='../assets/ico/favicon.png' type='image/x-icon' rel='shortcut icon' />
        <!-- Bootstrap core CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!-- Add custom CSS here -->
        <link href="../assets/css/sb-admin.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
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
  
  </style>
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
                    <a class="navbar-brand" href="index.html">SB Admin</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Predio <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:predio.cargarTabla();" class="fa fa-table"> Ver todos</a></li>
                                <li><a href="#">Agregar Nuevo</a></li>
                                <li><a href="#">Buscar Predio</a></li>
                                <li><a href="#">Generar Reporte</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Rodal <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:predio.cargarTabla('vista/Predio.php');" class="fa fa-table"> Ver todos</a></li>
                                <li><a href="#">Agregar Nuevo</a></li>
                                <li><a href="#">Buscar Rodal</a></li>
                                <li><a href="#">Generar Reporte</a></li>
                            </ul>
                        </li>
                        
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Empleados <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:empleado.cargarTabla();" class="fa fa-table"> Ver todos</a></li>
                                <li><a href="#">Agregar Nuevo</a></li>
                                <li><a href="#">Buscar Empleado</a></li>
                                <li><a href="#">Generar Reporte</a></li>
                            </ul>
                        </li>
                        
                        <li><a href="bootstrap-elements.html"><i class="fa fa-desktop"></i> Flora y Fauna</a></li>
                        <li><a href="bootstrap-grid.html"><i class="fa fa-wrench"></i> Configuracion</a></li>
                        <li><a href="blank-page.html"><i class="fa fa-file"></i> Ayuda</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right navbar-user">
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i><?php echo $empleado;?><b class="caret"></b></a>
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
                <h1>Bienvenido!</h1>
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
    <script type="text/javascript" src="../assets/js/predio.js"></script>
    <script type="text/javascript" src="../assets/js/empleado.js"></script>
    <script type="text/javascript" src="../assets/js/seguridad.js"></script>
    <!-- DataTable JS -->
    <script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="../assets/js/dataTables.bootstrap.min.js"></script>
    
</html>
