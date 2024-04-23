<?php
require "../../Controllers/ProductoController.php";
render('header',['view','html']);
render('nav',['view','html']);
?>
<div class="container m-5 w-75 row">
    <form action="../../Controllers/ProductoController.php" method="POST" enctype="multipart/form-data" id="formulario" class="row d-flex justify-content-center align-items-start gap-3 needs-validation">
        <h3 class="h3">Datos del Producto</h3>
        <div class="col-5">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="codigo" id="codigo" placeholder="" />
                <label for="codigo">Codigo</label>
                <div class="invalid-feedback" id="codigoError"></div>
            </div>
            <div class="form-floating mb-3" id="grupo_nombre">
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="" />
                <label for="nombre">Nombre</label>
                <div class="invalid-feedback" id="nombreError"></div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="" />
                <label for="descripcion">Descripción</label>
                <div class="invalid-feedback" id="descripcionError"></div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="precio" id="precio" placeholder="" />
                <label for="precio">Precio</label>
                <div class="invalid-feedback">Debe llenar este campo</div>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="cantidad" id="number" placeholder="" />
                <label for="number">Cantidad</label>
                <div class="invalid-feedback">Debe llenar este campo</div>
            </div>
            <div class="form-group">
                <select name="categoria" id="select" class="form-select">
                    <option value="" class="" placeholder="">-- Categorias --</option>
                    <option value="1">Telas</option>
                    <option value="2">Calzado</option>
                    <option value="3">Pegante</option>
                    <option value="4">Hilos</option>
                </select>
            </div>
        </div>
        <div class="col-5">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="nombreImagen" id="nombreImagen" placeholder="mi_imagen_01" />
                <label for="nombreImagen">Nombre de la Imagen</label>
                <div class="invalid-feedback" id="nombreImagenError">Se admiten _ letras numeros</div>
            </div>
            <div class="form-floating mb-3">
                <input type="file" class="form-control" name="imagen" id="imagen" placeholder="" />
                <label for="imagen">Imagen</label>
                <div class="invalid-feedback" id="imagenError"></div>
            </div>
        </div>
        <!-- <div class=" ml-5 col-5">
                <h3>Codigo de Productos</h3>
            </div> -->
        <input type="text" name="accion" value="registrar-producto" hidden>
        <div class="row d-flex justify-content-center align-items-center">
            <button type="submit" class="btn btn-primary" style="width: 150px;">Registrar</button>
        </div>
    </form>
</div>
<script src="../estilos/js/validarFormulario.js"></script>
<?php include_once "/opt/lampp/htdocs/tienda_botimendo/view/html/footer.php"; ?>