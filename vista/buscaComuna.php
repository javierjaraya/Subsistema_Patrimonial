<?php
/*
 * Archivo el cual buscará los predios según aproximaciones
 */
include_once 'Sistema.php';
$nombre = $_GET['term'];
$ontrol = Sistema::getInstancia();
echo $control->getComunaLike($nombre);

?>
