<?php
class clientes
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
        $con = "SELECT * FROM clientes ORDER BY Nombre, Identificacion, Correo, Telefono,  Ciudad";
        $res = mysqli_query($this->conexion, $con);
        $vec = [];

        while ($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }

        return $vec;
    }
    public function insertar($params)
    {
        $ins = "INSERT INTO clientes(Nombre, Identificacion, Correo, Telefono, Ciudad) VALUES ('$params->Nombre', '$params->Identificacion', '$params->Correo', '$params->Telefono', '$params->Ciudad')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido guardada";
        return $vec;
    }
    public function editar($id, $params)
    {
        $ins = "UPDATE clientes SET Nombre = '$params->Nombre', Identificacion = '$params->Identificacion',  Correo = '$params->Correo', Telefono = '$params->Telefono', Ciudad = '$params->Ciudad'  WHERE id_clientes = '$id'";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido actualizada";
        return $vec;
    }   
    public function eliminar($id)
    {
        $ins = "DELETE FROM clientes WHERE id_clientes = '$id'";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido eliminada";
        return $vec;
    }
    public function filtro($dato) {
        $sql = "SELECT * FROM clientes WHERE Nombre LIKE ? OR Identificacion LIKE ? OR Correo LIKE ? OR Telefono LIKE ? OR Ciudad LIKE ?";
        $stmt = $this->conexion->prepare($sql);
        $param = "%$dato%";
        $stmt->bind_param("ss", $param, $param);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }
    public function cclientes($dato)
    {
        $sql = "SELECT * FROM clientes WHERE Identificacion = ?";
        if ($stmt = $this->conexion->prepare($sql)) {
            $stmt->bind_param("i", $dato);
            $stmt->execute();
            $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            $stmt->close();
            return $result;
        }
        return [];
    }
}
