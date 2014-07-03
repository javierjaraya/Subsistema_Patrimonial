<?php
include_once('../controlador/PDF.php');
include_once '../controlador/Sistema.php';

if(isset($_POST['fechaInicio'])){
    $fi = $_POST['fechaInicio'];
    $ff = $_POST['fechaFin'];
    $idRodal = $_POST['idRodal'];

    $pdf = new PDF('L');
    $control = Sistema::getInstancia();
    $pdf->AddPage();

    $inventarios = $control->findInventarios($idRodal, $fi, $ff);
    $miCabecera = array('Id', 'Servicio', 'Sistema Inventario', 'Diámetro Medio (m)',
                'Altura Dominante (m)','Área Basal (m2)', 'Volumen (m3)','N° Árboles', 'Altura (m)', 'Fecha');

    $tituloPagina = "Inventarios del Rodal ".$idRodal. " entre las fechas ".$fi." y ".$ff;

    $pdf->tablaHorizontalInventario($miCabecera, $inventarios,$tituloPagina);

    $pdf->Output();
}
?>
