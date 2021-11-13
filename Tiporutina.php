<?php
require_once "Tiporutina.entidad.php";
require_once "Tiporutina.model.php";

$Tiporutina = new Tiporutina();
$model = new TiporutinaModel();

if(isset($_POST['operacion']))
{
	switch($_POST['operacion'])
	{
		
		case 'Registrar':
		
			$Tiporutina->set_Tiporutina($_POST ['Tiporutina']);
			$model->Registrar($Tiporutina);
			break;

		case 'Eliminar':
			$model->Eliminar($_POST['Id_Tiporutina']);
			break;

				
	}
}
?>

<DOCTYPE html>
<html lang="es">
	<head>
		<title>Tipos de rutina</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head>
		<body>
		<center>
<div class="contenedor">			
<h2>Tipos de rutinas</h2>


<form action="Tiporutina.php" method="post">
<input type="hidden" name="operacion" value="Registrar"/>
<table>
	<tr>
	</tr>
	<tr>
	<td>Tipo de rutina:<input class="contenedor_input" required  type="text" placeholder="Ingrese el tipo de rutina" name="Tiporutina" /></td>
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
							<th class="table_th">Tipos rutinas</th>
							<th></th>
						</tr>
					</thead>

						<?php foreach($model->Listar() as $r): ?>
						<tr class="table_tr">
								<td class="table_td"><?php echo $r->get_Tiporutina(); ?></td>
							<td class="table_td">	
								<form action="Tiporutina.php" method="post" onsubmit="return confirm ('Esta seguro?');">
									<input type="hidden" name="operacion" value="Eliminar"/>
									<input type="hidden" name="Id_Tiporutina" value="<?php echo $r->get_Id_Tiporutina();?>"/>
									<input class="eliminar" type="submit" value="Eliminar"/>
								</form>		
						</center>
							</td>
						</tr>
						<?php endforeach; ?>
				</table>

		   	</div>

		</body>	 
</html>		   		