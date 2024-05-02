<?php
require '/opt/lampp/htdocs/project-php/Controllers/render.php';
render('header', ['view', 'html']);
render('nav', ['view', 'html']);
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
            </div>
            <div class="d-flex flex-row gap-3 justify-content-start">   
                <button type="submit" class="btn btn-primary" name="accion" value="crear-usuario">Registrar</button>
                <a href="index.php" class="btn btn-dark">Cancelar</a>
            </div>
        </form>
    </div>
    <div class="col py-5">
    </div>
</div>
<?php
include_once "/opt/lampp/htdocs/project-php/view/html/footer.php";
?>