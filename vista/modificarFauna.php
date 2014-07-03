<?php

include_once '../controlador/Sistema.php';
include_once '../controlador/Rodal.php';
include_once '../controlador/EspecieArborea.php';


$idfauna = $_POST['idfauna'];

$control = Sistema::getInstancia();

$fauna = $control->findFaunaById($idfauna);

$nombre = $fauna->getNombreFauna();
$especie = $fauna->getEspecie();
$descripcion = $fauna->getDescripcion();


?>
<form>
<fieldset>
            <div><label>Nombre: </label><input class="form-control" type="text" id="nombre" name="nombre" <?php echo "value='$nombre'"?> /></div>
            <div><label>Especie: </label><input class="form-control" type="text" id="especie" name="especie" <?php echo "value='$especie'"?> /></div>
            <div><label>Descripción: </label><input type="text" class="form-control" id="descripcion" <?php echo "value='$descripcion'"?> /></div>

</fieldset>
  </form>