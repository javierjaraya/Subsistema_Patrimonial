<?php

/**
 * Description of CuentaDAO
 * Clase encargada de realizar la conexion enter el Sistema y la BD
 * @author Javier
 */
include_once 'Conexion.php';
include_once '../controlador/Cuenta.php';

class CuentaDAO {

    private $conexion;

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
        $consultaCuenta = "SELECT cuenta.ID_CUENTA, cuenta.FECHACREACION, cuenta.PASSWORD, cuenta.ESTADO, cuenta.ID_PERFIL 
                            FROM empleado JOIN cuenta ON empleado.ID_CUENTA = cuenta.ID_CUENTA
                            where empleado.dni = '$dni'";
        $query = $this->conexion->ejecutar($consultaCuenta);
        $cuenta = new Cuenta();

        while (OCIFetch($query)) {
            $cuenta->setIdCuenta(ociresult($query, "ID_CUENTA"));
            $cuenta->setFechaCreacion(ociresult($query, "FECHACREACION"));
            $cuenta->setPassword(ociresult($query, "PASSWORD"));
            $cuenta->setEstado(ociresult($query, "ESTADO"));
            $cuenta->setIdPerfil(ociresult($query, "ID_PERFIL"));
        }
        $this->conexion->desconectar();
        return $cuenta;
    }
}

?>