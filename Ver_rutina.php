<?php
require_once "Rutina.entidad.php";
require_once "Rutina.model.php";

session_start();

$Rutina = new Rutina();
$modelrutina = new RutinaModel();



?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Ver rutina</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
	</head>
		<body>
		<center>
<form action="Ver_rutina.php" method="post"
class="pure-form pure-form-stacked">
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
					<?php foreach($modelrutina->ListarxCliente($_SESSION['Id_Cliente']) as $r): ?>
						<tr class="table_tr">
								<td class="table_td"><?php echo $r->get_Id_Grupo_Muscular();?></td>
								<td class="table_td"><?php echo $r->get_Id_Tiporutina();?></td>
								<td class="table_td"><?php echo $r->get_Id_Ejercicio();?></td>
								<td class="table_td"><?php echo $r->get_Series();?></td>
								<td class="table_td"><?php echo $r->get_Repeticiones();?></td>
								<td class="table_td"><?php echo $r->get_Descanso();?> minutos</td>
								<td class="table_td"><?php echo $r->get_Peso();?> kg</td>
						</tr>
					
						<?php endforeach; 
						?>
				</table>
				</center>
		   	</div>
