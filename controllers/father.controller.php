<?php

include_once ("../dao/dao.user.php");
include_once ("../dao/dao.district.php");
include_once ("../dao/dao.father.php");
include_once ('../models/father.model.php');

$padreController = new PadreController();
$action = isset($_REQUEST['a']) ? $_REQUEST['a'] : "error";

if($action != "error"){
	call_user_func(array($padreController, $action));
}

class PadreController{

	private $daoUsuario;
	private $daoFather;

	public function __construct(){
		$this->daoUsuario = new DaoUsuario();
		$this->daoFather = new DaoPadre();
	}
public function getDistricts(){
    $district = new DaoDistrito();
    return $district->list();
}

public function insertPadre(){
    if(isset($_POST['btninsertar'])){
        $name = $_POST['txtname'];
        $lastName = $_POST['txtlastname'];
        $dni = $_POST['txtDni'];
        $tel = $_POST['txttel'];
        $dir = $_POST['txtdir'];
        $dist = $_POST['txtdistrito'];
        $correo = $_POST['txtcorreo'];
        $pwd = $_POST['txtpwd'];

        $father = new Padre();
        $father->setNombres($name);
        $father->setApellidos($lastName);
        $father->setDni($dni);
        $father->setContrasenha($pwd);
        $father->setTelefono($tel);
        $father->setDireccion($dir);
        $father->setIdDistrito($dist);
        $father->setCorreo($correo);

        $this->daoFather->insert($father);
        header("location:../views/listar_padre.php");
    }
    else{
        header("location:../views/home.php");
    }
}

public function listPadre(){
    return $this->daoFather->listPadres();
}

public function deletePadre(){

    if(isset($_GET['dni'])){
        $dni = $_GET['dni'];
        $this->daoFather->delete($dni);

        header("location:../views/listar_padre.php");
    }
    else{
        echo 'error';
    }
}

public function editarPadre(){
    if(isset($_POST['btneditar'])){
        $name = $_POST['txtname'];
        $lastName = $_POST['txtlastname'];
        $tel = $_POST['txttel'];
        $dir = $_POST['txtdir'];
        $dist = $_POST['txtdistrito'];
        $correo = $_POST['txtcorreo'];
        $dni = $_POST['txtDni'];

        $father = new Padre();
        $father->setNombres($name);
        $father->setApellidos($lastName);
        $father->setTelefono($tel);
        $father->setDireccion($dir);
        $father->setIdDistrito($dist);
        $father->setCorreo($correo);
        $father->setDni($dni);

        $this->daoFather->update($father);
        header("location:../views/listar_padre.php");
    }
    else{
        header("location:../views/home.php");
    }
}

public function getPadre(){
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
    
 }
}
?>