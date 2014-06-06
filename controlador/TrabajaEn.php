<?php
/**
 * Description of TrabajaEn
 *
 * @author Pipe
 */
class TrabajaEn {
    private $dni;
    private $idPrecio;
    private $fecha;
    
    function __construct() {
        
    }
    public function getDni() {
        return $this->dni;
    }

    public function getIdPrecio() {
        return $this->idPrecio;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function setDni($dni) {
        $this->dni = $dni;
    }

    public function setIdPrecio($idPrecio) {
        $this->idPrecio = $idPrecio;
    }

    public function setFecha($fecha) {
        $this->fecha = $fecha;
    }


}
