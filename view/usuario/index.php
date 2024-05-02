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

<?php require '/opt/lampp/htdocs/project-php/view/html/footer.php' ?>