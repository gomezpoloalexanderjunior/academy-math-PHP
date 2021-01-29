<?php
include_once ("../dao/dao.user.php");
include_once ("../dao/dao.district.php");
include_once ("../dao/dao.father.php");
include_once ('../models/father.model.php');
session_start();
$homeController = new HomeController();
$action = isset($_REQUEST['a']) ? $_REQUEST['a'] : "error";

if($action != "error"){
	call_user_func(array($homeController, $action));
}

class HomeController{

	private $daoUsuario;
	private $daoFather;

	public function __construct(){
		$this->daoUsuario = new DaoUsuario();
		$this->daoFather = new DaoPadre();
	}

	public function inicio(){
		include_once ("../views/login.php");
	}

	public function login(){

		if(isset($_POST['txtdni']) && isset($_POST['txtpwd'])){

			$dni = $_POST["txtdni"];
			$pwd = $_POST["txtpwd"];

			
			$isLogin = $this->daoUsuario->login($dni, $pwd);

			if($isLogin){
				$_SESSION["txtdni"]=$dni;
     			$_SESSION["txtpwd"]=$pwd;
				header("location:../views/home.php");
				
			}
			else{
				header("location:../views/login.php");
			}
		}
	}
	
}

?>