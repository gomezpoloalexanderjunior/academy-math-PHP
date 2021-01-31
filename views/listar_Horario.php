<?php 
require_once '../controllers/horario.controller.php';
$horarioController = new HorarioController();

session_start();
$dni=$_SESSION["txtdni"];
$sess=$_SESSION["txtdni"].$_SESSION["txtpwd"];
if($sess == null || $sess==''){
  echo "'<h2>'usted no tiene autorizacion'</h2>'";
  die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Horario</title>
    <script src="https://kit.fontawesome.com/a213f9143d.js" crossorigin="anonymous"></script>
</head>
<body class="bg-dark text-light">
    <header class="header">
    

<table class="table table-sm">
  <thead class="table-info">
    <tr>
      <th scope="col">Tema</th>
      <th scope="col">Curso</th>
      <th scope="col">Fecha Clase</th>
      <th scope="col">Estado</th>
      <th scope="col">ACCIÓN</th>
    </tr>
  </thead>
  <tbody class="text-light">
    <?php foreach($horarioController->listHorario($dni) as $h){ ?> 
    <tr>
      <td><?php echo $h->getTema();?></td>
      <td><?php echo $h->getCurso();?></td>
      <td><?php echo $h->getFechaClase();?></td>
      <td><?php if($h->getEstado()==0)echo "proceso"; else echo "finalizado";?></td>
      <td>
        <a class="btn btn-warning" href="editar_profesor.php?id=<?php echo $h->getId();?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
        <a class="btn btn-danger" href="../controllers/horario.controller.php?a=deleteHorario&id=<?php echo $h->getId();?>&e=<?php echo $h->getEstado();?>"><i class="fa fa-times" aria-hidden="true"></i></a>
        <a class="btn btn-danger" href="../controllers/horario.controller.php?a=estadoHorario&id=<?php echo $h->getId();?>&e=<?php echo $h->getEstado();?>"><i class="fa fa-times" aria-hidden="true"></i></a>
      </td>
    </tr>
    <?php }?>
   
  </tbody>
</table>
    </header>
    <footer>
    <a href="adic_profesor.php" target="formulario" id="profesor">
             <span class="btn btn-primary">Ingresar Profesor</span>  
    </a>
    </footer>
</body>
</html>