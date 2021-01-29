<?php

include_once('user.model.php');

class Profesor extends Usuario{

    private $experiencia;
    private $curso;

    public function __construct(){
        parent::__construct();
    }

    public function getExperiencia(){
        return $this->experiencia;
    }

    public function setExperiencia($experiencia){
        $this->experiencia=$experiencia;
    }

    public function getCurso(){
        return $this->curso;
    }

    public function setCurso($curso){
        $this->curso=$curso;
    }
}

?>