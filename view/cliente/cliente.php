<?php
require '/opt/lampp/htdocs/project-php/Controllers/render.php';
render('header', ['view', 'html']);
render('nav', ['view', 'html']);
?>
<div class="container m-5 w-75 row">
    <div class="">
        <form action="../../Controllers/ClienteController.php" method="POST" class="row d-flex">
            <div class="col-5">
                <h3 class="h3">Datos del Cliente</h3>
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
            <div class="d-flex flex-row gap-3 ">
                <button type="submit" class="btn btn-primary" name="accion" value="registrar-cliente">Registrar</button>
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