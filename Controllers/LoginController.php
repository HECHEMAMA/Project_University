<?php
include_once "/opt/lampp/htdocs/project-php/Controllers/utils.php";
include_once "/opt/lampp/htdocs/project-php/Models/Login.php";

/**
 * @param Clase_Login 
 * - Inicia Sesion.
 * - Verifica los campos.
 * - Retorna error si los datos son incorrectos.
 * - Accede a la página principal.
 */
class LoginController
{
    private string $username;
    private string $password;
    private string $accion;
    public string $error = '';
    public function __construct()
    {
        $this->accion = Text::postAsignar('accion');
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
                (Text::verify($this->password, $contrasenaHash))
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
        if (Text::post('username') && Text::post('password')) { // Verifica si tienen un valor devuele TRUE
            $this->username = Text::postAsignar('username');
            $this->password = Text::postAsignar('password');
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
    public function errorLogin(string $string)
    {
        $this->error = $string;
    }

    private function ejecutarAccion()
    {
        switch ($this->accion) {
            case 'iniciar-sesion':
                $this->logear();
                break;
            default:
                # code...
                break;
        }
    }
}
if (Text::post('accion')) {
    $login = new LoginController;
}
if (!empty($login->error)) {
    var_dump($login->error);
    die();
}
