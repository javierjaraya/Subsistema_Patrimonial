<?php

/**
 * Description of ZonaDAO
 *
 * @author Javier
 */

include_once 'Conexion.php';
include_once '../controlador/Zona.php';

class ZonaDAO {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }
    
    /**
     * Metodo que busca y retorna todas las Zonas almacenadas
     * @return Array Zona Description: retorna un array de Zonas
     */
    public function findAll(){
        $this->conexion->conectar();
        $consultaZona = "SELECT * FROM zona";
        $query = $this->conexion->ejecutar($consultaZona);
        $zonas = array(); // Lista contenedora de zonas
        $i = 0;
        while(ocifetch($query)){
            $zona = new Zona();
            $zona->setIdZona(ociresult($query, "ID_ZONA"));
            $zona->setNombre(ociresult($query, "NOMBRE"));
            $zonas[] = $zona;
        }
        $this->conexion->desconectar();
        return $zonas;
    }
    /**
     * Metodo que retorna un objeto zona correspondiente a una determinada $idZona
     * @param NUMBER(*,0) $idZona Description: identificador de un determinada Zona
     * @return Zona Description: zona con un identificador $idZona
     */
    public function getProvincia($idZona){
        $this->conexion->conectar();
        $consultaZona = "SELECT * FROM zona WHERE id_zona = $idZona";
        $query = $this->conexion->ejecutar($consultaZona);
        $zona = new Zona();
        while(ocifetch($query)){
            $zona->setIdZona(ociresult($query, "ID_ZONA"));
            $zona->setNombre(ociresult($query, "NOMBRE"));
        }
        return $zona;
    }
}
