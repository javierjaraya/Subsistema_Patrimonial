<?php

/**
 * Description of Perfil
 *
 * @author Javier
 */
class Perfil {
    //put your code here
    private $idperfil;
    private $nombrePerfil;
    
    function __construct() {
        
    }
    
    public function getIdperfil() {
        return $this->idperfil;
    }

    public function getNombrePerfil() {
        return $this->nombrePerfil;
    }

    public function setIdperfil($idperfil) {
        $this->idperfil = $idperfil;
    }

    public function setNombrePerfil($nombrePerfil) {
        $this->nombrePerfil = $nombrePerfil;
    }
}
?>