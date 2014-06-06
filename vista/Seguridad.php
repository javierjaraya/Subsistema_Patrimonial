<?php
/**
 * Description of Seguridad
 *
 * @author Javier
 */
include_once '../controlador/Sistema.php';
include_once '../controlador/Session.php';

$control = Sistema::getInstancia();

if (isset($_POST["Ingresar"])) {
    $dni = trim(htmlentities(htmlspecialchars(strip_tags($_POST["dni"]))));
    $password = trim(htmlentities(htmlspecialchars(strip_tags($_POST["password"]))));

    $cuenta = $control->verifyUser($dni, $password);
    if ($cuenta != null) {
        $session = new Session();
        $idCuenta = $cuenta->getIdCuenta();
        $idPerfil = $cuenta->getIdPerfil();
        $empleado = $control->getEmpleado($dni);
        $nombreEmpleado = $empleado->getNombreEmpleado;
        $session->starSession($idCuenta, $idPerfil,$nombreEmpleado);
        $direccion = $session->securityCheck();
        header('Location: ' . $direccion);
    }else{
        header('Location: ');
    }
}
?>
Error de usuario o contraseña
