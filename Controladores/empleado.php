<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

require_once "../conexion.php";
require_once "../Modelos/empleado.php";

$control = $_GET["control"] ?? "";

$empleado = new empleado($conexion);

$vec = [];

switch ($control) {
    case 'consulta':
        $vec = $empleado->consulta();
        break;
    case 'insertar':
        $json = file_get_contents('php://input');
        //$json = '{"Nombre":"Ferreteria la 38","Apellido":"Ferreteria","Direccion":"123456789","Telefono":"3838383","Correo":"ferreteria@ferreteria.com"}';
        $params = json_decode($json);
        $vec = $empleado->insertar($params);
        break;
    case 'eliminar':
        $id = $_GET['id'];
        $vec = $empleado->eliminar($id);
        break;
    case 'editar':
        $json = file_get_contents('php://input');
        //$json = '{"Nombre":"Ferreteria ","Apellido":"Ferreteria jiji","Direccion":"123456789","Telefono":"3838","Correo":"ferreteria@ferreteria.com"}';
        $params = json_decode($json);
        $id = $_GET['id'];
        $vec = $empleado->editar($id, $params);
        break;
    case 'filtro':
        $dato = $_GET['dato'];
        $vec = $empleado->filtro($dato);
        break;
}
$datosj = json_encode($vec);
echo $datosj;
header(header: 'Content-Type: application/json');

?>