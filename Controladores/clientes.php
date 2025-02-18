<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

require_once "../conexion.php";
require_once "../Modelos/clientes.php";

$control = $_GET["control"];

$clientes = new clientes($conexion);

switch ($control) {
    case 'consulta':
        $vec = $clientes->consulta();
        break;
    case 'insertar':
        $json = file_get_contents('php://input');
        $params = json_decode($json);
        $vec = $clientes->insertar($params);
        break;
    case 'eliminar':
        $id = $_GET['id'];
        $vec = $clientes->eliminar($id);
        break;
    case 'editar':
        $json = file_get_contents('php://input');
        $params = json_decode($json);
        $id = $_GET['id'];
        $vec = $clientes->editar($id, $params);
        break;
    case 'filtro':
        $dato = $_GET['dato'];
        $vec = $clientes->filtro($dato);
        break;
    case 'cclientes':
        $dato = $_GET['dato'];
        $vec = $clientes->cclientes($dato);
}
header('Content-Type: application/json');
$datosj = json_encode($vec);
echo $datosj;
?>