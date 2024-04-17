<?php
include_once "/opt/lampp/htdocs/project-php/view/html/header.php";
include_once "/opt/lampp/htdocs/project-php/view/html/nav.php";
require_once "/opt/lampp/htdocs/project-php/Controllers/ProductoController.php";
?>
<div class="container m-5 w-75 row d-flex flex-column">
    <form action="../../Controllers/ProveedorController.php" method="POST" enctype="multipart/form-data" id="formulario" class="d-flex needs-validation row">
        <h3 class="h3 my-5">Datos del Proveedor</h3>
        <div class="col-7">
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
            <!-- <div class=" ml-5 col-5">
                <h3>Codigo de Productos</h3>
            </div> -->
            <input type="text" name="accion" value="registrar-proveedor" hidden>
            <div class="row d-flex justify-content-center align-items-center">
                <button type="submit" class="btn btn-primary" style="width: 150px;">Registrar</button>
            </div>
    </form>
</div>
<?php require "/opt/lampp/htdocs/project-php/html/footer.php"; ?>