<?php
include_once '/opt/lampp/htdocs/project-php/Controllers/ProveedorController.php';
require_once '/opt/lampp/htdocs/project-php/view/html/header.php';
require_once '/opt/lampp/htdocs/project-php/view/html/nav.php';

$proveedor = (ProveedorController::datosProveedor($_GET['id']));

//  -> FALTA ACTUALIZAR EN LA BASE DE DATOS
?>
<div class="container w-100 py-5 d-flex flex-column">
    <h2>Editar Proveedor: <b class="text-primary-emphasis"><?= $proveedor[0]['nombre_proveedor'] ?></b></h2>
    <form action="" method="post" class="d-flex flex-column w-50">
        <input type="hidden" class="form-control" name="id" id="id" value="<?= $proveedor[0]['id'] ?>" placeholder="">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="nombre" id="nombre" value="<?= $proveedor[0]['nombre_proveedor'] ?>" placeholder="" />
            <label for="nombre">Nombre</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="telefono" id="telefono" value="<?= $proveedor[0]['telefono_proveedor'] ?>" placeholder="" />
            <label for="telefono">telefono</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" name="ubicacion" id="ubicacion" value="<?= $proveedor[0]['ubicacion_proveedor'] ?>" placeholder="" />
            <label for="ubicacion">Ubicación</label>
        </div>
        <div class="d-flex flex-row gap-3">
            <button type="submit" name="accion" value="modificar-proveedor" class="btn btn-primary">Guardar Cambios</button>
            <a href="index.php" class="btn btn-dark">Cancelar</a>
        </div>
    </form>
</div>