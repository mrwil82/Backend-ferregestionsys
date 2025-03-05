<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

require_once "../conexion.php";
require_once "../Modelos/login.php";

$Correo = $_GET["Correo"] ?? "";
$clave = $_GET["clave"] ?? "";


$login = new Login($conexion);

$vec =$login->consulta($Correo, $clave);

header('Content-Type: application/json');
$datosj = json_encode($vec);
echo $datosj;
?>