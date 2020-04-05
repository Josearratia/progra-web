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
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Mi perfil</title>
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
                <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>
            </div>

            <nav class="nav-menu d-none d-lg-block">
                <ul class="nav-inner">
                    <li class="active"><a href="dashboard.php">Home</a></li>
                    <li class="active"><a href="Miperfil.php">Mi perfil</a></li>
                    <li class="nav-logo"><a href="index.php"><img src="assets/img/xbox-control-menu.png" alt="" class="img-fluid"></a></li>
                    <li class="active"><a href="/forms/logout.php">Exit</a></li>
                </ul>
            </nav><!-- .nav-menu -->
        </div>
    </header>

    <h1 class="m-5">Bienvenido <?php echo $user->getnickname(); ?></h1>
    <section id="" class="login section-bg">
        <div class="containe ">
            
            <div class="row justify-content-center h-100">
                <div class="col-lg-8 mt-5 mt-lg-0">
                    <div class="col-sm-12 align-self-center text-center">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="row justify-content-center h-100">
                                    <div class="col-lg-8 mt-5 mt-lg-0">
                                        <form action="forms/upload.php" method="post" role="form" class="php-email-form" enctype="multipart/form-data" data-aos="fade-down-left">
                                            <div class="form-row justify-content-center">
                                                <div class="col-md-6 form-group">
                                                    <h3>Subir Imagen</h3>
                                                    <input type="file" class="form-control" name="mp" id="mipp" placeholder="Imagen" data-rule="required" data-msg="Por favor  ingrese una imagen valida"/>
                                                    <div class="validate"></div>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <div class="loading">Loading</div>
                                                <div class="okey-message"></div>
                                                <div class="error-message"></div>
                                            </div>
                                            <div class="text-center"><button type="submit">Subir Imagen</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->


    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validateimg.js"></script> 
    <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>