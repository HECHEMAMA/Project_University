<?php
require "render.php";
render('utils',['Controllers']);
render('Usuario', ['Models']);
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
     * ======================================================================
     * Variables de todas las Personas al llenar un formulario
     * @param string $cedula => Identificacion de la persona 
     * @param string $nombre; => Nombre de la Persona Solo uno
     * @param string $apellido; => Apellido de la Persona
     * @param string $telefono; => Telefono
     * @param string $direccion; => Direccion Corta de la Persona
     * @param int $rol => Rol de la Persona: 1=>Cliente, 2=>Administrador, 3=>Empleado
     * ======================================================================
     */
    private string $cedula;
    private string $nombre;
    private string $apellido;
    private string $telefono;
    private string $direccion;
    private $rol;

    /**
     * ===============================================================================
     * Campos de los Empleados para Logear
     * @param int $id_usuario
     * @param string $username => Nombre de Usuario: DEBE SER UNICO PARA CADA EMPLEADO
     * @param string $password => Contraseña del Usuario
     * ===============================================================================
     */
    private $id_usuario;
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

    /**
     * @method Metodo_Set
     * @param setX => agrega valores a los atributos
     */
    private function setCedula($string)
    {
        $string = eliminarLetras($string);
        $this->cedula = $string;
    }
    // Asignando Valor a Nombre
    private function setNombre($string)
    {
        $string = firstWord(eliminarNumeros($string));
        $this->nombre = $string;
    }
    // Asignando Valor a Apellido
    private function setApellido($string)
    {
        $string = firstWord(eliminarNumeros($string));
        $this->apellido = $string;
    }
    // Asignando Valor a Telefono
    private function setTelefono($string)
    {
        $string = eliminarLetras($string);
        $this->telefono = $string;
    }
    // Asignando Valor a Direccion
    private function setDireccion($string)
    {
        $string = inicialesMayusculas(eliminarNumeros($string));
        $this->direccion = $string;
    }
    // Asignando Valor a Tipo
    private function setRol($string)
    {
        $this->rol = $string;
    }
    private function setUsername($string)
    {
        $string = lower($string);
        $this->username = $string;
    }
    private function setPassword($string)
    {
        $this->password = $string;
    }

    /**
     * ================================================
     * @method Metodos_GET
     * @return getX => Devolvera el valor las variables
     * ================================================
     */
    private function getNombre()
    {
        return $this->nombre;
    }
    private function getApellido()
    {
        return $this->apellido;
    }
    private function getCedula()
    {
        return $this->cedula;
    }
    private function getTelefono()
    {
        return $this->telefono;
    }
    private function getDireccion()
    {
        return $this->direccion;
    }
    private function getRol()
    {
        return $this->rol;
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
     * @method Crear_Persona
     * Este metodo tambien sirve para crear cliente y empleados
     */
    private function crearPersona()
    {
        $this->setNombre($_POST['nombre']);
        $this->setApellido($_POST['apellido']);
        $this->setCedula($_POST['cedula']);
        $this->setTelefono($_POST['telefono']);
        $this->setDireccion($_POST['direccion']);
        $this->setRol($_POST['rol']);
        try {
            $usuario = Usuario::buscarCedula([$this->getCedula()]); // Buscara en la base de datos una persona que este registrada con esta cedula
            if (count($usuario) === 0) {
                $sql = Usuario::agregarUsuario([$this->getNombre(), $this->getApellido(), $this->getCedula(), $this->getTelefono(), $this->getDireccion(), $this->getRol()]);
            }
            /* if ($sql) {
            } else {
                die("Error al registrar el usuario");
            } */
        } catch (PDOException $e) {
            throw new Exception("Error al Registrar a la Persona" . $e->getMessage(), 1);
        }
    }

    /**
     * @method Crear_Usuario
     * Sirve para crear el usuario del empleado que usará la aplicación
     */
    private function crearUsuario()
    {
        $this->setUsername($_POST['username']);
        $this->setPassword(hashPassword($_POST['password']));
        try {
            $this->crearPersona();
            $sql = Usuario::agregarEmpleado([$this->getUsername(), $this->getPassword(), $this->getCedula()]);
            if ($sql) {
                header("location: ../view/createUser/index.php");
            } else {
                die("Error al registrar el empleado");
            }
        } catch (PDOException $e) {
            throw new Exception("Error al crear un Usuario a: " . $e->getMessage(), 1);
        }
    }

    /**
     * @method Editar_Persona
     * Metodo para editar los datos de la persona
     */
    /**
     * @method Editar_Usuario
     */
    public static function editarEmpleado($id_usuario)
    {
        var_dump($id_usuario);
    }
    public static function borrarEmpleado($id_usuario)
    {
        var_dump($id_usuario);
    }
    /**
     * @method Mostrar_Persona
     * Devuelve un array de la consulta
     */
    public function mostrarPersonas()
    {
    }
    /**
     * @method Mostrar_Usuario
     * Devuelve un array de la consulta
     */
    public static function mostrarUsuariosCreateUser()
    {
        $header = [
            "Nombre",
            "Apellido",
            "Usuario",
            "Rol",
            "",
        ];
        $titulo = "Empleado";
        return tablas($header, Usuario::mostrarUsuariosCreateUser(), true, true, $titulo);
    }
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
        $titulo = "empleado";
        return tablas($header, Usuario::mostrarEmpleados(), true, true, $titulo);
    }
    /**
     * @method Login
     * verificar el usuario y la constraseña
     */
    private function login()
    {
        $this->setUsername($_POST['username']);
        $this->setPassword($_POST['password']);
        try {
            $respuesta = Usuario::buscarUsuario([$this->getUsername()]);
            if (count($respuesta) > 0) {
                foreach ($respuesta as $row) {
                    $contrasenaHash = $row['contrasena'];
                }
            }
            (verify($this->getPassword(), $contrasenaHash))
                ? header("location: ../view/home/index.php")
                : header("location: ../view/login/index.php");
        } catch (PDOException $e) {
            throw new Exception("Error al Iniciar Sesion " . $e->getMessage(), 1);
        }
    }
    /**
     * =======================================================================================
     * @method Metodo_Error
     * Se encarga de devolver al usuario a la ventana de origen si se produce un inconveniente
     * =======================================================================================
     */
    private function Error($valor)
    {
    }

    /**
     * @method Ejecuta_Accion 
     * ~~> Este metodo es el que esta en el @param __contructor 
     * ==> Llama a los metodos correspondientes
     */
    private function ejecutarAccion()
    {
        switch ($this->accion) {
            case 'crear-usuario':
                $this->crearUsuario();
                break;
            case 'registrar-cliente':
                # code...
                break;
            case 'iniciar-sesion':
                $this->login();
                break;
            default:
                # no se que colocar
                break;
        }
    }
}
if (post('accion') === true) {
    $usuario = new UsuarioController($_POST['accion']);
}

/**
 * @author jeremmygonzalez
 * @param 205080
 */
