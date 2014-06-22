<?php

/**
 * Description of InventarioDAO
 *
 * @author Iván
 */

include_once 'Conexion.php';
include_once '../controlador/Inventario.php';
include_once 'interfaceDAO.php';

class InventarioDAO  implements interfaceDAO{
    private $conexion;

    public function InventarioDAO() {
        $this->conexion = new Conexion();
    }
    
    public function findInventarioByIdRodal($idRodal){
        $this->conexion->conectar();
        $laConsulta = "SELECT * FROM inventario
            WHERE  ID_RODAL = '".$idRodal."'
            ORDER BY ID_INVENTARIO";
        
        $query = $this->conexion->ejecutar($laConsulta);
        $this->conexion->desconectar();
        return $query;
    }
    
    public function findBetweenDate($idRodal, $fi, $ff){
        $this->conexion->conectar();
        $laConsulta = "SELECT * FROM inventario
            WHERE  ID_RODAL = '".$idRodal."'
            AND (FECHA_MEDICION BETWEEN '".$fi."' AND '".$ff."')
            ORDER BY FECHA_MEDICION";
        echo $laConsulta;
        $query = $this->conexion->ejecutar($laConsulta);
        $this->conexion->desconectar();
        return $query;
    }

    public function findAll() {
        
    }

    public function findByExample($object) {
        
    }

    public function findByID($id) {
        
    }

    public function findLikeAtrr($name) {
        
    }

    public function save($object) {
        
    }

    public function update($object) {
        
    }
}
