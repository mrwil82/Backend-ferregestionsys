<?php
class contabilidad
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
        $con = "SELECT * FROM contabilidad ORDER BY Ingresos, Egresos, Activos, Pasivos";
        $res = mysqli_query($this->conexion, $con);
        $vec = [];

        while ($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }

        return $vec;
    }

    public function eliminar($id)
    {
        $del = "DELETE FROM contabilidad WHERE id_contabilidad = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido eliminada";
        return $vec;
    }

    public function insertar($params)
    {
        $ins = "INSERT INTO contabilidad(Ingresos, Egresos, Activos, Pasivos) VALUES('$params->Ingresos', '$params->Egresos', '$params->Activos', '$params->Pasivos')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido guardada";
        return $vec;
    }

    public function editar($id, $params)
    {
        $editar = "UPDATE contabilidad SET Ingresos = '$params->Ingresos', Egresos = '$params->Egresos', Activos = '$params->Activos', Pasivos = '$params->Pasivos' WHERE id_contabilidad = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido editada";
        return $vec;
    }

    public function filtro($valor)
    {
        $filtro = "SELECT * FROM contabilidad WHERE Ingresos LIKE '%$valor%' OR Egresos LIKE '%$valor%' OR Activos LIKE '%$valor%' OR Pasivos LIKE '%$valor%'";
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while ($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }
        return $vec;
    }
}
?>