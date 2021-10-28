<?php
require_once "Usuario.entidad.php";
require_once "Usuario.model.php";
require_once "Cargo.model.php";
require_once "Cargo.entidad.php";


$Usuario = new Usuario();
$modelusuario = new UsuarioModel();
//de cargos
$Cargo = new Cargo();
$modelcargo = new CargoModel();


if(isset($_POST['Id_Cargo']))
{
	$idcargo=$_POST['Id_Cargo'];
	//echo "CARGOOOOOOOO=".$idcargo;
}


if(isset($_POST['operacion']))
{
	switch($_POST['operacion'])
	{
		case 'Actualizar':
			$Usuario->set_Nombre($_POST ['Nombre']);
			$Usuario->set_Apellido($_POST ['Apellido']);
			$Usuario->set_Usuario($_POST ['Usuario']);
			$Usuario->set_Clave($_POST ['Clave']);
			$Usuario->set_Id_Usuario($_POST['Id_Usuario']);
			$modelusuario->Actualizar($Usuario);
			//header ('Location: Usuario.php');
			break;

		case 'Registrar':
			$Usuario->set_Id_Cargo($_POST['Id_Cargo']);
			$Usuario->set_Nombre($_POST ['Nombre']);
			$Usuario->set_Apellido($_POST ['Apellido']);
			$Usuario->set_Usuario($_POST ['Usuario']);
			$Usuario->set_Clave(md5($_POST ['Clave']));
			//$Usuario->set_Id_Usuario($_POST ['Id_Usuario']);

			$modelusuario->Registrar($Usuario);
			//header ('Location: Usuario.php'); 
			break;

		case 'Eliminar':
			$modelusuario->Eliminar($_POST['Id_Usuario']);//QUE ID VA?
			break;

		case 'Editar':
			$Usuario = $modelusuario->Obtener($_POST['Id_Usuario']);
			break;
	}
}
?>

<DOCTYPE html>
<html lang="es">
	<head>
		<title>Usuarios</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
	</head>
		<body>
		<div class="contenedor">	
<h2>Administracion de Usuarios</h2>
			



<table>
<form action="Usuario.php" method="post"
class="pure-form pure-form-stacked">



	<tr>
		<!--<th>Cargo</th>-->
		<td>Cargo:<select class="contenedor_input" required name="Id_Cargo" onchange="this.form.submit();">
		<option>Seleccione el Cargo</option>	

		<?php 
		foreach($modelcargo->Listar() as $r):
			if(isset($_POST['Id_Cargo']))
			{
				if($r->get_Id_Cargo()==$idcargo){?>
					<option selected=selected value="<?php echo $r->get_Id_Cargo(); ?>"> <?php echo $r->get_Cargo(); ?> </option><?php
				}else{?>
					<option value="<?php echo $r->get_Id_Cargo(); ?>"> <?php echo $r->get_Cargo(); ?> </option><?php
				}
			}else{?>
				<option value="<?php echo $r->get_Id_Cargo(); ?>"> <?php echo $r->get_Cargo(); ?> </option><?php
			}
		
		 endforeach; ?> 
	</select></td>	
	</tr>
</form>
<form action="Usuario.php" method="post"
class="pure-form pure-form-stacked">


<input type="hidden" name="operacion" value="<?php echo $Usuario->get_Id_Usuario() > 0 ? 'Actualizar' :     'Registrar'; ?>"/>
<input type="hidden" name="Id_Usuario" value="<?php echo $Usuario->get_Id_Usuario() ?>"/>
	<tr>
		<!--<th>Nombre</th>-->
	<td>Nombre:<input class="contenedor_input" required placeholder="Nombre" type="text" name="Nombre" value="<?php echo $Usuario->get_Nombre(); ?>"/></td>	
	</tr>
	<tr>
		<!--<th>Apellido</th>-->
	<td>Apellido:<input class="contenedor_input" required placeholder="Apellido" type="text" name="Apellido" value="<?php echo $Usuario->get_Apellido(); ?>"/></td>
	</tr>
	<tr>
		<!--<th>Usuario</th>-->
	<td>Usuario:<input class="contenedor_input" required placeholder="Usuario" type="text" name="Usuario" value="<?php echo $Usuario->get_Usuario(); ?>"/></td>	
	</tr>
	<tr>
		<!--<th>Clave</th>-->
	<td>Clave:<input class="contenedor_input" required placeholder="Clave" type="password" name="Clave" value="<?php echo $Usuario->get_Clave(); ?>"/></td>
	</tr>
	<tr>

	<!-- isset para esconder la table y el boton de guardar-->
		<?php 
			if(isset($_POST['Id_Cargo']))
			{?>

	<td>
		<input type="hidden" name="Id_Cargo" value="<?php echo $idcargo ?>"/>
		<input class="boton"type="submit" value="Guardar"/></td>
<?php } ?>
</tr>
		
</table>	
</form>
</div>
				<div id="main-container">
				<table class="tabla" >
					<thead>
						<tr class="table_tr">
							<th class="table_th">Nombre</th>
							<th class="table_th"> Apellido</th>
							<th class="table_th">Usuario</th>
							<!--<th class="table_th">Id_Usuario</th>-->
							<th class="table_th"></th>
							<th class="table_th"></th>
							
						</tr>
					</thead>
						<!-- isset para esconder los datos de la tabla -->
					<?php 
						if(isset($_POST['Id_Cargo']))
							{ ?>
					<?php foreach($modelusuario->ListarxCargo($id_cargo) as $r): ?>
						<tr class="table_tr">
								<td class="table_td"><?php echo $r->get_Nombre();?></td>
								<td class="table_td"><?php echo $r->get_Apellido(); ?></td>
								<td class="table_td"><?php echo $r->get_Usuario(); ?></td>
								<!--<td class="table_td"></td><?php //echo $r->get_Id_Usuario(); ?></td>-->
							


						<td>	
						<form action="Usuario.php" method="post">
							<input type="hidden" name="operacion" value="Editar"/>
							<input type="hidden" name="Id_Usuario" value="<?php echo $r->get_Id_Usuario();?>"/>
							<input type="hidden" name="Id_Cargo" value="<?php echo $id_cargo ?>"/>
							<input class="editar" type="submit" value="Editar"/>
						</form>		
							</td>

						<td>	
						<form action="Usuario.php" method="post" onsubmit="return confirm ('Esta seguro?');">
							<input type="hidden" name="operacion" value="Eliminar"/>
							<input type="hidden" name="Id_Usuario" value="<?php echo $r->get_Id_Usuario();?>"/>
							<input type="hidden" name="Id_Cargo" value="<?php echo $id_cargo ?>"/>
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