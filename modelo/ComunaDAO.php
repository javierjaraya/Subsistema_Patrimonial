<?php

/**
 * Description of ComunaDAO
 *
 * @author Javier
 */

include_once 'Conexion.php';
include_once '../controlador/Comuna.php';

class ComunaDAO {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }
    
    /**
     * Metodo que busca y retorna todas las Comunas almacenadas
     * @return Array Comuna Description: retorna un array de Comunas
     */
    public function getAllComunas(){
        $this->conexion->conectar();
        $consultaComuna = "SELECT * FROM comuna";
        $query = $this->conexion->ejecutar($consultaComuna);
        $comunas = array(); // Lista contenedora de comunas
        $i = 0;
        while(ocifetch($query)){
            $comuna = new Comuna();
            $comuna->setIdComuna(ociresult($query, "ID_COMUNA"));
            $comuna->setNombreComuna(ociresult($query, "NOMBRE_COMUNA"));
            $comuna->setIdProvincia(ociresult($query, "ID_PROVINCIA"));
            $comunas[$i] = $comuna;
            $i++;
        }
        $this->cone->desconectar();
        return $comunas;
    }
    /**
     * Metodo que retorna un objeto comuna correspondiente a una determinada $idComuna
     * @param NUMBER(*,0) $idComuna Description: identificador de un determinada Comuna
     * @return Comuna Description: comuna con un identificador $idComuna
     */
    public function getProvincia($idComuna){
        $this->conexion->conectar();
        $consultaComuna = "SELECT * FROM comuna WHERE id_comuna = $idComuna";
        $query = $this->conexion->ejecutar($consultaComuna);
        $comuna = new Provincia();
        while(ocifetch($query)){
            $comuna->setIdComuna(ociresult($query, "ID_COMUNA"));
            $comuna->setNombreComuna(ociresult($query, "NOMBRE_COMUNA"));
            $comuna->setIdProvincia(ociresult($query, "ID_PROVINCIA"));
        }
        return $comuna;
    }
}