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
        $con = "SELECT * FROM clientes ORDER BY Nombre, Apellido, Identificacion, Correo, Telefono, Ciudad, Departamento";
        $res = mysqli_query($this->conexion, $con);
        $vec = [];

        while ($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }

        return $vec;
    }
    public function eliminar($id)
    {
        $del = "DELETE FROM clientes WHERE id_clientes = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido eliminada";
        return $vec;
    }

    public function insertar($params)
    {
        $ins = "INSERT INTO clientes(Nombre, Apellido, Identificacion, Correo, Telefono, Ciudad, Departamento) VALUES('$params->Nombre', '$params->Apellido', '$params->Identificacion', '$params->Correo', '$params->Telefono', '$params->Ciudad', '$params->Departamento')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido guardada";
        return $vec;
    }

    public function editar($id, $params)
    {
        $editar = "UPDATE clientes SET Nombre = '$params->Nombre', Apellido = '$params->Apellido', Identificacion = '$params->Identificacion', Correo = '$params->Correo', Telefono = '$params->Telefono', Ciudad = '$params->Ciudad', Departamento = '$params->Departamento' WHERE id_clientes = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido editada";
        return $vec;
    }

    public function filtro($valor)
    {
        $filtro = "SELECT * FROM clientes WHERE Nombre LIKE '%$valor%' OR Apellido LIKE '%$valor%' OR Identificacion LIKE '%$valor%' OR Correo LIKE '%$valor%' OR Telefono LIKE '%$valor%' OR Ciudad LIKE '%$valor%' OR Departamento LIKE '%$valor%'";
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while ($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }

        return $vec;
    }
    public function cclientes($dato) {
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
?>