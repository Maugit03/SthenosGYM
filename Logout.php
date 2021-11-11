<?php
session_start();
unset($_SESSION["Id_Cliente"]);
unset($_SESSION["Nombre"]);
unset($_SESSION["Dni"]);
unset($_SESSION["Telefono"]);
unset($_SESSION["Direccion"]);
unset($_SESSION["Correo"]);
unset($_SESSION["Clave"]);
session_destroy();
header("Location: index.php");
?>