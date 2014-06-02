<?php
include_once '../modelo/PredioDAO.php';
/**
 * Description of Sistema
 * Clase la cual se conectará con las vistas para obtener los datos desde la bd
 * @author Renato
 */
class Sistema {
     private static $miInstancia = NULL;
     
     private $predioDAO;
     
     private function Sistema(){
         $this->predioDAO = new PredioDAO();
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
    
}

?>
