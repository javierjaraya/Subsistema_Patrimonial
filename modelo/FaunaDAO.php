<?php
include_once 'Conexion.php';
include_once '../controlador/FaunaImagen.php';
/**
 * Description of FaunaImagenDAO
 *
 * @author Javier
 */
class FaunaImagenDAO implements interfaceDAO{
    private $conexion;
    
    public function FaunaImagenDAO(){
        $this->conexion= new Conexion();
    }
    /**
     * Metodo que retorna toda a fauna con su imagen asignada
     */
    public function findAll() {
        $this->conexion->conectar();
        $consultaSQL = "";
        $query = $this->conexion->ejecutar($consultaSQL);
        
        $faunas = array();
        while(ocifetch($query)){
            $faunaImagen = new FaunaImagen();
            $faunaImagen->setIdCamino(ociresult($query, "ID_CAMINO"));
            $faunaImagen->setLongitud(ociresult($query, "LONGITUD"));
            $faunaImagen->setTipoSuperficie(ociresult($query, "TIPO_SUPERFICIE"));
            $faunaImagen->setIdPredio(ociresult($query, "PREDIO"));
            $faunas[$i] = $faunaImagen;
            $i++;
        }
        $this->conexion->desconectar();
        return $faunas;
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

//put your code here
}

?>