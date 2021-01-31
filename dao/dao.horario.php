<?php 

include_once ('../conexion/conexion.php');
include_once ('../models/horario.model.php');

class DaoHorario{
        
        private $conexion;

	public function __construct(){
	        $this->conexion = new Conexion();
	}

	public function insert($horario){

                $c = $this->conexion->getConexion();

                $queryUser = "Insert into horario (id, tema, idCurso," .  
                "fecha_clase, estado, idAlumno, idProfesor) values (?,?,?,?,?,?,?)";

                $state = 0;
                $stm = $c->prepare($queryUser);
                $stm->bindParam(1,$horario->getId());
                $stm->bindParam(2,$horario->getTema());
                $stm->bindParam(3,$horario->getCurso());
                $stm->bindParam(4,$horario->getFechaClase());
                $stm->bindParam(5,$state);
                $stm->bindParam(6,$horario->getAlumno());
                $stm->bindParam(7,$alumno->getProfesor());
                $stm->execute();
        }
        
        public function listHorario($alum){
                $c = $this->conexion->getConexion();

                $queryHorario = "Select H.id, H.tema, H.fecha_clase, C.nombre, H.estado from Horario H
                inner join Curso C On H.idCurso = C.id WHERE H.idAlumno=?";
    
                $stm = $c->prepare($queryHorario)or die("Error". mysql_error($c)); 
                $stm->bindParam(1,$alum);
                $stm->execute();

                $horario = array();
               
                while($row = $stm->fetch(PDO::FETCH_ASSOC)){
                        $hor = new Horario();
                        $hor->setId($row['id']);
                        $hor->setTema($row['tema']);
                        $hor->setCurso($row['nombre']);
                        $hor->setFechaClase($row['fecha_clase']);
                        $hor->setEstado($row['estado']);
                        array_push($horario, $hor);
                }
                return  $horario;
        }

        public function delete($dni){

                $c = $this->conexion->getConexion();

                $queryAlumno = "Delete from Horario where dni = ?";
                $stm = $c->prepare($queryAlumno);
                $stm->bindParam(1, $dni);

                $stm->execute();

                $queryUser = "Delete from Horario where dni = ?";
                $stm = $c->prepare($queryUser);
                $stm->bindParam(1, $dni);

                $stm->execute();
        }

        public function update($alumno){

                $c = $this->conexion->getConexion();

                $queryUser = "Update Usuario set nombres=?, apellidos=?," . 
                "correo=?, direccion=?, telefono=?, id_distrito=? where DNI = ?";
    
                $state = "ACTIVO";
                $stm = $c->prepare($queryUser);
                $stm->bindParam(1,$alumno->getNombres());
                $stm->bindParam(2,$alumno->getApellidos());
                $stm->bindParam(3,$alumno->getCorreo());
                $stm->bindParam(4,$alumno->getDireccion());
                $stm->bindParam(5,$alumno->getTelefono());
                $stm->bindParam(6,$alumno->getIdDistrito());
                $stm->bindParam(7,$alumno->getDni());

                $stm->execute();
        }

        public function Estado($id,$estado){

                $c = $this->conexion->getConexion();

                $queryHorario = "Update Horario set estado=? where id = ?";
    
                
                $stm = $c->prepare($queryHorario);
                
                $stm->bindValue(1,$estado);
                $stm->bindValue(2,$id);
                $stm->execute();
        }
        public function getAlumno($dni){
                $c = $this->conexion->getConexion();

                $queryUser = "Select * from Usuario where DNI = ?";
    
                $stm = $c->prepare($queryUser);
                $stm->bindParam(1, $dni);
                $stm->execute();

                $father = array();

                while($row = $stm->fetch(PDO::FETCH_ASSOC)){
                        $user = new Padre();
                        $user->setDni($row['DNI']);
                        $user->setNombres($row['nombres']);
                        $user->setApellidos($row['apellidos']);
                        $user->setDireccion($row['direccion']);
                        $user->setTelefono($row['telefono']);
                        $user->setCorreo($row['correo']);
                        $user->setIdDistrito($row['id_distrito']);

                        array_push($father, $user);
                }

                return $father;
        }

}

?>