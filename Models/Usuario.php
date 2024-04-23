<?php

/**
 * Hacemos uso de la clase Conexion con sus metodos estaticos
 */
// require "/opt/lampp/htdocs/tienda_botimendo/Models/Conexion.php";
render('Conexion', ['Models']);
class Usuario
{
    /**
     * Variables a usar
     */
    /**
     * ARRAYS CONSULTAS SQL DATABASE
     */
    /* private static array $persona = [
        'select' => 'SELECT nombre, apellido, cedula, telefono, direccion, Rol.tipo_rol FROM Usuario INNER JOIN Rol ON Usuario.fk_rol = Rol.id_rol WHERE Rol.tipo_rol = "administrador" OR Rol.tipo_rol = "empleado";',
        'buscar' => 'SELECT nombre, apellido, cedula, telefono, direccion, Rol.tipo_rol FROM Usuario INNER JOIN Rol ON Usuario.fk_rol = Rol.id_rol WHERE Usuario.cedula LIKE ?;',
        'update' => 'UPDATE Usuario SET nombre=?,apellido=?,cedula=?,telefono=?,direccion=?,fk_rol=? WHERE cedula = ?',
        'insert' => 'INSERT INTO Usuario (nombre, apellido, cedula, telefono, direccion, fk_rol) VALUES (?,?,?,?,?,?)',
    ];

    private static array $usuario = [
        'select' => 'SELECT `nombre`, `apellido`,`usuario` FROM Empleado INNER JOIN Usuario ON Empleado.fk_usuario = Usuario.cedula;',
        'buscar' => 'SELECT `usuario`, `contrasena` FROM Empleado WHERE `usuario` = ?;',
        'update' => 'UPDATE Empleado SET `usuario`, `contrasena` WHERE `usuario` = ?;',
        'insert' => 'INSERT INTO Empleado (`usuario`,`contrasena`, `fk_usuario`) VALUES (?,?,?)',
    ]; */

    /**
     * =======================================================================================
     * Para Buscar la Persona por la @param cedula el array datos debe tener el valor a buscar 
     * si te acuerdas lo escribes completo
     * SI NO TE ACUERDAS le agregas al final del string%
     * =======================================================================================
     */
    public static function mostrarUsuariosCreateUser()
    {
        try {
            $sql = 'SELECT cedula AS id, nombre, apellido, Empleado.usuario, Rol.tipo_rol FROM Usuario INNER JOIN Rol ON Usuario.fk_rol = Rol.id_rol INNER JOIN Empleado ON Usuario.cedula = Empleado.fk_usuario WHERE Rol.tipo_rol = "administrador" OR Rol.tipo_rol = "empleado" ORDER BY Rol.tipo_rol ASC';
            $respuesta = Conexion::query($sql, []);
            return $respuesta;
        } catch (PDOException $e) {
            throw new Exception("ERROR no se pudo realizar la consulta de mostrar los usuarios " . $e->getMessage(), 1);
        }
    }
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
    public static function obtenerClientes(): array
    {
        $sql = 'SELECT cedula AS id,nombre, apellido, telefono, direccion FROM Usuario INNER JOIN Rol ON Usuario.fk_rol = Rol.id_rol WHERE Rol.tipo_rol = "cliente"';
        try {
            $respuesta = Conexion::query($sql, []);
            return $respuesta;
        } catch (PDOException $e) {
            throw new Exception("Error al mostrar los Clientes", 1);
        }
    }
    public static function buscarUsuario($valor): array
    {
        try {
            $sql = "SELECT * FROM Empleado WHERE usuario = ?;";
            $respuesta = Conexion::query($sql, $valor);
            return $respuesta;
        } catch (PDOException $e) {
            throw new Exception("Error al buscar el usuario", 1);
        }
    }

    public static function buscarCedula(array $cedula): array
    {
        try {
            $sql = "SELECT * FROM Usuario WHERE cedula = ?";
            $respuesta = Conexion::query($sql, $cedula);
            return $respuesta;
        } catch (PDOException $e) {
            throw new Exception("Error al buscar por la cedula", 1);
        }
    }

    /**
     * ==============================================================
     * @method AgregarPersona 
     * Retorna un @param TRUE si la persona fue registrada con exito.
     * Retorna un @param FALSE si la persona no se registro. 
     * ==============================================================
     */
    public static function agregarUsuario(array $datos)
    {
        try {
            $sql = "INSERT INTO Usuario (nombre, apellido, cedula, telefono, direccion, fk_rol) VALUES (?,?,?,?,?,?)";
            $respuesta = Conexion::execute($sql, $datos);
            return $respuesta;
        } catch (PDOException $e) {
            throw new Exception("Error no se pudo registrar la persona: " . $e->getMessage(), 1);
        }
    }
    public static function agregarEmpleado(array $datos)
    {
        try {
            $sql = "INSERT INTO Empleado (`usuario`,`contrasena`,`fk_usuario`) VALUES (?,?,?);";
            $respuesta = Conexion::execute($sql, $datos);
            return $respuesta;
        } catch (PDOException $e) {
            throw new Exception("Error al registrar al empleado", 1);;
        }
    }

    public static function editarUsuario(array $datos)
    {
    }

    public static function editarPersona(array $datos)
    {
    }
}
/* $user = UsuarioModel::mostrar("SELECT * FROM Empleado WHERE usuario = ?", ['jeremmygonzalez']);
var_dump($user);
if ($user) {
    var_dump($user['contrasena']);
} */
