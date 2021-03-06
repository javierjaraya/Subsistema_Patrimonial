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
     * Metodo encargado de buscar todos los predios ACTIVOS
     * @author Renato Hormazabal <nato.ehv@gmail.com>
     */
    public function findAll(){
        $predios = array(); // Lista contenedora de predios resultados
        $this->cone->conectar();
        $estadoActivo = 1;
        $laConsulta = " SELECT * 
                        FROM predio , comuna
                        WHERE ESTADO = '".$estadoActivo."' 
                        AND PREDIO.ID_COMUNA = COMUNA.ID_COMUNA
                        ORDER BY ID_PREDIO";
        
        $query = $this->cone->ejecutar($laConsulta);
        while(ocifetch($query)){
            $predio = new Predio();
            $comuna = new Comuna();
            $predio->setEstado(ociresult($query, "ESTADO"));
            $predio->setIdComuna(ociresult($query, "ID_COMUNA"));
            $predio->setIdEmpresa(ociresult($query, "ID_EMPRESA"));
            $predio->setIdPredio(ociresult($query, "ID_PREDIO"));
            $predio->setIdZona(ociresult($query, "ID_ZONA"));
            $predio->setNombre(ociresult($query, "NOMBRE"));
            $predio->setSuperficie(ociresult($query, "SUPERFICIE"));
            $predio->setValorComercial(ociresult($query, "VALOR_COMERCIAL"));
            /*
             * Carga comuna
             */
            $comuna->setIdComuna(ociresult($query, "ID_COMUNA"));
            $comuna->setIdProvincia(ociresult($query, "ID_PROVINCIA"));
            $comuna->setNombreComuna(ociresult($query, "NOMBRE_COMUNA"));
            $predio->setComuna($comuna);
            
            $predios[] = $predio;
            
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
            $laConsulta = $laConsulta." ".$conector." ID_PREDIO = ".$predio->getIdPredio();
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

    public function findById($idPredio) {
        $predioEncontrado = new Predio();
        $comuna = new Comuna();
        $this->cone->conectar();
        $laConsulta = " SELECT * 
                        FROM PREDIO, COMUNA 
                        WHERE PREDIO.ID_PREDIO = ".$idPredio."
                        AND PREDIO.ID_COMUNA = COMUNA.ID_COMUNA";
        $query = $this->cone->ejecutar($laConsulta);
        while(ocifetch($query)){
            $predioEncontrado = new Predio();
            $comuna = new Comuna();
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

    public function findLikeAtrr($id) {
         $this->cone->conectar();
        // busca cohincidencias que comiencen con $id
        $consulta = " SELECT  ID_PREDIO
                            FROM    PREDIO
                            WHERE   upper(ID_PREDIO) LIKE upper('$id%')";
        $query = $this->cone->ejecutar($consulta);
        $comunas = array();
        $resultado_comunas = array();
        while(ocifetch($query)){
            //es necesario pasar a UTF8 para conservar eñes y tíldes 
            $comunas['id']  = utf8_encode(ociresult($query, "ID_PREDIO"));
            $comunas['value'] = utf8_encode(ociresult($query, "ID_PREDIO"));
            array_push($resultado_comunas, $comunas);
        }
//        if(!isset($comunas))
//            $comunas[] ="Sin resultado";
        $this->cone->desconectar();
        return $resultado_comunas;
    }

    public function update($object) {
        
    }
    public function actualizarPredioDAO($predio, $id_original) {
        
        $this->cone->conectar();
        $laConsulta = "UPDATE predio 
                        SET     ID_PREDIO='".$predio->getIdPredio()."',
                                NOMBRE='".$predio->getNombre()."',
                                SUPERFICIE='".$predio->getSuperficie()."',
                                VALOR_COMERCIAL='".$predio->getValorComercial()."',
                                ESTADO='".$predio->getEstado()."'   
                               
                        WHERE ID_PREDIO='".$id_original."' ";
        
        $this->cone->ejecutar($laConsulta);
        $this->cone->desconectar();
    }
    
    public function delete($idPredio){
        $this->cone->conectar();
        $estadoEliminado = 0;
        $laConsulta = "UPDATE predio 
                        SET     
                            ESTADO='".$estadoEliminado."'   
                        WHERE ID_PREDIO='".$idPredio."' ";
        $this->cone->ejecutar($laConsulta);
        $this->cone->desconectar();
        
    }
    
    public function existe($idPredio){
        $this->cone->conectar();
        $consultaCantidad ="SELECT count(*) AS ID FROM predio WHERE ID_PREDIO = '".$idPredio."' ";
        $queryId = $this->cone->ejecutar($consultaCantidad);
        
        while(OCIFetch($queryId)){
            $id = ociresult($queryId, "ID");
        }
        $this->cone->desconectar();
        if($id>0){
            return true;
        }else{
            return false;
        }
    }
    
     public function findAllSelection($seleccion, $seleccionCantidad){
        $array = array("p.ID_PREDIO","p.NOMBRE", "c.NOMBRE_COMUNA", "SUPERFICIE", "VALOR_COMERCIAL");
        $estado = 1;
        $this->cone->conectar();

            if($seleccionCantidad<=100){

                  $laConsulta = "
                    SELECT * FROM
                    (SELECT p.ID_PREDIO, p.NOMBRE, p.SUPERFICIE, p.VALOR_COMERCIAL, p.ID_COMUNA,
                            p.ID_EMPRESA, p.ID_ZONA, c.ID_PROVINCIA, c.NOMBRE_COMUNA
                        FROM predio p, comuna c, zona z
                        WHERE   p.ID_COMUNA = c.ID_COMUNA
                        AND     p.ID_ZONA = z.ID_ZONA
                        AND p.ESTADO = '".$estado."' ORDER BY ".$array[$seleccion].")

                        WHERE ROWNUM <= $seleccionCantidad";  


            }else{
                $laConsulta = "SELECT *
                        FROM predio p, comuna c, zona z
                        WHERE   p.ID_COMUNA = c.ID_COMUNA
                        AND     p.ID_ZONA = z.ID_ZONA
                        AND p.ESTADO = '".$estado."' ORDER BY ".$array[$seleccion];
            }
      
        
        $query = $this->cone->ejecutar($laConsulta);
        while(ocifetch($query)){
            $predio = new Predio();
            $comuna = new Comuna();
            $predio->setIdComuna(ociresult($query, "ID_COMUNA"));
            $predio->setIdEmpresa(ociresult($query, "ID_EMPRESA"));
            $predio->setIdPredio(ociresult($query, "ID_PREDIO"));
            $predio->setIdZona(ociresult($query, "ID_ZONA"));
            $predio->setNombre(ociresult($query, "NOMBRE"));
            $predio->setSuperficie(ociresult($query, "SUPERFICIE"));
            $predio->setValorComercial(ociresult($query, "VALOR_COMERCIAL"));
            /*
             * Carga comuna
             */
            $comuna->setIdComuna(ociresult($query, "ID_COMUNA"));
            $comuna->setIdProvincia(ociresult($query, "ID_PROVINCIA"));
            $comuna->setNombreComuna(ociresult($query, "NOMBRE_COMUNA"));
            $predio->setComuna($comuna);
            
            $predios[] = $predio;
            
        }
        
        $this->cone->desconectar();
        return $predios;
    }

}

?>
