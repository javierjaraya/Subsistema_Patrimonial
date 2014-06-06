<?php
include_once '../modelo/CuentaDAO.php';
include_once '../modelo/PerfilDAO.php';
include_once '../modelo/PredioDAO.php';
include_once '../modelo/EmpleadoDAO.php';
/**
 * Description of Sistema
 * Clase la cual se conectará con las vistas para obtener los datos desde la bd
 * @author Renato
 */
class Sistema {
     private static $miInstancia = NULL;
     
     private $cuentaDAO;
     private $perfilDAO;
     private $predioDAO;
     private $empleadoDAO;

     private function Sistema(){
         $this->cuentaDAO = new CuentaDAO();
         $this->perfilDAO = new PerfilDAO();
         $this->predioDAO = new PredioDAO();
         $this->empleadoDAO = new EmpleadoDAO();
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
     * Metodo encargado de buscar todos los empleados
     * @return Array de Empleados
     * agregado 05/06/13 21:29 by Sebastián
     */
    public function findAllEmpleados(){
        return $this->empleadoDAO->findAll();
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
    
    /**
     * 
     */
    public function getNombreEmpleadoCuenta(){
        return $this->cuentaDAO->getNombreEmpleado();
    }
}

?>
