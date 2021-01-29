<?php

class Curso{

    private $id;
    private $nombreCurso;
    private $precio;
    private $estado;

    
    public function __construct(){
       
    }

    public function setid($id){
        $this->id=$id;
    }

    public function getid(){
        return $this->id;
    }
    
    public function setnombreCurso($nombreCurso){
        $this->nombreCurso=$nombreCurso;
    }

    public function getnombreCurso(){
        return $this->nombreCurso;
    }
    public function setEstado($estado){
        $this->estado=$estado;
    }

    public function getEstado(){
        return $this->estado;
    }
    public function setPrecio($precio){
        $this->precio=$precio;
    }

    public function getPrecio(){
        return $this->precio;
    }
}

?>