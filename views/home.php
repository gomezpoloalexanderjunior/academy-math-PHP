<?php
session_start();
$sess=$_SESSION["txtdni"].$_SESSION["txtpwd"];
if($sess == null || $sess==''){
  echo "'<h1>'usted no tiene autorizacion'</h1>'";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link href="../css/estilos.css" rel="stylesheet" type="text/css"/>
    
    <title>Menu</title>
    <script src="https://kit.fontawesome.com/a213f9143d.js" crossorigin="anonymous"></script>
</head>

<body class="bg-dark border border-danger">
    <header class="header mb-4" >
    <div class="d-flex justify-content-around">
        <a class="social" href="#"   target="WORK"><i class="fas fa-user-alt"></i>Usuario</a>
        <a href="sesion.php" ><i class="fa fa-power-off" aria-hidden="true"></i></a>
        <a href="reportes.php" ><i class="fa fa-line-chart" target="formulario" aria-hidden="true"></i></a>
    </div>
    </header>
    <section>
        <div class="Menu mb-2">
            <nav class="nav"> 
                <a href="#"  id="logo">
                                LogoCorporatio
                </a>
                <a href="horario.php"  target="formulario" >
                    <i class="far fa-calendar-alt"></i><span>Horario</span> 
                </a>
                <a href="listar_alumno.php" target="formulario" >
                    <i class="fas fa-user-graduate"></i> <span>Alumno</span> 
                </a>
                <a href="listar_padre.php" target="formulario"  >
                    <i class="fab fa-jenkins"></i><span>Padre</span> 
                </a>
                <a href="listado_profesor.php" target="formulario" >
                    <i class="fas fa-chalkboard-teacher"></i><span>Profesor</span> 
                </a>
                <a href="listado_curso.php" target="formulario">
                    <i class="fas fa-book-reader"></i> <span>Curso</span>  
                </a>  
                <a href="listar_colegio.php" target="formulario">
                    <i class="fas fa-school"></i> <span >Colegio</span>  
                </a>
                
                <a href="listar_horario.php"  target="formulario">
                    <i class="far fa-calendar-alt "></i><span>Solicitar Clase</span> 
                </a>
            </nav>
            
            <iframe class="frame" src="vistaprincipal.php"  name="formulario"></iframe>   
            
        </div>
    </section> 
</html>