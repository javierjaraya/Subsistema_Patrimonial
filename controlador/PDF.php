<?php

require('../lib/fpdf/fpdf.php');
include_once '../controlador/Predio.php';

/**
 * Description of ReportesPDF
 *
 * @author Renato Hormazabal <nato.ehv@gmail.com>
 */
class PDF extends FPDF {

    function logoAndTitulo($titulo) {
        // Logo                               x  y  escala tamaño
        $this->Image('../assets/img/Logo.jpg', 10, 8, 35);
        // Título
        $this->SetXY(60, 9);
        $this->SetFont('Arial', 'B', 15);
        //Borde,
        $this->Cell(40, 10, utf8_decode($titulo), 0, 0, 'L', false);
        // Salto de línea
        $this->Ln(5);
    }

    function cabeceraHorizontal($cabecera) {
        $this->SetXY(10, 20);
        $this->SetFont('Arial', 'B', 10);
        $this->SetFillColor(2, 157, 116); //Fondo verde de celda
        $this->SetTextColor(240, 255, 240); //Letra color blanco
        $this->CellFitSpace(20, 7, utf8_decode($cabecera[0]), 1, 0, 'L', true);
        $this->CellFitSpace(40, 7, utf8_decode($cabecera[1]), 1, 0, 'L', true);
        $this->CellFitSpace(40, 7, utf8_decode($cabecera[2]), 1, 0, 'L', true);
        $this->CellFitSpace(40, 7, utf8_decode($cabecera[3]), 1, 0, 'L', true);
        $this->CellFitSpace(40, 7, utf8_decode($cabecera[4]), 1, 0, 'L', true);
    }

    function cabeceraHorizontalInventario($cabecera) {
        $this->SetXY(10, 20);
        $this->SetFont('Arial', 'B', 10);
        $this->SetFillColor(2, 157, 116); //Fondo verde de celda
        $this->SetTextColor(240, 255, 240); //Letra color blanco
        foreach ($cabecera as $fila) {
            if($fila == 'Id'){
                $this->CellFitSpace(10, 7, utf8_decode($fila), 1, 0, 'L', true);
            }else{
                if($fila == 'Altura (m)'){
                   $this->CellFitSpace(15, 7, utf8_decode($fila), 1, 0, 'L', true); 
                }else{
                    $this->CellFitSpace(30, 7, utf8_decode($fila), 1, 0, 'L', true);
                }
            }
            
        }
    }

    function cabeceraHorizontalRodal($cabecera) {
        $this->SetXY(10, 20);
        $this->SetFont('Arial', 'B', 10);
        $this->SetFillColor(2, 157, 116); //Fondo verde de celda
        $this->SetTextColor(240, 255, 240); //Letra color blanco
        foreach ($cabecera as $fila) {
            if ($fila == 'Id Predio') {
                $this->CellFitSpace(15, 7, utf8_decode($fila), 1, 0, 'L', true);
            } else {
                if ($fila == 'Id Rodal') {
                    $this->CellFitSpace(15, 7, utf8_decode($fila), 1, 0, 'L', true);
                } else {
                    if ($fila == 'Año Plant.') {
                        $this->CellFitSpace(20, 7, utf8_decode($fila), 1, 0, 'L', true);
                    } else {
                        $this->CellFitSpace(30, 7, utf8_decode($fila), 1, 0, 'L', true);
                    }
                }
            }
        }
    }

    function cabeceraVerticalFloraFauna($cabeceraVertical) {
        $this->SetXY(10, 20);
        $this->SetFont('Arial', 'B', 10);
        $this->SetFillColor(2, 157, 116); //Fondo verde de celda
        $this->SetTextColor(240, 255, 240); //Letra color blanco
        foreach ($cabeceraVertical as $fila) {
            if (utf8_decode($fila) == "Imagen") {
                $this->CellFitSpace(55, 7, utf8_decode($fila), 1, 0, 'L', true);
            } else if (utf8_decode($fila) == "Nombre") {
                $this->CellFitSpace(20, 7, utf8_decode($fila), 1, 0, 'L', true);
            } else if (utf8_decode($fila) == "Especie") {
                $this->CellFitSpace(20, 7, utf8_decode($fila), 1, 0, 'L', true);
            } else if (utf8_decode($fila) == "Descripcion") {
                $this->CellFitSpace(95, 7, utf8_decode($fila), 1, 0, 'L', true);
            }
        }
    }    

    function datosHorizontalPredio($predios) {
        $this->SetXY(10, 27);
        $this->SetFont('Arial', '', 10);
        $this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $bandera = false; //Para alternar el relleno
        foreach ($predios as $predio) {
            //Usaremos CellFitSpace en lugar de Cell
            $this->CellFitSpace(20, 7, utf8_decode($predio->getIdPredio()), 1, 0, 'L', $bandera);
            $this->CellFitSpace(40, 7, utf8_decode($predio->getNombre()), 1, 0, 'L', $bandera);
            $a = number_format($predio->getSuperficie());
            $this->CellFitSpace(40, 7, utf8_decode($a . ' ha'), 1, 0, 'R', $bandera);
            //Damos formato numerico
            $a = number_format($predio->getValorComercial());
            $this->CellFitSpace(40, 7, utf8_decode('$' . $a), 1, 0, 'R', $bandera);
            $this->CellFitSpace(40, 7, utf8_decode($predio->getComuna()->getNombreComuna()), 1, 0, 'L', $bandera);
            $this->Ln(); //Salto de línea para generar otra fila
            $bandera = !$bandera; //Alterna el valor de la bandera
        }
    }

    function datosHorizontalRodal($rodal) {
        $this->SetXY(10, 27);
        $this->SetFont('Arial', '', 10);
        $this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $bandera = false; //Para alternar el relleno
        while ($row = oci_fetch_array($rodal, OCI_RETURN_NULLS)) {
            //Usaremos CellFitSpace en lugar de
            $this->CellFitSpace(15, 7, utf8_decode($row['ID_PREDIO']), 1, 0, 'L', $bandera);
            $this->CellFitSpace(15, 7, utf8_decode($row['ID_RODAL']), 1, 0, 'L', $bandera);
            $this->CellFitSpace(30, 7, utf8_decode($row['NOMBRE']), 1, 0, 'L', $bandera);
            $this->CellFitSpace(30, 7, utf8_decode($row['MANEJO']), 1, 0, 'L', $bandera);
            $this->CellFitSpace(30, 7, utf8_decode($row['ZONA']), 1, 0, 'L', $bandera);
            $this->CellFitSpace(30, 7, utf8_decode(number_format($row['SUP'])), 1, 0, 'L', $bandera);
            $this->CellFitSpace(20, 7, utf8_decode($row['ANIO']), 1, 0, 'L', $bandera);
            $this->CellFitSpace(30, 7, utf8_decode(number_format($row['VALOR'])), 1, 0, 'L', $bandera);
            
            
            $this->Ln(); //Salto de línea para generar otra fila
            $bandera = !$bandera; //Alterna el valor de la bandera
        }
    }

    function datosHorizontalInventario($inventarios) {
        $this->SetXY(10, 27);
        $this->SetFont('Arial', '', 10);
        $this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $bandera = false; //Para alternar el relleno
        foreach ($inventarios as $inventario) {
            //Usaremos CellFitSpace en lugar de Cell
            $this->CellFitSpace(10, 7, utf8_decode($inventario->getIdInventario()), 1, 0, 'L', $bandera);
            $this->CellFitSpace(30, 7, utf8_decode($inventario->getServicio()), 1, 0, 'L', $bandera);
            $this->CellFitSpace(30, 7, utf8_decode($inventario->getSistemaInventario()), 1, 0, 'L', $bandera);
            $this->CellFitSpace(30, 7, utf8_decode($inventario->getDiametroMedio()), 1, 0, 'L', $bandera);
            $this->CellFitSpace(30, 7, utf8_decode($inventario->getAlturaDominante()), 1, 0, 'L', $bandera);
            $this->CellFitSpace(30, 7, utf8_decode($inventario->getAreaBasal()), 1, 0, 'L', $bandera);
            $this->CellFitSpace(30, 7, utf8_decode($inventario->getVolumen()), 1, 0, 'L', $bandera);
            $this->CellFitSpace(30, 7, utf8_decode($inventario->getNumeroArboles()), 1, 0, 'L', $bandera);
            $this->CellFitSpace(15, 7, utf8_decode($inventario->getAltura()), 1, 0, 'L', $bandera);
            $this->CellFitSpace(30, 7, utf8_decode($inventario->getFechaMedicion()), 1, 0, 'L', $bandera);
            $this->Ln(); //Salto de línea para generar otra fila
            $bandera = !$bandera; //Alterna el valor de la bandera
        }
    }
function datosVerticalFauna($faunas) {
        $this->SetXY(10, 27);
        $this->SetFont('Arial', '', 10);
        $this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $cont = 0;
        $distancia = 27;
        $bandera = FALSE;
        foreach ($faunas as $fauna) {   
            if($cont == 2){
                $this->AddPage();
                $distancia = 27;
                $cont = 0;
            }else{
                if($cont == 1)
                $distancia = $distancia+110;
            }
            //POSICION DEL NOMBRE
            $this->Sety($distancia);
            $this->SetX(10);
            $this->MultiCell(30, 5, "Nombre : ", 0, 0, 'L', $bandera);
            $this->Sety($distancia);
            $this->SetX(50);
            $this->MultiCell(40, 5, utf8_decode($fauna->getNombreFauna()), 0, 'L', $bandera);
            //POSICION DE LA ESPECIE
            $this->Sety($distancia+10);
            $this->SetX(10);
            $this->MultiCell(30, 5, "Especie : ", 0, 0, 'L', $bandera);
            $this->Sety($distancia+10);
            $this->SetX(50);
            $this->MultiCell(40, 5, utf8_decode($fauna->getEspecie()), 0, 'L', $bandera);
            //POSICION DE LA DESCRIPCION
            $this->Sety($distancia+20);
            $this->SetX(10);
            $this->MultiCell(30, 5, "Descripcion : ", 0, 0, 'L', $bandera);
            $this->SetX(10);
            $this->MultiCell(130, 5, utf8_decode($fauna->getDescripcion()), 0, 'J', $bandera);
            //POSICION DE LA IMAGEN
            $this->Sety($distancia);
            $this->SetX(145);
            $this->Cell(55, $distancia, $this->Image($fauna->getRutaImagen(), $this->GetX(), $this->GetY(), 55), 0, 0, 'L');

            $this->Ln(); //Salto de línea para generar otra fila
            
            $cont++;                        
        }
    }
    
    function datosVerticalFlora($floras) {
        $this->SetXY(10, 27);
        $this->SetFont('Arial', '', 10);
        $this->SetFillColor(229, 229, 229); //Gris tenue de cada fila
        $this->SetTextColor(3, 3, 3); //Color del texto: Negro
        $cont = 0;
        $distancia = 27;
        $bandera = FALSE;
        
        foreach ($floras as $flora) {
            if($cont == 2){
                $cont = 0;
                $this->addPage();   
                $distancia = 27;
            }else{
                if($cont == 1)
                    $distancia = $distancia+90;
            }
            //POSICION DEL NOMBRE
            $this->Sety($distancia);
            $this->SetX(10);
            $this->MultiCell(30, 5, "Nombre : $distancia", 0, 0, 'L', $bandera);
            $this->Sety($distancia);
            $this->SetX(50);
            $this->MultiCell(40, 5, utf8_decode($flora->getNombreFlora()).$distancia, 0, 'L', $bandera);
            //POSICION DE LA ESPECIE
            $this->Sety($distancia+10);
            $this->SetX(10);
            $this->MultiCell(30, 5, "Especie : ", 0, 0, 'L', $bandera);
            $this->Sety($distancia+10);
            $this->SetX(50);
            $this->MultiCell(40, 5, utf8_decode($flora->getEspecie()), 0, 'L', $bandera);
            //POSICION DE LA DESCRIPCION
            $this->Sety($distancia+20);
            $this->SetX(10);
            $this->MultiCell(30, 5, "Descripcion : ", 0, 0, 'L', $bandera);
            $this->SetX(10);
            $this->MultiCell(130, 5, utf8_decode($flora->getDescripcion()), 0, 'J', $bandera);
            //POSICION DE LA IMAGEN
            $this->Sety($distancia);
            $this->SetX(145);
            $this->Cell(55, $distancia, $this->Image($flora->getRutaImagen(), $this->GetX(), $this->GetY(), 55), 0, 0, 'L');

            $this->Ln(); //Salto de línea para generar otra fila
            
            $cont++;
        }
    }

    // Pie de página
    function Footer() {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial', 'I', 8);
        // Número de página
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
    }

    function tablaHorizontalPredio($cabeceraHorizontal, $datosHorizontal, $tituloPagina) {
        $this->logoAndTitulo($tituloPagina);
        $this->cabeceraHorizontal($cabeceraHorizontal);
        $this->datosHorizontalPredio($datosHorizontal);
        $this->Footer();
    }

    function tablaHorizontalRodal($cabeceraHorizontal, $datosHorizontal, $tituloPagina) {
        $this->logoAndTitulo($tituloPagina);
        $this->cabeceraHorizontalRodal($cabeceraHorizontal);
        $this->datosHorizontalRodal($datosHorizontal);
        $this->Footer();
    }

    function tablaHorizontalInventario($cabeceraHorizontal, $datosHorizontal, $tituloPagina) {
        $this->logoAndTitulo($tituloPagina);
        $this->cabeceraHorizontalInventario($cabeceraHorizontal);
        $this->datosHorizontalInventario($datosHorizontal);
        $this->Footer();
    }

    function tablaVerticalFauna($cabeceraVertical, $faunas, $tituloPagina) {
        $this->logoAndTitulo($tituloPagina);
        //$this->cabeceraVerticalFloraFauna($cabeceraVertical);
        $this->datosVerticalFauna($faunas);
        $this->Footer();
    }
    
    function tablaVerticalFlora($cabeceraVertical, $floras, $tituloPagina) {
        $this->logoAndTitulo($tituloPagina);
        //$this->cabeceraVerticalFloraFauna($cabeceraVertical);
        $this->datosVerticalFlora($floras);
        $this->Footer();
    }

    //***** Aquí comienza código para ajustar texto *************
    //***********************************************************
    function CellFit($w, $h = 0, $txt = '', $border = 0, $ln = 0, $align = '', $fill = false, $link = '', $scale = false, $force = true) {
        //Get string width
        $str_width = $this->GetStringWidth($txt);

        //Calculate ratio to fit cell
        if ($w == 0)
            $w = $this->w - $this->rMargin - $this->x;
        $ratio = ($w - $this->cMargin * 2) / $str_width;

        $fit = ($ratio < 1 || ($ratio > 1 && $force));
        if ($fit) {
            if ($scale) {
                //Calculate horizontal scaling
                $horiz_scale = $ratio * 100.0;
                //Set horizontal scaling
                $this->_out(sprintf('BT %.2F Tz ET', $horiz_scale));
            } else {
                //Calculate character spacing in points
                $char_space = ($w - $this->cMargin * 2 - $str_width) / max($this->MBGetStringLength($txt) - 1, 1) * $this->k;
                //Set character spacing
                $this->_out(sprintf('BT %.2F Tc ET', $char_space));
            }
            //Override user alignment (since text will fill up cell)
            $align = '';
        }

        //Pass on to Cell method
        $this->Cell($w, $h, $txt, $border, $ln, $align, $fill, $link);

        //Reset character spacing/horizontal scaling
        if ($fit)
            $this->_out('BT ' . ($scale ? '100 Tz' : '0 Tc') . ' ET');
    }

    function CellFitSpace($w, $h = 0, $txt = '', $border = 0, $ln = 0, $align = '', $fill = false, $link = '') {
        $this->CellFit($w, $h, $txt, $border, $ln, $align, $fill, $link, false, false);
    }

    function MBGetStringLength($s) {
        if ($this->CurrentFont['type'] == 'Type0') {
            $len = 0;
            $nbbytes = strlen($s);
            for ($i = 0; $i < $nbbytes; $i++) {
                if (ord($s[$i]) < 128)
                    $len++;
                else {
                    $len++;
                    $i++;
                }
            }
            return $len;
        } else
            return strlen($s);
    }

//************** Fin del código para ajustar texto *****************
//******************************************************************
}

?>
