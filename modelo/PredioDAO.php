<?php
include_once 'Conexion.php';
include_once '../controlador/Predio.php';

/**
 * Description of PredioDAO
 * 
 * @author Renato
 */
class PredioDAO implements interfaceDAO{
    private $cone;
    
    public function PredioDAO(){
            $this->cone= new Conexion();
    }
    private function queryMaxID(){
        $consultaMaxId ="SELECT (max(id_predio)+1) AS id FROM predio";
        $queryId = $this->cone->ejecutar($consultaMaxId);
        while(OCIFetch($queryId)){
            $id = ociresult($queryId, "ID");
        }
        return $id;
    }
    /**
     * Metodo encargado de buscar todos los predios
     * @author Renato Hormazabal <nato.ehv@gmail.com>
     */
    public function findAll(){
        $predios = array(); // Lista contenedora de predios resultados
        $this->cone->conectar();
        $id = $this->queryMaxID();
        $laConsulta = "SELECT * FROM predio";
        
        $query = $this->cone->ejecutar($laConsulta);
        $i = 0;
        while(ocifetch($query)){
            $predio = new Predio();
            $predio->setEstado(ociresult($query, "ESTADO"));
            $predio->setIdComuna(ociresult($query, "ID_COMUNA"));
            $predio->setIdEmpresa(ociresult($query, "ID_EMPRESA"));
            $predio->setIdPredio(ociresult($query, "ID_PREDIO"));
            $predio->setIdZona(ociresult($query, "ID_ZONA"));
            $predio->setNombre(ociresult($query, "NOMBRE"));
            $predio->setSuperficie(ociresult($query, "SUPERFICIE"));
            $predio->setValorComercial(ociresult($query, "VALOR_COMERCIAL"));
            $predios[$i] = $predio;
            $i++;
            
        }
        $this->cone->desconectar();
        return $predios;
    }
    
    public function findByExample($predio){
        $this->cone->conectar();
        $laConsulta = " SELECT *
                        FROM predio
                        ";
    }
    /**
     * @author Renato Hormazabal <nato.ehv@gmail.com>
     * @param Predio $predio la cual será guardada
     * 
     * 
     */
    public function save($predio) {
        
    }

    public function finByExample($object) {
        
    }

    public function findByID($id) {
        
    }

    public function findLikeAtrr($name) {
        
    }

}

?>
