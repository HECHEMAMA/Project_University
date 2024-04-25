<?php
require_once 'Conexion.php';

class Login
{

    public static function buscarUsuario($valor)
    {
        try {
            $sql = "SELECT * FROM Empleado WHERE usuario = ?;";
            $respuesta = Conexion::query($sql, $valor);
            return $respuesta;
        } catch (PDOException $e) {
            throw new Exception("Error al buscar el usuario", 1);
        }
    }
}
