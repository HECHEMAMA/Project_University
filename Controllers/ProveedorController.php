<?php
require_once '/opt/lampp/htdocs/project-php/Controllers/utils.php';
require_once '/opt/lampp/htdocs/project-php/Models/Proveedor.php';

class ProveedorController
{
    private string $id;
    public function __construct(private $proveedor, private $accion)
    {
        $this->ejecutarAccion();
    }
    public static function mostrarProveedores()
    {
        $header = [
            "",
            "Proveedor",
            "Teléfono",
            "Ubicación",
        ];
        $proveedores = Proveedor::obtenerProveedor();
        return tablas($header, $proveedores, true, true, ['ProveedorController', 'proveedor'], 'edit.php');
    }
    public static function datosProveedor($id_proveedor)
    {
        return Proveedor::obtenerProveedor([$id_proveedor], true);
    }
    public static function mostrarProveedorSection()
    {
        $header = [
            "",
            "Proveedor",
            "Teléfono",
            "Ubicación",
        ];
        $proveedor = Proveedor::obtenerProveedor();
        return tablas($header, $proveedor, false, false, ['ProveedorController', 'proveedor'], 'edit.php');
    }
    private function editarProveedor()
    {
        if (post('id') && post('nombre') && post('telefono') && post('ubicacion')) {
            $this->id = postAsignar('id');
            $verificado = Proveedor::editarProveedor($this->id);
            if ($verificado) {
                //  $html = self::alertConfirmacion('proveedor actualizado con exito.');
                header('location: ../proveedores/index.php');
            } else {
                header('location: ../proveedores/edit.php');
                //  $html = self::alertError('Error al actualizar los datos del proveedor.');
            }
        } else {
            echo "Llene todo los campos para actualizar.";
        }
    }
    private function borrarProveedor()
    {
        if (post('id')) {
            $this->id = postAsignar('id');
            if ((Proveedor::borrarProveedor($this->id))) {
                header('location: ../view/proveedores/index.php');
            } else {
                die('Error al eliminar el proveedor.');
            }
        } else {
            die('Falta el id para eliminar.');
        }
    }
    private function registrarProveedor()
    {
        if (post('nombre') && post('ubicacion') && post('telefono')) {
            $valor = $this->proveedor->registrarProveedor();
            if ($valor) {
                header("location: ../view/proveedores/index.php");
            } else {
                throw new Exception("Error Processing Request", 1);
                die("No se pudo registrar el proveedor");
            }
        } else {
            die("Los campos no fueron llenados correctamente");
        }
    }

    private function ejecutarAccion()
    {
        match ($this->accion) {
            'registrar-proveedor' => $this->registrarProveedor(),
            'modificar-proveedor' => $this->editarProveedor(),
            'borrar-proveedor' => $this->borrarProveedor(),
        };
    }
}
if (post('accion')) {
    $proveedor = new ProveedorController(new Proveedor, postAsignar('accion'));
}
