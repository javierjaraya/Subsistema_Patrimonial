<?php
include_once 'Conexion.php';
include_once '../controlador/Flora.php';
/**
 * Description of FloraDAO
 *
 * @author Javier
 */
class FloraDAO implements interfaceDAO{
    private $conexion;
    
    public function FloraDAO(){
        $this->conexion= new Conexion();
    }
    
    public function findAll() {
        $this->conexion->conectar();
        $consultaSQL = "SELECT * FROM FLORA";
        $query = $this->conexion->ejecutar($consultaSQL);
        $i = 0;
        $floras = array();
        while(ocifetch($query)){
            $floraImagen = new Flora();
            $floraImagen->setIdFlora(ociresult($query, "ID_FLORA"));
            $floraImagen->setNombreFlora(ociresult($query, "NOMBRE_FLORA"));
            $floraImagen->setEspecie(ociresult($query, "ESPECIE"));
            $floraImagen->setDescripcion(ociresult($query, "DESCRIPCION"));
            $floraImagen->setNombreImagen(ociresult($query, "NOMBRE_IMAGEN"));
            $floraImagen->setRutaImagen(ociresult($query, "RUTA"));
            $floras[$i] = $floraImagen;
            $i++;
        }
        $this->conexion->desconectar();
        return $floras;
    }

    public function findByExample($object) {
        
    }

    public function findByID($id) {
        $this->conexion->conectar();
        $consulta = "SELECT * FROM flora WHERE flora.ID_FLORA = ".$id;
        $query = $this->conexion->ejecutar($consulta);
        $flora = new Flora();
        while(ocifetch($query)){
            $flora->setIdFlora(ociresult($query, "ID_FLORA"));
            $flora->setNombreFlora(ociresult($query, "NOMBRE_FLORA"));
            $flora->setEspecie(ociresult($query, "ESPECIE"));
            $flora->setDescripcion(ociresult($query, "DESCRIPCION"));
        }
        $this->conexion->desconectar();
        return $flora;
    }

    public function findLikeAtrr($name) {
        
    }

    public function save($object) {
        
    }

    public function update($flora) {
        $this->conexion->conectar();
        $laConsulta = "UPDATE flora 
                        SET     ID_FLORA='".$flora->getIdFlora()."',
                                NOMBRE_FLORA='".$flora->getNombreFlora()."',
                                ESPECIE='".$flora->getEspecie()."',
                                DESCRIPCION='".$flora->getDescripcion()."'   
                               
                        WHERE ID_FLORA='".$flora->getIdFlora()."' ";
        
        $this->conexion->ejecutar($laConsulta);
        $this->conexion->desconectar();
    }
    
    public function findAllFlorasPredio($idpredio){
        $this->conexion->conectar();
        $consulta = "SELECT * FROM FLORA JOIN FLORAPREDIO ON FLORA.ID_FLORA = FLORAPREDIO.ID_FLORA
                     WHERE FLORAPREDIO.ID_PREDIO = $idpredio";
        $query = $this->conexion->ejecutar($consulta);
        
        $i = 0;
        $floras = array();
        while(ocifetch($query)){
            $floraImagen = new Flora();
            $floraImagen->setIdFlora(ociresult($query, "ID_FLORA"));
            $floraImagen->setNombreFlora(ociresult($query, "NOMBRE_FLORA"));
            $floraImagen->setEspecie(ociresult($query, "ESPECIE"));
            $floraImagen->setDescripcion(ociresult($query, "DESCRIPCION"));
            $floraImagen->setNombreImagen(ociresult($query, "NOMBRE_IMAGEN"));
            $floraImagen->setRutaImagen(ociresult($query, "RUTA"));
            $floras[$i] = $floraImagen;
            $i++;
        }
        $this->conexion->desconectar();
        return $floras;
    }
}
?>