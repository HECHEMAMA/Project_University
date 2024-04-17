<?php
include_once "/opt/lampp/htdocs/tienda_botimendo/view/html/header.php";
include_once "/opt/lampp/htdocs/tienda_botimendo/view/html/nav.php";
include_once "/opt/lampp/htdocs/tienda_botimendo/Controllers/UsuarioController.php";
?>
<div class="container p-5 d-flex flex-column">
    <h2 class="h2">Empleados Registrados</h2>
    <?= UsuarioController::mostrarUsuarios() ?>
</div>

<?php
include "/opt/lampp/htdocs/tienda_botimendo/view/html/footer.php";
?>