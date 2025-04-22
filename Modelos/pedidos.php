<?php
class pedidos
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
        // Adaptado a la estructura real de la tabla ventas
        $con = "SELECT 
                    id_ventas, 
                    Fecha, 
                    Productos AS Descripcion, 
                    Cantidad, 
                    Precio, 
                    (Cantidad * Precio) AS Total
                FROM ventas
                ORDER BY Fecha DESC";
        $res = mysqli_query($this->conexion, $con);
        $vec = [];

        while ($row = mysqli_fetch_assoc($res)) {
            $vec[] = $row;
        }

        return $vec;
    }
    public function insertar($params)
{
    // Validaciones básicas para evitar errores
    $fecha = isset($params->Fecha) ? $params->Fecha : '';
    $productos = isset($params->Productos) ? $params->Productos : '';
    $cantidad = isset($params->Cantidad) ? $params->Cantidad : 0;
    $precio = isset($params->Precio) ? $params->Precio : 0;

    // Armar la consulta
    $ins = "INSERT INTO ventas(Fecha, Productos, Cantidad, Precio) 
            VALUES('$fecha', '$productos', '$cantidad', '$precio')";

    mysqli_query($this->conexion, $ins);

    $vec = [];
    $vec['resultado'] = "OK";
    $vec['mensaje'] = "La informacion ha sido guardada";
    return $vec;
}
public function consultapedidos($id)
{
    $con = "SELECT productos FROM ventas WHERE id_ventas = $id"; 
    $res = mysqli_query($this->conexion, $con);
    $row = mysqli_fetch_array($res);
    $vec = unserialize($row[0]);

    return $vec;
}


}
