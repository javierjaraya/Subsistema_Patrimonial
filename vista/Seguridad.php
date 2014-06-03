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
    $idCuenta = trim(htmlentities(htmlspecialchars(strip_tags($_POST["idCuenta"]))));
    $password = trim(htmlentities(htmlspecialchars(strip_tags($_POST["password"]))));

    $cuenta = $control->verifyUser($idCuenta, $password);
    if ($cuenta != null) {
        $session = new Session();
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
