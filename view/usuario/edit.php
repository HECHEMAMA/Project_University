<?php
include_once '/opt/lampp/htdocs/project-php/Controllers/UsuarioController.php';
require_once '/opt/lampp/htdocs/project-php/view/html/header.php';
require_once '/opt/lampp/htdocs/project-php/view/html/nav.php';

$empleado = (UsuarioController::datosEmpleado($_GET['id']));
?>
<div class="container w-100 py-5 d-flex flex-column">
    <h2>Editar el empleado</h2>
    <form action="../../Controllers/UsuarioController.php" method="post" class="row">
        <div class="col">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="cedula" id="cedula" value="<?= $empleado[0]['id'] ?>" placeholder="" />
                <label for="cedula">Cédula</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $empleado[0]['nombre'] ?>" placeholder="" />
                <label for="nombre">Nombre</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="apellido" id="apellido" value="<?= $empleado[0]['apellido'] ?>" placeholder="" />
                <label for="apellido">Apellido</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="telefono" id="telefono" value="<?= $empleado[0]['telefono'] ?>" placeholder="" />
                <label for="telefono">Teléfono</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="direccion" id="direccion" value="<?= $empleado[0]['direccion'] ?>" placeholder="" />
                <label for="direccion">Dirección</label>
            </div>
        </div>
        <div class="col">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="username" id="username" value="<?= $empleado[0]['usuario'] ?>" placeholder="">
                <label for="username">Nombre de Usuario</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password" id="password" value="" placeholder="">
                <label for="password">Contraseña</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" name="password2" id="password2" value="" placeholder="">
                <label for="password2">Confirmar Contraseña</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="rol" id="rol" value="<?= $empleado[0]['tipo_rol'] ?>">
                <label for="rol">Cargo</label>
            </div>
        </div>
        <div class="d-flex flex-row justify-content-start gap-3">
            <button type="submit" name="accion" value="modificar-usuario" class="btn btn-primary">Guardar Cambios</button>
            <a href="index.php" class="btn btn-dark">Cancelar</a>
        </div>
    </form>
</div>