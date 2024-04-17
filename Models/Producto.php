<?php
include_once "/opt/lampp/htdocs/tienda_botimendo/Models/Conexion.php";
class Producto
{
    /**
     * @method MostrarProductos
     * Debe tener la sentencia @param sql
     * En un array los datos a ingresar @param datos
     */
    public static function mostrarProductosDiv()
    {
        $sql = "SELECT Producto.nombre_producto AS producto, Producto.precio AS precio, Categoria.nombre_categoria AS categoria ,Imagen.nombre_imagen AS nombre_imagen, Imagen.url AS imagen  FROM Producto INNER JOIN Categoria ON Producto.fk_categoria = Categoria.id_categoria INNER JOIN Imagen ON Producto.fk_imagen = Imagen.id_imagen";
        try {
            $respuesta = Conexion::query($sql);
            return $respuesta;
        } catch (PDOException $e) {
            throw new Exception("ERROR no se pudo encontrar el usuario: " . $e->getMessage(), 1);
        }
    }

    /**
     * ==============================================================
     * @method AgregarProducto 
     * Retorna un @param TRUE si la persona fue registrada con exito.
     * Retorna un @param FALSE si la persona no se registro. 
     * ==============================================================
     */
    public static function registrarProducto(array $datos)
    {
        $sql = 'INSERT INTO Producto (codigo, nombre_producto, descripcion, precio, cantidad, fk_categoria, fk_imagen) VALUES (?,?,?,?,?,?,?);';
        try {
            $respuesta = Conexion::execute($sql, $datos);
            if($respuesta){
                return $respuesta;
            }else {
                throw new Exception("Error no se puedo guardar el Producto", 1);
            }

        } catch (PDOException $e) {
            throw new Exception("Error no se pudo registrar la persona: " . $e->getMessage(), 1);
        }
    }

    public static function editarUsuario(array $datos)
    {
    }

    public static function editarPersona(array $datos)
    {
    }
}
