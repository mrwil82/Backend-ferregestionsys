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
        $con = "SELECT * FROM ventas ORDER BY  Productos, Cantidad, Referencia";
        $res = mysqli_query($this->conexion, $con);
        $vec = [];

        while ($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }

        return $vec;
    }
    public function insertar($params)
    {
        $ins = "INSERT INTO ventas(Productos, Cantidad, Referencia) 
        VALUES('$params->Productos', '$params->Cantidad', '$params->Referencia')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido guardada";
        return $vec;
    }
    public function consultapedidos($id)
    {
        $con = "SELECT productos from ventas WHERE id_ventas = $id";
        $res = mysqli_query($this->conexion, $con);
        $row = mysqli_fetch_array($res);
        $vec = unserialize($row[0]);

        return $vec;
    }
}
