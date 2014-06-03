<?php

/**
 * Description of CuentaDAO
 *
 * @author Javier
 */
class CuentaDAO {

    private $conexion;

    public function __construct() {
        $this->conexion = new Conexion();
    }

    /** Metodo que busca la idCuenta maximo y retorna una idCuenta disponible
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
     * @param $idCuenta : NUMBER (*,0) - identificador de una cuenta
     * @return Cuenta : cuenta correspondiente al $idCuenta
     */
    public function getCuenta($idCuenta) {
        $this->conexion->conectar();
        $consultaCuenta = "SELECT * FROM cuenta WHERE id_cuenta = $idCuenta";
        $queryCuenta = $this->conexion->ejecutar($consultaCuenta);
        $cuenta = new Cuenta();

        while (OCIFetch($queryCuenta)) {
            $cuenta->setIdCuenta(ociresult($query, "ID_CUENTA"));
            $cuenta->setFechaCreacion(ociresult($query, "FECHACREADACON"));
            $cuenta->setPassword(ociresult($query, "PASSWORD"));
            $cuenta->setEstado(ociresult($query, "ESTADO"));
            $cuenta->setIdPerfil(ociresult($query, "ID_PERFIL"));
        }
        $this->conexion->desconectar();
        return $cuenta;
    }
}

?>