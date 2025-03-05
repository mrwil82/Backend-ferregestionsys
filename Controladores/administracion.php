<?php
header(header: 'Access-Control-Allow-Origin: *');
header(header: 'Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

require_once "../conexion.php";
require_once "../Modelos/administracion.php";

$control = $_GET["control"] ?? "";

$admin = new administracion($conexion);

$vec = [];

switch ($control) {
    case 'consulta':
        $vec = $admin->consulta();
        break;

    case 'insertar':
        $json = file_get_contents('php://input');
        //$json = '{"Empresa":"Ferreteria la 38","Nit":"123456789","Direccion":"Calle 38 # 38-38","Telefono":"3838383"}';
        $params = json_decode($json);
        $vec = $admin->insertar($params);
        break;

    case 'eliminar':
        $id = $_GET['id'];
        $vec = $admin->eliminar($id);
        break;

    case 'editar':
        $json = file_get_contents('php://input');
        //$json = '{"Empresa":"Ferreteria la 38","Nit":"123456789","Direccion":"Calle 38 # 38-38","Telefono":"38"}';
        $params = json_decode($json);
        $id = $_GET['id'];
        $vec = $admin->editar($id, $params);
        break;

    case 'filtro':
        $dato = $_GET['dato'];
        $vec = $admin->filtro($dato);
        break;

}
$datosj = json_encode($vec);
echo $datosj;
header(header: 'Content-Type: application/json');
?>