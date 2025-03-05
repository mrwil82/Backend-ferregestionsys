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
        $con = "SELECT * FROM clientes ORDER BY Nombre, Identificacion, Telefono, Correo, Ciudad, Departamento";
        $res = mysqli_query($this->conexion, $con);
        $vec = [];

        while ($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }

        return $vec;
    }
    public function insertar($params)
    {
        $ins = "INSERT INTO clientes(Nombre, Idenentificacion, Telefono, Correo, Ciudad, Departamento  ) VALUES ('$params->Nombre', '$params->Idenification', '$params->Telefono', '$params->Correo', '$params->Ciudad', '$params->Departamento')";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido guardada";
        return $vec;
    }
    public function editar($id, $params)
    {
        $ins = "UPDATE clientes SET Nombre = '$params->Nombre', Idenification = '$params->Idenification', Telefono = '$params->Telefono', Correo = '$params->Correo', Ciudad = '$params->Ciudad', Departamento = '$params->Departamento' WHERE id_clientes = '$id'";
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