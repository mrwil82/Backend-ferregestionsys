<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

require_once("../conexion.php");
require_once("../modelos/pedidos.php");

$control = $_GET['control'] ?? "";

$pedidos = new Pedidos($conexion);

$vec = [];

switch ($control) {
    case 'consulta':
        $vec = $pedidos->consulta();
        break;
    case 'insertar':
        $json = file_get_contents('php://input');
        //$json = '{"Productos": "1", "Cantidad": "1","Referencia": "1"}';
        $params = json_decode($json);
        $texto_arreglo = serialize($params->productos);
        $params->productos = $texto_arreglo;
        $vec = $pedidos->insertar($params);
        break;

    case 'productos':
        $id = $_GET['id'];
        $vec = $pedidos->consultapedidos($id);
        break;
}
$datosj = json_encode($vec);
header('Content-Type: application/json');
echo $datosj;
?>