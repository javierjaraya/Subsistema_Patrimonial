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
        $consultaMaxDni ="SELECT max(dni) AS dni FROM empleado";
        $queryDni = $this->cone->ejecutar($consultaMaxDni);
        while(OCIFetch($queryDni)){
            $dni = ociresult($queryDni, "DNI");
        }
        return $dni;
    }
    /**
     * Metodo encargado de buscar todos los predios
     */
    public function findAll(){
        $empleados = array(); // Lista contenedora de predios resultados
        $this->cone->conectar();
        $dni = $this->queryMaxDni();
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
    }
    
    public function getEmpleado($dni){
        $this->cone->conectar();
        $laConsulta = "SELECT * FROM empleado WHERE empleado.dni = $dni";
        $query = $this->cone->ejecutar($laConsulta);
        $empleado = new Empleado();
        while(ocifetch($query)){
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
