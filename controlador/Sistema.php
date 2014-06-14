<?php
include_once '../modelo/CuentaDAO.php';
include_once '../modelo/PerfilDAO.php';
include_once '../modelo/PredioDAO.php';
include_once '../modelo/EmpleadoDAO.php';
include_once '../modelo/ComunaDAO.php';
include_once '../modelo/CaminoDAO.php';
include_once '../modelo/ProvinciaDAO.php';
include_once 'Session.php';
include_once 'Cuenta.php';
include_once 'Comuna.php';
include_once 'Provincia.php';
/**
 * Description of Sistema
 * Clase la cual se conectará con las vistas para obtener los datos desde la bd
 * @author Renato
 */
class Sistema {
     private static $miInstancia = NULL;
     
     private $session;
     private $cuentaDAO;
     private $perfilDAO;
     private $predioDAO;
     private $empleadoDAO;
     private $comunaDAO;
     private $caminoDAO;
     private $provinciaDAO;

     private function Sistema(){
         $this->cuentaDAO = new CuentaDAO();
         $this->perfilDAO = new PerfilDAO();
         $this->predioDAO = new PredioDAO();
         $this->empleadoDAO = new EmpleadoDAO();
         $this->comunaDAO = new ComunaDAO();
         $this->session = new Session();
         $this->caminoDAO = new CaminoDAO();
         $this->provinciaDAO = new ProvinciaDAO();

     }
     
     public static function  getInstancia(){
        if (self::$miInstancia == NULL) {
          self::$miInstancia = new Sistema();
       }
       return self::$miInstancia;
    }
    /**
     * Metodo encargado de buscar todos los predios
     * @return Array de Predios
     */
    public function findAllPredios(){
        return $this->predioDAO->findAll();
    } 
    /**
     * Metodo encargado de buscar un predio por Id
     * @return Array de Predios
     */
    
    public function findPredioById($idPredio){
        return $this->predioDAO->findById($idPredio);
    }
        /**
     * Metodo encargado de buscar todos los empleados
     * @return Array de Empleados
     * agregado 05/06/13 21:29 by Sebastián
     */
    public function findAllEmpleados(){
        return $this->empleadoDAO->findAll();
    } 
    
    public function saveCuenta($cuenta){
        $this->cuentaDAO->save($cuenta);
    }


    /**
     * Metodo que retorna una cuenta de usuario segun un determinado dni y password
     * @author Javier
     * @param VARCHAR(10) $dni Description: identificador de un empleado
     * @param VARcHAR(45) $password Description: contraseña de acceso del empleado a su cuenta de usuario
     * @return Cuenta Description: cuenta de usuario asignada a un empleado
     */
    public function verifyUser($dni,$password){
        $cuenta = $this->cuentaDAO->getCuenta($dni);
        if($cuenta != NULL){
            if($cuenta->getPassword() == $password){
                return $cuenta;
            }
        }
        return $cuenta;
    }
    
    public function getComunaLike($nombre){
        return $this->comunaDAO->getLike($nombre);
    }   
    
    public function getSession() {
        if($this->session != null)
            return $this->session;
        else
            return $this->session = new Session();
    }
    
    public function findAllCaminos(){
        return $this->caminoDAO->findAll();
    }
    /*Obtiene el camino correspondiente a la id*/
    public function findCaminoById($idCamino){
        return $this->caminoDAO->findById($idCamino);
    }

    
    /**
     * ;etodo encargado de guardar predio
     * @param type $predio
     */
    public function savePredio($predio){
            $this->predioDAO->save($predio);
    }
    
    public function findComunaByExample($comuna){
        return $this->comunaDAO->findByExample($comuna);
    }
    /**
     * Metodo encargado de obtener la zona donde se encuentra una comuna
     * 
     * @param $idcomuna
     */
    public function getIdZonaByIdComuna($idComuna){
        $comuna = $this->comunaDAO->findById($idComuna);
        $idProvincia = $comuna->getIdProvincia();
        $provincia = new Provincia();
        $provincia = $this->provinciaDAO->getProvincia($idProvincia);
        $idRegion = $provincia->getIdRegion();
        $NORTE = 1;
        $CENTRO = 2;
        $SUR = 3;
        switch ($idRegion) {
            case 2: // TARAPACA
               return $NORTE; 
            case 3: // ANTOFAGASTA
               return $NORTE;
            case 1: // ARICA Y PARINACOTA
                return $NORTE;
            case 4: //ATACAMA
                return $NORTE;
            case 5: // COQUIMBO
                return $NORTE;
            case 6: // VALPARAISO
                return $CENTRO;
            case 7: //LIB BERNARDO
                return $CENTRO;
            case 8: // MAULE
                return $CENTRO;
            case 9: // BIO BIO
                return $CENTRO;
            case 15: // SANTIAGO
                return $CENTRO;
            case 10: // ARAUCANIA
                return $SUR;
            case 11: // LOS LAGOS
                return $SUR;
            case 12: // LOS RIOS
                return $SUR;
            case 13: // AISEN Y MAGALLANES
                return $SUR;
            case 14: // LA ANTARTICA
                return $SUR;
            default:
                break;
        }
        return "";
    }
}


?>
