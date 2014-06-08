<?php

$idCuenta = $_POST['idCuenta'];
$fechaCreacion = $_POST['fechaCreacion'];
$password = $_POST['password'];
$estado = $_POST['estado'];
$idPerfil = $_POST['idPerfil'];

echo $idCuenta . " - " .$fechaCreacion. " - " .$password. " - " . $estado. " - " . $idPerfil;

?>
