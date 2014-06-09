<?php
include_once '../controlador/Sistema.php';
include_once '../controlador/Comuna.php';

$idPredio = $_POST['idpredio'];
$nombre = $_POST['nombre'];
$superficie = $_POST['superficie'];
$valorComercial = $_POST['valorcomercial'];
$idComuna = $_POST['idcomuna'];

$control = Sistema::getInstancia();
$idZona = $control->getIdZonaByIdComuna($idComuna);
$predio = new Predio();
$predio->setEstado(1);
$predio->setIdComuna($idComuna);
$predio->setIdEmpresa(1);
$predio->setIdPredio($idPredio);
$predio->setIdZona($idZona); //es necesario buscarla
$predio->setNombre($nombre);
$predio->setSuperficie($superficie);
$predio->setValorComercial($valorComercial);

$control->savePredio($predio);
        


?>
