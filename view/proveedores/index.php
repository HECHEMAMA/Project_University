<?php
include_once "/opt/lampp/htdocs/project-php/view/html/header.php";
include_once "/opt/lampp/htdocs/project-php/view/html/nav.php";
include_once "/opt/lampp/htdocs/project-php/Controllers/ProveedorController.php";

?>
<div class="container py-5 d-flex flex-column">
    <div class="row d-flex text-left">
        <h1 class="h1">Proveedores</h1>
    </div>
    <div class="row mt-4 mb-5 d-flex flex-nowrap justify-content-start">
        <a href="createProveedor.php" class="btn btn-primary" style="white-space: nowrap; width:auto;">Registrar Proveedor</a>
        <!-- <div class="input-group w-50 flex-grow-1">
            <input type="search" class="form-control" placeholder="Buscar Producto">
            <button class="btn btn-primary" type="submit"><i class="bi-search"></i> Buscar</button>
        </div> -->
    </div>
    <?= ProveedorController::mostrarProveedores() ?>
    <footer class="sticky-footer position-absolute bottom-0 bg-white">
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
<script>
    var tabla = document.querySelector('#tabla');
    console.log(tabla)
    new DataTable(tabla, {
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, 'All']
        ],
        dom: 'Bfrtip', // Add 'B' (print button) to the DOM definition
        buttons: [
            'excel', 'pdf',
            {
                extend: 'print', // Use the print button type from Buttons extension
                text: 'Imprimir' // Set button text in Spanish
            }
        ],
        "loadingRecords": "Buscando...",
        'zeroRecords': 'No se encontro ninguna persona con ese nombre.',
    })
    table.buttons().container()
        .appendTo($('.col-sm-6:eq(0)', table.table().container()));
</script>
<?php include_once "/opt/lampp/htdocs/project-php/view/html/footer.php" ?>