<?php

include_once 'Conexion.php';
include_once '../controlador/Rodal.php';
include_once 'interfaceDAO.php';

class RodalDAO implements interfaceDAO{
    private $cone;
    
    public function RodalDAO(){
            $this->cone= new Conexion();
    }
    
    public function findAll(){
        $estado = 1;
        $this->cone->conectar();
        $laConsulta = "SELECT r.id_predio id_predio, p.nombre nombre, r.id_rodal id_rodal, r.manejo manejo,
            e.nombre_especie_arborea arborea, r.zona_crecimiento zona, r.superficie sup, r.anio_plantacion anio,
            r.valor_comercial valor
            FROM rodal  r, predio  p, especiearborea e
            WHERE  r.ID_PREDIO = p.ID_PREDIO
            AND r.id_especie_arborea = e.id_especie_arborea
            AND r.ESTADO = '".$estado."' AND p.ESTADO = '".$estado."'
            
            ORDER BY p.ID_PREDIO";
        
        $query = $this->cone->ejecutar($laConsulta);
        $this->cone->desconectar();
        return $query;
    }
    
    public function findAllSelection($seleccion, $seleccionCantidad, $idPredio){
        
        $estado = 1;
        $this->cone->conectar();
        // idPredio no nullo
        if($idPredio != null){
            
            if($seleccion == 0){
                if($seleccionCantidad<=100){

                      $laConsulta = "
                        SELECT * FROM
                        (SELECT r.id_predio id_predio, p.nombre nombre, r.id_rodal id_rodal, r.manejo manejo,
                            e.nombre_especie_arborea arborea, r.zona_crecimiento zona, r.superficie sup, r.anio_plantacion anio,
                            r.valor_comercial valor
                            FROM rodal  r, predio  p, especiearborea e
                            WHERE  r.ID_PREDIO = p.ID_PREDIO
                            AND r.id_especie_arborea = e.id_especie_arborea
                            AND r.ID_PREDIO = '".$idPredio."'
                            AND r.ESTADO = '".$estado."' ORDER BY anio)
                            
                            WHERE ROWNUM <= $seleccionCantidad";  


                }else{
                    $laConsulta = "SELECT r.id_predio id_predio, p.nombre nombre, r.id_rodal id_rodal, r.manejo manejo,
                            e.nombre_especie_arborea arborea, r.zona_crecimiento zona, r.superficie sup, r.anio_plantacion anio,
                            r.valor_comercial valor
                            FROM rodal  r, predio  p, especiearborea e
                            WHERE  r.ID_PREDIO = p.ID_PREDIO
                            AND r.id_especie_arborea = e.id_especie_arborea
                            AND r.ID_PREDIO = '".$idPredio."'
                            AND r.ESTADO = '".$estado."' ORDER BY anio";
                }
            
            }
            if($seleccion == 1){
                if($seleccionCantidad<=100){
                    $laConsulta = "
                        SELECT * FROM
                        (SELECT r.id_predio id_predio, p.nombre nombre, r.id_rodal id_rodal, r.manejo manejo,
                            e.nombre_especie_arborea arborea, r.zona_crecimiento zona, r.superficie sup, r.anio_plantacion anio,
                            r.valor_comercial valor
                            FROM rodal  r, predio  p, especiearborea e
                            WHERE  r.ID_PREDIO = p.ID_PREDIO
                            AND r.id_especie_arborea = e.id_especie_arborea
                            AND r.ID_PREDIO = '".$idPredio."'
                            AND r.ESTADO = '".$estado."' ORDER BY r.ID_PREDIO)
                            
                            WHERE ROWNUM <= $seleccionCantidad";
                }else{
                    $laConsulta = "SELECT r.id_predio id_predio, p.nombre nombre, r.id_rodal id_rodal, r.manejo manejo,
                            e.nombre_especie_arborea arborea, r.zona_crecimiento zona, r.superficie sup, r.anio_plantacion anio,
                            r.valor_comercial valor
                            FROM rodal  r, predio  p, especiearborea e
                            WHERE  r.ID_PREDIO = p.ID_PREDIO
                            AND r.id_especie_arborea = e.id_especie_arborea
                            AND r.ESTADO = '".$estado."'
                            AND r.ID_PREDIO = '".$idPredio."'
                            ORDER BY r.ID_PREDIO";
                }

            }
            if($seleccion == 2){
                if($seleccionCantidad<=100){
                    $laConsulta ="
                        SELECT * FROM
                        (SELECT r.id_predio id_predio, p.nombre nombre, r.id_rodal id_rodal, r.manejo manejo,
                            e.nombre_especie_arborea arborea, r.zona_crecimiento zona, r.superficie sup, r.anio_plantacion anio,
                            r.valor_comercial valor
                            FROM rodal  r, predio  p, especiearborea e
                            WHERE  r.ID_PREDIO = p.ID_PREDIO
                            AND r.id_especie_arborea = e.id_especie_arborea
                            AND r.ID_PREDIO = '".$idPredio."'
                            AND r.ESTADO = '".$estado."' ORDER BY r.ID_RODAL)
                            
                            WHERE ROWNUM <= $seleccionCantidad";
                }else{
                   $laConsulta = "SELECT r.id_predio id_predio, p.nombre nombre, r.id_rodal id_rodal, r.manejo manejo,
                            e.nombre_especie_arborea arborea, r.zona_crecimiento zona, r.superficie sup, r.anio_plantacion anio,
                            r.valor_comercial valor
                            FROM rodal  r, predio  p, especiearborea e
                            WHERE  r.ID_PREDIO = p.ID_PREDIO
                            AND r.id_especie_arborea = e.id_especie_arborea
                            AND r.ESTADO = '".$estado."'
                            AND r.ID_PREDIO = '".$idPredio."'
                            ORDER BY r.ID_RODAL"; 
                }

            }
            if($seleccion == 3){
                if($seleccionCantidad<=100){
                    $laConsulta ="
                        SELECT * FROM
                        (SELECT r.id_predio id_predio, p.nombre nombre, r.id_rodal id_rodal, r.manejo manejo,
                            e.nombre_especie_arborea arborea, r.zona_crecimiento zona, r.superficie sup, r.anio_plantacion anio,
                            r.valor_comercial valor
                            FROM rodal  r, predio  p, especiearborea e
                            WHERE  r.ID_PREDIO = p.ID_PREDIO
                            AND r.id_especie_arborea = e.id_especie_arborea
                            AND r.ID_PREDIO = '".$idPredio."'
                            AND r.ESTADO = '".$estado."' ORDER BY nombre)
                            
                            WHERE ROWNUM <= $seleccionCantidad";
                }else{
                  $laConsulta = "SELECT r.id_predio id_predio, p.nombre nombre, r.id_rodal id_rodal, r.manejo manejo,
                            e.nombre_especie_arborea arborea, r.zona_crecimiento zona, r.superficie sup, r.anio_plantacion anio,
                            r.valor_comercial valor
                            FROM rodal  r, predio  p, especiearborea e
                            WHERE  r.ID_PREDIO = p.ID_PREDIO
                            AND r.id_especie_arborea = e.id_especie_arborea
                            AND r.ESTADO = '".$estado."'
                            AND r.ID_PREDIO = '".$idPredio."'
                            ORDER BY nombre";  
                }

            }
            if($seleccion == 4){
                if($seleccionCantidad<=100){
                    $laConsulta ="
                        SELECT * FROM
                        (SELECT r.id_predio id_predio, p.nombre nombre, r.id_rodal id_rodal, r.manejo manejo,
                            e.nombre_especie_arborea arborea, r.zona_crecimiento zona, r.superficie sup, r.anio_plantacion anio,
                            r.valor_comercial valor
                            FROM rodal  r, predio  p, especiearborea e
                            WHERE  r.ID_PREDIO = p.ID_PREDIO
                            AND r.id_especie_arborea = e.id_especie_arborea
                            AND r.ID_PREDIO = '".$idPredio."'
                            AND r.ESTADO = '".$estado."' ORDER BY sup)
                            
                            WHERE ROWNUM <= $seleccionCantidad";
                }else{
                  $laConsulta = "SELECT r.id_predio id_predio, p.nombre nombre, r.id_rodal id_rodal, r.manejo manejo,
                            e.nombre_especie_arborea arborea, r.zona_crecimiento zona, r.superficie sup, r.anio_plantacion anio,
                            r.valor_comercial valor
                            FROM rodal  r, predio  p, especiearborea e
                            WHERE  r.ID_PREDIO = p.ID_PREDIO
                            AND r.id_especie_arborea = e.id_especie_arborea
                            AND r.ESTADO = '".$estado."'
                            AND r.ID_PREDIO = '".$idPredio."'
                            ORDER BY sup";  
                }

            }
            if($seleccion == 5){
                if($seleccionCantidad<=100){
                    $laConsulta ="
                        SELECT * FROM
                        (SELECT r.id_predio id_predio, p.nombre nombre, r.id_rodal id_rodal, r.manejo manejo,
                            e.nombre_especie_arborea arborea, r.zona_crecimiento zona, r.superficie sup, r.anio_plantacion anio,
                            r.valor_comercial valor
                            FROM rodal  r, predio  p, especiearborea e
                            WHERE  r.ID_PREDIO = p.ID_PREDIO
                            AND r.id_especie_arborea = e.id_especie_arborea
                            AND r.ID_PREDIO = '".$idPredio."'
                            AND r.ESTADO = '".$estado."' ORDER BY zona)
                            
                            WHERE ROWNUM <= $seleccionCantidad";
                }else{
                   $laConsulta = "SELECT r.id_predio id_predio, p.nombre nombre, r.id_rodal id_rodal, r.manejo manejo,
                        e.nombre_especie_arborea arborea, r.zona_crecimiento zona, r.superficie sup, r.anio_plantacion anio,
                        r.valor_comercial valor
                        FROM rodal  r, predio  p, especiearborea e
                        WHERE  r.ID_PREDIO = p.ID_PREDIO
                        AND r.id_especie_arborea = e.id_especie_arborea
                        AND r.ESTADO = '".$estado."'
                        AND r.ID_PREDIO = '".$idPredio."'
                        ORDER BY zona"; 
                }

            }   
        }else{
            // id predio vacio
            if($seleccion == 0){
                if($seleccionCantidad<=100){

                      $laConsulta = "
                        SELECT * FROM
                        (SELECT r.id_predio id_predio, p.nombre nombre, r.id_rodal id_rodal, r.manejo manejo,
                            e.nombre_especie_arborea arborea, r.zona_crecimiento zona, r.superficie sup, r.anio_plantacion anio,
                            r.valor_comercial valor
                            FROM rodal  r, predio  p, especiearborea e
                            WHERE  r.ID_PREDIO = p.ID_PREDIO
                            AND r.id_especie_arborea = e.id_especie_arborea
                            AND r.ESTADO = '".$estado."' ORDER BY anio)
                            WHERE ROWNUM <= $seleccionCantidad";  


                }else{
                    $laConsulta = "SELECT r.id_predio id_predio, p.nombre nombre, r.id_rodal id_rodal, r.manejo manejo,
                            e.nombre_especie_arborea arborea, r.zona_crecimiento zona, r.superficie sup, r.anio_plantacion anio,
                            r.valor_comercial valor
                            FROM rodal  r, predio  p, especiearborea e
                            WHERE  r.ID_PREDIO = p.ID_PREDIO
                            AND r.id_especie_arborea = e.id_especie_arborea
                            AND r.ESTADO = '".$estado."' ORDER BY anio";
                }
            
        }
        if($seleccion == 1){
            if($seleccionCantidad<=100){
                $laConsulta = "
                    SELECT * FROM
                    (SELECT r.id_predio id_predio, p.nombre nombre, r.id_rodal id_rodal, r.manejo manejo,
                        e.nombre_especie_arborea arborea, r.zona_crecimiento zona, r.superficie sup, r.anio_plantacion anio,
                        r.valor_comercial valor
                        FROM rodal  r, predio  p, especiearborea e
                        WHERE  r.ID_PREDIO = p.ID_PREDIO
                        AND r.id_especie_arborea = e.id_especie_arborea
                        AND r.ESTADO = '".$estado."' ORDER BY r.ID_PREDIO)
                        WHERE ROWNUM <= $seleccionCantidad";
            }else{
                $laConsulta = "SELECT r.id_predio id_predio, p.nombre nombre, r.id_rodal id_rodal, r.manejo manejo,
                        e.nombre_especie_arborea arborea, r.zona_crecimiento zona, r.superficie sup, r.anio_plantacion anio,
                        r.valor_comercial valor
                        FROM rodal  r, predio  p, especiearborea e
                        WHERE  r.ID_PREDIO = p.ID_PREDIO
                        AND r.id_especie_arborea = e.id_especie_arborea
                        AND r.ESTADO = '".$estado."'
                        ORDER BY r.ID_PREDIO";
            }
            
        }
        if($seleccion == 2){
            if($seleccionCantidad<=100){
                $laConsulta ="
                    SELECT * FROM
                    (SELECT r.id_predio id_predio, p.nombre nombre, r.id_rodal id_rodal, r.manejo manejo,
                        e.nombre_especie_arborea arborea, r.zona_crecimiento zona, r.superficie sup, r.anio_plantacion anio,
                        r.valor_comercial valor
                        FROM rodal  r, predio  p, especiearborea e
                        WHERE  r.ID_PREDIO = p.ID_PREDIO
                        AND r.id_especie_arborea = e.id_especie_arborea
                        AND r.ESTADO = '".$estado."' ORDER BY r.ID_RODAL)
                        WHERE ROWNUM <= $seleccionCantidad";
            }else{
               $laConsulta = "SELECT r.id_predio id_predio, p.nombre nombre, r.id_rodal id_rodal, r.manejo manejo,
                        e.nombre_especie_arborea arborea, r.zona_crecimiento zona, r.superficie sup, r.anio_plantacion anio,
                        r.valor_comercial valor
                        FROM rodal  r, predio  p, especiearborea e
                        WHERE  r.ID_PREDIO = p.ID_PREDIO
                        AND r.id_especie_arborea = e.id_especie_arborea
                        AND r.ESTADO = '".$estado."'
                        ORDER BY r.ID_RODAL"; 
            }
            
        }
        if($seleccion == 3){
            if($seleccionCantidad<=100){
                $laConsulta ="
                    SELECT * FROM
                    (SELECT r.id_predio id_predio, p.nombre nombre, r.id_rodal id_rodal, r.manejo manejo,
                        e.nombre_especie_arborea arborea, r.zona_crecimiento zona, r.superficie sup, r.anio_plantacion anio,
                        r.valor_comercial valor
                        FROM rodal  r, predio  p, especiearborea e
                        WHERE  r.ID_PREDIO = p.ID_PREDIO
                        AND r.id_especie_arborea = e.id_especie_arborea
                        AND r.ESTADO = '".$estado."' ORDER BY nombre)
                        WHERE ROWNUM <= $seleccionCantidad";
            }else{
              $laConsulta = "SELECT r.id_predio id_predio, p.nombre nombre, r.id_rodal id_rodal, r.manejo manejo,
                        e.nombre_especie_arborea arborea, r.zona_crecimiento zona, r.superficie sup, r.anio_plantacion anio,
                        r.valor_comercial valor
                        FROM rodal  r, predio  p, especiearborea e
                        WHERE  r.ID_PREDIO = p.ID_PREDIO
                        AND r.id_especie_arborea = e.id_especie_arborea
                        AND r.ESTADO = '".$estado."'
                        ORDER BY nombre";  
            }
            
        }
        if($seleccion == 4){
            if($seleccionCantidad<=100){
                $laConsulta ="
                    SELECT * FROM
                    (SELECT r.id_predio id_predio, p.nombre nombre, r.id_rodal id_rodal, r.manejo manejo,
                        e.nombre_especie_arborea arborea, r.zona_crecimiento zona, r.superficie sup, r.anio_plantacion anio,
                        r.valor_comercial valor
                        FROM rodal  r, predio  p, especiearborea e
                        WHERE  r.ID_PREDIO = p.ID_PREDIO
                        AND r.id_especie_arborea = e.id_especie_arborea
                        AND r.ESTADO = '".$estado."' ORDER BY sup)
                        WHERE ROWNUM <= $seleccionCantidad";
            }else{
              $laConsulta = "SELECT r.id_predio id_predio, p.nombre nombre, r.id_rodal id_rodal, r.manejo manejo,
                        e.nombre_especie_arborea arborea, r.zona_crecimiento zona, r.superficie sup, r.anio_plantacion anio,
                        r.valor_comercial valor
                        FROM rodal  r, predio  p, especiearborea e
                        WHERE  r.ID_PREDIO = p.ID_PREDIO
                        AND r.id_especie_arborea = e.id_especie_arborea
                        AND r.ESTADO = '".$estado."'
                        ORDER BY sup";  
            }
            
        }
        if($seleccion == 5){
            if($seleccionCantidad<=100){
                $laConsulta ="
                    SELECT * FROM
                    (SELECT r.id_predio id_predio, p.nombre nombre, r.id_rodal id_rodal, r.manejo manejo,
                        e.nombre_especie_arborea arborea, r.zona_crecimiento zona, r.superficie sup, r.anio_plantacion anio,
                        r.valor_comercial valor
                        FROM rodal  r, predio  p, especiearborea e
                        WHERE  r.ID_PREDIO = p.ID_PREDIO
                        AND r.id_especie_arborea = e.id_especie_arborea
                        AND r.ESTADO = '".$estado."' ORDER BY zona)
                        WHERE ROWNUM <= $seleccionCantidad";
            }else{
               $laConsulta = "SELECT r.id_predio id_predio, p.nombre nombre, r.id_rodal id_rodal, r.manejo manejo,
                    e.nombre_especie_arborea arborea, r.zona_crecimiento zona, r.superficie sup, r.anio_plantacion anio,
                    r.valor_comercial valor
                    FROM rodal  r, predio  p, especiearborea e
                    WHERE  r.ID_PREDIO = p.ID_PREDIO
                    AND r.id_especie_arborea = e.id_especie_arborea
                    AND r.ESTADO = '".$estado."'
                    ORDER BY zona"; 
            }
            
        }
        }
        
        $query = $this->cone->ejecutar($laConsulta);
        $this->cone->desconectar();
        return $query;
    }
    
   


    public function findByExample($rodal){
        
        
    }
    
    /**
     * @author Renato Hormazabal <nato.ehv@gmail.com>
     * @param Predio $predio la cual será guardada
     * 
     * 
     */
    
    public function save($rodal) {
        $this->cone->conectar();
        $laConsulta = "INSERT into RODAL (ID_RODAL, ANIO_PLANTACION, SUPERFICIE, VALOR_COMERCIAL, ID_ESPECIE_ARBOREA, ID_PREDIO, MANEJO, ZONA_CRECIMIENTO, ESTADO) 
            VALUES ('".$rodal->getIdRodal()."','".$rodal->getAnioPlantacion()."','".$rodal->getSuperficie()."','".$rodal->getValorComercial()."','".$rodal->getIdEspecieArborea()."','".$rodal->getIdPredio()."','".$rodal->getManejo()."','".$rodal->getZonaCrecimiento()."','".$rodal->getEstado()."')";
        $this->cone->ejecutar($laConsulta);
        $this->cone->desconectar();
        
    }

    public function findById($idRodal) {
        $rodalEncontrado = new Rodal();
        $this->cone->conectar();
        $laConsulta = "SELECT * FROM rodal WHERE ID_RODAL = '".$idRodal."'";
        $query = $this->cone->ejecutar($laConsulta);
        while(ocifetch($query)){   
            $rodalEncontrado->setIdRodal(ociresult($query, "ID_RODAL"));
            $rodalEncontrado->setAnioPlantacion(ociresult($query, "ANIO_PLANTACION"));
            $rodalEncontrado->setSuperficie(ociresult($query, "SUPERFICIE"));
            $rodalEncontrado->setValorComercial(ociresult($query, "VALOR_COMERCIAL"));
            $rodalEncontrado->setIdEspecieArborea(ociresult($query, "ID_ESPECIE_ARBOREA"));
            $rodalEncontrado->setIdPredio(ociresult($query, "ID_PREDIO"));
            $rodalEncontrado->setManejo(ociresult($query, "MANEJO"));
            $rodalEncontrado->setZonaCrecimiento(ociresult($query, "ZONA_CRECIMIENTO"));
            $rodalEncontrado->setEstado(ociresult($query, "ESTADO"));
        }
        
        $this->cone->desconectar();
        return $rodalEncontrado;
    }

    public function findLikeAtrr($name) {
        
    }

    public function update($object) {
        
        $this->cone->conectar();
        $laConsulta = "UPDATE rodal 
                        SET     ID_RODAL='".$object->getIdRodal()."',
                                ANIO_PLANTACION='".$object->getAnioPlantacion()."',
                                SUPERFICIE='".$object->getSuperficie()."',
                                VALOR_COMERCIAL='".$object->getValorComercial()."',
                                ID_ESPECIE_ARBOREA = '".$object->getIdEspecieArborea()."',
                                MANEJO = '".$object->getManejo()."',
                                ZONA_CRECIMIENTO = '".$object->getZonaCrecimiento()."',
                                ESTADO= '".$object->getEstado()."', 
                                ID_PREDIO= '".$object->getIdPredio()."'
                        WHERE ID_RODAL='".$object->getIdRodal()."' ";
        
        $this->cone->ejecutar($laConsulta);
        $this->cone->desconectar();
    }
    
    public function delete($idRodal){
        $this->cone->conectar();
        $estadoEliminado = 0;
        $laConsulta = "UPDATE rodal 
                        SET     
                            ESTADO='".$estadoEliminado."'   
                        WHERE ID_RODAL='".$idRodal."' ";
        $this->cone->ejecutar($laConsulta);
        $this->cone->desconectar();
        
    }
    
    public function deleteRodalByIdPredio($idPredio){
        $this->cone->conectar();
        $estadoEliminado = 0;
        $laConsulta = "UPDATE rodal 
                        SET     
                            ESTADO='".$estadoEliminado."'   
                        WHERE ID_PREDIO='".$idPredio."' ";
        $this->cone->ejecutar($laConsulta);
        $this->cone->desconectar();
        
    }

}
?>
