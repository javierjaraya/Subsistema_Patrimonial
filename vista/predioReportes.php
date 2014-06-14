<?php
include_once('../controlador/PDF.php');
include_once '../controlador/Sistema.php';
$pdf = new PDF();
$control = Sistema::getInstancia();
$pdf->AddPage();
$predios = $control->findAllPredios();
$miCabecera = array('Identificador', 'Nombre', 'Superficie', 'Valor');
 
$misDatos = array(
            array('nombre' => 'Hugo saldia venegas', 'apellido' => 'Martínez', 'matricula' => '20420423'),
            array('nombre' => 'Araceli', 'apellido' => 'Morales', 'matricula' =>  '204909'),
            array('nombre' => 'Georgina', 'apellido' => 'Galindo', 'matricula' =>  '2043442'),
            array('nombre' => 'Luis', 'apellido' => 'Dolores', 'matricula' => '20411122'),
            array('nombre' => 'Mario', 'apellido' => 'Linares', 'matricula' => '2049990'),
            array('nombre' => 'Viridiana', 'apellido' => 'Badillo', 'matricula' => '20418855'),
            array('nombre' => 'Yadira', 'apellido' => 'García', 'matricula' => '20443335')
            );
 
$pdf->tablaHorizontalPredio($miCabecera, $predios);
 
$pdf->Output(); //Salida al navegador
?>
