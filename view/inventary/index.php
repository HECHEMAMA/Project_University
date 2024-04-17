<?php
include "/opt/lampp/htdocs/tienda_botimendo/view/html/header.php";
include "/opt/lampp/htdocs/tienda_botimendo/view/html/nav.php";
require "/opt/lampp/htdocs/tienda_botimendo/Controllers/ProductoController.php";
?>
<div class="container py-5 d-flex flex-column">
    <div class="row d-flex text-left">
        <h1 class="h1">Inventario</h1>
    </div>
    <div class="row mt-4 d-flex flex-row flex-nowrap justify-content-around">
        <a href="createProducto.php" class="btn btn-primary" style="white-space: nowrap; width:auto;">Registrar Producto</a>
        <div class="input-group w-50 flex-grow-1">
            <input type="search" class="form-control" placeholder="Buscar Producto">
            <button class="btn btn-primary" type="submit"><i class="bi-search"></i> Buscar</button>
        </div>
    </div>
    <?= ProductoController::mostrarProducto() ?>
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Distribuidora & Comercializadora 2024</span>
            </div>
        </div>
    </footer>
</div>
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>
</div>
<?php include_once "/opt/lampp/htdocs/tienda_botimendo/view/html/footer.php" ?>