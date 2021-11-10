 <?php
require_once "Ejercicios.entidad.php";
require_once "Ejercicios.model.php";
require_once "Tiporutina.model.php";
require_once "Tiporutina.entidad.php";


$Ejercicios = new Ejercicios();
$modelejercicios = new EjerciciosModel();
$Tiporutina = new Tiporutina();
$modeltiporutina = new TiporutinaModel();


if(isset($_POST['Id_Tiporutina']))
{
	$idtiporutina=$_POST['Id_Tiporutina'];
}


if(isset($_POST['operacion']))
{
	switch($_POST['operacion'])
	{
		case 'Actualizar':
			$Ejercicios>set_Nombre_Ejercicio($_POST ['Nombre_Ejercicio']);
			$Ejercicios->set_Descripcion($_POST ['Descripcion']);
			$Ejercicios->set_Id_Ejercicio($_POST['Id_Ejercicio']);
			$modelejercicios->Actualizar($Ejercicios);
			break;

		case 'Registrar':
			$Ejercicios->set_Id_Tiporutina($_POST['Id_Tiporutina']);
			$Ejercicios->set_Nombre_Ejercicio($_POST ['Nombre_Ejercicio']);
			$Ejercicios->set_Descripcion($_POST ['Descripcion']);

			$modelejercicios->Registrar($Ejercicios); 
			break;

		case 'Eliminar':
			$modelejercicios->Eliminar($_POST['Id_Ejercicio']);
			break;

		case 'Editar':
			$Ejercicios = $modelejercicios->Obtener($_POST['Id_Ejercicio']);
			break;
	}
}
?>

<DOCTYPE html>
<html lang="es">
	<head>
		<title>Ejercicios</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
	</head>
		<body>
		<div class="contenedor">	
<h2>Administracion de Ejercicios</h2>
			



<table>
<form action="Ejercicios.php" method="post"
class="pure-form pure-form-stacked">
	<tr>
		<td>Tipo de rutina:<select class="contenedor_input" required name="Id_Tiporutina" onchange="this.form.submit();">
		<option>Seleccione el tipo de rutina</option>	

		<?php 
		foreach($modeltiporutina->Listar() as $r):
			if(isset($_POST['Id_Tiporutina']))
			{
				if($r->get_Id_Tiporutina()==$idtiporutina){?>
					<option selected="selected" value="<?php echo $r->get_Id_Tiporutina(); ?>"> <?php echo $r->get_Tiporutina(); ?> </option><?php
				}else{?>
					<option value="<?php echo $r->get_Id_Tiporutina(); ?>"> <?php echo $r->get_Tiporutina(); ?> </option><?php
				}
			}else{?>
				<option value="<?php echo $r->get_Id_Tiporutina(); ?>"> <?php echo $r->get_Tiporutina(); ?> </option><?php
			}
		
		 endforeach; ?> 
	</select></td>	
	</tr>
</form>
<form action="Ejercicios.php" method="post"
class="pure-form pure-form-stacked">


<input type="hidden" name="operacion" value="<?php echo $Ejercicios->get_Id_Ejercicio() > 0 ? 'Actualizar' :     'Registrar'; ?>"/>
<input type="hidden" name="Id_Ejercicio" value="<?php echo $Ejercicios->get_Id_Ejercicio() ?>"/>
	<tr>
		<!--<th>Nombre ejercicio</th>-->
	<td>Nombre del ejercicio:<input class="contenedor_input" required placeholder="Ejercicio" type="text" name="Nombre_Ejercicio" value="<?php echo $Ejercicios->get_Nombre_Ejercicio(); ?>"/></td>	
	</tr>
	<tr>
		<!--<th>Descripcion</th>-->
	<td>Descripcion:<input class="contenedor_input" required placeholder="Descripcion" type="text" name="Descripcion" value="<?php echo $Ejercicios->get_Descripcion(); ?>"/></td>
	</tr>
	<tr>

	<!-- isset para esconder la table y el boton de guardar-->
		<?php 
			if(isset($_POST['Id_Tiporutina']))
			?>

	<td>
		<input type="hidden" name="Id_Tiporutina" value="<?php echo $idtiporutina ?>"/>
		<input class="boton"type="submit" value="Guardar"/></td>
<?php  ?>
</tr>
		
</table>	
</form>
</div>
				<div id="main-container">
				<table class="tabla" >
					<thead>
						<tr class="table_tr">
							<th class="table_th">Nombre ejercicio</th>
							<th class="table_th">Descripcion</th>
							<th class="table_th"></th>
							<th class="table_th"></th>
							
						</tr>
					</thead>
						<!-- isset para esconder los datos de la tabla -->
					<?php 
						if(isset($_POST['Id_Tiporutina']))
							{ ?>
					<?php foreach($modelejercicios->ListarxTiporutina($idtiporutina) as $r): ?>
						<tr class="table_tr">
								<td class="table_td"><?php echo $r->get_Nombre_Ejercicio();?></td>
								<td class="table_td"><?php echo $r->get_Descripcion(); ?></td>
							


						<td>	
						<form action="Ejercicios.php" method="post">
							<input type="hidden" name="operacion" value="Editar"/>
							<input type="hidden" name="Id_Ejercicio" value="<?php echo $r->get_Id_Ejercicio();?>"/>
							<input type="hidden" name="Id_Tiporutina" value="<?php echo $Id_Tiporutina ?>"/>
							<input class="editar" type="submit" value="Editar"/>
						</form>		
							</td>

						<td>	
						<form action="Ejercicios.php" method="post" onsubmit="return confirm ('Esta seguro?');">
							<input type="hidden" name="operacion" value="Eliminar"/>
							<input type="hidden" name="Id_Ejercicio" value="<?php echo $r->get_Id_Ejercicio();?>"/>
							<input type="hidden" name="Id_Tiporutina" value="<?php echo $Id_Tiporutina ?>"/>
							<input class="eliminar" type="submit" value="Eliminar"/>
						</form>		
						</td>
						</tr>
					
						<?php endforeach; 
					} ?>
				</table>

		   	</div>
			</div>

		</body>	 
</html>