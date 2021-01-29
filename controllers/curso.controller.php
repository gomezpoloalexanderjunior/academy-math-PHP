<?php


include_once ("../dao/dao.curso.php");
include_once ('../models/curso.model.php');

$cursoController = new CursoController();
$action = isset($_REQUEST['a']) ? $_REQUEST['a'] : "error";

if($action != "error"){
	call_user_func(array($cursoController, $action));
}

class CursoController{

	private $daocurso;

	public function __construct(){
		$this->daoCurso = new DaoCurso();
		//$this->daoFather = new DaoPadre();
	}

public function insertCurso(){
  
    if(isset($_POST['btninsertar'])){
        $name = $_POST['txtname'];
        $estado = $_POST['txtestado'];
        $precio = $_POST['txtprecio'];

        $curso = new Curso();
        $curso->setnombreCurso($name);
        $curso->setEstado($estado);
        $curso->setPrecio($precio);

        $this->daoCurso->insert($curso);
        header("location:../views/listado_curso.php");
    }
    else{
        header("location:../views/home.php");
         }
    
    }


public function listCurso(){
    return $this->daoCurso->list();
}


public function estadoCurso(){
    if(isset($_GET['id'])){
        
            $estado = 'IN';
        $this->daoCurso->Estado($estado);
        }
        else {
            
                $estado = 'AC';
                $this->daocurso->Estado($estado);
            
        }
        
        header("location:../views/listado_curso.php");
    }
    
    public function editarCurso(){
        if(isset($_POST['btneditar'])){
            $name = $_POST['txtname'];
            $precio = $_POST['txtprecio'];
            $id = $_POST['txtid'];

    
            $curso = new Curso();
            $curso->setnombreCurso($name);
            $curso->setPrecio($precio);
            $curso->setid($id);
    
            $this->daoCurso->update($curso);
            header("location:../views/listado_curso.php");
        }
        else{
            header("location:../views/home.php");
        }
    }
   
    public function getCurso(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
    
            $Curso = new Curso();
    
            foreach($this->daoCurso->getCurso($id) as $f){
                $Curso->setid($id);
                $Curso->setnombreCurso($f->getnombreCurso());
                $Curso->setPrecio($f->getPrecio());
                
            }
    
            return $Curso;
        }
        
     }
    
 
}
?>