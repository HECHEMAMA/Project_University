<?php
session_start();
if (empty($_SESSION)) {
    header('Location: ../login/index.php');
}
?>

<body id="page-top">
    <!-- Sidebar -->
    <div id="wrapper">

        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../home/index.php">
                <!-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div> -->
                <div class="sidebar-brand-text mx-3">BOTIMENDO <!-- <sup></sup> --></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0" />
            <div class="sidebar-heading text-light"><?= $_SESSION['rol'] ?></div>
            <div class="text text-center text-light">
                <h4 class="h4"><b><?= $_SESSION['nombre'] . ' ' . $_SESSION['apellido'] ?></b> </h4>
            </div>
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
                <a class="nav-link" href="../vender/index.php"><i class="bi bi-cart4"></i><span>Vender</span></a>
            </li>
            <!-- Inventario -->
            <li class="nav-item">
                <a class="nav-link" href="../inventario/index.php"><i class="bi bi-stack"></i><span>Inventario</span></a>
            </li>
            <!-- Proveedores -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="../proveedores/index.php"><i class="bi bi-person-rolodex"></i><span>Proveedores</span></a>
            </li> -->
            <!-- Clientes -->
            <li class="nav-item">
                <a href="../cliente/index.php" class="nav-link"><i class="bi bi-person"></i><span>Clientes</span></a>
            </li>
            <!-- Heading -->
            <!-- <div class="sidebar-heading mt-3">Administración</div> -->
            <!-- Nav Item - Pages Collapse Menu -->
            <!-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Personal</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Datos</h6>
                        <a class="collapse-item" href="../createUser/index.php">Crear Nuevo Usuario</a> 
                        <a class="collapse-item" href="../usuario/index.php">Empleados</a>
                        <a class="collapse-item" href="../createUser/roles.php">Roles</a>
                    </div>
                </div>
            </li> -->

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
                <a class="nav-link" href="/project-php/view/login/index.php">
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
        <!-- End of Sidebar -->