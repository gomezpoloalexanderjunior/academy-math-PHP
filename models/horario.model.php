<?php
class Horario{
    private $id;
    private $tema;
    private	$curso;
    private	$fechaClase;
    private	$estado;
    private $alumno;
    private	$profesor;
    
    public function __construct(){
       
    }

    public function setId($id){
        $this->id=$id;
    }
    public function getId(){
        return $this->id;
    }

    public function setTema($tema){
        $this->tema=$tema;
    }
    public function getTema(){
        return $this->tema;
    }

    public function setCurso($curso){
        $this->curso=$curso;
    }
    public function getCurso(){
        return $this->curso;
    }

    public function setFechaClase($fechaClase){
        $this->fechaClase=$fechaClase;
    }
    public function getFechaClase(){
        return $this->fechaClase;
    }

    public function setEstado($estado){
        $this->estado=$estado;
    }
    public function getEstado(){
        return $this->estado;
    }

    public function setAlumno($alumno){
        $this->alumno=$alumno;
    }
    public function getAlumno(){
        return $this->alumno;
    }

    public function setProfesor($profesor){
        $this->profesor=$profesor;
    }
    public function getProfesor(){
        return $this->profesor;
    }
}
?>