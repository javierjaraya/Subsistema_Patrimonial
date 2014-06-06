<?php
/**
 * Description of Seguridad
 *
 * @author Javier
 */
include_once '../controlador/Sistema.php';
include_once '../controlador/Session.php';
include_once '../controlador/Empleado.php';
include_once '../modelo/EmpleadoDAO.php';

$control = Sistema::getInstancia();

if (isset($_POST["Ingresar"])) {
    $dni = trim(htmlentities(htmlspecialchars(strip_tags($_POST["dni"]))));
    $password = trim(htmlentities(htmlspecialchars(strip_tags($_POST["password"]))));
    
    
    $cuenta = $control->verifyUser($dni, $password);
    if ($cuenta != null) {
        $session = $control->getSession();
        $idCuenta = $cuenta->getIdCuenta();
        $idPerfil = $cuenta->getIdPerfil();
        
        $empleado = new EmpleadoDAO();
        $empl = $empleado->getEmpleado($dni);
    
        $session->starSession($idCuenta, $idPerfil,$empl->getNombreEmpleado());
        $direccion = $session->securityCheck();
        header('Location: ' . $direccion);
    }
}else{
    if($_GET['id']=="cerrar"){
        $session = $control->getSession();
        $direccion = $session->stopSession();
        //echo "hola mundo";
        header('Location: ' . $direccion);
    }
}

?>
Error de usuario o contraseña
