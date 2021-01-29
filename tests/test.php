<?php
require '../vendor/autoload.php';
require '../dao/dao.alumno.php';
class OperacionesTest extends PHPUnit_Framework_TestCase{
    private $op;
    public function testlistValues(){ 
        $this->op=new DaoAlumno();
        $this->asserTrue(true,$this->op->list());
    }
}
?>