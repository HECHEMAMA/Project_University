<?php
// require "render.php";
require_once 'utils.php';
require_once '/opt/lampp/htdocs/project-php/Models/Usuario.php';

// render('utils',['Controllers']);
// render('Usuario', ['Models']);
/**
 * @param REFACTORIZAR_CLASE
 * @param DIVIDIR_CLASE
 * @param APLICAR_HERENCIA
 */

/**
 * ============================================================
 * @author Jeremmy Gonzalez
 * @param Usuario.php => Interaccion con la base de datos
 * @param utils.php => Clases con Metodos Estaticos Variado
 * ============================================================
 */

/**
 * ===================================================================================
 * @author Jeremmy Gonzalez
 * @param UsuarioController
 * Esta clase va a manipular toda la informacion de las personas: Empleados y Clientes
 * ===================================================================================
 */
class UsuarioController
{
    /**
     * ===============================================================================
     * Campos de los Empleados para Logear
     * @param int $id_usuario
     * @param string $username => Nombre de Usuario: DEBE SER UNICO PARA CADA EMPLEADO
     * @param string $password => Contraseña del Usuario
     * ===============================================================================
     */
    private static string $error = '';
    private string $cedula;
    private string $username;
    private string $password;

    /**
     * ============================================================================================
     * Variable que recibe las Acciones del Metodo POST de todo formulario que involucre un Usuario
     * @param accion => El metodo @author $POST['accion'] 
     * - iniciar-sesion
     * - registrar-cliente
     * - registrar-empleado
     * - modificar-empleado
     * - modificar-cliente
     * - mostrar-clientes
     * - mostrar-empleados
     * ============================================================================================
     */

    /**
     * @param Inicializa_Variable $accion
     */
    public function __construct(private string $accion)
    {
        $this->ejecutarAccion();
    }
    private function getCedula()
    {
        return eliminarLetras($this->cedula);
    }
    private function getUsername()
    {
        return $this->username;
    }
    private function getPassword()
    {
        return $this->password;
    }

    /**
     * ========================================================
     * @param Proceso_Realizar
     * Apartir de aqui se realiza toda la operacion de la clase
     * ========================================================
     */

    /**
     * @method Mostrar_Persona
     * Devuelve un array de la consulta
     */
    public static function datosEmpleado($id_empleado)
    {
        return Usuario::obtenerEmpleado([$id_empleado], true);
    }


    /**
     * @method Crear_Usuario
     * Sirve para crear el usuario del empleado que usará la aplicación
     */
    private function crearUsuario()
    {
        if (post('password') && post('password2') && post('username')) { // Primero se verifica que exitan los valores ✅

            if (postAsignar('password') === postAsignar('password2')) { // Si todo concuerda prosigue con la operación
                try {
                    if ($this->crearPersona()) { // Si el metodo devuelve TRUE entonces se crea el usuario
                        if (Usuario::agregarUsuario($this->getCedula())) { // Usuario creado exitosamente 🤩
                            header('location: ../view/createUser/index.php');
                        } else {
                            echo "No registro el usuario";
                        }
                        die();
                    }
                    echo "No se guardo los datos del empleado";
                } catch (PDOException $e) {
                    throw new Exception("Error al crear un Usuario a: " . $e->getMessage(), 1);
                }
            } else { // Si la contraseña no es igual.
                echo "La contreseña no es igual.";
            }
        } else { // Si los campos estan vacios entonces muestra el siguiente mensaje en pantalla ❌
            echo "Llene todos los campos.";
        }
    }
    /**
     * @method Crear_Persona
     * Este metodo tambien sirve para crear cliente y empleados
     */
    private function crearPersona()
    {
        if (post('cedula') && post('nombre') && post('apellido') && post('telefono') && post('direccion')) {
            $this->cedula = $_POST['cedula'];
            try {
                if (!Usuario::buscarCedula($this->getCedula())) {
                    $verificado = (Usuario::agregarEmpleado());
                    ($verificado)
                        ? true
                        : die('No se almacenaron los datos del empleado.');
                    return $verificado;
                } else { // -> la Persona ya se encuentra registrada
                    die('Esta persona ya esta registrada');
                }
            } catch (PDOException $e) {
                throw new Exception("Error al Registrar a la empleado" . $e->getMessage(), 1);
            }
        } else {
            echo "Llene los campos";
        }
    }
    /**
     * @method Editar_Empleado
     */
    public function editarEmpleado()
    {
        if (post('cedula') && post('nombre') && post('apellido') && post('telefono') && post('direccion')) {
            $this->cedula = $_POST['cedula'];
            try {
                $verificado = (Usuario::editarEmpleado($this->getCedula())); // ⚠️ Escudriñar ¿Por qué no guarda el cambio de la cédula?
                return $verificado;
            } catch (PDOException $e) {
                throw new Exception("Error al actualizar los datos del Empleado" . $e->getMessage(), 1);
            }
        } else {
            echo "Llene los campos";
        }
    }
    private function editarUsuario()
    {
        if (post('password') && post('password2') && post('username')) { // Primero se verifica que exitan los valores ✅

            if (postAsignar('password') === postAsignar('password2')) { // Si todo concuerda prosigue con la operación
                try {
                    if ($this->editarEmpleado()) { // Si el metodo devuelve TRUE entonces se actualizo el usuario exitosamente
                        if (Usuario::editarUsuario($this->getCedula())) { // Usuario actualizado exitosamente 🤩
                            header('location: ../view/createUser/index.php');
                        } else {
                            echo "No registro el usuario";
                        }
                        die();
                    }
                    echo "No se guardo los datos del empleado";
                } catch (PDOException $e) {
                    throw new Exception("Error al crear un Usuario a: " . $e->getMessage(), 1);
                }
            } else { // Si la contraseña no es igual.
                echo "La contreseña no es igual.";
            }
        } else { // Si los campos estan vacios entonces muestra el siguiente mensaje en pantalla ❌
            echo "Llene todos los campos.";
        }
    }
    // public static function mostrarUsuariosCreateUser()
    // {
    //     $header = [
    //         "Nombre",
    //         "Apellido",
    //         "Usuario",
    //         "Rol",
    //         "",
    //     ];
    //     $titulo = "Empleado";
    //     return tablas($header, Usuario::mostrarUsuariosCreateUser(), true, true, $titulo);
    // }
    /**
     * ===========================================
     * @method extraer la informacion del ususario
     * ===========================================
     */
    public static function mostrarUsuarios()
    {
        $header = [
            "Cédula",
            "Nombre",
            "Apellido",
            "Teléfono",
            "Dirección",
            "Rol",
            "",
        ];
        return tablas($header, Usuario::mostrarEmpleados(), true, true, ['UsuarioController', 'usuario'], 'edit.php');
    }
    private function borrarEmpleado()
    {
        return (Usuario::borrarEmpleado($this->cedula));
    }

    private function borrarUsuario()
    {
        if (post('id')) {
            $this->cedula = postAsignar('id');
            if (Usuario::borrarUsuario($this->cedula)) {
                if ($this->borrarEmpleado()) {
                    header('location: ../view/createUser/index.php');
                } else {
                    die('Se borro el Usuario pero siguen los datos del empleado');
                }
            } else {
                die('Nose pudo borrar el Usuario');
            }
        } else {
            die('falta el id');
        }
    }
    public static function error()
    {
        if (self::$error === '') {
            return '';
        }
        return alert(self::$error, false);
    }
    /**
     * @method Ejecuta_Accion 
     * ~~> Este metodo es el que esta en el @param __contructor 
     * ==> Llama a los metodos correspondientes
     */
    private function ejecutarAccion()
    {
        match ($this->accion) {
            'crear-usuario'  => $this->crearUsuario(),
            'modificar-usuario' => $this->editarUsuario(),
            'borrar-usuario' => $this->borrarUsuario(),
        };
    }
}

if (post('accion')) {
    $usuario = new UsuarioController($_POST['accion']);
}

if (!empty($_GET['id'])) {
    UsuarioController::error();
}
/**
 * @author jeremmygonzalez
 * @param 205080
 */

/**
 * martinlopez 
 * martin1234  
 */
