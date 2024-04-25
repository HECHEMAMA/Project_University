<?php
include_once '/opt/lampp/htdocs/project-php/Controllers/ClienteController.php';
require_once '/opt/lampp/htdocs/project-php/view/html/header.php';
require_once '/opt/lampp/htdocs/project-php/view/html/nav.php';

$cliente = (ClienteController::datosCliente($_GET['id']));
?>
<div class="container w-100 py-5 d-flex flex-column">
    <h2>Editar el Cliente</h2>
    <form action="../../Controllers/ClienteController.php" method="post" class="d-flex flex-column w-50">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="cedula" id="cedula" value="<?= $cliente[0]['id'] ?>" placeholder="" />
            <label for="cedula">Cédula</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $cliente[0]['nombre'] ?>" placeholder="" />
            <label for="nombre">Nombre</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="apellido" id="apellido" value="<?= $cliente[0]['apellido'] ?>" placeholder="" />
            <label for="apellido">Apellido</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="telefono" id="telefono" value="<?= $cliente[0]['telefono'] ?>" placeholder="" />
            <label for="telefono">Teléfono</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="direccion" id="direccion" value="<?= $cliente[0]['direccion'] ?>" placeholder="" />
            <label for="direccion">Dirección</label>
        </div>
        <div class="d-flex flex-row gap-3">
            <button type="submit" name="accion" value="modificar-cliente" class="btn btn-primary">Guardar Cambios</button>
            <a href="index.php" class="btn btn-dark">Cancelar</a>
        </div>
    </form>
</div>