<?php
/**
 * Description of Fauna
 *
 * @author Javier
 */
include_once '../controlador/Sistema.php';
include_once '../controlador/Fauna.php';

$control = Sistema::getInstancia();
$faunas = $control->findAllFaunas();
/*
  <script language="JavaScript" type="text/javascript">
  function funcion(){
  var value1 = document.formulario.idpredio.value;
  //dato1=datos.elements[0].value;
  //dato2=Math.floor(datos.elements[1].value)
  alert("El contenido del formulario es : "+value1);
  }
  </script>
 */
?>
<script language="JavaScript" type="text/javascript">
    function funcion1(datos) {
        //var value1 = document.formulario.idpredio.value;
        //alert("El contenido del formulario es : " + value1);

        alert("El contenido del formulario es : " + datos.idpredio.value);
    }
</script> 

<div class="row">
    <h1>Lista de Fauna</h1>
    <form name="formulario">
        Filtrar por codigo predio
        <input type="text" name="idpredio" value="" onblur="funcion1(document.formulario);">
    </form>

</div>
<div class="row">
    <div class="panel panel-default">

        <table cellpadding="0" cellspacing="0" border="0" id="tabla_contactos" class="table table-striped table-bordered bootstrap-datatable dataTable">
            <thead>
                <tr>
                    <th >ID Camino <i class='fa fa-sort' style="cursor:hand"></i></th>
                    <th >Nombre <i class='fa fa-sort' style="cursor:hand"></i></th>
                    <th >Especie <i class='fa fa-sort' style="cursor:hand"></i></th>
                    <th >Descripcion <i class='fa fa-sort' style="cursor:hand"></i></th>
                </tr>
            </thead>
            <tbody id="tbody">
                <?PHP
                foreach ($faunas as $fauna) {
                    echo "<tr>";
                    echo "<td ><img onclick='javascript:this.width=450;this.height=338'  ondblclick='javascript:this.width=135;this.height=120' "
                    . "src = '" . $fauna->getRutaImagen() . "' width='135px' height='120px'></td>";
                    echo "<td>" . utf8_encode($fauna->getNombreFauna()) . " m</td>";
                    echo "<td>" . utf8_encode($fauna->getEspecie()) . "</td>";
                    echo "<td>" . utf8_encode($fauna->getDescripcion()) . "</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>    
</div>
