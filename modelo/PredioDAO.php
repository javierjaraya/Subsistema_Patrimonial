<?php
include_once 'Conexion.php';
include_once '../controlador/Predio.php';
include_once 'interfaceDAO.php';

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
        $laConsulta = " SELECT * FROM predio";
        $conector = "WHERE";
        /*
         * Verifico valores que vienen en el ejemplo
         */
        if($predio->getIdPredio() != ""){
            $laConsulta = $laConsulta." ".$conector." ID_PREDIO = $predio->getIdPredio()";
            $conector  = "AND";
        }
            
        if($predio->getNombre() != ""){
            $laConsulta = $laConsulta." ".$conector." NOMBRE = $predio->getNombre()";
            $conector  = "AND";
        }
        if($predio->getSuperficie() != ""){
            $laConsulta = $laConsulta." ".$conector." SUPERFICIE = $predio->getSuperficie()";
            $conector  = "AND";
        }
        if($predio->getEstado() != ""){
            $laConsulta = $laConsulta." ".$conector." ESTADO = $predio->getEstado()";
            $conector  = "AND";
        }
        if($predio->getValorComercial() != ""){
            $laConsulta = $laConsulta." ".$conector." VALOR_COMERCIAL = $predio->getValorComercial()";
            $conector  = "AND";
        }
        if($predio->getIdComuna() != ""){
            $laConsulta = $laConsulta." ".$conector." ID_COMUNA = $predio->getIdComuna()";
            $conector  = "AND";
        }
        if($predio->getIdZona() != ""){
            $laConsulta = $laConsulta." ".$conector." ID_ZONA = $predio->getIdZona()";
            $conector  = "AND";
        }
        if($predio->getIdEmpresa() != ""){
            $laConsulta = $laConsulta." ".$conector." ID_EMPRESA = $predio->getIdEmpresa()";
        }
        $query = $this->cone->ejecutar($laConsulta);
        
        $predios = array();
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
            $predios[] = $predio;
        }
        $this->cone->desconectar();
        return $predios;
        
    }
    /**
     * @author Renato Hormazabal <nato.ehv@gmail.com>
     * @param Predio $predio la cual será guardada
     * 
     * 
     */
    public function save($predio) {
        $this->cone->conectar();
        $laConsulta = "INSERT into PREDIO (ID_PREDIO, NOMBRE, SUPERFICIE, ESTADO, VALOR_COMERCIAL, ID_COMUNA, ID_ZONA, ID_EMPRESA) 
            VALUES ('".$predio->getIdPredio()."','".$predio->getNombre()."','".$predio->getSuperficie()."','".$predio->getEstado()."','".$predio->getValorComercial()."','".$predio->getIdComuna()."','".$predio->getIdZona()."','".$predio->getIdEmpresa()."')";
        $this->cone->ejecutar($laConsulta);
        $this->cone->desconectar();
        
    }

    public function findByID($id) {
        
    }

    public function findLikeAtrr($name) {
        
    }

    public function update($object) {
        
    }

}

?>
