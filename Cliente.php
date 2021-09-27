<?php
require_once "Cliente.entidad.php";
require_once "Cliente.model.php";

$Cliente = new Cliente();
$modelcliente = new ClienteModel();

if(isset($_POST['operacion']))
{
	switch($_POST['operacion'])
	{
		case 'Registrar':
			$Cliente->set_Id_Cliente($_POST['Id_Cliente']);
			$Cliente->set_Nombre($_POST ['Nombre']);
			$Cliente->set_Dni($_POST['DNI']);
			$Cliente->set_Telefono($_POST ['Telefono']);
			$Cliente->set_Direccion($_POST ['Dirección']);
			$Cliente->set_Correo($_POST ['Correo']);
			$Cliente->set_Clave(md5($_POST ['Clave']));
			//$Usuario->set_Id_Usuario($_POST ['Id_Usuario']);

			$modelcliente->Registrar($Cliente);
			//header ('Location: Cliente.php'); 
			break;
	}
}
?>

<DOCTYPE html>
<html lang="es">
	<head>
		<title>Clientes</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
	</head>
		<body>
		<div class="contenedor">	
<h2>Registrar Cliente</h2>


<input type="hidden" name="Id_Cliente" value="<?php echo $Cliente->get_Id_Cliente() ?>"/>
	<tr>
		<!--<th>Nombre</th>-->
	<td>Nombre:<input class="contenedor_input" required placeholder="Nombre" type="text" name="Nombre" value="<?php echo $Cliente->get_Nombre(); ?>"/></td>	
	</tr>
	<tr>
		<!--<th>Dni</th>-->
	<td>Dni:<input class="contenedor_input" required placeholder="Dni" type="text" name="Dni" value="<?php echo $Cliente->get_Dni(); ?>"/></td>
	</tr>
	<tr>
		<!--<th>Telefono</th>-->
	<td>Telefono:<input class="contenedor_input" required placeholder="Telefono" type="text" name="Telefono" value="<?php echo $Cliente->get_Telefono(); ?>"/></td>	
	</tr>
	<tr>
		<!--<th>Direccion</th>-->
	<td>Direccion:<input class="contenedor_input" required placeholder="Direccion" type="text" name="Direccion" value="<?php echo $Cliente->get_Direccion(); ?>"/></td>	
	</tr>
	<tr>
		<!--<th>Correo</th>-->
	<td>Correo:<input class="contenedor_input" required placeholder="Correo" type="text" name="Correo" value="<?php echo $Cliente->get_Correo(); ?>"/></td>	
	</tr>
	<tr>
		<!--<th>Contraseña</th>-->
	<td>Contraseña:<input class="contenedor_input" required placeholder="Contraseña" type="password" name="Contraseña" value="<?php echo $Cliente->get_Contraseña(); ?>"/></td>
	</tr>
	<tr>

	<!-- isset para esconder la table y el boton de guardar-->
		
	<td>
		<input class="boton"type="submit" value="Registrar"/></td>
<?php ?>
</tr>