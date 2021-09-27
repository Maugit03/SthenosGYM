<?php
 session_start();
 session_destroy();
 echo "¡Cerrando Sesion!";
header("refresh: 2; url=Login.php");
?>