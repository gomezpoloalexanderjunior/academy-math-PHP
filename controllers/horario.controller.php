<?php


include_once ("../dao/dao.horario.php");
include_once ('../models/horario.model.php');

$horarioController = new HorarioController();
$action = isset($_REQUEST['a']) ? $_REQUEST['a'] : "error";

if($action != "error"){
	call_user_func(array($horarioController, $action));
}

class HorarioController{

	private $daoHorario;

	public function __construct(){
		$this->daoHorario = new DaoHorario();
	}

public function insertHorario(){
  
    if(isset($_POST['btninsertar'])){
        $tema= $_POST['txttema'];
        $curso = $_POST['txtcurso'];
        $fechaClase = $_POST['txtfechaclase'];
        $estado = $_POST['txtestado'];

        $horario = new Horario();
        $horario->setTema($tema);
        $horario->setCurso($curso);
        $horario->setFechaClase($fechaClase);
        $horario->setEstado($estado);

        $this->daoHorario->insert($horario);
        header("location:../views/listado_curso.php");
    }
    else{
        header("location:../views/home.php");
         }
    
    }


public function listHorario($dni){
    return $this->daoHorario->listHorario($dni);
}

public function estadoHorario(){
    $id=$_GET['id'];
    $est=$_GET['e'];
   
    if(isset($id)){
        if($est==0){
            $estado = 1;
        }else{
            $estado=0;
        }
    $this->daoHorario->Estado($id,$estado);
    }
    header("location:../views/listar_horario.php");
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