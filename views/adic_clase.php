<?php require_once '../controllers/curso.controller.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Clase</title>
</head>
<body class="bg-dark text-light">
    <form class="container " action="../controllers/curso.controller.php?a=insertCurso" method="post">
        <table>
            <thead>
                <tr>
                    <th colspan="2">clase</th>
                </tr>
            </thead>
            <tbody class="row">
            	<tr class="form-group col-md-6">
                   <td>PROFESOR</td>
                   <td><input class=" form-control " type="text"  name="txtname" id="txtname"></td>
            	</tr>

            	<td> Curso</td> 
					
                	<td>
                    	<select class="form-control"  name="txtcurso">
                            <option value="">SELECT</option>
						     <option value="">Aritmetica</option>                    
						</select>
                	</td>

             	<tr class="form-group col-md-6">
                	<td>CANTIDAD DE HORAS</td>  
                 	<td><input class="form-control"type="text"  name="txtprecio" id="txtprecio" ><td>
				</tr>

                
                	<td>Tema</td>  
                   <td class="form-group col-md-6"> 
                   <select class="form-control"  name="txtcurso">
                            <option value="">SELECT</option>
						     <option value="">Conjunto 2</option>                    
						</select>
				    </td>
                <tr class="form-group col-md-6">
                	<td>ALUMNO</td>  
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