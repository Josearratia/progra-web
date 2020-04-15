<?php

include_once 'forms/user.php';
include_once 'forms/Session.php';
include_once 'forms/torneos.php';
include_once 'forms/dulceria.php';

$userSession = new UserSession();
$user = new login();
$torneo = new torneos;
$dulceria = new dulceria;

if (isset($_SESSION['user'])) {
    $user->setUserAndfk($userSession->getCurrentUser());

    if ($user->getborrado() === 1) {
        header("location: ../info.php");
        return;
    }
} else {
    header("location: ../index.php");
}
include_once 'forms/imgp.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Tienda</title>
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

    <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>

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
                    <li class="active"><a href="referidos.php">Referidos</a></li>

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
                        <h1 id="titulo">Orden De Venta</h1>
                        <div class="articulos" id="articulos">
                            <label for="productos">Producto:</label>
                            <select id="productos" name="productos">
                                <?php
                                $consulta = $dulceria->getall();
                                $i = 0;
                                if ($consulta->rowCount() > 0) {
                                    while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                        if ($row['cantidad_Stock'] > 0) {
                                            echo '<option value="' . $row['id_producto'] . '">'   . $row['Nombre_producto'] . '</option>';
                                        }
                                    }
                                }
                                ?>
                            </select>

                            <input type="hidden" id="precio" value="" name="precio">
                            <label for="cantidad">Unidades:</label>
                            <input type="number" id="cantidad" name="cantidad">
                            <input type="button" class="boton" id="botonc" onclick="lista()" value="Agregar">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>

    <script type="text/javascript">
        $(document).ready(function() {
            getprecio();
            $('#productos').change(function(){
                getprecio();
            });

            $('#botonc').click(function(){
                getprecio();
            });
        })
    </script>

    <script type="text/javascript">
        function getprecio() {
            $.ajax({
                type: "POST",
                url: "datos.php",
                data: "id=" + $('#productos').val(),
                success:function(r){
                    $precio = document.getElementById('precio');
                    $precio.value = r;
                }
            });
        }
    </script>

    


    <!-- Vendor JS Files -->
    <script type='text/javascript' src='JavaScript.js'></script>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/venta.js"></script>
    <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>