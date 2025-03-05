<?php

class proveedor
{
    //Atributos
    public $conexion;
    //Constructor
    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }
    //Metodos
    public function consulta()
    {
        $con = "SELECT * FROM proveedor ORDER BY Nombre, Telefono, Correo, Direccion, Nit";
        $res = mysqli_query($this->conexion, $con);
        $vec = [];
        while ($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }
        return $vec;
    }
    public function eliminar($id)
    {
        $del = "DELETE FROM proveedor WHERE id_proveedor = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido eliminada";
        return $vec;
    }
    public function insertar($params)
    {
        $ins = "INSERT INTO proveedor(Nombre, Telefono, Correo, Direccion, Nit) VALUES('$params->Nombre', '$params->Telefono', '$params->Correo', '$params->Direccion', '$params->Nit')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido guardada";
        return $vec;
    }
    public function editar($id, $params)
    {
        $editar = "UPDATE proveedor SET Nombre = '$params->Nombre', Telefono = '$params->Telefono', Correo = '$params->Correo', Direccion = '$params->Direccion', Nit = '$params->Nit' WHERE id_proveedor = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacionha sido editada";
        return $vec;
    }
    public function filtro($valor)
    {
        $filtro = "SELECT * FROM proveedor WHERE Nombre LIKE '%$valor%' OR Telefono LIKE '%$valor%' OR Correo LIKE '%$valor%' OR Direccion LIKE '%$valor%' OR Nit LIKE '%$valor%'";
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];
        while ($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }
        return $vec;
    }
}
?>