<?php require_once '../controllers/teacher.controller.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Profesor</title>
</head>
<body class="bg-dark text-light">
    <form class="container " action="../controllers/teacher.controller.php?a=insertProfesor" method="post">
        <table>
            <thead>
                <tr>
                    <th colspan="2">Nuevo Profesor</th>
                </tr>
            </thead>
            <tbody class="row">
            	<tr class="form-group col-md-6">
                   <td>Nombres</td>
                   <td><input class=" form-control " type="text"  name="txtname" id="txtname"></td>
            	</tr>

            	<tr class="form-group col-md-6">
                	<td>Apellidos</td>  
                	<td><input class="form-control" type="text"  name="txtlastname" id="txtlastname"></td>
            	</tr>

             	<tr class="form-group col-md-6">
                	<td>Dni</td>  
                 	<td><input class="form-control"type="text"  name="txtDni" id="txtDni" ><td>
				</tr>
				 
				<tr class="form-group col-md-6">
                	<td>Contraseña</td>  
                 	<td><input class="form-control"type="text"  name="txtpwd" id="txtpwd" ><td>
             	</tr>

            	<tr class="form-group col-md-6">
                 	<td>Telefono</td>  
                	<td> <input class="form-control" type="text"  name="txttel"  id="txttel" ></td>
            	</tr>

            	<tr class="form-group col-md-6">
                	<td> Direccion</td>  
                 	<td > <input class="form-control" type="text"  name="txtdir"  id="txtdir" ></td>
            	</tr>

             	<tr class="form-group col-md-6">
					<td> Distrito</td> 
					<?php $profesorController = new ProfesorController();?>
                	<td>
                    	<select class="form-control"  name="txtdistrito">
						<?php foreach($profesorController->getDistricts() as $d){ ?> 
							<option value="<?php echo $d->getId(); ?>"><?php echo $d->getNombre();?></option>  
						<?php }?>                         
						</select>
                	</td>
             	</tr>
				 <tr class="form-group col-md-6">
					<td> Curso</td> 
					<?php $profesorController = new ProfesorController();?>
                	<td>
                    	<select class="form-control"  name="txtcurso">
						<?php foreach($profesorController->getCurso() as $c){ ?> 
							<option value="<?php echo $c->getid(); ?>"><?php echo $c->getnombreCurso();?></option>  
						<?php }?>                         
						</select>
                	</td>
             	</tr>
             	<tr class="form-group col-md-6">
             		<td>Correo</td>  
                 	<td><input class="form-control" type="text" name="txtcorreo" id="txtcorreo"></td>
				</tr>
				<tr class="form-group col-md-6">
             		<td>Experiencia</td>  
                 	<td><input class="form-control" type="text" name="txtexperiencia" id="txtexperiencia"></td>
				</tr>
				<tr>
					<td colspan="2"><input class="btn btn-primary " type="submit" name="btninsertar" value="Insertar"/></td>
				</tr>
         	</tbody>                           
        </table>
    </form>

	
</body>
</html>