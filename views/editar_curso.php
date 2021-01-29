<?php 

require_once '../controllers/Curso.controller.php';
$cursoController = new CursoController();
$curso = $cursoController->getCurso();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Document</title>
</head>
<body class="container bg-dark text-light">
    <form  action="../controllers/curso.controller.php?a=editarCurso" method="post">
        <table>
            <thead>
                <tr>
                    <th colspan="2">Modificar datos de Padre</th>
                </tr>
            </thead>
            <tbody class="row">

                <tr class="form-group col-md-6" hidden>
                	<td>id</td>  
                 	<td><input class="form-control"type="text"  name="txtid" id="txtid" value="<?php echo $curso->getid();?>"><td>
				</tr>
                <tr class="form-group col-md-6" >
                	<td>Curso</td>  
                 	<td><input class="form-control"type="text"  name="txtname" id="txtname" value="<?php echo $curso->getnombreCurso();?>"><td>
				</tr>
            	<tr class="form-group col-md-6">
                   <td>Precio</td>
                   <td><input class=" form-control " type="text"  name="txtprecio" id="txtprecio" value="<?php echo $curso->getPrecio();?>"></td>
            	</tr>
				<tr>
					<td colspan="2"><input class="btn btn-primary" type="submit" name="btneditar" value="Editar"/></td>
				</tr>
         	</tbody>                           
        </table>
    </form>

	
</body>
</html>