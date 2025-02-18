<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require_once("../conexion.php");
require_once("../modelos/pedidos.php");

$control = $_GET['control'] ?? '';

$pedidos = new Pedidos($conexion);

$vec = [];

switch ($control) {
    case 'consulta':
        $vec = $pedidos->consulta();
        break;
    case 'insertar':
        $json = file_get_contents('php://input');
        $params = json_decode($json, true);
        if ($params) {
            $vec = $pedidos->insertar($params);
        } else {
            $vec = ['error' => 'Invalid JSON input'];
        }
        break;
    default:
        $vec = ['error' => 'Invalid control parameter'];
        break;
}

$datosj = json_encode($vec);
header('Content-Type: application/json');
echo $datosj;
?>