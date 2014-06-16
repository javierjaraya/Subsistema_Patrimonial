<?php
include_once '../controlador/Sistema.php';
include_once '../controlador/Predio.php';

$predio = new Predio();
$control = Sistema::getInstancia();

$id_original = $_POST['idOriginal'];
$id = $_POST['idpredio'];
$nombre = $_POST['nombre'];
$superficie = $_POST['superficie'];
$valorComercial = $_POST['valorcomercial'];
$estado = $_POST['estado'];
$comuna = $_POST['comuna'];

$predio->setIdPredio($id);
$predio->setNombre($nombre);
$predio->setSuperficie($superficie);
$predio->setValorComercial($valorComercial);
$predio->setEstado($estado);


$control->actualizarPredio($predio, $id_original);

//echo "idOriginal: ".$id_original;
//echo "id: ".$id;
//echo "nombre: ".$nombre;
//echo "sup: ".$superficie;
//echo "valor: ".$valorComercial;
//echo "estado: ".$estado;
//echo "comuna: ".$comuna;










?>
