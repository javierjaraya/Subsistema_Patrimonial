<?php

/**
 * Description of CarpetaLegalDAO
 * Clase encargada de realizar la conexion enter el Sistema y la BD
 * @author Sebastián Jara
 */
include_once 'Conexion.php';
include_once '../controlador/CarpetaLegal.php';
include_once 'interfaceDAO.php';

class CarpetaLegalDAO{

    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    /** Metodo que busca la id maximo y retorna un codigo disponible
     * @author Sebastián Jara
     * @return NUMBER (*,0) : identificador disponible
     */
    private function queryMaxId() {
        $this->conexion->conectar();
        $consultaMaxId = "SELECT (max(codigo)+1) AS id FROM carpetalegal";
        $queryId = $this->conexion->ejecutar($consultaMaxId);
        while (OCIFetch($queryId)) {
            $id = ociresult($queryId, "ID");
        }
        $this->conexion->desconectar();
        return $id;
    }

    public function findAll() {
        $carpetas = array(); // Lista contenedora de las carpetas
        //$codigo = $this->queryMaxId();
        $this->conexion->conectar();
        $laConsulta = "SELECT * FROM CARPETALEGAL";
        
        $query = $this->conexion->ejecutar($laConsulta);
        $i = 0;
        while(ocifetch($query)){
            $carpeta = new CarpetaLegal();
            $carpeta->setFechaInscripcion(ociresult($query, "FECHA_INSCRIPCION"));
            $carpeta->setContribucion(ociresult($query, "CONTRIBUCION"));
            $carpeta->setCodigo(ociresult($query, "CODIGO"));
            $carpeta->setRol(ociresult($query, "ROL"));
            $carpeta->setConservadorBienRaiz(ociresult($query, "CONSERVADOR_BIEN_RAIZ"));
            $carpeta->setIdPredio(ociresult($query, "ID_PREDIO"));   
            $carpeta->setEstado(ociresult($query, "ESTADO"));  
            $carpetas[$i] = $carpeta;
            $i++;
            
        }
        $this->conexion->desconectar();
        return $carpetas;
    }
    
    public function delete($codigo){
        $this->conexion->conectar();
        $estadoEliminado = 0;
        $laConsulta = "UPDATE CARPETALEGAL 
                        SET     
                            ESTADO='".$estadoEliminado."'   
                        WHERE CODIGO='".$codigo."' ";
        //echo $laConsulta;
        $this->conexion->ejecutar($laConsulta);
        $this->conexion->desconectar();
        
    }
    
    public function save($carpeta) {
        
        $this->conexion->conectar();
        $laConsulta = "INSERT into CARPETALEGAL (CODIGO, FECHA_INSCRIPCION, ROL, CONSERVADOR_BIEN_RAIZ, CONTRIBUCION, ID_PREDIO, ESTADO)"
                . " VALUES ('".$carpeta->getCodigo()."','".$carpeta->getFechaInscripcion()."','".$carpeta->getRol()."','".$carpeta->getConservadorBienRaiz()."','".$carpeta->getContribucion()."','".$carpeta->getIdPredio()."','".$carpeta->getEstado()."')";
        echo $laConsulta; 
        $this->conexion->ejecutar($laConsulta);
        $this->conexion->desconectar();
    }
    
    public function findLikeAtrr($name) {
        
    }

    public function findByExample($object) {
        
    }

    public function update($object) {
        
    }

}

?>

