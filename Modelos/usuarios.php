<?php
class usuarios
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
        $con = "SELECT * FROM usuarios ORDER BY Nombre, Apellido, Correo, Telefono, Cargo, Documento, clave";
        $res = mysqli_query($this->conexion, $con);
        $vec = [];

        while ($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }

        return $vec;
    }
    public function eliminar($id)
    {
        $del = "DELETE FROM usuarios WHERE id_usuarios = $id";
        mysqli_query($this->conexion, $del);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido eliminada";
        return $vec;
    }

    public function insertar($params)
    {
        $ins = "INSERT INTO usuarios(Nombre, Apellido, Correo, Telefono, Cargo, Documento, clave) VALUES('$params->Nombre', '$params->Apellido', '$params->Correo', '$params->Telefono', '$params->Cargo', '$params->Documento', sha1('$params->clave'))";
        mysqli_query($this->conexion, $ins);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido guardada";
        return $vec;
    }

    public function editar($id, $params)
    {
        $editar = "UPDATE usuarios SET Nombre = '$params->Nombre', Apellido = '$params->Apellido', Correo = '$params->Correo', Telefono = '$params->Telefono', Cargo = '$params->Cargo', Documento = '$params->Documento', clave = sha1('$params->clave') WHERE id_usuarios = $id";
        mysqli_query($this->conexion, $editar);
        $vec = [];
        $vec['resultado'] = "OK";
        $vec['mensaje'] = "La informacion ha sido editada";
        return $vec;
    }

    public function filtro($valor)
    {
        $filtro = "SELECT * FROM usuarios WHERE Nombre LIKE '%$valor%' OR Apellido LIKE '%$valor%' OR Correo LIKE '%$valor%' OR Telefono LIKE '%$valor%' OR Cargo LIKE '%$valor%' OR Documento LIKE '%$valor%' OR clave LIKE '%$valor%'";
        $res = mysqli_query($this->conexion, $filtro);
        $vec = [];

        while ($row = mysqli_fetch_array($res)) {
            $vec[] = $row;
        }

        return $vec;
    }
}
?>