<?php
/**
 * Description of Seguridad
 *
 * @author Javier
 */
include_once '../controlador/Sistema.php';
include_once '../controlador/Session.php';
include_once '../controlador/Empleado.php';

$control = Sistema::getInstancia();

if (isset($_POST["Ingresar"])) {
    $dni = trim(htmlentities(htmlspecialchars(strip_tags($_POST["dni"]))));
    $password = trim(htmlentities(htmlspecialchars(strip_tags($_POST["password"]))));

    $cuenta = $control->verifyUser($dni, $password);
    if ($cuenta != null) {
        $session = new Session();
        $idCuenta = $cuenta->getIdCuenta();
        $idPerfil = $cuenta->getIdPerfil();
        $session->starSession($idCuenta, $idPerfil);
        $direccion = $session->securityCheck();
        header('Location: ' . $direccion);
    }else{
        header('Location: ');
    }
}
?>
Error de usuario o contraseña
