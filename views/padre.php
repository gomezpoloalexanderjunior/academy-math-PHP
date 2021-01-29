<?php include_once('../controllers/home.controller.php')?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="../css/bem.css">
	<link rel="stylesheet" href="../css/estilos.css">
	<link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body class="container-sm  bg-dark">
	<h1>Welcome Padre</h1>
	

	<form action="../controllers/home.controller.php?a=insertPadre" method="post">
        <table >
            <thead>
                <tr>
                    <th colspan="2">Nuevo Padre</th>
                </tr>
            </thead>
            <tbody class="form-group row">
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
					<?php $homeController = new HomeController();?>
                	<td>
                    	<select class="form-control"  name="txtdistrito">
						<?php foreach($homeController->getDistricts() as $d){ ?> 
							<option value="<?php echo $d->getId(); ?>"><?php echo $d->getNombre();?></option>  
						<?php }?>                         
						</select>
                	</td>
             	</tr>

             	<tr class="form-group col-md-6">
             		<td>Correo</td>  
                 	<td><input class="form-control" type="text" name="txtcorreo" id="txtcorreo"></td>
				</tr>
				
				<tr>
					<td colspan="2"><input type="submit" name="btninsertar" value="Insertar"/></td>
				</tr>
         	</tbody>                           
        </table>
    </form>

	<a href="login.php">Redireccionar atrás</a>
</body>
</html>