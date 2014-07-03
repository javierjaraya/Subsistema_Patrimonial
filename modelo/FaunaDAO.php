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
        $faunaEncontrado = new Fauna();
        $this->cone->conectar();
        $laConsulta = "SELECT * FROM fauna WHERE ID_FAUNA = '".$id."'";
        $query = $this->cone->ejecutar($laConsulta);
        while(ocifetch($query)){   
            $faunaEncontrado->setNombreFauna(ociresult($query, "NOMBRE_FAUNA"));
            $faunaEncontrado->setEspecie(ociresult($query, "ESPECIE"));
            $faunaEncontrado->setDescripcion(ociresult($query, "DESCRIPCION"));
            
        }
        
        $this->cone->desconectar();
        return $faunaEncontrado;
    }

    public function findLikeAtrr($name) {
        
    }

    public function save($object) {
        
    }

    public function update($object) {
        
    }
    
    public function findAllFaunasPredio($idpredio){
        $this->conexion->conectar();
        $consulta = "SELECT * FROM FAUNA JOIN FAUNAPREDIO ON FAUNA.ID_FAUNA = FAUNAPREDIO.ID_FAUNA
                     WHERE FAUNAPREDIO.ID_PREDIO = $idpredio";
        $query = $this->conexion->ejecutar($consulta);
        
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
}
?>