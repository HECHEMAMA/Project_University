<?php
include_once "/opt/lampp/htdocs/project-php/view/html/header.php";
include_once "/opt/lampp/htdocs/project-php/view/html/nav.php";
require_once "/opt/lampp/htdocs/project-php/Controllers/ProveedorController.php";
?>
<div class="container m-5 col">
    <form action="../../Controllers/ProveedorController.php" method="POST" enctype="multipart/form-data" id="formulario" class="needs-validation row">
        <h3 class="h3 my-5">Datos del Proveedor</h3>
        <div class="w-50">
            <div class="form-floating mb-3" id="grupo_nombre">
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" />
                <label for="nombre">Nombre</label>
                <div class="invalid-feedback" id="nombreError"></div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="direccion" id="direccion" placeholder="" />
                <label for="direccion">Dirección</label>
                <div class="invalid-feedback" id="direccionError"></div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="telefono" id="telefono" placeholder="" />
                <label for="telefono">Teléfono</label>
                <div class="invalid-feedback" id="telefonoError"></div>
            </div>
            <input type="text" name="accion" value="registrar-proveedor" hidden>
            <div class="row d-flex justify-content-center align-items-center">
                <button type="submit" class="btn btn-primary" style="width: 150px;">Registrar</button>
            </div>
    </form>
    <!-- <div>
        <?= ProveedorController::mostrarProveedorSection() ?>
    </div> -->
</div>
<?php require "/opt/lampp/htdocs/project-php/view/html/footer.php"; ?>