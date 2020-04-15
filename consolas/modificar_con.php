<?php
include_once '../forms/user.php';
include_once '../forms/roles.php';
include_once '../forms/Session.php';
include_once '../forms/consolas.php';

$userSession = new UserSession();
$user = new login();
$consola = new consolas;
$rol = new roles;

if (isset($_SESSION['user'])) {
    $user->setUserAndfk($userSession->getCurrentUser());
    $rol->setUserrolaccess($user->getuserid());

    if ($user->getborrado() === 1) {
        header("location: ../info.php");
        return;
    }
    if ($rol->getrolaccess_Modificarconsolas() == 1) {
        if (isset($_POST['id'])) {
            $consola->setconsolas($_POST['id']);
        } else {
            header("location: ../admin.php");
        }
    } else {
        header("location: ../admin.php");
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

    <title>Roles</title>
    <meta content="" name="descriptison">
    <meta content="" name="keywords">

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
    <!-- ======= Header ======= -->
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
                <li><a href="../tarifas/modificar.php">Tarifas</a></li>
                <li><a href="../juegos/modificar.php">Juegos</a></li>
                <li><a href="../torneos/modificar.php">Torneos</a></li>
                <li><a href="../dulceria/modificar.php">Dulceria</a></li>
                <li><a href="../promociones/view_promociones.php">Promociones</a></li>
            </ul>
        </nav>
    </div>


    <!-- ======= Contact Section ======= -->
    <section id="" class="promotion section-bg">
        <div class="containe ">

            <div class="section-title">
                <h2>Modificar Consola</h2>
            </div>
            <div class="row justify-content-center h-100">
                <div class="col-lg-8 mt-5 mt-lg-0">
                    <form action="../forms/modificarconsola.php" method="post" role="form" class="promociones-form" data-aos="fade-down-left">

                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <input type="hidden" name="id" value="<?php echo $consola->getid(); ?>"/>
                                <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" value="<?php echo $consola->getnombre(); ?>" data-rule="required" data-msg="Por favor introduzca un nombre para la consola" />
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripcion" value="<?php echo $consola->getdescripcion(); ?>" data-rule="required" data-msg="Por favor introduzca un descripcion para la consola" />
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <input type="text" name="numero" class="form-control" id="numero" placeholder="Numero de consola" value="<?php echo $consola->getnumero(); ?>" data-rule="required" data-msg="Por favor introduzca un numero de consola" />
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <input type="text" name="serie" class="form-control" id="serie" placeholder="Numero de serie de la consola" value="<?php echo $consola->getserie(); ?>" data-rule="required" data-msg="Por favor introduzca un numero de serie de la consola" />
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <select name="borrado" class="form-control">


                                    <option value="0" <?php if ($consola->getborrado() == 0) {
                                                            echo ' selected';
                                                        } ?>>Activo</option>
                                    <option value="1" <?php if ($consola->getborrado() == 1) {
                                                            echo ' selected';
                                                        } ?>>Eliminado</option>
                                </select>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="loading">Loading</div>
                            <div class="okey-message"></div>
                            <div class="error-message"></div>
                        </div>
                        <div class="text-center"><button type="submit">Guardar</button></div>
                    </form>
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->


    <!-- Vendor JS Files -->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="../assets/vendor/php-email-form/promociones-form.js"></script>
    <script src="../assets/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="../assets/vendor/venobox/venobox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>