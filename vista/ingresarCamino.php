<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ingresarCamino
 *
 * @author Javier
 */
include_once '../controlador/Sistema.php';

$idCamino = $_POST['idcamino'];
$longitud = $_POST['longitud'];
$superficie = $_POST['superficie'];
$predio = $_POST['predio'];

echo "camino = $idCamino  longitud = $longitud  superficie = $superficie  predio = $predio";
?>
