<?php

class Usuario{

	private $dni;
	private $nombres;
	private $apellidos;
	private $contrasenha;
	private $estado;
	private $fecha_registro;
	private $correo;
	private $direccion;
	private $telefono;
	private $id_distrito;

	public function __construct(){
		
	}

	public function getDni(){
		return $this->dni;
	}

	public function getNombres(){
		return $this->nombres;
	}

	public function getApellidos(){
		return $this->apellidos;
	}

	public function getContrasenha(){
		return $this->contrasenha;
	}

	public function getEstado(){
		return $this->estado;
	}

	public function getFechaRegistro(){
		return $this->fecha_registro;
	}

	public function getCorreo(){
		return $this->correo;
	}

	public function getDireccion(){
		return $this->direccion;
	}

	public function getTelefono(){
		return $this->telefono;
	}

	public function getIdDistrito(){
		return $this->id_distrito;
	} 

	public function setDni($dni){
		$this->dni = $dni;
	}

	public function setNombres($nombres){
		$this->nombres = $nombres;
	}

	public function setApellidos($apellidos){
		$this->apellidos = $apellidos;
	}

	public function setContrasenha($contrasenha){
		$this->contrasenha = $contrasenha;
	}

	public function setCorreo($correo){
		$this->correo = $correo;
	}

	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}

	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}

	public function setIdDistrito($id_distrito){
		$this->id_distrito = $id_distrito;
	} 


}

?>