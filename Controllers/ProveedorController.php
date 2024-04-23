<?php
require "render.php";
render('utils', ['Controllers']);
render('Proveedor', ['Models']);
class ProveedorController
{
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
        $proveedores = Proveedor::mostrarProveedores();
        return tablas($header, $proveedores, true, true, "proveedor");
    }
    public static function mostrarProveedorSection()
    {
        $header = [
            "",
            "Proveedor",
            "Teléfono",
            "Ubicación",
        ];
        $proveedor = Proveedor::mostrarProveedores();
        return tablas($header, $proveedor, false, false, "proveedor");
    }
    public static function editarProveedor($id_proveedor)
    {
        var_dump($id_proveedor);
    }
    public static function borrarProveedor($id_proveedor)
    {
        var_dump($id_proveedor);
    }
    private function registrarProveedor()
    {
        if (post('nombre') && post('direccion') && post('telefono')) {
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
        switch ($this->accion) {
            case 'registrar-proveedor':
                $this->registrarProveedor();
                break;
            case 'editar-proveedor':
                #endregion
                break;
            case 'eliminar-proveedor':
                #endregion
                break;
            default:
                # code...
                break;
        }
    }
}
if (post('accion')) {
    $proveedor = new ProveedorController(new Proveedor, postAsignar('accion'));
}
