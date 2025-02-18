<?php
class soporte_tecnico
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
        $con = "SELECT * FROM soporte_tecnico ORDER BY Incidencia, Tecnico, Solucion";
        $res = mysqli_query($this->conexion, $con);
        $vec = [];

        while ($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }

        return $vec;
    }
    public function eliminar($id)
    {
        $del = "DELETE FROM soporte_tecnico WHERE id_soporte = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido eliminada";
        return $vec;
    }

    public function insertar($params)
    {
        $ins = "INSERT INTO soporte_tecnico(Incidencia, Tecnico, Solucion) VALUES('$params->Incidencia', '$params->Tecnico', '$params->Solucion')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido guardada";
        return $vec;
    }

    public function editar($id, $params)
    {
        $editar = "UPDATE soporte_tecnico SET Incidencia = '$params->Incidencia', Tecnico = '$params->Tecnico', Solucion = '$params->Solucion' WHERE id_soporte = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido editada";
        return $vec;
    }

    public function filtro($valor)
    {
        $filtro = "SELECT * FROM soporte_tecnico WHERE Incidencia LIKE '%$valor%' OR Tecnico LIKE '%$valor%' OR Solucion LIKE '%$valor%'";
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while ($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }
        return $vec;
    }
}
?>