<?php
require_once "Rutina.entidad.php";
require_once "Rutina.model.php";
require_once "Cliente.model.php";
require_once "Cliente.entidad.php";
require_once "Grupomuscular.model.php";
require_once "Grupomuscular.entidad.php";
require_once "Tiporutina.model.php";
require_once "Tiporutina.entidad.php";
require_once "Ejercicios.model.php";
require_once "Ejercicios.entidad.php";



$Rutina = new Rutina();
$modelrutina = new RutinaModel();
$Cliente = new Cliente();
$modelcliente = new ClienteModel();
$Grupomuscular = new Grupomuscular();
$modelgrupomuscular = new GrupomuscularModel();
$Tiporutina = new TiporutinaModel();
$modeltiporutina = new TiporutinaModel();
$Ejercicios = new Ejercicios();
$modelejercicios = new EjerciciosModel();



if(isset($_POST['Id_Cliente']))
{
	$idcliente=$_POST['Id_Cliente'];
}

if(isset($_POST['Id_Tiporutina']))
{
	$idtiporutina=$_POST['Id_Tiporutina'];
}

if(isset($_POST['Id_Grupo_Muscular']))
{
	$idgrupomuscular=$_POST['Id_Grupo_Muscular'];
}

if(isset($_POST['Id_Ejercicio']))
{
	$idejercicio=$_POST['Id_Ejercicio'];
}

if(isset($_POST['operacion']))
{
	switch($_POST['operacion'])
	{
		case 'Actualizar':
			$Rutina->set_Id_Rutina($_POST ['Id_Rutina']);
			$Rutina->set_Id_Cliente($_POST ['Id_Cliente']);
			$Rutina->set_Id_Grupo_Muscular($_POST ['Id_Grupo_Muscular']);
			$Rutina->set_Id_Tiporutina($_POST ['Id_Tiporutina']);
			$Rutina->set_Id_Ejercicio($_POST['Id_Ejercicio']);
			$Rutina->set_Series($_POST['Series']);
			$Rutina->set_Repeticiones($_POST['Repeticiones']);
			$Rutina->set_Descanso($_POST['Descanso']);
			$Rutina->set_Peso($_POST['Peso']);
			$modelrutina->Actualizar($Rutina);
			break;

		case 'Registrar':
			$Rutina->set_Id_Rutina($_POST ['Id_Rutina']);
			$Rutina->set_Id_Cliente($_POST ['Id_Cliente']);
			$Rutina->set_Id_Grupo_Muscular($_POST ['Id_Grupo_Muscular']);
			$Rutina->set_Id_Tiporutina($_POST ['Id_Tiporutina']);
			$Rutina->set_Id_Ejercicio($_POST['Id_Ejercicio']);
			$Rutina->set_Series($_POST['Series']);
			$Rutina->set_Repeticiones($_POST['Repeticiones']);
			$Rutina->set_Descanso($_POST['Descanso']);
			$Rutina->set_Peso($_POST['Peso']);

			$modelrutina->Registrar($Rutina); 
			break;

		case 'Eliminar':
			$modelrutina->Eliminar($_POST['Id_Rutina']);
			break;
		}
}
?>

<DOCTYPE html>
<html lang="es">
	<head>
		<title>Rutinas</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
	</head>
		<body>
		<div class="contenedor">	
<h2>Administracion de Rutinas</h2>
			



<table>
<form action="Rutina.php" method="post"
class="pure-form pure-form-stacked">
	<tr>
		<td>Cliente:<select class="contenedor_input" required name="Id_Cliente" onchange="this.form.submit();">
		<option>Seleccione el Cliente</option>	

		<?php 
		foreach($modelcliente->Listar() as $r):
			if(isset($_POST['Id_Cliente']))
			{
				if($r->get_Id_Cliente()==$idcliente){?>
					<option selected="selected" value="<?php echo $r->get_Id_Cliente(); ?>"> <?php echo $r->get_Nombre(); ?> </option><?php
				}else{?>
					<option value="<?php echo $r->get_Id_Cliente(); ?>"> <?php echo $r->get_Nombre(); ?> </option><?php
				}
			}else{?>
				<option value="<?php echo $r->get_Id_Cliente(); ?>"> <?php echo $r->get_Nombre(); ?> </option><?php
			}
		
		endforeach; ?> 
        <tr>

		<td>Tipo de rutina:<select class="contenedor_input" required name="Id_Tiporutina" onchange="this.form.submit();">
		<option>Seleccione el Tipo</option>	

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
        <tr>
		<td>Grupo muscular:<select class="contenedor_input" required name="Id_Grupo_Muscular" onchange="this.form.submit();">
		<option>Seleccione el Grupo</option>	

		<?php 
		foreach($modelgrupomuscular->Listar() as $r):
			if(isset($_POST['Id_Grupo_Muscular']))
			{
				if($r->get_Id_Grupo_Muscular()==$idgrupomuscular){?>
					<option selected="selected" value="<?php echo $r->get_Id_Grupo_Muscular(); ?>"> <?php echo $r->get_Grupo_Muscular(); ?> </option><?php
				}else{?>
					<option value="<?php echo $r->get_Id_Grupo_Muscular(); ?>"> <?php echo $r->get_Grupo_Muscular(); ?> </option><?php
				}
			}else{?>
				<option value="<?php echo $r->get_Id_Grupo_Muscular(); ?>"> <?php echo $r->get_Grupo_Muscular(); ?> </option><?php
			}
		
		endforeach; ?> 
		<tr>
		<td>Ejercicio:<select class="contenedor_input" required name="Id_Ejercicio" onchange="this.form.submit();">
		<option>Seleccione el Ejercicio</option>	

		<?php 
		foreach($modelejercicios->Listar() as $r):
			if(isset($_POST['Id_Ejercicio']))
			{
				if($r->get_Id_Ejercicio()==$idejercicio){?>
					<option selected="selected" value="<?php echo $r->get_Id_Ejercicio(); ?>"> <?php echo $r->get_Nombre_Ejercicio(); ?> </option><?php
				}else{?>
					<option value="<?php echo $r->get_Id_Ejercicio(); ?>"> <?php echo $r->get_Nombre_Ejercicio(); ?> </option><?php
				}
			}else{?>
				<option value="<?php echo $r->get_Id_Ejercicio(); ?>"> <?php echo $r->get_Nombre_Ejercicio(); ?> </option><?php
			}
		
		endforeach; ?> 
	</select></td>	
	</tr>
</form>
<form action="Rutina.php" method="post"
class="pure-form pure-form-stacked">


<input type="hidden" name="operacion" value="<?php echo $Rutina->get_Id_Rutina() > 0 ? 'Actualizar' :     'Registrar'; ?>"/>
<input type="hidden" name="Id_Rutina" value="<?php echo $Rutina->get_Id_Rutina() ?>"/>
		<tr>
		<td>Series:<input class="contenedor_input" required placeholder="Series" type="text" name="Series" value="<?php echo $Rutina->get_Series(); ?>"/></td>	
		</tr>
		<tr>
		<td>Repeticiones:<input class="contenedor_input" required placeholder="Repeticiones" type="text" name="Repeticiones" value="<?php echo $Rutina->get_Repeticiones(); ?>"/></td>	
		</tr>
		<tr>
		<td>Descanso:<input class="contenedor_input" required placeholder="Descanso" type="text" name="Descanso" value="<?php echo $Rutina->get_Descanso(); ?>"/></td>	
		</tr>
		<tr>
		<td>Peso:<input class="contenedor_input" required placeholder="Peso" type="text" name="Peso" value="<?php echo $Rutina->get_Peso(); ?>"/></td>	
		</tr>
		<?php 
			if(isset($_POST['Id_Cliente']))
		{?>
		<?php
			if(isset($_POST['Id_Grupo_Muscular']))
		{?>
		<?php
			if(isset($_POST['Id_Tiporutina']))
		{?>
		<?php
			if(isset($_POST['Id_Ejercicio']))
		{?>
	<td>
		<input type="hidden" name="Id_Cliente" value="<?php echo $idcliente ?>"/>
		<input type="hidden" name="Id_Grupo_Muscular" value="<?php echo $idgrupomuscular ?>"/>
		<input type="hidden" name="Id_Tiporutina" value="<?php echo $idtiporutina ?>"/>
		<input type="hidden" name="Id_Ejercicio" value="<?php echo $idejercicio ?>"/>
		<input class="boton"type="submit" value="Guardar"/></td>
<?php }}}} ?>
</tr>
		
</table>	
</form>
</div>
				<div id="main-container">
				<table class="tabla" >
					<thead>
						<tr class="table_tr">
							<th class="table_th">Grupo muscular</th>
							<th class="table_th">Tipo rutina</th>
                            <th class="table_th">Ejercicio</th>
							<th class="table_th">Series</th>
							<th class="table_th">Repeticiones</th>
							<th class="table_th">Descanso</th>
							<th class="table_th">Peso</th>
							<th class="table_th"></th>
							<th class="table_th"></th>
						</tr>
					</thead>
						<!-- isset para esconder los datos de la tabla -->
					<?php 
						if(isset($_POST['Id_Cliente']))
							{ ?>
					<?php foreach($modelrutina->ListarxCliente($idcliente) as $r): ?>
						<tr class="table_tr">
								<td class="table_td"><?php echo $r->get_Id_Grupo_Muscular();?></td>
								<td class="table_td"><?php echo $r->get_Id_Tiporutina();?></td>
								<td class="table_td"><?php echo $r->get_Id_Ejercicio();?></td>
								<td class="table_td"><?php echo $r->get_Series();?></td>
								<td class="table_td"><?php echo $r->get_Repeticiones();?></td>
								<td class="table_td"><?php echo $r->get_Descanso();?></td>
								<td class="table_td"><?php echo $r->get_Peso();?></td>
                                <!--<td class="table_td"></td><?php //echo $r->get_Id_Usuario(); ?></td>-->


						<td>	
						</td>

						<td>	
						<form action="Rutina.php" method="post" onsubmit="return confirm ('Esta seguro?');">
							<input type="hidden" name="operacion" value="Eliminar"/>
							<input type="hidden" name="Id_Rutina" value="<?php echo $r->get_Id_Rutina();?>"/>
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