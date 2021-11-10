<?php
require_once "Grupomuscular.entidad.php";
require_once "Grupomuscular.model.php";

$Grupomuscular = new Grupomuscular();
$model = new GrupomuscularModel();

if(isset($_POST['operacion']))
{
	switch($_POST['operacion'])
	{
		
		case 'Registrar':
		
			$Grupomuscular->set_Grupo_Muscular($_POST ['Grupo_Muscular']);
			$model->Registrar($Grupomuscular);
			break;

		case 'Eliminar':
			$model->Eliminar($_POST['Id_Grupo_Muscular']);
			break;

				
	}
}
?>

<DOCTYPE html>
<html lang="es">
	<head>
		<title>Grupos musculares</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head>
		<body>
<div class="contenedor">			
<h2>Grupos musculares</h2>


<form action="Grupomuscular.php" method="post">
<input type="hidden" name="operacion" value="Registrar"/>
<table>
	<tr>
	</tr>
	<tr>
	<td>Grupos musculares:<input class="contenedor_input" required  type="text" placeholder="Ingrese el grupo" name="Grupo_Muscular" /></td>
	</tr>
	<!--boton Guardar-->
	<tr>
	<td><input class="boton" type="submit" value="Guardar"/></td>
	</tr>
	

</table>	
</form>	
</div>
				<div id="main-container">
				<table class="tabla">
					<thead>
						<tr class="table_tr">
							<th class="table_th">Grupo Musculares</th>
							<th></th>
						</tr>
					</thead>

						<?php foreach($model->Listar() as $r): ?>
						<tr class="table_tr">
								<td class="table_td"><?php echo $r->get_Grupo_Muscular(); ?></td>
							<td class="table_td">	
								<form action="Grupomuscular.php" method="post" onsubmit="return confirm ('Esta seguro?');">
									<input type="hidden" name="operacion" value="Eliminar"/>
									<input type="hidden" name="Id_Grupo_Muscular" value="<?php echo $r->get_Id_Grupo_Muscular();?>"/>
									<input class="eliminar" type="submit" value="Eliminar"/>
								</form>		
							</td>
						</tr>
						<?php endforeach; ?>
				</table>

		   	</div>

		</body>	 
</html>		   		