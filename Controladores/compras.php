<?php
header(header: 'Access-Control-Allow-Origin: *');
header(header: 'Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

require_once "../conexion.php";
require_once "../Modelos/compras.php";

$control = $_GET["control"] ?? "";

$compras = new compras($conexion);

$vec = [];

switch ($control) {
    case 'consulta':
        $vec = $compras->consulta();
        break;
    case 'insertar':
        $json = file_get_contents('php://input');
        //$json = '{"Unidades": "1", "Valor_compra": "1", "Proveedor": "1", "Producto": "1", "Referencia": "1"}';   
        $params = json_decode($json);
        $vec = $compras->insertar($params);
        break;
    case 'eliminar':
        $id = $_GET['id'];
        $vec = $compras->eliminar($id);
        break;
    case 'editar':
        $json = file_get_contents('php://input');
        //$json = '{"Unidades": "1", "Valor_compra": "1", "Proveedor": "1", "Producto": "1", "Referencia": "11223233"}';
        $params = json_decode($json);
        $id = $_GET['id'];
        $vec = $compras->editar($id, $params);
        break;
    case 'filtro':
        $dato = $_GET['dato'];
        $vec = $compras->filtro($dato);
        break;
}
$datosj = json_encode($vec);
echo $datosj;
header(header: 'Content-Type: application/json');
?>