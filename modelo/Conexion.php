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

    /**
     * Metodos para insertar datos en una tabla
     * @param $nombretabla Description: nombre de la tabla
     * @param $arrayValores Description: arreglo con los valores de la tabla, (ordenados)
     */
    public function insert($nombretabla, $arrayValores) {
        try {
            $max = sizeof($arrayValores);
            $datos = "(";
            for ($i = 1; $i <= $max; $i ++) {
                $datos = $datos . ":dato$i";
                if ($i < $max)
                    $datos = $datos . ",";
            }
            $datos = $datos . ")";
            $ejecutar = OCIParse($this->conexion, "insert into $nombretabla values $datos");

            for ($i = 1; $i <= $max; $i ++) {
                OCIBindByName($ejecutar, ":dato$i", $arrayValores[$i-1]);
            }
            OCIExecute($ejecutar, OCI_DEFAULT);
        } catch (PDOException $ex) {
            throw $ex;
        }
    }

}

?>