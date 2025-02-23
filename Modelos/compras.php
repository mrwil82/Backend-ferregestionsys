<?php
class compras
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
        $con = "SELECT * FROM compras ORDER BY Unidades, Valor_compra, Proveedor, Producto, Referencia";
        $res = mysqli_query($this->conexion, $con);
        $vec = [];

        while ($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }

        return $vec;
    }
    public function eliminar($id)
    {
        $del = "DELETE FROM compras WHERE id_compras = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La compras ha sido eliminada";
        return $vec;
    }
    public function insertar($params)
    {
        $ins = "INSERT INTO compras(Unidades, Valor_compra, Proveedor, Producto, Referencia) VALUES('$params->Unidades', '$params->Valor_compra', '$params->Proveedor', '$params->Producto', '$params->Referencia')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La compras ha sido guardada";
        return $vec;
    }
    public function editar($id, $params)
    {
        $editar = "UPDATE compras SET Unidades = '$params->Unidades', Valor_compra = '$params->Valor_compra', Proveedor = '$params->Proveedor', Producto = '$params->Producto', Referencia = '$params->Referencia' WHERE id_compras = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido editada";
        return $vec;
    }
    public function filtro($valor)
    {
        $filtro = "SELECT * FROM compras WHERE Unidades LIKE '%$valor%' OR Valor_compra LIKE '%$valor%' OR Proveedor LIKE '%$valor%' OR Producto LIKE '%$valor%' OR Referencia LIKE '%$valor%'";
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while ($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }
        return $vec;
    }
}
