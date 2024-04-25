<?php
require_once '/opt/lampp/htdocs/project-php/Models/Conexion.php';

class Cliente
{
    public static function obtenerCliente(array $id_cliente = [], bool $where = false): array
    {
        if ($where) {
            $sql = 'SELECT cedula AS id,nombre, apellido, telefono, direccion FROM Usuario WHERE cedula = ?';
        } else {
            $sql = 'SELECT cedula AS id,nombre, apellido, telefono, direccion FROM Usuario INNER JOIN Rol ON Usuario.fk_rol = Rol.id_rol WHERE Rol.tipo_rol = "cliente"';
        }
        try {
            $respuesta = Conexion::query($sql, $id_cliente);
            return $respuesta;
        } catch (PDOException $e) {
            throw new Exception("Error al mostrar los Clientes<br> " . $e, 1);
        }
    }
    public static function registrarCliente()
    {

        $sql = 'INSERT INTO Usuario (cedula, nombre, apellido, telefono, direccion, fk_rol) VALUE (?,?,?,?,?,1);';
        $cliente = [
            eliminarLetras(postAsignar('cedula')),
            firstWord(postAsignar('nombre')),
            firstWord(postAsignar('apellido')),
            eliminarLetras(postAsignar('telefono')),
            inicialesMayusculas(postAsignar('direccion')),
        ];
        try {
            $respuesta = Conexion::execute($sql, $cliente);
            return $respuesta;
        } catch (PDOException $e) {
            throw new Exception('Error no se puedo registrar el cliente', 1);
        }
    }
    public static function editarCliente()
    {
        $sql = 'UPDATE Usuario SET cedula = ?, nombre=?, apellido=?, telefono=?, direccion=? WHERE cedula = ?';
        $cliente = [
            eliminarLetras(postAsignar('cedula')),
            firstWord(postAsignar('nombre')),
            firstWord(postAsignar('apellido')),
            eliminarLetras(postAsignar('telefono')),
            inicialesMayusculas(postAsignar('direccion')),
            eliminarLetras(postAsignar('cedula')),
        ];
        try {
            $respuesta = Conexion::execute($sql, $cliente);
            return $respuesta;
        } catch (PDOException $e) {
            throw new Exception('Error no se puedo actualizar los datos del cliente', 1);
        }
    }

    public static function borrarCliente($cedula)
    {
        $sql = 'DELETE FROM Usuario WHERE cedula = ?';
        try {
            $respuesta = Conexion::execute($sql, [$cedula]);
            return $respuesta;
        } catch (PDOException $e) {
            throw new Exception("Error no se pudo eliminar el Cliente. <br>" . $e, 1);
        }
    }
}
