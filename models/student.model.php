<?php

include_once('user.model.php');

class Alumno extends Usuario{
    private $fecha_nacimiento;
    private $cant_clases;
    private $padre;
    private $colegio;

    public function __construct(){
        parent::__construct();
    }

    public function getFecha_nacimiento(){
        return $this->fecha_nacimiento;
    }

    public function setFecha_nacimiento($fecha_nacimiento){
        $this->fecha_nacimiento=$fecha_nacimiento;
    }

    public function getCant_clases(){
        return $this->cant_clases;
    }

    public function setCant_clases($cant_clases){
        $this->cant_clases=$cant_clases;
    }

    public function getPadre(){
        return $this->padre;
    }

    public function setPadre($padre){
        $this->padre=$padre;
    }
    public function getColegio(){
        return $this->colegio;
    }

    public function setColegio($colegio){
        $this->colegio=$colegio;
    }
}

?>
