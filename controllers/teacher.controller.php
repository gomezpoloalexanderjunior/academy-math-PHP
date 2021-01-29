<?php
include_once ("../dao/dao.user.php");
include_once ("../dao/dao.district.php");
include_once ("../dao/dao.teacher.php");
include_once ('../models/teacher.model.php');
include_once ('../models/curso.model.php');
include_once ('../dao/dao.curso.php');

$profesorController = new ProfesorController();
$action = isset($_REQUEST['a']) ? $_REQUEST['a'] : "error";

if($action != "error"){
	call_user_func(array($profesorController, $action));
}

class ProfesorController{

	private $daoUsuario;
	private $daoTeacher;

	public function __construct(){
		$this->daoUsuario = new DaoUsuario();
		$this->daoTeacher = new DaoProfesor();
	}
public function getDistricts(){
    $district = new DaoDistrito();
    return $district->list();
}

public function getCurso(){
    $curso = new DaoCurso();
    return $curso->listcur();
}

public function insertProfesor(){
    if(isset($_POST['btninsertar'])){
        $name = $_POST['txtname'];
        $lastName = $_POST['txtlastname'];
        $dni = $_POST['txtDni'];
        $tel = $_POST['txttel'];
        $dir = $_POST['txtdir'];
        $dist = $_POST['txtdistrito'];
        $correo = $_POST['txtcorreo'];
        $pwd = $_POST['txtpwd'];
        $cur = $_POST['txtcurso'];
        $exp = $_POST['txtexperiencia'];

        $teacher = new Profesor();
        $teacher->setNombres($name);
        $teacher->setApellidos($lastName);
        $teacher->setDni($dni);
        $teacher->setContrasenha($pwd);
        $teacher->setTelefono($tel);
        $teacher->setDireccion($dir);
        $teacher->setIdDistrito($dist);
        $teacher->setCorreo($correo);
        $teacher->setCurso($cur);
        $teacher->setExperiencia($exp);
        $this->daoTeacher->insert($teacher);
        header("location:../views/listado_profesor.php");
    }
    else{
        header("location:../views/home.php");
    }
}

public function listProfesor(){
    return $this->daoTeacher->list();
}

public function deleteProfesor(){

    if(isset($_GET['dni'])){
        $dni = $_GET['dni'];
        $this->daoFather->delete($dni);

        header("location:../views/listado_profesor.php");
    }
    else{
        echo 'error';
    }
}

public function editarProfesor(){
    if(isset($_POST['btneditar'])){
        $name = $_POST['txtname'];
        $lastName = $_POST['txtlastname'];
        $tel = $_POST['txttel'];
        $dir = $_POST['txtdir'];
        $dist = $_POST['txtdistrito'];
        $correo = $_POST['txtcorreo'];
        $dni = $_POST['txtDni'];

        $teacher = new Profesor();
        $teacher->setNombres($name);
        $teacher->setApellidos($lastName);
        $teacher->setTelefono($tel);
        $teacher->setDireccion($dir);
        $teacher->setIdDistrito($dist);
        $teacher->setCorreo($correo);
        $teacher->setDni($dni);

        $this->daoTeacher->update($teacher);
        header("location:../views/listado_profesor.php");
    }
    else{
        header("location:../views/home.php");
    }
}

public function getProfesor(){
    if(isset($_GET['dni'])){
        $dni = $_GET['dni'];

        $teacher = new Profesor();

        foreach($this->daoTeacher->getProfesor($dni) as $f){
            $teacher->setDni($dni);
            $teacher->setNombres($f->getNombres());
            $teacher->setApellidos($f->getApellidos());
            $teacher->setTelefono($f->getTelefono());
            $teacher->setDireccion($f->getDireccion());
            $teacher->setIdDistrito($f->getIdDistrito());
            $teacher->setCorreo($f->getCorreo());
        }

        return $teacher;
    }
    
    }
   
}
?>