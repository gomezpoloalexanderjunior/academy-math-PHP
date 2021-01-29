<?php 
require_once '../controllers/teacher.controller.php';
$profesorController = new ProfesorController();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Profesor</title>
    <script src="https://kit.fontawesome.com/a213f9143d.js" crossorigin="anonymous"></script>
</head>
<body class="bg-dark text-light">
    <header class="header">
    

<table class="table table-sm">
  <thead class="table-info">
    <tr>
      <th scope="col">DNI</th>
      <th scope="col">NOMBRES</th>
      <th scope="col">APELLIDO</th>
      <th scope="col">TELEFONO</th>
      <th scope="col">DIRECCION</th>
      <th scope="col">CORREO</th>
      <th scope="col">Experiencia</th>
      <th scope="col">ACCIÓN</th>
    </tr>
  </thead>
  <tbody class="text-light">
    <?php foreach($profesorController->listProfesor() as $p){ ?> 
    <tr>
      <td><?php echo $p->getDni();?></td>
      <td><?php echo $p->getNombres();?></td>
      <td><?php echo $p->getApellidos();?></td>
      <td><?php echo $p->getTelefono();?></td>
      <td><?php echo $p->getDireccion();?></td>
      <td><?php echo $p->getCorreo();?></td>
      <td><?php echo $p->getExperiencia();?>Años</td>
      <td>
        <a class="btn btn-warning" href="editar_profesor.php?dni=<?php echo $p->getDni();?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
        <a class="btn btn-danger" href="../controllers/teacher.controller.php?a=deleteProfesor&dni=<?php echo $p->getDni();?>"><i class="fa fa-times" aria-hidden="true"></i></a>
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