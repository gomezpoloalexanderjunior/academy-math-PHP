<?php 

include_once ('../conexion/conexion.php');
include_once ('../models/student.model.php');

class DaoAlumno{
        
        private $conexion;

	public function __construct(){
	        $this->conexion = new Conexion();
	}

	public function insertAlumno($alumno){
                
                $c = $this->conexion->getConexion();

                $queryUser = "Insert into Usuario (dni, nombres, apellidos," .  
                "contrasenha, estado, correo, direccion, telefono, id_distrito) values (?,?,?,?,?,?,?,?,?)";
                $queryStudent = "Insert into Alumno values (?, ?, ?, ?, ?)";
    
                $state = "ACTIVO";
                $stm = $c->prepare($queryUser);
                $stm->bindValue(1,$alumno->getDni());
                $stm->bindValue(2,$alumno->getNombres());
                $stm->bindValue(3,$alumno->getApellidos());
                $stm->bindValue(4,$alumno->getContrasenha());
                $stm->bindValue(5,$state);
                $stm->bindValue(6,$alumno->getCorreo());
                $stm->bindValue(7,$alumno->getDireccion());
                $stm->bindValue(8,$alumno->getTelefono());
                $stm->bindValue(9,$alumno->getIdDistrito());
                $stm->execute();
                
                $stm = $c->prepare($queryStudent);
                $stm->bindValue(1, $alumno->getDni());
                $stm->bindValue(2, $alumno->getFecha_nacimiento());
                $stm->bindValue(3, 0);
                $stm->bindValue(4, $alumno->getPadre());
                $stm->bindValue(5, $alumno->getColegio());

                $stm->execute();
        }
        
        public function list(){
                $c = $this->conexion->getConexion();

                $queryUser = "Select U.*, A.Fecha_nacimiento, A.cant_clases, c.nombre from Alumno A inner join Usuario U " .
                "On A.DNI = U.DNI inner join Colegio c On c.id=A.colegio";
    
                $stm = $c->prepare($queryUser)or die("Error". mysql_error($c));
                $stm->execute();

                $alumno = array();

                while($row = $stm->fetch(PDO::FETCH_ASSOC)){
                        $user = new Alumno();
                        $user->setDni($row['DNI']);
                        $user->setNombres($row['nombres']);
                        $user->setApellidos($row['apellidos']);
                        $user->setDireccion($row['direccion']);
                        $user->setTelefono($row['telefono']);
                        $user->setCorreo($row['correo']);
                        $user->setfecha_nacimiento($row['Fecha_nacimiento']);
                        $user->setCant_clases($row['cant_clases']);
                        $user->setColegio($row['nombre']);
                        array_push($alumno, $user);
                }
                return  $alumno;
        }

        public function delete($dni){

                $c = $this->conexion->getConexion();

                $queryAlumno = "Delete from Alumno where dni = ?";
                $stm = $c->prepare($queryAlumno);
                $stm->bindParam(1, $dni);

                $stm->execute();

                $queryUser = "Delete from Usuario where dni = ?";
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
/*
$dao =new DaoAlumno();
 a->insertAlumno()*/
?>