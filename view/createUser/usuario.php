<?php
require '../../Controllers/UsuarioController.php';
render('header', ['view', 'html']);
render('nav', ['view', 'html']);
?>
<div class="container p-5 d-flex flex-column">
    <h2 class="h2">Empleados Registrados</h2>
    <a href="./index.php" class="btn btn-primary my-5" style="white-space: nowrap; width: 10rem;">Nuevo Empleado</a>
    <?= UsuarioController::mostrarUsuarios() ?>
</div>

<?php
render('footer', ['view', 'html']);
?>