<?php
    /*include_once 'controlador/Sistema.php';
    
    $control = Sistema::getInstancia();
    $empleado = $control->getEmpleadoCuenta();*/
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Subsistema Patrimonial</title>
        <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="../assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href='../assets/ico/favicon.png' type='image/x-icon' rel='shortcut icon' />
        <!-- Bootstrap core CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!-- Add custom CSS here -->
        <link href="../assets/css/sb-admin.css" rel="stylesheet">
        <link rel="stylesheet" href="../assets/css/font-awesome.min.css">
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
                                <li><a href="javascript:predio.cargarTabla('Predio');" class="fa fa-table"> Ver todos</a></li>
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
                        <li><a href="bootstrap-elements.html"><i class="fa fa-desktop"></i> Flora y Fauna</a></li>
                        <li><a href="bootstrap-grid.html"><i class="fa fa-wrench"></i> Configuracion</a></li>
                        <li><a href="blank-page.html"><i class="fa fa-file"></i> Ayuda</a></li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right navbar-user">
                        <li class="dropdown messages-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> Messages <span class="badge">7</span> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-header">7 New Messages</li>
                                <li class="message-preview">
                                    <a href="#">
                                        <span class="avatar"><img src="http://placehold.it/50x50"></span>
                                        <span class="name"><?php  ?></span>
                                        <span class="message">Hey there, I wanted to ask you something...</span>
                                        <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li class="message-preview">
                                    <a href="#">
                                        <span class="avatar"><img src="http://placehold.it/50x50"></span>
                                        <span class="name">John Smith:</span>
                                        <span class="message">Hey there, I wanted to ask you something...</span>
                                        <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li class="message-preview">
                                    <a href="#">
                                        <span class="avatar"><img src="http://placehold.it/50x50"></span>
                                        <span class="name">John Smith:</span>
                                        <span class="message">Hey there, I wanted to ask you something...</span>
                                        <span class="time"><i class="fa fa-clock-o"></i> 4:34 PM</span>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="#">View Inbox <span class="badge">7</span></a></li>
                            </ul>
                        </li>
                        <li class="dropdown alerts-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> Alerts <span class="badge">3</span> <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">Default <span class="label label-default">Default</span></a></li>
                                <li><a href="#">Primary <span class="label label-primary">Primary</span></a></li>
                                <li><a href="#">Success <span class="label label-success">Success</span></a></li>
                                <li><a href="#">Info <span class="label label-info">Info</span></a></li>
                                <li><a href="#">Warning <span class="label label-warning">Warning</span></a></li>
                                <li><a href="#">Danger <span class="label label-danger">Danger</span></a></li>
                                <li class="divider"></li>
                                <li><a href="#">View All</a></li>
                            </ul>
                        </li>
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                                <li><a href="#"><i class="fa fa-envelope"></i> Inbox <span class="badge">7</span></a></li>
                                <li><a href="#"><i class="fa fa-gear"></i> Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="fa fa-power-off"></i> Log Out</a></li>
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
    <!-- Boostrap core JS -->
    <script type="text/javascript" src="../assets/js/bootstrap.js"></script>
    <!-- BlockUI core JS -->
    <script type="text/javascript" src="../assets/js/jquery.blockUI.js"></script>
    <!-- Eventos subsistema patrimonial JS -->
    <script type="text/javascript" src="../assets/js/predio.js"></script>
    <script type="text/javascript" src="../assets/js/seguridad.js"></script>
    <script type="text/javascript" src="../assets/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="../assets/js/jquery.dataTables.min.js"></script>
</html>