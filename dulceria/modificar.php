<?php

include_once '../forms/user.php';
include_once '../forms/roles.php';
include_once '../forms/Session.php';
include_once '../forms/dulceria.php';

$userSession = new UserSession();
$user = new login();
$rolesaccess = new roles;
$dulceria = new dulceria;

if (isset($_SESSION['user'])) {
    $user->setUserAndfk($userSession->getCurrentUser());
    $rolesaccess->setUserrolaccess($user->getuserid());
    if ($user->getborrado() === 1) {
        header("location: ../info.php");
        return;
    }

    if (
        $rolesaccess->getrolaccess_adddulceria() === 0
        && $rolesaccess->getrolaccess_modificardulceria() == 0
        && $rolesaccess->getrolaccess_deletdulceria() === 0
    ) {
        header("location: ../dashboard.php");
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

    <title>Dulceria</title>
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
                    
                    <li class="active"><a href="../venta.php">Venta Dulceria (BETA)</a></li>
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
                <h2>Dulceria</h2>
                <?php if ($rolesaccess->getrolaccess_adddulceria() === 1) {
                    echo '<a href="agregar.php">
                    <input type="button" class="btn btn-primary" value="Agregar">
                </a>';
                }
                ?>
            </div>
            <div class="row justify-content-center h-100">

                <div class="col-lg-8 mt-5 mt-lg-0">

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>

                                <th scope="col">Nombre</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Costo</th>
                                <?php if ($rolesaccess->getrolaccess_modificardulceria() == 1) {
                                    echo '<th scope="col">Editar</th>';
                                } ?>

                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $consulta = $dulceria->getall();
                            $i = 0;
                            if ($consulta->rowCount() > 0) {
                                while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                    $i += 1;
                                    echo "<tr>";
                                    echo '<th scope="row">' . $i . '</th>';




                                    echo '<td>' . $row['Nombre_producto'] . '</td>';
                                    echo '<td>' . $row['cantidad_Stock'] . '</td>';
                                    echo '<td>' . $row['Costo_producto'] . '</td>';
                                    if ($rolesaccess->getrolaccess_modificardulceria() == 1) {
                                        echo '<td>
                                        <form action="../dulceria/modificar_con.php" method="post" role="form" id="modificar">
                                        <input name="id" type="hidden" value="' . $row['id_producto'] . '">
                                        <input type="submit" class="btn btn-primary" value="Modificar">
                                        </form>
                                        </td>';
                                    }


                                    if ($rolesaccess->getrolaccess_deletdulceria() == 1) {

                                        echo '<td>
                                    <form action="../forms/eliminardulceria.php" method="post" role="form" id="eliminar">
                                    <input name="id" type="hidden" value="' . $row['id_producto'] . '">
                                    <input type="submit" class="btn btn-danger" value="Eliminar">
                                    </form>
                                    </td>';
                                    }
                                    echo '</tr>';
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section><!-- End Contact Section -->


    <!-- Vendor JS Files -->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="../assets/vendor/php-email-form/promociones-form.js"></script>
    <script src="../assets/vendor/php-email-form/eliminado.js"></script>
    <script src="../assets/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="../assets/vendor/venobox/venobox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>

</body>

</html>