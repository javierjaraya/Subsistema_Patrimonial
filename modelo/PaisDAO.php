<?php

/**
 * Description of PaisDAO
 *
 * @author Javier
 */

include_once 'Conexion.php';
include_once '../controlador/Pais.php';

class PaisDAO {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }
    
    /**
     * Metodo que busca y retorna todos los paises almacenados
     * @return Array Pais Description: retorna un array de Paises
     */
    public function getAllPais(){
        $this->conexion->conectar();
        $consultaPais = "SELECT * FROM pais";
        $query = $this->conexion->ejecutar($consultaPais);
        $paises = array(); // Lista contenedora de paises
        $i = 0;
        while(ocifetch($query)){
            $pais = new Pais();
            $pais->setIdPais(ociresult($query, "ID_PAIS"));
            $pais->setNombrePais(ociresult($query, "NOMBRE_PAIS"));
            $paises[$i] = $pais;
            $i++;
        }
        $this->cone->desconectar();
        return $paises;
    }
    /**
     * Metodo que retorna un objeto pais correspondiente a una determinada $idPais
     * @param NUMBER(*,0) $idPais Description: identificador de un determinado Pais
     * @return Pais Description: pais con un identificador $idPais
     */
    public function getPais($idPais){
        $this->conexion->conectar();
        $consultaPais = "SELECT * FROM pais WHERE id_pais = $idPais";
        $query = $this->conexion->ejecutar($consultaPais);
        $pais = new Pais();
        while(ocifetch($query)){
            $pais->setIdPais(ociresult($query, "ID_PAIS"));
            $pais->setNombrePais(ociresult($query, "NOMBRE_PAIS"));
        }
        return $pais;
    }
}
