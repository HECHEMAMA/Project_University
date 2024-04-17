<?php
include_once "/opt/lampp/htdocs/tienda_botimendo/view/html/header.php";
include_once "/opt/lampp/htdocs/tienda_botimendo/view/html/nav.php";
include_once "/opt/lampp/htdocs/tienda_botimendo/Controllers/UsuarioController.php";


$header =  [
    "Nombre",
    "Apellido",
    "Usuario"
];
$sql = 'SELECT `nombre`, `apellido`,`usuario` FROM Empleado INNER JOIN Usuario ON Empleado.fk_usuario = Usuario.cedula';
?>
<div class="container m-5 w-75 row">
    <div class="">
        <form action="../../Controllers/UsuarioController.php" method="POST" class="row d-flex justify-content-center">
            <div class="col-5">
                <h3 class="h3">Datos del Empleado</h3>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" />
                    <label for="nombre">Nombre</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="apellido" id="apellido" placeholder="" />
                    <label for="apellido">Apellido</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="cedula" id="cedula" placeholder="" />
                    <label for="cedula">Cedula</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="telefono" id="telefono" placeholder="" />
                    <label for="telefono">Teléfono</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" name="direccion" id="direccion" placeholder="" />
                    <label for="direccion">Dirección</label>
                </div>
            </div>
            <div class="col">
                <h3 class="h3">Datos para Iniciar Sesion</h3>
                <div class="form-group">
                    <label for="exampleInputUsername">Nombre de Usuario</label>
                    <input type="username" name="username" class="form-control" id="exampleInputUsername" aria-describedby="usernameHelp">
                    <div class="invalid-feedback" id="usuarioError"></div>
                    <!-- <small id="usernameHelp" class="form-text text-muted">El nombre de usuario tiene que ser unico.</small> -->
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="password" name="password" class="form-control" id="password">
                </div>
                <div class="form-group">
                    <label for="password2">Repita Constraseña</label>
                    <input type="password" name="password2" class="form-control" id="password2">
                    <div class="invalid-feedback" id="password2Error"></div>
                </div>
                <div class="form-group">
                    <label for="select">Seleccione el rol</label>
                    <select name="rol" id="select" class="form-select">
                        <option value="" class="active disable">-- Selecciona el Rol de la Persona --</option>
                        <option value="2">Administrador</option>
                        <option value="3">Empleado</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputImage">Foto (optional)</label>
                    <input type="file" name="file" class="form-control-file" id="exampleInputImage">
                </div>
                <input type="text" name="accion" value="crear-usuario" id="" hidden>
            </div>
            <button type="submit" class="btn btn-primary w-50">Registrar</button>
        </form>
    </div>
    <div class="col py-5">
    </div>
</div>
<?php
include_once "/opt/lampp/htdocs/tienda_botimendo/view/html/footer.php";
?>