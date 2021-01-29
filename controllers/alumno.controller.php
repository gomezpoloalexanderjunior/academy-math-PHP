<?php

include_once ("../dao/dao.user.php");
include_once ("../dao/dao.district.php");
include_once ("../dao/dao.alumno.php");
include_once ("../dao/dao.father.php");
include_once ("../dao/dao.colegio.php");
include_once ('../models/student.model.php');

$alumnoController = new AlumnoController();
$action = isset($_REQUEST['a']) ? $_REQUEST['a'] : "error";

if($action != "error"){
    call_user_func(array($alumnoController, $action));
}

class AlumnoController{

	private $daoUsuario;
	private $daoAlumno;

	public function __construct(){
		$this->daoUsuario = new DaoUsuario();
		$this->daoAlumno = new DaoAlumno();
    }
    
    public function getDistricts(){
        $distrito = new DaoDistrito();
        return $distrito->list();
    }
    public function getPad(){
        $padre = new DaoPadre();
        return $padre->list();
    }
    public function getColegio(){
        $colegio = new DaoColegio();
        return $colegio->listColegio();
    }
    public function insertAlumno(){
        if(isset($_POST['btninsertar'])){
            $name = $_POST['txtname'];
            $lastName = $_POST['txtlastname'];
            $dni = $_POST['txtDni'];
            $tel = $_POST['txttel'];
            $dir = $_POST['txtdir'];
            $dist = $_POST['txtdistrito'];
            $correo = $_POST['txtcorreo'];
            $pwd = $_POST['txtpwd'];
            $fecha_nacimiento = $_POST['txtfecha_nacimiento'];
            $padre = $_POST['txtpadre'];
            $colegio = $_POST['txtcolegio'];

            $student = new Alumno();
            $student->setNombres($name);
            $student->setApellidos($lastName);
            $student->setDni($dni);
            $student->setContrasenha($pwd);
            $student->setTelefono($tel);
            $student->setDireccion($dir);
            $student->setIdDistrito($dist);
            $student->setCorreo($correo);
            $student->setFecha_nacimiento($fecha_nacimiento);
            $student->setPadre($padre);
            $student->setColegio($colegio);
    
            $this->daoAlumno->insertAlumno($student);
            header("location:../views/listar_alumno.php");
        }
        else{
            header("location:../views/home.php");
        }
    }

    public function listAlumno(){
       return $this->daoAlumno->list();
    }

    public function deletePadre(){

        if(isset($_GET['dni'])){
            $dni = $_GET['dni'];
            $this->daoAlumno->delete($dni);

            header("location:../views/listar_alumno.php");
        }
        else{
            echo 'error';
        }
    }

    public function editarAlumno(){
        if(isset($_POST['btneditar'])){
            $name = $_POST['txtname'];
            $lastName = $_POST['txtlastname'];
            $tel = $_POST['txttel'];
            $dir = $_POST['txtdir'];
            $dist = $_POST['txtdistrito'];
            $correo = $_POST['txtcorreo'];
            $dni = $_POST['txtDni'];

            $father = new Alumno();
            $father->setNombres($name);
            $father->setApellidos($lastName);
            $father->setTelefono($tel);
            $father->setDireccion($dir);
            $father->setIdDistrito($dist);
            $father->setCorreo($correo);
            $father->setDni($dni);

            $this->daoFather->update($father);
            header("location:../views/listar_alumno.php");
        }
        else{
            header("location:../views/home.php");
        }
    }
    /*
    public function getAlumno(){
        if(isset($_GET['dni'])){
            $dni = $_GET['dni'];

            $father = new Padre();

            foreach($this->daoFather->getFather($dni) as $f){
                $father->setDni($dni);
                $father->setNombres($f->getNombres());
                $father->setApellidos($f->getApellidos());
                $father->setTelefono($f->getTelefono());
                $father->setDireccion($f->getDireccion());
                $father->setIdDistrito($f->getIdDistrito());
                $father->setCorreo($f->getCorreo());
            }

            return $father;
        }
    }*/

}

?>
