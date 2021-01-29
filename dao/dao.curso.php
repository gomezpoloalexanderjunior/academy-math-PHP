<?php 

include_once ('../conexion/conexion.php');
include_once ('../models/curso.model.php');

class DaoCurso{
        
        private $conexion;

	public function __construct(){
	        $this->conexion = new Conexion();
	}

	public function insert($curso){

                $c = $this->conexion->getConexion();

                
                $querycurso = "insert into curso (nombre,estado, precio)values (? , ? , ?)";
    
               
                $stm = $c->prepare($querycurso);
                $stm->bindParam(1, $curso->getnombreCurso());
                $stm->bindParam(2, $curso->getEstado());
                $stm->bindParam(3, $curso->getPrecio());
                $stm->execute();
        }
        
        public function list(){
                $c = $this->conexion->getConexion();

                $queryUser = "Select * from curso " ;
                
    
                $stm = $c->prepare($queryUser);
                $stm->execute();

                $curso = array();

                while($row = $stm->fetch(PDO::FETCH_ASSOC)){
                        $cur = new curso();
                        $cur->setid($row['id']);
                        $cur->setnombreCurso($row['nombre']);
                        $cur->setEstado($row['estado']);
                        $cur->setPrecio($row['precio']);
                        array_push($curso, $cur);
                }

                return $curso;
        }

        public function Estado($curso){

                $c = $this->conexion->getConexion();

                $querycurso = "Update curso set estado=? where id = ?";
                $stm = $c->prepare($querycurso);
                $stm->bindParam(1, $curso->getEstado());
                $stm->bindParam(2, $curso->getid());

                $stm->execute();
        }

        public function update($curso){

                $c = $this->conexion->getConexion();

                $queryCurs = "Update curso set nombre=?, precio=?," . 
                "where id = ?";
    
                
                $stm = $c->prepare($queryCurs);
                $stm->bindParam(1,$curso->getnombreCurso());
                $stm->bindParam(2,$curso->getPrecio());
                $stm->bindParam(3,$curso->getid());

                $stm->execute();
        }

        public function getCurso($id){
                $c = $this->conexion->getConexion();

                $queryCurs = "Select * from curso where id = ?";
    
                $stm = $c->prepare($queryCurs);
                $stm->bindParam(1, $id);
                $stm->execute();

                $curso = array();

                while($row = $stm->fetch(PDO::FETCH_ASSOC)){
                        $cur = new Curso();
                        $cur->setid($row['id']);
                        $cur->setnombreCurso($row['nombre']);
                        $cur->setPrecio($row['precio']);
                        
                        array_push($curso, $cur);
                }

                return $curso;
        }
        
        public function listcur(){
                $c = $this->conexion->getConexion();

                $querycur = "Select id, nombre from curso " ;
                
    
                $stm = $c->prepare($querycur);
                $stm->execute();

                $curso = array();

                while($row = $stm->fetch(PDO::FETCH_ASSOC)){
                        $cur = new curso();
                        $cur->setid($row['id']);
                        $cur->setnombreCurso($row['nombre']);
                        
                        array_push($curso, $cur);
                }

                return $curso;
        }


}