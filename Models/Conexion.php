<?php
class Conexion
{
    private static $host = 'localhost';
    private static $dbname = 'botimendo_db';
    private static $user = 'root';
    private static $password = '';

    public static function connect()
    {
        try {
            $conn = new PDO("mysql:host=" . self::$host . ";dbname=" . self::$dbname, self::$user, self::$password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            return null;
        }
    }
    // Ejecuta una consulta SELECT y devuelve un array asociativo con los resultados o false en caso de error.
    public static function query($query, $params = [])
    {
        $conn = self::connect();
        if ($conn === null) {
            return false;
        }
        try {
            $stmt = $conn->prepare($query);
            $stmt->execute($params);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Query failed: " . $e->getMessage();
            return false;
        }
    }

    //  Ejecuta una consulta INSERT, UPDATE o DELETE y devuelve true si se ejecuta con éxito o false en caso de error.
    public static function execute($query, $params = [])
    {
        $conn = self::connect();
        if ($conn === null) {
            return false;
        }
        try {
            $stmt = $conn->prepare($query);
            return $stmt->execute($params);
        } catch (PDOException $e) {
            echo "Execute failed: " . $e->getMessage();
            return false;
        }
    }
}
/*----- Este metodo requiere, como variable $sql un string el cual seria SQL y un argumento como Variables -----*/
/**
 * CONSULTAS SQL PARA LA BASE DE DATOS Y ASI LLAMAR LOS VALORES ESPERADOS
 * 
 * INNER JOIN
 * Usuario y Rol
 * SELECT cedula, nombre, apellido, telefono, direccion, R.tipo_rol FROM Usuario INNER JOIN Rol ON 
 */
