<?php
require_once "Usuario.entidad.php";
require_once "Usuario.model.php";

$Usuario = new Usuario();
$modelusuario = new UsuarioModel();
if (isset($_POST['Usuario'])) {
	$Usuario->set_Usuario($_POST['Usuario']);
	$Usuario->set_Clave(md5($_POST['Clave']));
	
	$Ingresar=$modelusuario->acceder($Usuario);
    
    
    if($Ingresar==true){
        echo 'Inicio de sesion correcto';
        header ("refresh:3; url=Panelcontrol_usuario.php");
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


<form action="Loginusuario.php" method="post">
<input type="hidden" name="Id_Usuario" value="Loguearse"/>
<table>
	<tr>
	</tr>
	<tr>
	<td>Correo:<input class="contenedor_input" required  type="user" placeholder="Ingrese su usuario" name="Usuario" value="<?php echo $Usuario->get_Usuario();?>" required/></td>
	</tr>
    <tr>
	<td>Clave:<input class="contenedor_input" required  type="password" placeholder="Ingrese su clave" name="Clave" value="<?php echo $Usuario->get_Clave();?>" required/></td>
	</tr>
	<tr>
	<td><input class="boton" type="submit" value="Iniciar sesion"/></td>
	</tr>
</table>	
</form>	
</div>
<span><a class="btn btn-primary" href="Logincliente.php">Volver al login de cliente</a></span>
</center>
</body>	 
</html>