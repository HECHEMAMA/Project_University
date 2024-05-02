<?php
require_once '/opt/lampp/htdocs/project-php/Controllers/ClienteController.php';
include_once '../template/header.php';
include_once '../template/nav.php';
?>
<div class="p-5 d-flex flex-column" id="content-wrapper">
    <div class="row d-flex text-left">
        <h1 class="h1">Clientes</h1>
    </div>
    <div class="row my-5 d-flex flex-row flex-nowrap justify-content-start">
        <a href="cliente.php" class="btn btn-primary" style="white-space: nowrap; width:auto;">Registrar Cliente</a>
        <!-- <div class="input-group w-50 flex-grow-1">
            <input type="search" class="form-control" placeholder="Buscar Producto">
            <button class="btn btn-primary" type="submit"><i class="bi-search"></i> Buscar Cliente</button>
        </div> -->
    </div>

    <?= ClienteController::mostrarClientes() ?>

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

<script>
    var tabla = document.querySelector('#tabla');
    console.log(tabla)
    new DataTable(tabla, {
        dom: 'Bfrtip', // Add 'B' (print button) to the DOM definition
        buttons: [
            'excel', 'pdf',
            {
                extend: 'print', // Use the print button type from Buttons extension
                text: 'Imprimir' // Set button text in Spanish
            }
        ],
        lengthMenu: [
            [5, 10, 25, 50, -1],
            [5, 10, 25, 50, 'All']
        ],
        "loadingRecords": "Buscando...",
        'zeroRecords': 'No se encontro ninguna persona con ese nombre.',
    })
    table.buttons().container()
        .appendTo($('.col-sm-6:eq(0)', table.table().container()));
</script>
<?php
include_once '../template/footer.php';
?>