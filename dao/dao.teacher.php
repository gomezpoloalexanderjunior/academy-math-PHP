<?php 

include_once ('../conexion/conexion.php');
include_once ('../models/teacher.model.php');

class DaoProfesor{
        
        private $conexion;

	public function __construct(){
	        $this->conexion = new Conexion();
	}

	public function insert($teacher){

                $c = $this->conexion->getConexion();

                $queryUser = "Insert into Usuario (dni, nombres, apellidos," .  
                "contrasenha, estado, correo, direccion, telefono, id_distrito) values (?,?,?,?,?,?,?,?,?)";
                $queryTeacher = "Insert into Profesor(dni, experiencia, curso) values (?, ?, ?)";
    
                $state = "ACTIVO";
                $stm = $c->prepare($queryUser);
                $stm->bindParam(1,$teacher->getDni());
                $stm->bindParam(2,$teacher->getNombres());
                $stm->bindParam(3,$teacher->getApellidos());
                $stm->bindParam(4,$teacher->getContrasenha());
                $stm->bindParam(5,$state);
                $stm->bindParam(6,$teacher->getCorreo());
                $stm->bindParam(7,$teacher->getDireccion());
                $stm->bindParam(8,$teacher->getTelefono());
                $stm->bindParam(9,$teacher->getIdDistrito());
                $stm->execute();

                $stm = $c->prepare($queryTeacher);
                $stm->bindParam(1, $teacher->getDni());
                $stm->bindParam(2, $teacher->getExperiencia());
                $stm->bindParam(3, $teacher->getCurso());
                $stm->execute();
        }
        
        public function list(){
                $c = $this->conexion->getConexion();

                $queryUser = "Select U.*, P.experiencia from Usuario U inner join Profesor P  " .
                "On P.DNI = U.DNI";
    
                $stm = $c->prepare($queryUser);
                $stm->execute();

                $teacher = array();

                while($row = $stm->fetch(PDO::FETCH_ASSOC)){
                        $user = new Profesor();
                        $user->setDni($row['DNI']);
                        $user->setNombres($row['nombres']);
                        $user->setApellidos($row['apellidos']);
                        $user->setDireccion($row['direccion']);
                        $user->setTelefono($row['telefono']);
                        $user->setCorreo($row['correo']);
                        $user->setExperiencia($row["experiencia"]);

                        array_push($teacher, $user);
                }

                return $teacher;
        }

        public function delete($dni){

                $c = $this->conexion->getConexion();

                $queryFather = "Delete from Padre where dni = ?";
                $stm = $c->prepare($queryFather);
                $stm->bindParam(1, $dni);

                $stm->execute();

                $queryUser = "Delete from Usuario where dni = ?";
                $stm = $c->prepare($queryUser);
                $stm->bindParam(1, $dni);

                $stm->execute();
        }

        public function update($teacher){

                $c = $this->conexion->getConexion();

                $queryUser = "Update Usuario set nombres=?, apellidos=?," . 
                "correo=?, direccion=?, telefono=?, id_distrito=? where DNI = ?";
    
                
                $stm = $c->prepare($queryUser);
                $stm->bindParam(1,$teacherr->getNombres());
                $stm->bindParam(2,$teacher->getApellidos());
                $stm->bindParam(3,$teacher->getCorreo());
                $stm->bindParam(4,$teacher->getDireccion());
                $stm->bindParam(5,$teacher->getTelefono());
                $stm->bindParam(6,$teacher->getIdDistrito());
                $stm->bindParam(7,$teacher->getDni());

                $stm->execute();
        }

        public function getTeacher($dni){
                $c = $this->conexion->getConexion();

                $queryUser = "Select * from Usuario where DNI = ?";
    
                $stm = $c->prepare($queryUser);
                $stm->bindParam(1, $dni);
                $stm->execute();

                $teacher = array();

                while($row = $stm->fetch(PDO::FETCH_ASSOC)){
                        $user = new Padre();
                        $user->setDni($row['DNI']);
                        $user->setNombres($row['nombres']);
                        $user->setApellidos($row['apellidos']);
                        $user->setDireccion($row['direccion']);
                        $user->setTelefono($row['telefono']);
                        $user->setCorreo($row['correo']);
                        $user->setIdDistrito($row['id_distrito']);

                        array_push($teacher, $user);
                }

                return $teacher;
        }

}
?>