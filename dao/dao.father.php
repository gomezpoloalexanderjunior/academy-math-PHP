<?php 

include_once ('../conexion/conexion.php');
include_once ('../models/father.model.php');

class DaoPadre{
        
        private $conexion;

	public function __construct(){
	        $this->conexion = new Conexion();
	}

	public function insert($father){

                $c = $this->conexion->getConexion();

                $queryUser = "Insert into Usuario (dni, nombres, apellidos," .  
                "contrasenha, estado, correo, direccion, telefono, id_distrito) values (?,?,?,?,?,?,?,?,?)";
                $queryFather = "Insert into Padre values (?, ?)";
    
                $state = "AC";
                $stm = $c->prepare($queryUser);
                $stm->bindParam(1, $father->getDni());
                $stm->bindParam(2,$father->getNombres());
                $stm->bindParam(3,$father->getApellidos());
                $stm->bindParam(4,$father->getContrasenha());
                $stm->bindParam(5,$state);
                $stm->bindParam(6,$father->getCorreo());
                $stm->bindParam(7,$father->getDireccion());
                $stm->bindParam(8,$father->getTelefono());
                $stm->bindParam(9,$father->getIdDistrito());

                $stm->execute();

                $stm = $c->prepare($queryFather);
                $stm->bindParam(1, $father->getDni());
                $stm->bindParam(2, $father->getNroHijos());

                $stm->execute();
        }
        
        public function list(){
                $c = $this->conexion->getConexion();

                $queryUser = "Select U.DNI, U.nombres, U.apellidos from Padre P inner join Usuario U On P.DNI = U.DNI";
    
                $stm = $c->prepare($queryUser)or die("Error". mysql_error($c));
                $stm->execute();

                $fathers = array();

                while($row = $stm->fetch(PDO::FETCH_ASSOC) ){
                        $user = new Padre();
                        $user->setDni($row['DNI']);
                        $user->setNombres($row['nombres']);
                        $user->setApellidos($row['apellidos']);
                        array_push($fathers, $user);
                }
                return $fathers;
        }

        public function listPadres(){
                $c = $this->conexion->getConexion();

                $queryUser = "Select U.*, P.nro_hijos from Padre P inner join Usuario U " .
                "On P.DNI = U.DNI";
    
                $stm = $c->prepare($queryUser);
                $stm->execute();

                $fathers = array();

                while($row = $stm->fetch(PDO::FETCH_ASSOC)){
                        $user = new Padre();
                        $user->setDni($row['DNI']);
                        $user->setNombres($row['nombres']);
                        $user->setApellidos($row['apellidos']);
                        $user->setDireccion($row['direccion']);
                        $user->setTelefono($row['telefono']);
                        $user->setCorreo($row['correo']);

                        array_push($fathers, $user);
                }

                return $fathers;
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

        public function update($father){

                $c = $this->conexion->getConexion();

                $queryUser = "Update Usuario set nombres=?, apellidos=?," . 
                "correo=?, direccion=?, telefono=?, id_distrito=? where DNI = ?";
    
                $state = "ACTIVO";
                $stm = $c->prepare($queryUser);
                $stm->bindParam(1,$father->getNombres());
                $stm->bindParam(2,$father->getApellidos());
                $stm->bindParam(3,$father->getCorreo());
                $stm->bindParam(4,$father->getDireccion());
                $stm->bindParam(5,$father->getTelefono());
                $stm->bindParam(6,$father->getIdDistrito());
                $stm->bindParam(7, $father->getDni());

                $stm->execute();
        }

        public function getFather($dni){
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