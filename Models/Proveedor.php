<?php
require_once "/opt/lampp/htdocs/tienda_botimendo/Models/Conexion.php";

/**
 * TABLA PROVEEDOR DB
 * id_proveedor (PK)
 * nombre_proveedor 
 * telefono_proveedor
 * ubicación_proveedoro
 */
class Proveedor
{
    private $id_proveedor;
    private $nombre_proveedor;
    private $ubicacion_proveedor;
    private $telefono_proveedor;
    public function __construct()
    {
        $this->asignarValores();
    }
    private function setNombre()
    {
        $this->nombre_proveedor = firstWord(postAsignar('nombre'));
    }
    private function setUbicacion()
    {
        $this->ubicacion_proveedor = allFirstWord(postAsignar('ubicacion'));
    }
    private function setTelefono()
    {
        $this->telefono_proveedor = eliminarLetras(postAsignar('telefono'));
    }
    private function asignarValores()
    {
        $this->setNombre();
        $this->setUbicacion();
        $this->setTelefono();
    }
    private function getNombre()
    {
        return $this->nombre_proveedor;
    }

    private function getUbicacion()
    {
        return $this->ubicacion_proveedor;
    }
    private function getTelefono()
    {
        return $this->telefono_proveedor;
    }

    public static function obtenerProveedor(array $id_cliente = [], bool $where = false): array
    {
        if ($where) {
            $sql = 'SELECT id_proveedor AS id, nombre_proveedor, telefono_proveedor, ubicacion_proveedor FROM Proveedor WHERE id_proveedor = ?';
        } else {
            $sql = 'SELECT id_proveedor AS id, nombre_proveedor, telefono_proveedor, ubicacion_proveedor FROM Proveedor;';
        }
        try {
            $respuesta = Conexion::query($sql, $id_cliente);
            return $respuesta;
        } catch (PDOException $e) {
            throw new Exception("Error al mostrar los Proveedores<br> " . $e, 1);
        }
    }
    public function registrarProveedor()
    {
        $this->asignarValores();
        try {
            $sql = "INSERT INTO Proveedor (nombre_proveedor, ubicacion_proveedor, telefono_proveedor) VALUES (?,?,?)";
            $respuesta = Conexion::execute($sql, [$this->getNombre(), $this->getUbicacion(), $this->getTelefono()]);
            return $respuesta;
        } catch (PDOException $e) {
            throw new Exception("Error al registrar al proveedor", 1);
        }
    }

    public static function borrarProveedor($id)
    {
        $sql = 'DELETE FROM Proveedor WHERE id_proveedor = ?';
        try {
            return Conexion::execute($sql, [$id]);
        } catch (PDOException $e) {
            throw new Exception("Error al eliminar el proveedor. <br>" . $e, 1);
        }
    }

    public static function editarProveedor($id)
    {
        $sql = 'UPDATE Proveedor SET nombre_proveedor = ?, telefono_proveedor = ?, ubicacion_proveedor = ? WHERE id_proveedor = ?';
        $proveedor = [
            firstWord(postAsignar('nombre')),
            eliminarLetras(postAsignar('telefono')),
            allFirstWord(postAsignar('ubicacion')),
            $id,
        ];
        try {
            return Conexion::execute($sql, $proveedor);
        } catch (PDOException $e) {
            throw new Exception("Error al actualizar el proveedor. <br>" . $e, 1);
        }
    }
}
