<?php
// require "/opt/lampp/htdocs/tienda_botimendo/Controllers/utils.php";
require "/opt/lampp/htdocs/tienda_botimendo/Controllers/ProveedorController.php";
require "/opt/lampp/htdocs/tienda_botimendo/Controllers/UsuarioController.php";


if (Text::post('id') && Text::post('accion')) {
    $modificacion = new ModificarControllers;
}

class ModificarControllers
{
    private string $accion;
    private $id;
    public function __construct()
    {
        $this->accion = Text::postAsignar('accion');
        $this->id = Text::postAsignar('id');
        $this->ejecutarAccion();
    }

    private function getId()
    {
        return $this->id;
    }
    private function ejecutarAccion()
    {
        switch ($this->accion) {
                // Usuario
            case 'borrar-cliente':
                echo "borrar Cliente";
                break;
            case 'editar-cliente':
                echo "editar Cliente";
                break;
                // Empleado 
            case 'borrar-empleado':
                // echo "borrar Empleado";
                UsuarioController::borrarEmpleado($this->getId());
                break;
            case 'editar-empleado':
                // echo "editar Empleado";
                UsuarioController::editarEmpleado($this->getId());
                break;
                // Proveedor
            case 'borrar-proveedor':
                // echo "borrar Proveedor";
                ProveedorController::borrarProveedor($this->getId());
                break;
            case 'editar-proveedor':
                // echo "editar Proveedor";
                ProveedorController::editarProveedor($this->getId());
                break;
                // Producto
            case 'borrar-producto':
                echo "borrar Producto";
                break;
            case 'editar-producto':
                echo "editar Producto";
                break;
            default:
                break;
        }
    }
}
