<?php
include_once 'Conexion.php';
include_once '../controlador/Empleado.php';

/**
 * Description of EmpleadoDAO
 * 
 * @author Sebastián
 */
class EmpleadoDAO {
    private $cone;
    
    public function EmpleadoDAO(){
            $this->cone= new Conexion();
    }
    private function queryMaxDni(){
        $this->cone->conectar();
        $consultaMaxDni ="SELECT max(dni) AS dni FROM empleado";
        $queryDni = $this->cone->ejecutar($consultaMaxDni);
        while(OCIFetch($queryDni)){
            $dni = ociresult($queryDni, "DNI");
        }
        $this->cone->desconectar();
        return $dni;
    }
    /**
     * Metodo encargado de buscar todos los predios
     */
    public function findAll(){
        $empleados = array(); // Lista contenedora de predios resultados
        $dni = $this->queryMaxDni();
        $this->cone->conectar();
        $laConsulta = "SELECT * FROM empleado";
        
        $query = $this->cone->ejecutar($laConsulta);
        $i = 0;
        while(ocifetch($query)){
            $empleado = new Empleado();
            $empleado->setDni(ociresult($query, "DNI"));
            $empleado->setNombreEmpleado(ociresult($query, "NOMBRE_EMPLEADO"));
            $empleado->setApPaternoEmpleado(ociresult($query, "AP_PATERNO_EMPLEADO"));
            $empleado->setApMaternoEmpleado(ociresult($query, "AP_MATERNO_EMPLEADO"));
            $empleado->setFechaIngreso(ociresult($query, "FECHA_INGRESO"));
            $empleado->setIdCargo(ociresult($query, "ID_CARGO"));
            $empleado->setIdCuenta(ociresult($query, "ID_CUENTA"));   
            $empleados[$i] = $empleado;
            $i++;
            
        }
        $this->cone->desconectar();
        return $empleados;
    }
    
    public function findByExample($empleado){
        $this->cone->conectar();
        $laConsulta = " SELECT *
                        FROM empleado
                        ";
        $this->cone->desconectar();
    }
    
    public function getEmpleado($dni) {
        $this->cone->conectar();
        $consulta = "SELECT * FROM empleado WHERE dni = '$dni'";
        $empleado = new Empleado();
        
        $query = $this->cone->ejecutar($consulta);
        
        while(OCIFetch($query)){
            $empleado->setDni(ociresult($query, "DNI"));
            $empleado->setNombreEmpleado(ociresult($query, "NOMBRE_EMPLEADO"));
            $empleado->setApPaternoEmpleado(ociresult($query, "AP_PATERNO_EMPLEADO"));
            $empleado->setApMaternoEmpleado(ociresult($query, "AP_MATERNO_EMPLEADO"));
            $empleado->setFechaIngreso(ociresult($query, "FECHA_INGRESO"));
            $empleado->setIdCargo(ociresult($query, "ID_CARGO"));
            $empleado->setIdCuenta(ociresult($query, "ID_CUENTA")); 
        }
        $this->cone->desconectar();
        return $empleado;
    }
}

?>
