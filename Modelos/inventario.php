<?php
class inventario
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
        $con = "SELECT * FROM inventario ORDER BY  Producto, Cantidad, Precio, Referencia, Proveedor";
        $res = mysqli_query($this->conexion, $con);
        $vec = [];
        while ($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }
        return $vec;
    }
    public function eliminar($id)
    {
        $del = "DELETE FROM inventario WHERE id_inventario = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido eliminada";
        return $vec;
    }
    public function insertar($params)
    {
        $ins = "INSERT INTO inventario( Producto, Cantidad, Precio, Referencia, Proveedor ) VALUES('$params->Producto', '$params->Cantidad', '$params->Precio', '$params->Referencia', '$params->Proveedor')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido guardada";
        return $vec;
    }
    public function editar($id, $params)
    {
        $editar = "UPDATE inventario SET Producto = '$params->Producto', Cantidad = '$params->Cantidad', Precio = '$params->Precio', Referencia = '$params->Referencia', Proveedor = '$params->Proveedor' WHERE id_inventario = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido editada";
        return $vec;
    }
    public function filtro($valor)
    {
        $filtro = "SELECT * FROM inventario WHERE Producto LIKE '%$valor%' OR Cantidad LIKE '%$valor%' OR Precio LIKE '%$valor%' OR Referencia LIKE '%$valor%' OR Proveedor LIKE '%$valor%'";
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while ($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }

        return $vec;
    }
}
?>