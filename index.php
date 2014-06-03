<html>
    <head>
        <meta charset="UTF-8">
        <title>Subsistema Patrimonial</title>
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css">
        <link href='assets/ico/favicon.png' type='image/x-icon' rel='shortcut icon' />
        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <!-- Add custom CSS here -->
        <link href="assets/css/sb-admin.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
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
                </div>

            </nav>

            <div id="page-wrapper">
                <h1>¡Bienvenido!</h1>
                <div class="borde" id="star">
                    <form action="admin.php" method="POST" class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="inputEmail" placeholder="Email@dominio.com">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" id="inputPassword" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-default" name="Ingresar" value="Ingresar">
                        </div>
                    </form>
                </div><!-- /#wrapper -->
            </div><!-- /#wrapper -->

    </body> 
    <!-- jQuery core JS -->
    <script type="text/javascript" src="assets/js/jquery-2.1.1.js"></script>
    <!-- Boostrap core JS -->
    <script type="text/javascript" src="assets/js/bootstrap.js"></script>
    <!-- BlockUI core JS -->
    <script type="text/javascript" src="assets/js/jquery.blockUI.js"></script>
    <!-- Eventos subsistema patrimonial JS -->
    <script type="text/javascript" src="assets/js/eventos.js"></script>
</html>