<?php
/**
 * Description of TipoUsoSuelo
 *
 * @author Pipe
 */
class TipoUsoSuelo {
    private $idTipoUso;
    private $nombreTipoUso;
    private $descripcion;
    
    function __construct() {
        
    }
    public function getIdTipoUso() {
        return $this->idTipoUso;
    }

    public function getNombreTipoUso() {
        return $this->nombreTipoUso;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function setIdTipoUso($idTipoUso) {
        $this->idTipoUso = $idTipoUso;
    }

    public function setNombreTipoUso($nombreTipoUso) {
        $this->nombreTipoUso = $nombreTipoUso;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }


}
