<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');
require_once "../conexion.php";
require_once "../Modelos/inventario.php";
$control = $_GET["control"] ?? "";

$inventario = new inventario($conexion);
$vec = [];
switch ($control) {
    case 'consulta':
        $vec = $inventario->consulta();
        break;
    case 'insertar':
        $json = file_get_contents('php://input');
        //$json = '{"Producto": "1", "Cantidad": "1", "Precio": "2", "Referencia": "1", "Proveedor": "1"}';
        $params = json_decode($json);
        $vec = $inventario->insertar($params);
        break;
    case 'eliminar':
        $id = $_GET['id'];
        $vec = $inventario->eliminar($id);
        break;
    case 'editar':
        $json = file_get_contents('php://input');
        //$json = '{"Producto": "cepillos", "Cantidad": "13", "Precio": "2000", "Referencia": "177", "Proveedor": "oxxo"}';
        $params = json_decode($json);
        $id = $_GET['id'];
        $vec = $inventario->editar($id, $params);
        break;
    case 'filtro':
        $dato = $_GET['dato'];
        $vec = $inventario->filtro($dato);
        break;
}
$datosj = json_encode($vec);
echo $datosj;
header(header: 'Content-Type: application/json');
?>