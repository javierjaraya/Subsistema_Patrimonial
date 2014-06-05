<?php
/**
 * Description of RegionDAO
 *
 * @author Javier
 */

include_once 'Conexion.php';
include_once '../controlador/Region.php';

class RegionDAO {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }
    
    /**
     * Metodo que busca y retorna todas las regiones almacenadas
     * @return Array Region Description: retorna un array de Regiones
     */
    public function getAllRegiones(){
        $this->conexion->conectar();
        $consultaRegion = "SELECT * FROM region";
        $query = $this->conexion->ejecutar($consultaRegion);
        $regiones = array(); // Lista contenedora de regiones
        $i = 0;
        while(ocifetch($query)){
            $region = new Region();
            $region->setIdRegion(ociresult($query, "ID_REGION"));
            $region->setNombreRegion(ociresult($query, "NOMBRE_REGION"));
            $region->setIdPais(ociresult($query, "ID_PAIS"));
            $regiones[$i] = $region;
            $i++;
        }
        $this->cone->desconectar();
        return $regiones;
    }
    /**
     * Metodo que retorna un objeto region correspondiente a una determinada $idRegion
     * @param NUMBER(*,0) $idRegion Description: identificador de un determinada Region
     * @return Region Description: region con un identificador $idRegion
     */
    public function getRegion($idRegion){
        $this->conexion->conectar();
        $consultaRegion = "SELECT * FROM region WHERE id_region = $idRegion";
        $query = $this->conexion->ejecutar($consultaRegion);
        $region = new Region();
        while(ocifetch($query)){
            $region->setIdPais(ociresult($query, "ID_REGION"));
            $region->setNombrePais(ociresult($query, "NOMBRE_REGION"));
            $region->setIdPais(ociresult($query, "ID_PAIS"));
        }
        return $region;
    }
}
