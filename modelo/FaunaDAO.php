<?php
include_once 'Conexion.php';
include_once '../controlador/Fauna.php';
/**
 * Description of FaunaImagenDAO
 *
 * @author Javier
 */
class FaunaDAO implements interfaceDAO{
    private $conexion;
    
    public function FaunaDAO(){
        $this->conexion= new Conexion();
    }
    /**
     * Metodo que retorna toda a fauna con su imagen asignada
     */
    public function findAll() {
        $this->conexion->conectar();
        $consultaSQL = "SELECT * FROM FAUNA";
        $query = $this->conexion->ejecutar($consultaSQL);
        $i = 0;
        $faunas = array();
        while(ocifetch($query)){
            $faunaImagen = new Fauna();
            $faunaImagen->setIdFauna(ociresult($query, "ID_FAUNA"));
            $faunaImagen->setNombreFauna(ociresult($query, "NOMBRE_FAUNA"));
            $faunaImagen->setEspecie(ociresult($query, "ESPECIE"));
            $faunaImagen->setDescripcion(ociresult($query, "DESCRIPCION"));
            $faunaImagen->setNombreImagen(ociresult($query, "NOMBRE_IMAGEN"));
            $faunaImagen->setRutaImagen(ociresult($query, "RUTA"));
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
}
?>