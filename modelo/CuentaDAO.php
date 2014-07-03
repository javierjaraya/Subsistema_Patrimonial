<?php

/**
 * Description of CuentaDAO
 * Clase encargada de realizar la conexion enter el Sistema y la BD
 * @author Javier
 */
include_once 'Conexion.php';
include_once '../controlador/Empleado.php';
include_once '../controlador/Cuenta.php';
include_once '../controlador/Perfil.php';
include_once 'interfaceDAO.php';

class CuentaDAO{

    private $conexion;
    private $cuenta;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    /** Metodo que busca la idCuenta maximo y retorna una idCuenta disponible
     * @author Javier
     * @return NUMBER (*,0) : identificador disponible
     */
    private function queryMaxId() {
        $this->conexion->conectar();
        $consultaMaxId = "SELECT (max(id_cuenta)+1) AS id FROM cuenta";
        $queryId = $this->conexion->ejecutar($consultaMaxId);
        while (OCIFetch($queryId)) {
            $id = ociresult($queryId, "ID");
        }
        $this->conexion->desconectar();
        return $id;
    }

    /** Metodo que retorna una cuenta correspondiente a un determinado $idCuenta
     * Precondicion : $idCuenta != NULL
     * @author Javier
     * @param $idCuenta : NUMBER (*,0) - identificador de una cuenta
     * @return Cuenta : cuenta correspondiente al $idCuenta
     */
    public function getCuenta($dni) {
        $this->conexion->conectar();
        $consultaCuenta = "SELECT empleado.NOMBRE_EMPLEADO,cuenta.ID_CUENTA, cuenta.FECHACREACION, cuenta.PASSWORD, cuenta.ESTADO, cuenta.ID_PERFIL 
                            FROM empleado JOIN cuenta ON empleado.ID_CUENTA = cuenta.ID_CUENTA
                            where empleado.dni = '$dni'";
        $query = $this->conexion->ejecutar($consultaCuenta);
        $this->cuenta = new Cuenta();
        
        while (OCIFetch($query)) {
            $this->nombreEmpleado = ociresult($query, "NOMBRE_EMPLEADO");
            $this->cuenta->setIdCuenta(ociresult($query, "ID_CUENTA"));
            $this->cuenta->setFechaCreacion(ociresult($query, "FECHACREACION"));
            $this->cuenta->setPassword(ociresult($query, "PASSWORD"));
            $this->cuenta->setEstado(ociresult($query, "ESTADO"));
            $this->cuenta->setIdPerfil(ociresult($query, "ID_PERFIL"));
            
        }
        
        $this->conexion->desconectar();
        return $this->cuenta;
    }
    
    public function save($cuenta) {
        //$this->cuenta=$cuenta;
        //echo $cuenta->getIdCuenta();
        $this->conexion->conectar();
        $laConsulta = '';
        //'.$cuenta->getIdCuenta().','.".$cuenta->getFechaCreacion().".','".$cuenta->getPassword()."','".$cuenta->getEstado()."','.$cuenta->getIdPerfil().'
        //$laConsulta = 'INSERT into CUENTA VALUES (ID_CUENTA, FECHACREACION, PASSWORD, ESTADO, ID_PERFIL)(2004,08/06/14,admin,1,1111)';
        $laConsulta = "INSERT into CUENTA (ID_CUENTA, FECHACREACION, PASSWORD, ESTADO, ID_PERFIL) VALUES (".$cuenta->getIdCuenta().",'".$cuenta->getFechaCreacion()."','".$cuenta->getPassword()."','".$cuenta->getEstado()."',".$cuenta->getIdPerfil().")";
        //echo $laConsulta; 
        $query = $this->conexion->ejecutar($laConsulta);
        $laConsulta = "UPDATE EMPLEADO SET ID_CUENTA=".$cuenta->getIdCuenta()." WHERE DNI=".$cuenta->getDniCta()."";
        $this->conexion->desconectar();
        
    }

    public function findAll() {
        $cuentas = array(); // Lista contenedora de los empleados
        $idCuenta = $this->queryMaxId();
        $this->conexion->conectar();
        $laConsulta = "SELECT empleado.NOMBRE_EMPLEADO, cuenta.ID_CUENTA, cuenta.FECHACREACION, cuenta.PASSWORD, cuenta.ESTADO, cuenta.ID_PERFIL, perfil.NOMBRE_PERFIL
                       FROM empleado JOIN cuenta ON empleado.ID_CUENTA= cuenta.ID_CUENTA JOIN perfil ON cuenta.ID_PERFIL = perfil.ID_PERFIL";
        
        $query = $this->conexion->ejecutar($laConsulta);
        $i = 0;
        while(ocifetch($query)){
            $cuenta = new Cuenta();
            $cuenta->setNombreEmpleado(ociresult($query, "NOMBRE_EMPLEADO"));
            $cuenta->setIdCuenta(ociresult($query, "ID_CUENTA"));
            $cuenta->setFechaCreacion(ociresult($query, "FECHACREACION"));
            $cuenta->setPassword(ociresult($query, "PASSWORD"));
            $cuenta->setEstado(ociresult($query, "ESTADO"));
            $cuenta->setIdPerfil(ociresult($query, "ID_PERFIL"));
            //cargando los perfiles
            $cuenta->setNombrePerfil(ociresult($query, "NOMBRE_PERFIL"));
            
            $cuentas[$i] = $cuenta;
            $i++;
            
        }
        
        
        $this->conexion->desconectar();
        return $cuentas;
    }
    
    public function actualizarCuentaDAO($cuenta, $id_original) {
        $this->conexion->conectar();
        $laConsulta = "UPDATE cuenta 
                        SET     ID_CUENTA='".$cuenta->getIdCuenta()."',
                                FECHACREACION='".$cuenta->getFechaCreacion()."',
                                PASSWORD='".$cuenta->getPassword()."',                     
                                ESTADO='".$cuenta->getEstado()."',   
                                ID_PERFIL='".$cuenta->getIdPerfil()."'
                        WHERE ID_CUENTA='".$id_original."' ";
        
        $this->conexion->ejecutar($laConsulta);
        $this->conexion->desconectar();
    }

    public function findByID($idCuenta) {
        $cuenta= new Cuenta();
        $this->conexion->conectar();
        $laConsulta = " SELECT * 
                        FROM cuenta
                        WHERE cuenta.ID_CUENTA = ".$idCuenta."";
        $query = $this->conexion->ejecutar($laConsulta);
        while(ocifetch($query)){
            $cuenta = new Cuenta();
            $cuenta->setIdCuenta(ociresult($query, "ID_CUENTA"));
            $cuenta->setFechaCreacion(ociresult($query, "FECHACREACION"));
            $cuenta->setPassword(ociresult($query, "PASSWORD"));
            $cuenta->setEstado(ociresult($query, "ESTADO"));
            $cuenta->setIdPerfil(ociresult($query, "ID_PERFIL"));
  
        }
        $this->conexion->desconectar();
        return $cuenta;
    }
    
    public function delete($idCuenta){
        $this->conexion->conectar();
        $estadoEliminado = 0;
        $laConsulta = "UPDATE cuenta 
                        SET     
                            ESTADO='".$estadoEliminado."'   
                        WHERE ID_CUENTA='".$idCuenta."' ";
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