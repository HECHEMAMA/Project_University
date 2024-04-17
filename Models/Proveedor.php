<?php
include_once "/opt/lampp/htdocs/tienda_botimendo/Models/Conexion.php";
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

    private function setNombre()
    {
        $this->nombre_proveedor = Text::postAsignar('nombre');
    }
    private function setDireccion()
    {
        $this->ubicacion_proveedor = Text::postAsignar('direccion');
    }
    private function setTelefono()
    {
        $this->telefono_proveedor = Text::postAsignar('telefono');
    }
    private function asignarValores()
    {
        $this->setNombre();
        $this->setDireccion();
        $this->setTelefono();
    }
    private function getNombre()
    {
        return $this->nombre_proveedor;
    }

    private function getDireccion()
    {
        return $this->ubicacion_proveedor;
    }
    private function getTelefono()
    {
        return $this->telefono_proveedor;
    }

    public static function mostrarProveedores()
    {
        $sql = "SELECT id_proveedor AS id, nombre_proveedor, telefono_proveedor, ubicacion_proveedor FROM Proveedor";
        try {
            $respuesta = Conexion::query($sql, []);
            return $respuesta;
        } catch (PDOException $e) {
            throw new Exception("Error al consultar por los proveedores", 1);
        }
    }

    public function registrarProveedor()
    {
        $this->asignarValores();
        try {
            $sql = "INSERT INTO Proveedor (nombre_proveedor, ubicacion_proveedor, telefono_proveedor) VALUES (?,?,?)";
            $respuesta = Conexion::execute($sql, [$this->getNombre(), $this->getDireccion(), $this->getTelefono()]);
            return $respuesta;
        } catch (PDOException $e) {
            throw new Exception("Error al registrar al proveedor", 1);
        }
    }

    public static function eliminarProveedor()
    {
    }

    public static function actualizarProveedor()
    {
    }
}
