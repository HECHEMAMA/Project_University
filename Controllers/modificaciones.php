<?php
require 'ClienteController.php';
require 'UsuarioController.php';
require 'ProveedorController.php';
require 'ProductoController.php';



if (post('id') && post('accion')) {
    $modificacion = new ModificarControllers(postAsignar('accion'), postAsignar('id'));
}

class ModificarControllers
{
    public function __construct(private $accion, private $id)
    {
        $this->ejecutarAccion();
    }

    private function getId()
    {
        return $this->id;
    }
    private function ejecutarAccion()
    {
        match ($this->accion) {
            'borrar-cliente'   => ClienteController::borrarCliente($this->getId()),
            'editar-cliente'   => ClienteController::editarCliente($this->getId()),
            'borrar-empleado'  => UsuarioController::borrarEmpleado($this->getId()),
            'editar-empleado'  => UsuarioController::editarEmpleado($this->getId()),
            'borrar-proveedor' => ProveedorController::borrarProveedor($this->getId()),
            'editar-proveedor' => ProveedorController::editarProveedor($this->getId()),
            'borrar-producto'  => ProductoController::borrarProducto($this->getId()),
            'editar-producto'  => ProductoController::editarProducto($this->getId()),
        };
    }
}
