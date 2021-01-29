<?php

include_once('user.model.php');

class Padre extends Usuario{

    private $nro_hijos;

    public function __construct(){
        parent::__construct();
    }

    public function getNroHijos(){
        return $this->nro_hijos;
    }
}

?>