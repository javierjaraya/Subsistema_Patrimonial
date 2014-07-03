<?php

include_once '../controlador/Sistema.php';
include_once '../controlador/Inventario.php';

$idinventario = $_POST['idinventario'];

$control = Sistema::getInstancia();

$inventario = $control->findInventarioById($idinventario);
$servicio = $inventario->getServicio();
$sistemaInventario = $inventario->getSistemaInventario();
$diametroMedio = $inventario->getDiametroMedio();
$alturaDominante = $inventario->getAlturaDominante();
$areaBasal = $inventario->getAreaBasal();
$volumen = $inventario->getVolumen();
$numeroArboles = $inventario->getNumeroArboles();
$altura = $inventario->getAltura();
$idRodal = $inventario->getIdRodal();
;
$fecha = $inventario->getFechaMedicion();
$dd = substr($fecha, 0, 2);
$mm = substr($fecha, 3, 2);
$yy = substr($fecha, 6, 4);
if($yy>= 0 && $yy<=70){
    $anioFormato = 2000 + $yy;
    $fechaMedicion = $anioFormato."-".$mm."-".$dd;
}else{
    $anioFormato = 1000 + $yy;
    $fechaMedicion = $anioFormato."-".$mm."-".$dd;
}








?>
<form>
<fieldset>
            <div><label>Servicio: </label><input class="form-control" type="text" id="servicio" name="servicio" <?php echo "value='$servicio'"?> /></div>
            <div><label>Sistema Inventario: </label><input class="form-control" type="text" id="sistemaInventario" name="sistemaInventario" <?php echo "value='$sistemaInventario'"?> /></div>
            <div><label>Diámetro Medio (m): </label><input type="text" class="form-control" id="diametroMedio" name="diametroMedio" <?php echo "value='$diametroMedio'"?> /></div>
            <div><label>Altura Dominante (m): </label><input type="text" class="form-control" id="alturaDominante" name="alturaDominante" <?php echo "value='$alturaDominante'"?> /></div>
            <div><label>Área Basal (m2): </label><input type="text" class="form-control" id="areaBasal" name="areaBasal" <?php echo "value='$areaBasal'"?> /></div>
            <div><label>Volumen (m3): </label><input type="text" class="form-control" id="volumen" name="volumen" <?php echo "value='$volumen'"?> /></div>
            <div><label>Número Árboles: </label><input type="text" class="form-control" id="numeroArboles" name="numeroArboles" <?php echo "value='$numeroArboles'"?> /></div>
            <div><label>Altura (m): </label><input type="text" class="form-control" id="altura" name="altura" <?php echo "value='$altura'"?> /></div>
            <div><label>Fecha Medición: </label><input type="date" class="form-control" id="fecha" name="fecha" <?php echo "value='$fechaMedicion'"?> /></div>
            <input type="hidden" id="idRodal" name="idRodal" <?php echo "value='$idRodal'"?> />
</fieldset>
  </form>