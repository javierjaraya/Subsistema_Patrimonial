<?php

/**
 * Description of ProvinciaDAO
 *
 * @author Javier
 */

include_once 'Conexion.php';
include_once '../controlador/Provincia.php';

class ProvinciaDAO {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }
    
    /**
     * Metodo que busca y retorna todas las Provincias almacenadas
     * @return Array Provincia Description: retorna un array de Provincias
     */
    public function getAllProvincias(){
        $this->conexion->conectar();
        $consultaProvincia = "SELECT * FROM provincia";
        $query = $this->conexion->ejecutar($consultaProvincia);
        $provincias = array(); // Lista contenedora de provincias
        $i = 0;
        while(ocifetch($query)){
            $provincia = new Provincia();
            $provincia->setIdProvincia(ociresult($query, "ID_PROVINCIA"));
            $provincia->setNombreProvincia(ociresult($query, "NOMBRE_PROVINCIA"));
            $provincia->setIdRegion(ociresult($query, "ID_REGION"));
            $provincias[$i] = $provincia;
            $i++;
        }
        $this->cone->desconectar();
        return $provincias;
    }
    /**
     * Metodo que retorna un objeto provincia correspondiente a una determinada $idProvincia
     * @param NUMBER(*,0) $idRegion Description: identificador de un determinada Provincia
     * @return Provincia Description: provincia con un identificador $idProvincia
     */
    public function getProvincia($idProvincia){
        $this->conexion->conectar();
        $consultaProvincia = "SELECT * FROM provincia WHERE id_provincia = $idProvincia";
        $query = $this->conexion->ejecutar($consultaProvincia);
        $provincia = new Provincia();
        while(ocifetch($query)){
            $provincia->setIdProvincia(ociresult($query, "ID_PROVINCIA"));
            $provincia->setNombreProvincia(ociresult($query, "NOMBRE_PROVINCIA"));
            $provincia->setIdRegion(ociresult($query, "ID_REGION"));
        }
        return $provincia;
    }
}
