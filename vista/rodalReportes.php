<?php
include_once('../controlador/PDF.php');
include_once '../controlador/Sistema.php';
$seleccion = $_GET['seleccionFiltro'];
$seleccionCantidad = $_GET['seleccionCantidad'];



$pdf = new PDF('L','mm','A4');
$control = Sistema::getInstancia();
$pdf->AddPage();
$predios = $control->findAllRodalesSelection($seleccion, $seleccionCantidad);

$fechaActual =  date("d/m/Y"); 
$miCabecera = array('Id Predio','Id Rodal', 'Nombre Predio', 'Manejo', 'Zona Crecimiento','Superficie (ha)', 'Año Plant.', 'Valor Comercial ($)');

if($seleccion == 0){
    $modoOrden = 'Año Plantación';
}else{
    if($seleccion == 1){
       $modoOrden = 'Id Predio'; 
    }else{
        if($seleccion == 2){
           $modoOrden = 'Id Rodal';  
        }else{
            if($seleccion == 3){
                $modoOrden = 'Nombre Predio';
            }else{
                if($seleccion == 4){
                    $modoOrden = 'Superficie';
                }else{
                   if($seleccion == 5){
                        $modoOrden = 'Zona Crecimiento';
                    }  
                }
            }
        }
        
    }
    
}
$tituloPagina = "Rodales al ".$fechaActual. " ordenados por: ".$modoOrden;
$pdf->tablaHorizontalRodal($miCabecera, $predios, $tituloPagina);
 
$pdf->Output(); //Salida al navegador
?>
