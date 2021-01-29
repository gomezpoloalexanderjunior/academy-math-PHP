<?php

include_once ('../config/config.php');

class Conexion{

	private $hostname;
	private $database;
	private $user;
	private $pwd;
	private $charset;

	public function __construct(){
		$this->hostname = hostname;
		$this->database = database;
		$this->user = user;
		$this->pwd = pwd;
		$this->charset = charset;
	}

	public function getConexion(){

		$c = new PDO("mysql:host=" . $this->hostname . ";dbname=" . $this->database, $this->user, $this->pwd);

		if($c){
			return $c;
		}
		else{
			die();
		}

	}

}

?>