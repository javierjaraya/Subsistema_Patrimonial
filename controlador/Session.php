<?php
/**
 * Description of Session
 *
 * @author Javier
 */
class Session {
    private $direccion;
    function __construct() {
    }
    
    public function starSession($idCuenta,$idPerfil){
        session_start();
        $_SESSION["idCuenta"] = $idCuenta;
        $_SESSION["idPerfil"] = $idPerfil;
        echo $idCuenta."  -  ".$idPerfil;
    }
    
    public function stopSession(){
        session_start();
        unset($_SESSION["idCuenta"]); 
	unset($_SESSION["idPerfil"]);
	session_destroy();
        exit();
    }
    
    public function securityCheck(){
        session_start();
        error_reporting(E_ALL & ~E_NOTICE | E_STRICT);
        echo $_SESSION[idPerfil];
        if ($_SESSION["idPerfil"] == "1111") {
            return "../admin.php";
        }else if ($_SESSION["idPerfil"] == "2222") {
            return "../user.php";
        }else{
            return "../index.php";
        }
    }
}
