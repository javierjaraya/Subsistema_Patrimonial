<?php

include_once '../controlador/Sistema.php';
include_once '../controlador/Rodal.php';
include_once '../controlador/Fauna.php';


$idfauna = $_POST['idfauna'];

$control = Sistema::getInstancia();

$fauna = $control->findFaunaById($idfauna);



$nombre = $fauna->getNombreFauna();
$especie = $fauna->getEspecie();

$descripcion = $fauna->getDescripcion();

?>

<form>
<fieldset>
            <div><label>Nombre: </label><input class="form-control" type="text" id="nombre" name="nombre" <?php echo "value='".utf8_encode($nombre)."'" ?>  /></div>
            <div><label>Especie: </label><input class="form-control" type="text" id="especie" name="especie" <?php echo "value='".utf8_encode($especie)."'"?> /></div>
            <div><label>Descripción: </label><textarea class="form-control"  rows="8" cols="50" type="text" name="descripcion" id="descripcion"> <?php echo utf8_encode($descripcion)?> </textarea>

</fieldset>
  </form>