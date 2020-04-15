<?php

include_once '../forms/user.php';
include_once '../forms/roles.php';
include_once '../forms/Session.php';
include_once '../forms/torneos.php';

$userSession = new UserSession();
$rolesaccess = new roles;
$torneo = new torneos;
$user = new login();

if (isset($_SESSION['user'])) {
    $user->setUserAndfk($userSession->getCurrentUser());
    $rolesaccess->setUserrolaccess($user->getuserid());
    if ($user->getborrado() === 1) {
        header("location: ../info.php");
        return;
    }

    if($rolesaccess->getrolaccess_addjuegos() === 0){
        header("location: ../dashboard.php");
        return;
    }

    if ($rolesaccess->getrolaccess_eliminarusuarios() === 0) {
        header("location: ../admin.php");
        return;
    }
} else {
    header("location: ../index.php");
}
include_once '../forms/imgp.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Gaming Center</title>
    <meta content="" name="descriptison">
    <meta content="Gaming Center" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="../assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/animation.css" rel="stylesheet">


</head>

<body id="main">

    <header id="mainheader" class="d-flex align-items-center">
        <div class="container">

            <!-- The main logo is shown in mobile version only. The centered nav-logo in nav menu is displayed in desktop view  -->
            <div class="logo d-block d-lg-none">
                <a href="../index.php"><img src="../assets/img/logo.png" alt="" class="img-fluid"></a>
                <img src="<?php echo $finalruta; ?>" alt="Avatar" class="img-fluid avatar">
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul class="nav-inner">
                    <li class="active"><a href="../dashboard.php">Inicio</a></li>
                    <li class="active"><a href="../Miperfil.php">Mi perfil</a></li>
                    <?php if ($user->getrol() != 2) {
                        echo '<li class="active"><a href="../admin.php">Administracion</a></li>';
                    } ?>
                    <li class="nav-logo"><a href="../index.php"><img src="../assets/img/xbox-control-menu.png" alt="" class="img-fluid"></a></li>
                    <li class="active"><a href="../renta.php">Renta (BETA)</a></li>
                    <li class="active"><a href="../referidos.php">Referidos</a></li>
                    <li class="active"><a href="../forms/logout.php">Cerrar Sesión</a></li>

                </ul>
            </nav><!-- .nav-menu -->
        </div>
        <h6 style="margin-right: 1em;">Monedas: <?php echo $user->getuserpoints(); ?></h6>
        <div class="nav-pp">
            <img src="<?php echo $finalruta; ?>" alt="Avatar" class="avatar">
        </div>
    </header>

    <div class="menuleft">
        <nav>
            <ul>
                <li><a href="../usuarios/eliminar.php">Usuarios</a></li>
                <li><a href="../roles/modificarrol.php">Roles</a></li>
                <li><a href="../consolas/modificar.php">Consolas</a></li>
                <li><a href="../juegos/modificar.php">Juegos</a></li>
                <li><a href="../torneos/modificar.php">Torneos</a></li>
                <li><a href="../dulceria/modificar.php">Dulceria</a></li>
                <li><a href="../promociones/view_promociones.php">Promociones</a></li>
            </ul>
        </nav>
    </div>


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
                                <h6>Ingresa un codigo de invitado si cuentas con uno: </h6>
                                <input type="text" name="codigo" class="form-control" id="code_invitado" placeholder="Codigo de invitado (No requerido)" />
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <h6>Nombre de usuario:</h6>
                                <input type="text" name="user" class="form-control" id="user" placeholder="Usuario*" data-rule="minlen:4" data-msg="Por favor introduzca un usuario valido" />
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <h6>Contraseña:</h6>
                                <input type="password" class="form-control" name="password" id="pass" placeholder="Contraseña*" data-rule="pass:8" data-msg="Por favor introduzca una contraseña valida mayor a 8 digitos" />
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <h6>Confirma tu contraseña:</h6>
                                <input type="password" class="form-control" name="password_validar" id="pass_valider" placeholder="Confirma Contraseña*" data-rule="conf_pass" data-msg="Las contraseñas que ingreso no son iguales" />
                                <div class="validate"></div>
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <h6>Nombre:</h6>
                                <input type="text" class="form-control" name="Nombre" id="name_user" placeholder="Nombre*" data-rule="pass:1" data-msg="Por favor introduzca una contraseña valida" />
                                <div class="validate"></div>
                            </div>
                        </div>



                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <h6>Apellido:</h6>
                                <input type="text" class="form-control" name="Apellido" id="Apellido_usuario" placeholder="Apellido(s)" data-rule="pass:3" data-msg="Por favor introduzca una apellido o apellidos valido(s)" />
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <h6>Nickname en videojuegos:</h6>
                                <input type="text" class="form-control" name="nickname" id="nickname" placeholder="Apodo de jugador (Nickname)" />
                                <div class="validate"></div>
                            </div>
                        </div>



                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <h6>Fecha de nacimiento:</h6>
                                <input type="date" class="form-control" name="FechaN" id="FechaN_usuario" placeholder="FechaN_usuario" data-rule="fecha" data-msg="Por favor introduzca una fecha de nacimiento valida" />
                                <div class="validate"></div>
                            </div>


                        </div>
                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <h6>Sexo: </h6>
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
                                <h6>Correo: </h6>
                                <input type="email" class="form-control" name="Correo_electronico" id="Correo_electronico" placeholder="Correo electronico*" data-rule="email" data-msg="Por favor introduzca una correo electronico valido" />
                                <div class="validate"></div>
                            </div>


                        </div>
                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <h6>Telefono: </h6>
                                <input type="tel" class="form-control" name="Telefono" id="Telefono_usuario" placeholder="Telefono ej. 8341005001" pattern="[0-9]{3}[0-9]{3}[0-9]{4}" />
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
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate_regist.js"></script>
    <script src="../assets/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="../assets/vendor/venobox/venobox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>