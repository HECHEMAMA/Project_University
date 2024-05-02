<?php
require "render.php";
render('utils', ['Controllers']);
render('Login', ['Models']);

/**
 * @param Clase_Login 
 * - Inicia Sesion.
 * - Verifica los campos.
 * - Retorna error si los datos son incorrectos.
 * - Accede a la página principal.
 */
class LoginController
{
    public static string $usuario;
    public static string $rol;
    public static string $error = '';
    private string $location;
    public function __construct(private $accion, private string $username, private string $password)
    {
        $this->ejecutarAccion();
    }
    private function logear()
    {
        $verificado = $this->validarCampos();
        if ($verificado) {
            $usuario = Login::buscarUsuario([lower($this->username)]);
            $error = 'Usuario o Contrasena incorrectos.';
            if (count($usuario) > 0) {
                foreach ($usuario as $row) {
                    $contrasenaHash = $row['contrasena'];
                }
                (verify($this->password, $contrasenaHash))
                    ? $this->sesion($this->username)

                    // : $this->errorLogin($error);
                    : '';
            }
            echo $error;
            echo '<a href="../view/login/index.php">Volver al login</a>';
            // $this->errorLogin($error);
        } else {
            echo 'Los campos son obligatorios.';
            echo '<a href="../view/login/index.php">Volver al login</a>';
            // $this->errorLogin('Los campos son obligatorios.');
        }
    }
    /**
     * Este metodo valida si el metodo Post tiene los valores esperados
     */
    private function validarCampos()
    {
        if (post('username') && post('password')) { // Verifica si tienen un valor devuele TRUE
            $this->username = lower(postAsignar('username'));
            $this->password = postAsignar('password');
        } else {
            $this->errorLogin('Los campos son obligatorios.');
            return false;
        }
        return true;
    }
    public function sesion($username)
    {
        if (!empty($username)) {
            $usuario = Login::obtenerRolUsuario($username); // -> Devuelve un FETCH_OBJ
            session_start();
            $_SESSION['nombre'] = $usuario->nombre;
            $_SESSION['apellido'] = $usuario->apellido;
            $_SESSION['rol'] = firstWord($usuario->tipo_rol);
            if ($usuario->tipo_rol === 'administrador') {
                header("location: ../view/home/index.php");
                // $this->location = '../view/home/index.php';
            } elseif ($usuario->tipo_rol === 'empleado') {
                // header("location: ../view/empleado/index.php");
                header("location: ../view/empleado/index.php");
                // $this->location = '../view/empleado/index.php';
                echo "Wrong";
            }
        }
        die('Sesion');
    }
    private function crearSesion()
    {
    }
    /**
     * @method errorLogin
     * devuelve el error en formato JSON
     * para mostrarlo como una alerta
     */
    private function errorLogin(string $string)
    {
        self::$error = $string;
    }

    public static function getError()
    {
        // return errorAlert(self::$error);
    }
    private function ejecutarAccion()
    {
        match ($this->accion) {
            'iniciar-sesion' => $this->logear(),
            // default => $this->errorLogin('Accion no valida.'),
        };
    }
}
if (post('accion')) {
    if (post('username') && post('password')) {
        $login = new LoginController(postAsignar('accion'), postAsignar('username'), postAsignar('password'));
    } else { // Si los input estan vacios devolvemos al usuario al login
        header('location: ../view/login/index.php');
    }
}
