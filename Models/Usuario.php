<?php
require_once "/opt/lampp/htdocs/tienda_botimendo/Models/Conexion.php";

// render('Conexion', ['Models']);
class Usuario
{
    public static function mostrarEmpleados(): array
    {
        try {
            $sql = 'SELECT cedula AS id, nombre, apellido, telefono, direccion, Rol.tipo_rol FROM Usuario INNER JOIN Rol ON Usuario.fk_rol = Rol.id_rol WHERE Rol.tipo_rol = "administrador" OR Rol.tipo_rol = "empleado" ORDER BY cedula ASC';
            $respuesta = Conexion::query($sql, []);
            return $respuesta;
        } catch (PDOException $e) {
            throw new Exception("Error al mostrar los usuario", 1);
        }
    }

    public static function buscarCedula($cedula): array
    {
        try {
            $sql = "SELECT * FROM Usuario WHERE cedula = ?";
            $respuesta = Conexion::query($sql, [$cedula]);
            return $respuesta;
        } catch (PDOException $e) {
            throw new Exception("Error al buscar por la cedula", 1);
        }
    }
    public static function obtenerEmpleado(array $id_empleado, bool $where = false)
    {
        if ($where) {
            $sql = 'SELECT Usuario.cedula AS id, Empleado.usuario,Usuario.nombre, Usuario.apellido, Usuario.telefono, Usuario.direccion, Rol.tipo_rol FROM Empleado INNER JOIN Usuario ON Empleado.fk_usuario = Usuario.cedula INNER JOIN Rol ON Usuario.fk_rol = Rol.id_rol WHERE Usuario.cedula = ?';
        } else {
            $sql = 'SELECT cedula AS id,nombre, apellido, telefono, direccion FROM Usuario INNER JOIN Rol ON Usuario.fk_rol = Rol.id_rol WHERE Rol.tipo_rol = "administrador" OR Rol.tipo_rol = "empleado" ORDER BY cedula ASC';
        }
        try {
            $respuesta = Conexion::query($sql, $id_empleado);
            return $respuesta;
        } catch (PDOException $e) {
            throw new Exception("Error al mostrar los Clientes<br> " . $e, 1);
        }
    }
    /**
     * ==============================================================
     * @method AgregarPersona 
     * Retorna un @param TRUE si la persona fue registrada con exito.
     * Retorna un @param FALSE si la persona no se registro. 
     * ==============================================================
     */
    public static function agregarUsuario($cedula)
    {
        $sql = "INSERT INTO Empleado (usuario, contrasena, fk_usuario) VALUES (?,?,?)";
        $usuario = [
            lower(postAsignar('username')),
            hashPassword(postAsignar('password')),
            eliminarLetras($cedula),
        ];
        try {
            $respuesta = Conexion::execute($sql, $usuario);
            return $respuesta;
        } catch (PDOException $e) {
            throw new Exception("Error no se pudo registrar la persona: " . $e->getMessage(), 1);
        }
    }
    public static function agregarEmpleado()
    {
        $sql = "INSERT INTO Usuario (cedula, nombre, apellido, telefono, direccion, fk_rol) VALUE (?,?,?,?,?,?);";
        $empleado = [
            eliminarLetras(postAsignar('cedula')),
            firstWord(postAsignar('nombre')),
            firstWord(postAsignar('apellido')),
            eliminarLetras(postAsignar('telefono')),
            inicialesMayusculas(postAsignar('direccion')),
            postAsignar('rol'),
        ];
        try {
            $respuesta = Conexion::execute($sql, $empleado);
            return $respuesta;
        } catch (PDOException $e) {
            throw new Exception("Error al registrar al empleado <br>" . $e, 1);;
        }
    }

    public static function editarEmpleado($cedula)
    {
        $sql = "UPDATE Usuario SET cedula = ?, nombre = ?, apellido = ?, telefono = ?, direccion=?, fk_rol= ?  WHERE cedula = ?;";
        $empleado = [
            $cedula,
            firstWord(postAsignar('nombre')),
            firstWord(postAsignar('apellido')),
            eliminarLetras(postAsignar('telefono')),
            inicialesMayusculas(postAsignar('direccion')),
            // postAsignar('rol'),
            3,
            $cedula,
        ];
        try {
            $respuesta = Conexion::execute($sql, $empleado);
            return $respuesta;
        } catch (PDOException $e) {
            throw new Exception("Error al registrar al empleado <br>" . $e, 1);;
        }
    }

    public static function editarUsuario($cedula)
    {
        $sql = "UPDATE Empleado SET usuario = ?, contrasena = ?, fk_usuario = ? WHERE fk_usuario = ?;";
        $usuario = [
            lower(postAsignar('username')),
            hashPassword(postAsignar('password')),
            eliminarLetras($cedula),
            eliminarLetras($cedula),
        ];
        try {
            $respuesta = Conexion::execute($sql, $usuario);
            return $respuesta;
        } catch (PDOException $e) {
            throw new Exception("Error no se pudo registrar la persona: " . $e->getMessage(), 1);
        }
    }
    public static function borrarEmpleado($cedula)
    {
        $sql = 'DELETE FROM Usuario WHERE Usuario.cedula = ?';
        try {
            $respuesta = Conexion::execute($sql, [$cedula]);
            return $respuesta;
        } catch (PDOException $e) {
            throw new Exception("Error no se puedo eliminar el empleado" . $e, 1);
        }
    }
    public static function borrarUsuario($cedula)
    {
        $sql = 'DELETE FROM Empleado WHERE fk_usuario = ?';
        try {
            $respuesta = Conexion::execute($sql, [$cedula]);
            return $respuesta;
        } catch (PDOException $e) {
            throw new Exception("Error no se puedo eliminar el usuario" . $e, 1);
        }
    }
}
/* $user = UsuarioModel::mostrar("SELECT * FROM Empleado WHERE usuario = ?", ['jeremmygonzalez']);
var_dump($user);
if ($user) {
    var_dump($user['contrasena']);
} */
