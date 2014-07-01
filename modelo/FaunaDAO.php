<?php
include_once 'Conexion.php';
include_once '../controlador/FaunaImagen.php';
include_once '../controlador/Fauna.php';
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
        $consultaSQL = "SELECT FAUNA.ID_FAUNA, FAUNA.NOMBRE_FAUNA, FAUNA.ESPECIE, FAUNA.DESCRIPCION, FAUNAIMAGEN.ID_IMAGEN, FAUNAIMAGEN.NOMBRE, FAUNAIMAGEN.RUTA FROM FAUNA JOIN FAUNAIMAGEN ON FAUNAIMAGEN.ID_FAUNA = FAUNA.ID_FAUNA";
        $query = $this->conexion->ejecutar($consultaSQL);
        $i = 0;
        $faunas = array();
        while(ocifetch($query)){
            $faunaImagen = new Fauna();
            $faunaImagen->setIdFauna(ociresult($query, "ID_FAUNA"));
            $faunaImagen->setNombreFauna(ociresult($query, "NOMBRE_FAUNA"));
            $faunaImagen->setEspecie(ociresult($query, "ESPECIE"));
            $faunaImagen->setDescripcion(ociresult($query, "DESCRIPCION"));
            $faunaImagen->setIdImagen(ociresult($query, "ID_IMAGEN"));
            $faunaImagen->setNombreImagen(ociresult($query, "NOMBRE"));
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

//put your code here
}

?>