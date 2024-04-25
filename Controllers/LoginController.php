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
    public static string $error = '';
    public function __construct(private $accion, private string $username, private string $password)
    {
        $this->ejecutarAccion();
    }
    private function logear()
    {
        $verificado = $this->validarCampos();
        if ($verificado) {
            $usuario = Login::buscarUsuario([$this->username]);
            $error = 'Usuario o Contrasena incorrectos.';
            if (count($usuario) > 0) {
                foreach ($usuario as $row) {
                    $contrasenaHash = $row['contrasena'];
                }
                (verify($this->password, $contrasenaHash))
                    ? header("location: ../view/home/index.php")
                    : $this->errorLogin($error);
            }
            $this->errorLogin($error);
        } else {
            $this->errorLogin('Los campos son obligatorios.');
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
        return errorAlert(self::$error);
    }
    private function ejecutarAccion()
    {
        match ($this->accion) {
            'iniciar-sesion' => $this->logear(),
            default => $this->errorLogin('Accion no valida.'),
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
