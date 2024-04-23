<?php
require 'render.php';
render('utils', ['Controllers']);
render('Usuario', ['Models']);

class ClienteController
{
    public static function mostrarClientes()
    {
        $header = [
            'Cédula',
            'Nombre',
            'Apellido',
            'Teléfono',
            'Dirección',
        ];
        return tablas($header, Usuario::obtenerClientes(), true, true, 'cliente');
    }

    public static function editarCliente($id_cliente) // -> Necesita como Parametro el ID
    {
        echo "Editar Cliente";
    }

    public static function borrarCliente($id_cliente)
    {
        var_dump(" Eliminar Cliente");
    }
}
