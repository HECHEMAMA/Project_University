<?php
require 'utils.php';
require_once 'ClienteController.php';
// require_once 'UsuarioController.php';
// require_once 'ProveedorController.php';

// require 'ProveedorController.php';
// require 'ProductoController.php';
$modificacion = new ModificarControllers($_POST['accion'], $_POST['id']);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Custom fonts for this template-->
    <link href="../view/estilos/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet"> -->

    <!-- Referencia para los Estilos Bootstrap 5 -->
    <link rel="stylesheet" href="../view/estilos/bootstrap/css/bootstrap.min.css">
    <!-- Referencia para los Iconos -->
    <link rel="stylesheet" href="../view/estilos/bootstrap/icons/font/bootstrap-icons.min.css">

    <!-- Custom styles for this template-->
    <link href="../view/estilos/css/sb-admin-2.min.css" rel="stylesheet">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botimendo</title>
</head>

<body>

    <body id="page-top">
        <!-- Sidebar -->
        <div id="wrapper">

            <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
                <!-- Sidebar - Brand -->
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../home/index.php">
                    <!-- <div class="sidebar-brand-icon rotate-n-15">
                        <i class="fas fa-laugh-wink"></i>
                    </div> -->
                    <div class="sidebar-brand-text mx-3">BOTIMENDO <sup>2</sup></div>
                </a>

                <!-- Divider -->
                <hr class="sidebar-divider my-0" />

                <!-- Divider -->
                <hr class="sidebar-divider" />


                <!-- Heading -->
                <div class="sidebar-heading">Ventanas</div>

                <!-- Nav Item - Pages Collapse Menu -->
                <!-- <li class="nav-item">
             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                 <i class="fas fa-fw fa-folder"></i>
                 <span>Pages</span>
             </a>
             <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">
                     <h6 class="collapse-header">Login Screens:</h6>
                     <a class="collapse-item" href="login.html">Login</a>
                     <a class="collapse-item" href="register.html">Register</a>
                     <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                     <div class="collapse-divider"></div>
                     <h6 class="collapse-header">Other Pages:</h6>
                     <a class="collapse-item" href="404.html">404 Page</a>
                     <a class="collapse-item" href="blank.html">Blank Page</a>
                 </div>
             </div>
         </li> -->
                <li class="nav-item">
                    <a class="nav-link" href="../home/index.php"><i class="bi bi-house"></i><span>Inicio</span></a>
                </li>
                <!-- Vender -->
                <li class="nav-item">
                    <a class="nav-link" href="../store/index.php"><i class="bi bi-cart4"></i><span>Vender</span></a>
                </li>
                <!-- Inventario -->
                <li class="nav-item">
                    <a class="nav-link" href="../view/inventary/index.php"><i class="bi bi-stack"></i><span>Inventario</span></a>
                </li>
                <!-- Proveedores -->
                <li class="nav-item">
                    <a class="nav-link" href="../view/proveedores/index.php"><i class="bi bi-person-rolodex"></i><span>Proveedores</span></a>
                </li>
                <!-- Clientes -->
                <li class="nav-item">
                    <a href="../view/Client/index.php" class="nav-link"><i class="bi bi-person"></i><span>Clientes</span></a>
                </li>
                <!-- Heading -->
                <div class="sidebar-heading mt-3">Administración</div>

                <!-- Nav Item - Pages Collapse Menu -->
                <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Personal</span>
                    </a>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">
                            <h6 class="collapse-header">Datos</h6>
                            <!-- <a class="collapse-item" href="../createUser/index.php">Crear Nuevo Usuario</a> -->
                            <a class="collapse-item" href="../view/createUser/usuario.php">Empleados</a>
                            <!-- <a class="collapse-item" href="../createUser/roles.php">Roles</a> -->
                        </div>
                    </div>
                </li>

                <!-- PARA ACTUALIZACION UN PANEL DE PERSONALIZACION -->
                <!-- <li class="nav-item">
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                                <i class="fas fa-fw fa-wrench"></i>
                                <span>Utilities</span>
                            </a>
                            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                                <div class="bg-white py-2 collapse-inner rounded">
                                    <h6 class="collapse-header">Custom Utilities:</h6>
                                    <a class="collapse-item" href="utilities-color.html">Colors</a>
                                    <a class="collapse-item" href="utilities-border.html">Borders</a>
                                    <a class="collapse-item" href="utilities-animation.html">Animations</a>
                                    <a class="collapse-item" href="utilities-other.html">Other</a>
                                </div>
                            </div>
                        </li> -->

                <!-- Divider -->
                <hr class="sidebar-divider" />
                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="../login/index.php">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Cerrar Sesion</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block" />

                <!-- Sidebar Toggler (Sidebar) -->
                <div class="text-center d-none d-md-inline">
                    <button class="rounded-circle border-0" id="sidebarToggle"></button>
                </div>
            </ul>
            <?php

            class ModificarControllers
            {
                public $mostrar;
                public function __construct(private $accion, private $id)
                {
                    $this->ejecutarAccion();
                }

                private function getId()
                {
                    return $this->id;
                }
                private function ejecutarAccion()
                {
                    $mostrar = match ($this->accion) {
                        // 'borrar-cliente'   => ClienteController::borrarCliente($this->getId()),
                        // 'editar-cliente'   => ClienteController::formularioEdit($this->getId()),
                        // 'borrar-empleado'  => UsuarioController::borrarEmpleado($this->getId()),
                        // 'editar-empleado'  => UsuarioController::editarEmpleado($this->getId()),
                        // 'borrar-proveedor' => ProveedorController::borrarProveedor($this->getId()),
                        // 'editar-proveedor' => ProveedorController::editarProveedor($this->getId()),
                        // 'borrar-producto'  => ProductoController::borrarProducto($this->getId()),
                        // 'editar-producto'  => ProductoController::editarProducto($this->getId()),
                    };
                }
            }
            ?>
            <script src="../view/estilos/bootstrap/js/bootstrap.bundle.min.js"></script>
            <!-- Bootstrap core JavaScript-->
            <script src="../view/estilos/vendor/jquery/jquery.min.js"></script>
            <script src="../view/estilos/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="../view/estilos/vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="../view/estilos/js/sb-admin-2.min.js"></script>

    </body>

</html>