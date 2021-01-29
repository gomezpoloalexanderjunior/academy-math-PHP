<?php 

include_once ('../conexion/conexion.php');
include_once ('../models/district.model.php');

class DaoDistrito{

	private $conexion;

	public function __construct(){
		$this->conexion = new Conexion();
	}

	public function list(){

		$query = "Select * from Distrito";
		$c = $this->conexion->getConexion();

        $array = array();

		$stm = $c->prepare($query);
		$stm->execute();

		while($row = $stm->fetch(PDO::FETCH_ASSOC)){

            $district = new Distrito($row['id'], $row['nombre']);
            array_push($array, $district);
        }

    	return $array;
	}

}
?>