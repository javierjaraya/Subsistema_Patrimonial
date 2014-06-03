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
    
    /** Metodo que busca la idPerfil maximo y retorna una idPerfil disponible
     * @return NUMBER (*,0) : identificador disponible
     */
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
    
    /** Metodo que retorna una perfil correspondiente a un determinado $idPerfil
     * Precondicion : $idPerfil != NULL
     * @param $idPerfil : NUMBER (*,0) - identificador de un perfil
     * @return Perfil : cuenta correspondiente al $idPerfil
     */
    public function getPerfil($idPerfil) {
        $this->conexion->conectar();
        $consultaPerfil = "SELECT * FROM perfil WHERE id_perfil = $idPerfil";
        $queryPerfil = $this->conexion->ejecutar($consultaPerfil);
        $perfil = new Perfil();

        while (OCIFetch($queryPerfil)) {
            $perfil->setIdperfil(ociresult($query, "ID_PERFIL"));
            $perfil->setNombrePerfil(ociresult($query, "NOMBRE_PERFIL"));
        }
        $this->conexion->desconectar();
        return $perfil;
    }
}
?>
