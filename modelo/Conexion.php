<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include_once ("configuracion.php");

class Conexion {

    private $cadenaConexion;
    private $user;
    private $password;
    private $conexion;
    private $config;

    function __construct() {
        $this->config = new Config();
        $this->user = $this->config->user;
        $this->password = $this->config->password;
        $this->cadenaConexion = $this->config->bd;
    }

    public function conectar() {
        $this->conexion = ocilogon($this->user, $this->password, $this->cadenaConexion);

        if (!$this->conexion) {
            echo "Conexion es invalida" . var_dump(OCIError());
            die();
        }
    }

    public function desconectar() {
        OCICommit($this->conexion);
        OCILogoff($this->conexion);
    }

    public function ejecutar($strComando) {
        try {
            $ejecutar = oci_parse($this->conexion, $strComando);
            oci_execute($ejecutar);
            
            return $ejecutar;
        } catch (PDOException $ex) {
            throw $ex;
        }
    }
}
?>