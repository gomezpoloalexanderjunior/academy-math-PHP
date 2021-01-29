<?php 

include_once ('../conexion/conexion.php');
include_once ('../models/student.model.php');
include_once ('../models/colegio.model.php');
class DaoColegio{
        
        private $conexion;

	public function __construct(){
	        $this->conexion = new Conexion();
	}
        /*
	public function insert($alumno){

                $c = $this->conexion->getConexion();

                $queryUser = "Insert into Usuario (dni, nombres, apellidos," .  
                "contrasenha, estado, correo, direccion, telefono, id_distrito) values (?,?,?,?,?,?,?,?,?)";
                $queryStudent = "Insert into Alumno values (?, ?, ?, ?)";
    
                $state = "AC";
                $stm = $c->prepare($queryUser);
                $stm->bindParam(1, $alumno->getDni());
                $stm->bindParam(2,$alumno->getNombres());
                $stm->bindParam(3,$father->getApellidos());
                $stm->bindParam(4,$alumno->getContrasenha());
                $stm->bindParam(5,$state);
                $stm->bindParam(6,$alumno->getCorreo());
                $stm->bindParam(7,$alumno->getDireccion());
                $stm->bindParam(8,$alumno->getTelefono());
                $stm->bindParam(9,$alumno->getIdDistrito());

                $stm->execute();

                $stm = $c->prepare($queryStudent);
                $stm->bindParam(1, $alumno->getDni());
                $stm->bindParam(2, $alumno->getFecha_nacimiento());
                $stm->bindParam(3, 0);
                $stm->bindParam(4, $alumno->getPadre());
                $stm->bindParam(4, $alumno->getColegio());
                $stm->execute();
        }
        */
        public function listColegio(){
                $c = $this->conexion->getConexion();
                $queryCol = "Select id, nombre from Colegio" ;
                $stm = $c->prepare($queryCol) or die("Error". mysql_error($c));
                $stm->execute();

                $colegio = array();

                while($row = $stm->fetch(PDO::FETCH_ASSOC)){
                        $col = new Colegio();
                        $col->setId($row['id']);
                        $col->setNombre($row['nombre']);
                        array_push($colegio, $col);
                       
                }

                return $colegio;
        }
}
/*
 $colegio= new DaoColegio();

foreach($colegio->listColegio() as $d){
        echo $d->getId();
        echo $d->getNombre();
 }*/
?>