<?php
require_once "Cliente.entidad.php";
require_once "Cliente.model.php";

$Cliente = new Cliente();
$modelcliente = new ClienteModel();
if (isset($_POST['Correo'])) {
	$Cliente->set_Correo($_POST['Correo']);
	$Cliente->set_Clave(md5($_POST['Clave']));
	
	$Ingresar=$modelcliente->acceder($Cliente);
    
    
    if($Ingresar==true){
        echo 'Inicio de sesion correcto';
        header ("refresh:3; url=panelcontrol_cliente.php");
}
    else{
        echo 'Datos de inicio incorrectos';
    }
}

?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<title>Login</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	</head>
		<body>
		<center>
<div class="contenedor">			
<h2>Iniciar sesion</h2>


<form action="Logincliente.php" method="post">
<input type="hidden" name="Id_Cliente" value="Acceder"/>
<table>
	<tr>
	</tr>
	<tr>
	<td>Correo:<input class="contenedor_input" required  type="mail" placeholder="Ingrese su correo" name="Correo" value="<?php echo $Cliente->get_Correo();?>" required/></td>
	</tr>
    <tr>
	<td>Clave:<input class="contenedor_input" required  type="password" placeholder="Ingrese su clave" name="Clave" value="<?php echo $Cliente->get_Clave();?>" required/></td>
	</tr>
	<tr>
	<td><input class="boton" type="submit" value="Iniciar sesion"/></td>
	</tr>
</table>	
</form>	
</div>
<span><a class="btn btn-primary" href="Loginusuario.php">Si eres administrador inicia aquí</a></span>
</center>
</body>	 
</html>		   		