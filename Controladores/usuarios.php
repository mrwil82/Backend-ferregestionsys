<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept');

require_once "../conexion.php";
require_once "../Modelos/usuarios.php";

$control = $_GET["control"] ?? "";

$usuarios = new usuarios($conexion);

$vec = [];

//Controladores
switch ($control) {
    case 'consulta':
        $vec = $usuarios->consulta();
        break;
    case 'insertar':
        $json = file_get_contents('php://input');
        //$json = '{"Nombre":"Jorge","Apellido":"Parra","Correo":"P9C9M@example.com","Telefono":"123","Cargo":"Admin","Documento":"1","clave":"Plojiuyggf"}';
        $params = json_decode($json);
        $vec = $usuarios->insertar($params);
        break;
    case 'eliminar':
        $id = $_GET['id'];
        $vec = $usuarios->eliminar($id);
        break;
    case 'editar':
        $json = file_get_contents('php://input');
        //$json = '{"Nombre":"Juan","Apellido":"Perez","Correo":"P9C9M@example.com","Telefono":"123456789","Cargo":"Administrador","Documento":"123456789","clave":"P9C9M"}';
        $params = json_decode($json, true);
        $params = json_decode($json);
        $id = $_GET['id'];
        $vec = $usuarios->editar($id, $params);
        break;
    case 'filtro':
        $dato = $_GET['dato'];
        $vec = $usuarios->filtro($dato);
        break;
}
header('Content-Type: application/json');
$datosj = json_encode($vec);
echo $datosj;
?>