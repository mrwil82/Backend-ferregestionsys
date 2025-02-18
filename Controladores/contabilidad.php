<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

require_once "../conexion.php";
require_once "../Modelos/contabilidad.php";

$control = $_GET["control"];

$contabilidad = new contabilidad($conexion);

switch ($control) {
    case 'consulta':
        $vec = $contabilidad->consulta();
        break;
    case 'insertar':
        $json = file_get_contents('php://input');
        $params = json_decode($json);
        $vec = $contabilidad->insertar($params);
        break;
    case 'eliminar':
        $id = $_GET['id'];
        $vec = $contabilidad->eliminar($id);
        break;
    case 'editar':
        $json = file_get_contents('php://input');
        $params = json_decode($json);
        $id = $_GET['id'];
        $vec = $contabilidad->editar($id, $params);
        break;
    case 'filtro':
        $dato = $_GET['dato'];
        $vec = $contabilidad->filtro($dato);
        break;
}
$datosj = json_encode($vec);
echo $datosj;
header(header: 'Content-Type: application/json');
?>