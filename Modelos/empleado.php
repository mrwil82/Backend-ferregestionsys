<?php
class empleado
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
        $con = "SELECT * FROM empleado ORDER BY Nombre, Apellido, Direccion, Telefono, Correo";
        $res = mysqli_query($this->conexion, $con);
        $vec = [];

        while ($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }

        return $vec;
    }
    public function eliminar($id)
    {
        $del = "DELETE FROM empleado WHERE id_empleado = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido eliminada";
        return $vec;
    }
    public function insertar($params)
    {
        $ins = "INSERT INTO empleado(Nombre, Apellido, Direccion, Telefono, Correo) VALUES('$params->Nombre', '$params->Apellido', '$params->Direccion', '$params->Telefono', '$params->Correo')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido guardada";
        return $vec;
    }
    public function editar($id, $params)
    {
        $editar = "UPDATE empleado SET Nombre = '$params->Nombre', Apellido = '$params->Apellido', Direccion  = '$params->Direccion', Telefono = '$params->Telefono', Correo = '$params->Correo' WHERE id_empleado = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido editada";
        return $vec;
    }
    public function filtro($valor)
    {
        $filtro = "SELECT * FROM empleado WHERE Nombre LIKE '%$valor%' OR Apellido LIKE '%$valor%' OR Direccion LIKE '%$valor%' OR Telefono LIKE '%$valor%' OR Correo LIKE '%$valor%'";
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while ($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }
        return $vec;
    }
}
?>