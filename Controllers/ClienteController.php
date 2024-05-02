<?php
require_once '/opt/lampp/htdocs/project-php/Controllers/utils.php';
require_once '/opt/lampp/htdocs/project-php/Models/Cliente.php';

// render('utils', ['Controllers']);
// render('Usuario', ['Models']);

class ClienteController
{
    private string $cedula;
    public function __construct(private string $accion)
    {
        $this->ejecutarAccion();
    }
    public static function mostrarClientes()
    {
        $header = [
            'Cédula',
            'Nombre',
            'Apellido',
            'Teléfono',
            'Dirección',
            '',
        ];
        return tablas($header, Cliente::obtenerCliente([], false), true, true, ['ClienteController', 'cliente'], 'edit.php');
    }
    public static function datosCliente($id_cliente): array
    {
        return Cliente::obtenerCliente([$id_cliente], true);
    }
    public static function formularioEdit($id_cliente)
    {
        $cliente = self::datosCliente($id_cliente);
        $header = [
            'cedula',
            'nombre',
            'apellido',
            'telefono',
            'direccion',
        ];
        $formulario = formulario($header, $cliente, 'ClienteController.php');
        return $formulario;
    }
    public static function alertConfirmacion(string $mensjae)
    {
        $html = '<div class="alert alert-success">';
        $html .= $mensjae;
        $html .= '</div>';
        return $html;
    }
    public static function alertError(string $error)
    {
        $html = '<div class="alert alert-danger w-25">';
        $html .= $error;
        $html .= '</div>';
        return $html;
    }
    public static function editarCliente() // -> Necesita como Parametro el ID
    {
        // $html = '';
        if (post('cedula') && post('nombre') && post('apellido') && post('telefono') && post('direccion')) {
            $verificado = Cliente::editarCliente();
            if ($verificado) {
                //  $html = self::alertConfirmacion('Cliente actualizado con exito.');
                header('location: ../view/cliente/index.php');
            } else {
                header('location: ../view/cliente/edit.php');
                //  $html = self::alertError('Error al actualizar los datos del cliente.');
            }
        }
    }

    private function borrarCliente() // -> Necesita como Parametro el ID
    {
        if (post('id')) {
            $this->cedula = postAsignar('id');
            if ((Cliente::borrarCliente($this->cedula))) {
                header('location: ../view/cliente/index.php');
            } else {
                die('Error al Eliminar el cliente.');
            }
        } else {
            die('Falta el id para eliminar');
        }
    }

    private function registrarCliente()
    {
        if (post('cedula') && post('nombre') && post('apellido') && post('telefono') && post('direccion')) {
            $verificado = Cliente::registrarCliente();
            if ($verificado) {
                header('location: ../view/cliente/index.php');
            } else {
                header('location: ../view/cliente/cliente.php');
            }
        } else {
            return self::alertError('llene los campos');
        }
    }

    private function ejecutarAccion()
    {

        match ($this->accion) {
            'registrar-cliente' => $this->registrarCliente(),
            'modificar-cliente' => $this->editarCliente(),
            'borrar-cliente' => $this->borrarCliente(),
        };
    }
}

if (post('accion')) {
    $cliente = new ClienteController(postAsignar('accion'));
}
