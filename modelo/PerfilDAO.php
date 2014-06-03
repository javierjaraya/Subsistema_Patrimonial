<?php
/**
 * Description of PerfilDAO
 *
 * @author Javier
 */
class PerfilDAO {
    private $conexion;
    
    public function __construct() {
        $this->conexion = new Conexion();
    }
    
    private function queryMaxId(){
        $this->conexion->conectar();
        $consultaMaxId ="SELECT (max(id_perfil)+1) AS id FROM perfil";
        $queryId = $this->conexion->ejecutar($consultaMaxId);
        while(OCIFetch($queryId)){
            $id = ociresult($queryId, "ID");
        }
        $this->conexion->desconectar();
        return $id;
    }
}
?>
