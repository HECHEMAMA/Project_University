<?php
include_once "/opt/lampp/htdocs/tienda_botimendo/Controllers/utils.php";
require "/opt/lampp/htdocs/tienda_botimendo/Models/Proveedor.php";
class ProveedorController
{
    private $accion;
    private $proveedor;
    public function __construct()
    {
        $this->proveedor = new Proveedor;
        $this->accion = $_POST["accion"];
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
        return Generador::tablas($header, $proveedores, true, true, "proveedor");
    }
    public static function mostrarProveedorSection(){
        $header = [
            "",
            "Proveedor",
            "Teléfono",
            "Ubicación",
        ];
        $proveedor = Proveedor::mostrarProveedores();
        return Generador::tablas($header, $proveedor, false, false, "proveedor");
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
        if (Text::post('nombre') && Text::post('direccion') && Text::post('telefono')) {
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
if (Text::post('accion')) {
    $proveedor = new ProveedorController;
}
