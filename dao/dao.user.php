<?php 

include_once ('../conexion/conexion.php');

class DaoUsuario{

	private $conexion;

	public function __construct(){
		$this->conexion = new Conexion();
	}

	public function login($dni, $pwd){

		$query = "Select * from Usuario Where DNI = ? and contrasenha = ?";
		$c = $this->conexion->getConexion();

		$count = 0;

		$stm = $c->prepare($query);
		$stm->bindParam(1, $dni);
		$stm->bindParam(2, $pwd);

		$stm->execute();

		if($row = $stm->fetch(PDO::FETCH_ASSOC)){
            $count++;
        }

    	if($count > 0){
    		return true;
    	}
		sesion($dni,$pwd);
    	return false;
	}

	

}
?>