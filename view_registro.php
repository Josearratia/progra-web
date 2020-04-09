<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Gaming Center</title>
    <meta content="" name="descriptison">
    <meta content="Gaming Center" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/animation.css" rel="stylesheet">


</head>

<body id="main">
    <!-- ======= Header ======= -->
    <header id="mainheader" class="d-flex align-items-center">
        <div class="container">

            <!-- The main logo is shown in mobile version only. The centered nav-logo in nav menu is displayed in desktop view  -->
            <div class="logo d-block d-lg-none">
                <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul class="nav-inner">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li class="nav-logo"><a href="index.php"><img src="assets/img/xbox-control-menu.png" alt="" class="img-fluid"></a></li>
                    <li><a href="login.php">Iniciar sesión</a></li>
                </ul>
            </nav><!-- .nav-menu -->
        </div>
    </header>


    <!-- ======= Contact Section ======= -->
    <section id="" class="login section-bg">
        <div class="containe ">

            <div class="section-title">
                <h2>Registro de usuario</h2>
            </div>

            <div class="row justify-content-center h-100">
                <div class="col-lg-8 mt-5 mt-lg-0">
                    <form action="registro.php" method="post" role="form" class="php-email-form" data-aos="fade-down-left">


                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <input type="text" name="codigo" class="form-control" id="code_invitado" placeholder="Codigo de invitado" />
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <input type="text" name="user" class="form-control" id="user" placeholder="Usuario*" data-rule="minlen:4" data-msg="Por favor introduzca un usuario valido" />
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <input type="password" class="form-control" name="password" id="pass" placeholder="Contraseña*" data-rule="pass:8" data-msg="Por favor introduzca una contraseña valida mayor a 8 digitos" />
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <input type="password" class="form-control" name="password_validar" id="pass_valider" placeholder="Confirma Contraseña*" data-rule="conf_pass" data-msg="Las contraseñas que ingreso no son iguales" />
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" name="Nombre" id="name_user" placeholder="Nombre*" data-rule="pass:1" data-msg="Por favor introduzca una contraseña valida" />
                                <div class="validate"></div>
                            </div>
                        </div>



                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" name="Apellido" id="Apellido_usuario" placeholder="Apellido(s)" data-rule="pass:3" data-msg="Por favor introduzca una apellido o apellidos valido(s)" />
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <input type="text" class="form-control" name="nickname" id="nickname" placeholder="Apodo de jugador (Nickname)" />
                                <div class="validate"></div>
                            </div>
                        </div>



                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <input type="date" class="form-control" name="FechaN" id="FechaN_usuario" placeholder="FechaN_usuario" data-rule="fecha" data-msg="Por favor introduzca una fecha de nacimiento valida" />
                                <div class="validate"></div>
                            </div>


                        </div>
                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <select class="form-control" name="sexo">
                                    <option value="Hombre">Hombre</option>
                                    <option value="Mujer">Mujer</option>
                                    <option value="No especificar">No especificar</option>
                                </select>
                                <div class="validate"></div>
                            </div>

                        </div>

                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <input type="email" class="form-control" name="Correo_electronico" id="Correo_electronico" placeholder="Correo electronico*" data-rule="email" data-msg="Por favor introduzca una correo electronico valido" />
                                <div class="validate"></div>
                            </div>


                        </div>
                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <input type="tel" class="form-control" name="Telefono" id="Telefono_usuario" placeholder="Telefono ej. 8341005001" pattern="[0-9]{3}[0-9]{3}[0-9]{4}"/>
                            </div>

                        </div>

                        <div class="mb-3">
                            <div class="loading">Loading</div>
                            <div class="okey-message"></div>
                            <div class="error-message"></div>
                        </div>
                        <div class="text-center"><button type="submit">Registrarse</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->


    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate_regist.js"></script>
    <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>