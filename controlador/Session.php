<?php
/**
 * Description of Session
 * Clase encargada de administrar las sesiones de usuarios segun sus perfiles
 *
 * @author Javier
 */
class Session {
    
    function __construct() {
    }
    
    /**
     * Metodo que inicializa una nueva session
     * @param NUMBER(*,0) $name $idCuenta Description: identificador de una cuenta para la sesion
     * @param NUMBER(*,0) $name $idPerfil Description: identificador del perfil de la cuenta
     */
    public function starSession($idCuenta,$idPerfil){
        session_start();
        $_SESSION["idCuenta"] = $idCuenta;
        $_SESSION["idPerfil"] = $idPerfil;
    }
    
    /**
     * Metodo que cierra una sesion destruyendo la sesion anteriormente creada
     */
    public function stopSession(){
        session_start();
        unset($_SESSION["idCuenta"]); 
	unset($_SESSION["idPerfil"]);
	session_destroy();
        exit();
    }
    
    /**
     * Metodo que verifica si hay una sesion creada y retorna una direccion segun el perfil de la cuenta
     * @return String Description: direccion correspondiente a un perfil de una cuenta
     */
    public function securityCheck(){
        session_start();
        error_reporting(E_ALL & ~E_NOTICE | E_STRICT);
        if ($_SESSION["idPerfil"] == "1111") {
            return "../admin.php";
        }else if ($_SESSION["idPerfil"] == "2222") {
            return "../user.php";
        }else{
            return "../index.php";
        }
    }
}
