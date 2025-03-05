<?php
$servidor = "localhost";
$usuario = "root";
$clave = "";
$base_datos = "ferregestionsys";
// Creamos la conexión
$conexion = mysqli_connect($servidor, $usuario, $clave, $base_datos) or die("Error al conectar con el servidor");
mysqli_select_db($conexion, $base_datos) or die('No se encuentra la base de datos');
mysqli_set_charset($conexion, "utf8");
//echo "Conexión exitosa al servidor";
?>