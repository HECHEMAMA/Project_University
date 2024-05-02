<?php
require_once '/opt/lampp/htdocs/project-php/Controllers/UsuarioController.php';
require_once '/opt/lampp/htdocs/project-php/view/html/header.php';
require_once '/opt/lampp/htdocs/project-php/view/html/nav.php';
// render('header', ['view', 'html']);
// render('nav', ['view', 'html']);
?>
<div class="container p-5 d-flex flex-column">
    <div>
        <h1 class="h1">Empleados</h1>
    </div>
    <div class="d-flex justify-content-end">
        <?= UsuarioController::error() ?>
    </div>
    <a href="./usuario.php" class="btn btn-primary my-5" style="white-space: nowrap; width: 10rem;">Nuevo Empleado</a>
    <?= UsuarioController::mostrarUsuarios() ?>
</div>
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
<?php require '/opt/lampp/htdocs/project-php/view/html/footer.php' ?>