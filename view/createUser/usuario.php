<?php
include_once "/opt/lampp/htdocs/project-php/view/html/header.php";
include_once "/opt/lampp/htdocs/project-php/view/html/nav.php";
include_once "/opt/lampp/htdocs/project-php/Controllers/UsuarioController.php";
?>
<div class="container p-5 d-flex flex-column">
    <h2 class="h2">Empleados Registrados</h2>
    <a href="./index.php" class="btn btn-primary my-5" style="white-space: nowrap; width: 10rem;">Nuevo Empleado</a>
    <?= UsuarioController::mostrarUsuarios() ?>
</div>

<?php
include "/opt/lampp/htdocs/project-php/view/html/footer.php";
?>