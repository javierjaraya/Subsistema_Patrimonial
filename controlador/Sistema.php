<?php

include_once '../modelo/CaminoDAO.php';
include_once '../modelo/ComunaDAO.php';
include_once '../modelo/CuentaDAO.php';
include_once '../modelo/EmpleadoDAO.php';
include_once '../modelo/EspecieArboreaDAO.php';
include_once '../modelo/FaunaDAO.php';
include_once '../modelo/FloraDAO.php';
include_once '../modelo/InventarioDAO.php';
include_once '../modelo/PerfilDAO.php';
include_once '../modelo/PredioDAO.php';
include_once '../modelo/ProvinciaDAO.php';
include_once '../modelo/RodalDAO.php';
include_once '../modelo/ZonaDAO.php';

include_once 'Session.php';
//include_once 'Cuenta.php';
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
     private $rodalDAO;
     private $inventarioDAO;
     private $especieArboreaDAO;
     private $zonaDAO;
     private $faunaDAO;


     private function Sistema(){
         $this->cuentaDAO = new CuentaDAO();
         $this->perfilDAO = new PerfilDAO();
         $this->predioDAO = new PredioDAO();
         $this->empleadoDAO = new EmpleadoDAO();
         $this->comunaDAO = new ComunaDAO();
         $this->session = new Session();
         $this->caminoDAO = new CaminoDAO();
         $this->provinciaDAO = new ProvinciaDAO();
         $this->rodalDAO  = new RodalDAO();
         $this->inventarioDAO = new InventarioDAO();
         $this->especieArboreaDAO = new EspecieArboreaDAO();
         $this->zonaDAO = new ZonaDAO();
         $this->faunaDAO = new FaunaDAO();
         $this->floraDAO = new FloraDAO();
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
     * Metodo encargado de buscar todos los rodales
     * @return Array de rodales
     */
    public function findAllRodales(){
        return $this->rodalDAO->findAll();
    }
    public function findAllRodalesSelection($selection, $seleccionCantidad){
        return $this->rodalDAO->findAllSelection($selection, $seleccionCantidad);
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

    public function findAllCuentas(){
        return $this->cuentaDAO->findAll();
    } 
    
    public function findCuentaById($idCuenta){
        return $this->cuentaDAO->findById($idCuenta);
    }
    
    public function actualizarCuenta($cuenta, $id_original){
        $this->cuentaDAO->actualizarCuentaDAO($cuenta, $id_original);
    }
    
    public function eliminarCuenta($idCuenta){
        $this->cuentaDAO->delete($idCuenta);
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
        }else{
            return null;
        }
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
    
    public function getMaxIdCamino(){
        return $this->caminoDAO->queryMaxID();
    }

    public function saveCamino($camino){
        $this->caminoDAO->save($camino);
    }
    
    public function actualizarCamino($camino, $id_original){
        $this->caminoDAO->actualizarCaminoDAO($camino, $id_original);
    }

    /**
     * ;etodo encargado de guardar predio
     * @param type $predio
     */
    public function savePredio($predio){
            $this->predioDAO->save($predio);
    }
    
    public function saveRodal($rodal){
        $this->rodalDAO->save($rodal);
    }
    
    public function findComunaByExample($comuna){
        return $this->comunaDAO->findByExample($comuna);
    }
    
    public function findAllZonas(){
        return $this->zonaDAO->findAll();
    }
    
    
    public function getComunaById($idComuna){
        return $this->comunaDAO->findById($idComuna);
    }
    public function actualizarPredio($predio, $id_original){
        $this->predioDAO->actualizarPredioDAO($predio, $id_original);
    }
    public function findPredioByExample($predio){
        return $this->predioDAO->findByExample($predio);
    }
    
    /** Método encargado de elimnar un Predio mediante su Id - Iván*/
    public function eliminarPredio($idPredio){
        $this->predioDAO->delete($idPredio);
    }
    
    public function eliminarRodal($idRodal){
        $this->rodalDAO->delete($idRodal);
    }
    
    public function getInventarios($idRodal){
        return $this->inventarioDAO->findInventarioByIdRodal($idRodal);
    }
    
    public function findRodalById($idrodal){
        return $this->rodalDAO->findById($idrodal);
        
    }
    
    public function getEspeciesArborea(){
        return $this->especieArboreaDAO->findAll();
    }
    
    public function actualizarRodal($rodal){
        $this->rodalDAO->update($rodal);
    }
    
    public function findInventarios($idRodal, $fi, $ff){
        return $this->inventarioDAO->findBetweenDate($idRodal, $fi, $ff);
    }
    
    public function saveInventario($inventario){
        $this->inventarioDAO->save($inventario);
    }
    
    public function eliminarInventario($id){
        $this->inventarioDAO->delete($id);
    }
    
    public function findInventarioById($idinventario){
        return $this->inventarioDAO->findById($idinventario);
        
    }
    
    public function findAllEspecies(){
        return $this->especieArboreaDAO->findAll();
    }
    
    public function actualizarInventario($inventario){
        $this->inventarioDAO->update($inventario);
    }

    public function findALlFaunas(){
        return $this->faunaDAO->findAll();
    }
    public function findALlFloras(){
        return $this->floraDAO->findAll();
    }
    
    public function findAllFaunasPredio($idpredio){
        return $this->faunaDAO->findAllFaunasPredio($idpredio);
    }
    
    public function findAllFlorasPredio($idpredio){
        return $this->floraDAO->findAllFlorasPredio($idpredio);
    }
}


?>
