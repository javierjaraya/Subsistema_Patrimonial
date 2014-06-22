<?php

include_once 'Conexion.php';
include_once '../controlador/Rodal.php';
include_once 'interfaceDAO.php';

class RodalDAO implements interfaceDAO{
    private $cone;
    
    public function RodalDAO(){
            $this->cone= new Conexion();
    }
    
    public function findAll(){
        $estado = 1;
        $this->cone->conectar();
        $laConsulta = "SELECT * FROM rodal  r, predio  p, especiearborea e
            WHERE  r.ID_PREDIO = p.ID_PREDIO
            AND r.id_especie_arborea = e.id_especie_arborea
            AND r.ESTADO = '".$estado."'
            
            ORDER BY p.ID_PREDIO";
        
        $query = $this->cone->ejecutar($laConsulta);
        $this->cone->desconectar();
        return $query;
    }
    
    public function findByExample($rodal){
        
        
    }
    /**
     * @author Renato Hormazabal <nato.ehv@gmail.com>
     * @param Predio $predio la cual será guardada
     * 
     * 
     */
    public function save($predio) {
        
        
    }

    public function findById($idPredio) {
        $predioEncontrado = new Predio();
        $this->cone->conectar();
        $laConsulta = "SELECT * FROM predio WHERE ID_PREDIO = '".$idPredio."'";
        $query = $this->cone->ejecutar($laConsulta);
        while(ocifetch($query)){
            $predioEncontrado = new Predio();
            $predioEncontrado->setEstado(ociresult($query, "ESTADO"));
            $predioEncontrado->setIdComuna(ociresult($query, "ID_COMUNA"));
            $predioEncontrado->setIdEmpresa(ociresult($query, "ID_EMPRESA"));
            $predioEncontrado->setIdPredio(ociresult($query, "ID_PREDIO"));
            $predioEncontrado->setIdZona(ociresult($query, "ID_ZONA"));
            $predioEncontrado->setNombre(ociresult($query, "NOMBRE"));
            $predioEncontrado->setSuperficie(ociresult($query, "SUPERFICIE"));
            $predioEncontrado->setValorComercial(ociresult($query, "VALOR_COMERCIAL"));
            
            
        }
        $this->cone->desconectar();
        return $predioEncontrado;
    }

    public function findLikeAtrr($name) {
        
    }

    public function update($object) {
        
    }
    
    public function delete($idRodal){
        $this->cone->conectar();
        $estadoEliminado = 0;
        $laConsulta = "UPDATE rodal 
                        SET     
                            ESTADO='".$estadoEliminado."'   
                        WHERE ID_RODAL='".$idRodal."' ";
        $this->cone->ejecutar($laConsulta);
        $this->cone->desconectar();
        
    }

}
?>
