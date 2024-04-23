<?php require '/opt/lampp/htdocs/project-php/Controllers/LoginController.php' ?>
<?php render('header', ['view', 'html']) ?>

<body class="bg-gradient-light">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- IMAGEN DE LA TIENDA -->
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
                                    </div>
                                    <form action="../../Controllers/LoginController.php" method="POST" class="user" id="login__formulario">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user" id="username" placeholder="Username">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="Password" placeholder="Password">
                                        </div>

                                        <!-- OPCION PARA RECORDAR USUARIO -->
                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                                </div>
                                        </div> -->
                                        <!-- BOTON DE LOGIN  -->
                                        <?php if (!empty(LoginController::$error) || !isset(LoginController::$error)) : ?>
                                            <?= LoginController::getError() ?>
                                        <?php endif; ?>
                                        <input type="hidden" name="accion" value="iniciar-sesion">
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            iniciar Sesión
                                        </button>
                                        <hr>
                                        <!-- PARA ACTUALIZACIÓN INICIAR CON GOOGLE O FACEBOOK -->
                                        <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
                                    </form>
                                    <hr>
                                    <!-- IMPLEMENTAR PASSWORD CUANDO SE OLVIDA -->
                                    <!-- <div class="text-center">
                                        <a class="small" href="#">Olvidó la contraseña?</a>
                                    </div> -->
                                    <!-- OPCION PARA CREAR USUARIO -->
                                    <!-- <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <script src="../estilos/js/login.js"></script> -->
    <?php render('footer', ['view', 'html']) ?>