<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SuperficieDAO
 *
 * @author Javier
 */

include_once 'Conexion.php';
include_once '../controlador/Superficie.php';

class SuperficieDAO {
    //put your code here
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }
    
    public function getAllSuperficies(){
        $this->conexion->conectar();
        $consulta = "SELECT * FROM superficie";
        $query = $this->conexion->ejecutar($consulta);
        $superficies = array(); 
        $i = 0;
        while(ocifetch($query)){
            $superficie = new Superficie();
            $superficie->setIdSuperficie(ociresult($query, "ID_SUPERFICIE"));
            $superficie->setNombreSuperficie(ociresult($query, "NOMBRE_SUPERFICIE"));
            $superficies[$i] = $superficie;
            $i++;
        }
        $this->cone->desconectar();
        return $superficies;
    }
    
    public function findById($idSuperficie){
        $this->conexion->conectar();
        $consulta = "SELECT * FROM superficie WHERE id_superficie = $idSuperficie";
        $query = $this->conexion->ejecutar($consulta);
        $superficie = new Superficie();
        while(ocifetch($query)){
            $superficie->setIdSuperficie(ociresult($query, "ID_SUPERFICIE"));
            $superficie->setNombreSuperficie(ociresult($query, "NOMBRE_SUPERFICIE"));
        }
        return $superficie;
    }
    
    public function getLike($nombre){
        $this->conexion->conectar();
        // busca cohincidencias que comiencen con $nombre
        $consulta = " SELECT  NOMBRE_SUPERFICIE, ID_SUPERFICIE
                            FROM    Superficie
                            WHERE   upper(nombre_superficie) LIKE upper('$nombre%')";
        $query = $this->conexion->ejecutar($consulta);
        $superficies = array();
        $resultado_superficies = array();
        while(ocifetch($query)){
            //es necesario pasar a UTF8 para conservar eñes y tíldes 
            $superficies['id']  = utf8_encode(ociresult($query, "ID_SUPERFICIE"));
            $superficies['value'] = utf8_encode(ociresult($query, "NOMBRE_SUPERFICIE"));
            array_push($resultado_superficies, $superficies);
        }
        $this->conexion->desconectar();
        return $resultado_superficies;
    }
    
    public function findByExample($superficie){
        $this->conexion->conectar();
        $conector = "WHERE";
        $query = "  SELECT  *
                    FROM    Superficie";
        if($superficie->getIdSuperficie() != ""){
             $query = $query." ".$conector." ID_SUPERFICIE = ".$superficie->getIdSuperficie();
             $conector = "AND";
        }
        if($superficie->getNombreSuperficie() != "")
            $query = $query." ".$conector." upper(NOMBRE_SUPERFICIE) = upper('".$superficie->getNombreSuperficie()."')";
        
        $result = $this->conexion->ejecutar($query);
        $superficies = array();
        while(ocifetch($result)){
            $superficie = new Superficie();
            $superficie->setIdSuperficie(ociresult($result, "ID_SUPERFICIE"));
            $superficie->setNombreSuperficie(ociresult($result, "NOMBRE_SUPERFICIE"));
            $superficies[] = $superficie;
        }
        $this->conexion->desconectar();
        return $superficies;
    }
    
}
