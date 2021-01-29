<?php 
require_once '../controllers/curso.controller.php';
$cursoController = new cursoController();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Padres</title>
    <script src="https://kit.fontawesome.com/a213f9143d.js" crossorigin="anonymous"></script>
</head>
<body class="bg-dark text-light">
    <header class="header">
    

<table class="table table-sm">
  <thead class="table table-sm table-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">CURSO</th>
      <th scope="col">ESTADO</th>
      <th scope="col">PRECIO</th>
      <th scope="col">ACCIÓN</th>
    </tr>
  </thead>
  <tbody class="text-light">
    <?php foreach($cursoController->listcurso() as $c){ ?> 
    <tr>
      <td><?php echo $c->getid();?></td>
      <td><?php echo $c->getnombreCurso();?></td>
      <td><?php echo $c->getEstado();?></td>
      <td><?php echo $c->getPrecio();?></td>
      <td>
        <a class="btn btn-warning" href="editar_curso.php?id=<?php echo $c->getid ();?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
        <a class="btn btn-success" href="../controllers/curso.controller.php?a=estadoCurso&id=<?php echo $c->getid();?>">A/I</a>
        
      </td>
    </tr>
    <?php }?>
   
  </tbody>
</table>
    </header>
    <footer>
    <a href="adic_curso.php" target="formulario" id="curso">
             <span class="btn btn-primary">Ingresar Curso</span>  
    </a>
    </footer>
</body>
</html>