<?php
require_once "Cliente.entidad.php";
require_once "Cliente.model.php";

$Cliente = new Cliente();
$modelcliente = new ClienteModel();

?>
<DOCTYPE html>
<html lang="es">
	<head>
		<title>Administrar clientes</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
	</head>
		<body>
<form action="Adm_clientes.php" method="post"
class="pure-form pure-form-stacked">
<div id="main-container">
	<table class="tabla" >
		<thead>
			<tr class="table_tr">
				<th class="table_th">Nombre</th>
				<th class="table_th">Dni</th>
                <th class="table_th">Telefono</th>
				<th class="table_th">Direccion</th>
				<th class="table_th">Correo</th>
				<th class="table_th"></th>
				<th class="table_th"></th>
			</tr>
		</thead>
			
		<?php foreach($modelcliente->Listar() as $r): ?>
			<tr class="table_tr">
				<td class="table_td"><?php echo $r->get_Nombre();?></td>
				<td class="table_td"><?php echo $r->get_Dni();?></td>
				<td class="table_td"><?php echo $r->get_Telefono();?></td>
				<td class="table_td"><?php echo $r->get_Direccion();?></td>
				<td class="table_td"><?php echo $r->get_Correo();?></td>
			
            <td>	
            </td>
            <td>
						<form action="Adm_clientes.php" method="post" onsubmit="return confirm ('Esta seguro?');">
							<input type="hidden" name="operacion" value="Eliminar"/>
							<input type="hidden" name="Id_Cliente" value="<?php echo $r->get_Id_Cliente();?>"/>
							<input class="eliminar" type="submit" value="Eliminar"/>
						</form>		
						</td>
						</tr>
		<?php endforeach; 
        ?>
	</table>
</div>