<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

require_once "../conexion.php";
require_once "../Modelos/soporte_tecnico.php";

$control = $_GET["control"];

$soporte_tecnico = new soporte_tecnico($conexion);

switch ($control) {
    case 'consulta':
        $vec = $soporte_tecnico->consulta();
        break;
    case 'insertar':
        $json = file_get_contents('php://input');
        $params = json_decode($json);
        $vec = $soporte_tecnico->insertar($params);
        break;
    case 'eliminar':
        $id = $_GET['id'];
        $vec = $soporte_tecnico->eliminar($id);
        break;
    case 'editar':
        $json = file_get_contents('php://input');
        $params = json_decode($json);
        $id = $_GET['id'];
        $vec = $soporte_tecnico->editar($id, $params);
        break;
    case 'filtro':
        $dato = $_GET['dato'];
        $vec = $soporte_tecnico->filtro($dato);
        break;
}
header('Content-Type: application/json');
$datosj = json_encode($vec);
echo $datosj;

?>