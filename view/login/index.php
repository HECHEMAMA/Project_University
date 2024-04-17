<?php include "/opt/lampp/htdocs/tienda_botimendo/view/html/header.php"; ?>

<body class="bg-gradient-light">
    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <!-- IMAGEN DEL PERRO -->
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
                                    </div>
                                    <form action="../../Controllers/UsuarioController.php" method="post" class="user">
                                        <div class="form-group">
                                            <input type="text" name="username" class="form-control form-control-user" id="username" placeholder="Username">
                                            <div class="invalid-feedback" id="usernameError"></div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user" id="Password" placeholder="Password">
                                            <div class="invalid-feedback" id="passwordError"></div>
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
                                        <input type="text" name="accion" value="iniciar-sesion" hidden>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>
                                        <!-- PARA ACTUALIZACION INICIAR CON GOOGLE O FACEBOOK -->
                                        <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
                                    </form>
                                    <hr>
                                    <!-- IMPLEMENTAR PASSWORD CUANDO SE OLVIDA -->
                                    <div class="text-center">
                                        <a class="small" href="#">Olvidó la contraseña?</a>
                                    </div>
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
</body>
<script src="../js/validacion.js"></script>
<?php include "../html/footer.php"; ?>