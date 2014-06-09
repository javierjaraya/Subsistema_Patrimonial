<?php
include_once '../controlador/Sistema.php';
include_once '../controlador/Predio.php';


$idpredio = $_POST['idpredio'];

$control = Sistema::getInstancia();
$predios = $control->findPredioById($idpredio);




?>
<form>

            <div><label>Identificador Predio: </label><input type="text" class="idpredio" name="idpredio" /></div>
            <div><label>Nombre: </label><input type="text" class="nombre" name="nombre" /></div>
            <div><label>Superficie: </label><input type="text" class="superficie" name="superficie" /></div>
            <div><label>Valor Comercial:</label><input cols="30" rows="5" class="valorcomercial" name="valorcomercial" /></div>
            <div><label>Zona: </label><input cols="30" rows="5" class="zona" name="zona" ></input></div>
            <div><label>Comuna: </label><input cols="30" rows="5" class="comuna" name="comuna" /></div>
            <div class="ultimo">
                <div class="msg"></div>
                <button  type="button" onclick="predio.aceptarIngresoPredio()">Aceptar</button>
                <button  type="button" onclick="predio.cancelarIngresoPredio()">Cancelar</button>
            </div>

  </form>