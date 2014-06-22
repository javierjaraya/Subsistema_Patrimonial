<?php

/**
 * Description of InventarioDAO
 *
 * @author Iván
 */

include_once 'Conexion.php';
include_once '../controlador/Inventario.php';

class InventarioDAO {
    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }
    
    public function findInventarioByIdRodal($idRodal){
        
        $this->cone->conectar();
        $laConsulta = "SELECT * FROM inventario
            WHERE  ID_RODAL = '".$idRodal."'
            ORDER BY ID_INVENTARIO";
        
        $query = $this->cone->ejecutar($laConsulta);
        $this->cone->desconectar();
        return $query;
    }
}
