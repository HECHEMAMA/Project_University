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

    public static function obtenerRolUsuario($username)
    {
        $sql = 'SELECT Usuario.nombre, Usuario.apellido, Rol.tipo_rol FROM Usuario INNER JOIN Rol ON Usuario.fk_rol = Rol.id_rol INNER JOIN Empleado ON Empleado.fk_usuario = Usuario.cedula WHERE Empleado.usuario = ?;';
        try {
            $respuesta = Conexion::queryObject($sql, [$username]);
            return $respuesta;
        } catch (PDOException $e) {
            throw new Exception("Error al extraer los datos del usuario. <br>" . $e, 1);
        }
    }
}
