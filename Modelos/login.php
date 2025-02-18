<?php
class Login
{
    //Atributos
    public $conexion;
    //Constructor
    public function __construct($conexion)
    {
        $this->conexion = $conexion;
    }
    //Metodos
    public function consulta($Correo, $clave)
    {
        $stmt = $this->conexion->prepare("SELECT * FROM usuarios WHERE Correo = ? AND clave = SHA1(?)");
        $stmt->bind_param("ss", $Correo, $clave);
        $stmt->execute();
        $result = $stmt->get_result();
        $vec = [];

        while ($row = $result->fetch_array()) {
            $vec[] = $row;
        }
        
        switch(empty($vec)) {
            case true:
                $vec[0] = ['validar' => 'no valido'];
                break;
            default:
                $vec[0]['validar'] = 'valido';
        }

        return $vec;
    }

}
?>