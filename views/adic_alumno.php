<?php require_once '../controllers/alumno.controller.php';

session_start();
$sess=$_SESSION["txtdni"].$_SESSION["txtpwd"];
if($sess == null || $sess==''){
  echo "usted no tiene autorizacion";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <title>Alumno</title>
</head>
<body class="container bg-dark text-light">
    <form class="" action="../controllers/alumno.controller.php?a=insertAlumno" method="post">
        <table>
            <thead>
                <tr>
                    <th colspan="2">Nuevo Alumno</th>
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
                	<td> Fecha</td>  
                 	<td > <input class="form-control" type="Date"  name="txtfecha_nacimiento"  id="txtfecha_nacimiento" ></td>
                </tr>

				<tr class="form-group col-md-6">
             		<td>Correo</td>  
                 	<td><input class="form-control" type="text" name="txtcorreo" id="txtcorreo"></td>
				</tr>

				<tr class="form-group col-md-6">
					<td> Padre</td> 
					<?php $padre = new AlumnoController();?>
					<td>
						<select class="form-control"  name="txtpadre">
						<?php foreach($padre->getPad() as $p){ ?> 
						<option value="<?php echo $p->getDni(); ?>"><?php echo $p->getNombres();?>   <?php echo $p->getApellidos();?></option> 
						<?php }?>                         
						</select>
					</td>
				</tr>
                <tr class="form-group col-md-6">
					<td> Colegio</td> 
					<?php $colegio = new AlumnoController();?>
                	<td>
                    	<select class="form-control"  name="txtcolegio">
						<?php foreach($colegio->getColegio() as $c){ ?> 
							<option value="<?php echo $c->getId();?>"><?php echo $c->getNombre();?></option>  
						<?php }?>                         
						</select>
                	</td>
             	</tr>
             	<tr class="form-group col-md-6">
					<td> Distrito</td> 
					<?php $distrito = new AlumnoController();?>
                	<td>
                    	<select class="form-control"  name="txtdistrito">
						<?php foreach($distrito->getDistricts() as $d){ ?> 
							<option value="<?php echo $d->getId(); ?>"><?php echo $d->getNombre();?></option>  
						<?php }?>                         
						</select>
                	</td>
             	</tr>
				 
         	</tbody>
			<tr class="row">
				<td colspan="2" class="w-50"><input class="btn btn-primary" type="submit" name="btninsertar" value="Insertar"/></td>
				<td colspan="2" class="w-50"><a class="btn btn-danger" href="listar_alumno.php">Cancelar</a></td>
			</tr>                  
        </table>
		  
    </form>	
</body>

</html>