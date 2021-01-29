<?php 

require_once '../controllers/father.controller.php';
$padreController = new PadreController();
$father = $padreController->getPadre();
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
    <form  action="../controllers/father.controller.php?a=editarPadre" method="post">
        <table>
            <thead>
                <tr>
                    <th colspan="2">Modificar datos de Padre</th>
                </tr>
            </thead>
            <tbody class="row">

                <tr class="form-group col-md-6" hidden>
                	<td>Dni</td>  
                 	<td><input class="form-control"type="text"  name="txtDni" id="txtDni" value="<?php echo $father->getDni();?>"><td>
				</tr>
            	<tr class="form-group col-md-6">
                   <td>Nombres</td>
                   <td><input class=" form-control " type="text"  name="txtname" id="txtname" value="<?php echo $father->getNombres();?>"></td>
            	</tr>

            	<tr class="form-group col-md-6">
                	<td>Apellidos</td>  
                	<td><input class="form-control" type="text"  name="txtlastname" id="txtlastname" value="<?php echo $father->getApellidos();?>"></td>
            	</tr>

            	<tr class="form-group col-md-6">
                 	<td>Telefono</td>  
                	<td> <input class="form-control" type="text"  name="txttel"  id="txttel" value="<?php echo $father->getTelefono();?>"></td>
            	</tr>

            	<tr class="form-group col-md-6">
                	<td> Direccion</td>  
                 	<td > <input class="form-control" type="text"  name="txtdir"  id="txtdir" value="<?php echo $father->getDireccion();?>"></td>
            	</tr>

             	<tr class="form-group col-md-6">
					<td> Distrito</td>
                	<td>
                    	<select class="form-control"  name="txtdistrito">
						<?php foreach($padreController->getDistricts() as $d){ ?> 
                        <option value="<?php echo $d->getId(); ?>" <?php if($father->getIdDistrito() == $d->getId()){echo 'selected';}?>><?php echo $d->getNombre();?></option>  
						<?php }?>                         
						</select>
                	</td>
             	</tr>

             	<tr class="form-group col-md-6">
             		<td>Correo</td>  
                 	<td><input class="form-control" type="text" name="txtcorreo" id="txtcorreo" value="<?php echo $father->getCorreo();?>"></td>
				</tr>
				
				<tr class="d-flex justify-content-between">
					<td colspan="2" ><input class="btn btn-primary"type="submit" name="btneditar" value="Editar"/></td>
					<td><a class="btn btn-danger" href="adic_padre.php">Regresar</a></td>
				</tr>
         	</tbody>                           
        </table>
    </form>
</body>
</html>