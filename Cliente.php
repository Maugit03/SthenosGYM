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
			$Cliente->set_Apellido($_POST ['Apellido']);
			$Cliente->set_Cliente($_POST ['Cliente']);
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
		<!--<th>Apellido</th>-->
	<td>Apellido:<input class="contenedor_input" required placeholder="Apellido" type="text" name="Apellido" value="<?php echo $Cliente->get_Apellido(); ?>"/></td>
	</tr>
	<tr>
		<!--<th>Cliente</th>-->
	<td>Cliente:<input class="contenedor_input" required placeholder="Cliente" type="text" name="Cliente" value="<?php echo $Cliente->get_Cliente(); ?>"/></td>	
	</tr>
	<tr>
		<!--<th>Clave</th>-->
	<td>Clave:<input class="contenedor_input" required placeholder="Clave" type="password" name="Clave" value="<?php echo $Cliente->get_Clave(); ?>"/></td>
	</tr>
	<tr>

	<!-- isset para esconder la table y el boton de guardar-->
		
	<td>
		<input class="boton"type="submit" value="Registrar"/></td>
<?php ?>
</tr>