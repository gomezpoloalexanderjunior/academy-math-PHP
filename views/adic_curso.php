<?php require_once '../controllers/curso.controller.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Curso</title>
</head>
<body class="bg-dark text-light">
    <form class="container " action="../controllers/curso.controller.php?a=insertCurso" method="post">
        <table>
            <thead>
                <tr>
                    <th colspan="2">Nuevo Curso</th>
                </tr>
            </thead>
            <tbody class="row">
            	<tr class="form-group col-md-6">
                   <td>Curso</td>
                   <td><input class=" form-control " type="text"  name="txtname" id="txtname"></td>
            	</tr>

            	<tr class="form-group col-md-6">
                	<td>Estado</td>  
                	<td><input class="form-control" type="text"  name="txtestado" id="txtestado"></td>
            	</tr>

             	<tr class="form-group col-md-6">
                	<td>Precio</td>  
                 	<td><input class="form-control"type="text"  name="txtprecio" id="txtprecio" ><td>
				</tr>

				<tr>
					<td colspan="2"><input class="btn btn-primary " type="submit" name="btninsertar" value="Insertar"/></td>
				</tr>
         	</tbody>                           
        </table>
    </form>

	
</body>
</html>