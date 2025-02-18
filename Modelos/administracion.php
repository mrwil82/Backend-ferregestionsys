<?php
class administracion
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
        $con = "SELECT * FROM administracion ORDER BY Empresa, Nit, Direccion, Telefono";
        $res = mysqli_query($this->conexion, $con);
        $vec = [];

        while ($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }

        return $vec;
    }

    public function eliminar($id)
    {
        $del = "DELETE FROM administracion WHERE id_administracion = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "El registro ha sido eliminado";
        return $vec;
    }

    public function insertar($params)
    {
        $ins = "INSERT INTO administracion(Empresa, Nit, Direccion, Telefono) VALUES('$params->Empresa', '$params->Nit', '$params->Direccion', '$params->Telefono')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido guardada";
        return $vec;
    }

    public function editar($id, $params)
    {
        $editar = "UPDATE administracion SET Empresa = '$params->Empresa', Nit = '$params->Nit', Direccion = '$params->Direccion', Telefono = '$params->Telefono' WHERE id_administracion = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido editada";
        return $vec;
    }

    public function filtro($valor)
    {
        $filtro = "SELECT * FROM administracion WHERE Empresa LIKE '%$valor%' OR Nit LIKE '%$valor%' OR Direccion LIKE '%$valor%' OR Telefono LIKE '%$valor%'";
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while ($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }

        return $vec;
    }
}
?>