<?php

include_once 'forms/user.php';
include_once 'forms/Session.php';

$userSession = new UserSession();
$user = new login();

if (isset($_SESSION['user'])) {
    $user->setUserAndfk($userSession->getCurrentUser());

    if ($user->getborrado() === 1) {
        include_once 'info.php';
        return;
    }
} else {
    include_once 'index.php';
}
include_once 'forms/imgp.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Dashboard</title>
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

<body>
    <!-- ======= Header ======= -->
    <header id="mainheader" class="d-flex align-items-center">
        <div class="container">

            <!-- The main logo is shown in mobile version only. The centered nav-logo in nav menu is displayed in desktop view  -->
            <div class="logo d-block d-lg-none">
                <a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
                <img src="<?php echo $finalruta; ?>" alt="Avatar" class="img-fluid avatar">
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul class="nav-inner">
                    <!-- <li class="active"><a href="dashboard.php">Inicio</a></li> -->
                    <li class="active"><a href="Miperfil.php">Mi perfil</a></li>
                    <?php if ($user->getrol() != 2) {
                        echo '<li class="active"><a href="admin.php">Administracion</a></li>';
                    } ?>
                    <li class="nav-logo"><a href="index.php"><img src="assets/img/xbox-control-menu.png" alt="" class="img-fluid"></a></li>
                    <!-- <li class="active"><a href="referidos.php">Referidos</a></li> -->
                    <li class="active"><a href="/forms/logout.php">Cerrar Sesión</a></li>

                </ul>
            </nav><!-- .nav-menu -->
        </div>
        <h6 style="margin-right: 1em;">Monedas: <?php echo $user->getuserpoints(); ?></h6>
        <div class="nav-pp">
            <img src="<?php echo $finalruta; ?>" alt="Avatar" class="avatar">
        </div>
    </header>

    <!-- endheader -->

    <div class="row justify-content-center h-100">
        <div class="col-lg-8 mt-5 mt-lg-0">
            <div class="col-sm-12 align-self-center text-center">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="m-5">Bienvenido <?php echo $user->getnickname(); ?></h1>

                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="row justify-content-center h-100">
        <div class="col-lg-8 mt-5 mt-lg-0">
            <div class="col-sm-12 align-self-center text-center">
                <div class="card shadow">
                    <div class="card-body">
                        <h1>Referidos</h1>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Borrar</th> <!-- Borrado -->
                                        <th scope="col">Codigo de usuario</th> <!-- Codigo_usuario -->
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>