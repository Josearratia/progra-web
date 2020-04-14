<?php

include_once 'forms/user.php';
include_once 'forms/roles.php';
include_once 'forms/promociones.php';
include_once 'forms/Session.php';

$userSession = new UserSession();
$user = new login();
$rolesaccess = new roles;
$promo = new promociones();

if (isset($_SESSION['user'])) {
    $user->setUserAndfk($userSession->getCurrentUser());

    if ($user->getborrado() === 1) {
        header("location: ../info.php");
        return;
    }
    $rolesaccess->setUserrolaccess($user->getuserid());

    if (
        $rolesaccess->getrolaccess_addroles() == 0 && $rolesaccess->getrolaccess_asignarroles() === 0 && $rolesaccess->getrolaccess_deletroles() === 0 && $rolesaccess->getrolaccess_modificarroles() === 0
        && $rolesaccess->getrolaccess_addconsolas() == 0 && $rolesaccess->getrolaccess_Modificarconsolas() === 0 && $rolesaccess->getrolaccess_deletconsolas() === 0 && $rolesaccess->getrolaccess_addjuegos() === 0
        && $rolesaccess->getrolaccess_modificarjuegos() == 0  && $rolesaccess->getrolaccess_deletjuegos() === 0 && $rolesaccess->getrolaccess_adddulceria() === 0
        && $rolesaccess->getrolaccess_modificardulceria() == 0 && $rolesaccess->getrolaccess_deletdulceria() === 0 && $rolesaccess->getrolaccess_addtorneo() === 0
        && $rolesaccess->getrolaccess_modificartorneo() == 0 && $rolesaccess->getrolaccess_delettorneo() == 0 &&
        $rolesaccess->getrolaccess_eliminarusuarios()  == 0 && $rolesaccess->getrolaccess_modificarpromociones()  == 0
    ) {
        header("location: ../dashboard.php");
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

    <title>Administración</title>
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

                    <li class="active"><a href="dashboard.php">Inicio</a></li>
                    <li class="active"><a href="Miperfil.php">Mi perfil</a></li>
                    <li class="nav-logo"><a href="index.php"><img src="assets/img/xbox-control-menu.png" alt="" class="img-fluid"></a></li>
                    <li class="active"><a href="referidos.php">Referidos</a></li>
                    <li class="active"><a href="renta.php">Renta (BETA)</a></li>
                    <li class="active"><a href="/forms/logout.php">Cerrar Sesión</a></li>

                </ul>
            </nav><!-- .nav-menu -->
        </div>
        <h6 style="margin-right: 1em;">Monedas: <?php echo $user->getuserpoints(); ?></h6>
        <div class="nav-pp">
            <img src="<?php echo $finalruta; ?>" alt="Avatar" class="avatar">
        </div>
    </header>


    <div class="row justify-content-center h-100">
        <div class="col-lg-8 mt-5 mt-lg-0">
            <div class="col-sm-12 align-self-center text-center">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="m-5">Administración</h1>
                        <h4>Rol: <?php echo $rolesaccess->getnombre(); ?></h4>
                        <h6><?php echo $rolesaccess->getdescripcion(); ?></h6>
                        <h6 class="text-info"><?php echo $user->getusercode(); ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    



    <div class="menuleft">
        <nav>
            <ul>
                <li><a href="/usuarios/eliminar.php">Usuarios</a></li>
                <li><a href="/roles/modificarrol.php">Roles</a></li>
                <li><a href="/consolas/modificar.php">Consolas</a></li>
                <li><a href="/tarifas/modificar.php">Tarifas</a></li>
                <li><a href="/juegos/modificar.php">Juegos</a></li>
                <li><a href="/torneos/modificar.php">Torneos</a></li>
                <li><a href="/dulceria/modificar.php">Dulceria</a></li>
                <li><a href="/promociones/view_promociones.php">Promociones</a></li>
            </ul>
        </nav>
    </div>
    
    <?php if ($rolesaccess->getrolaccess_eliminarusuarios()  == 1) {
        echo '<div class="row justify-content-center h-100">
        <div class="col-lg-8 mt-5 mt-lg-0">
            <div class="col-sm-12 align-self-center text-center">
                <div class="card shadow">
                    <div class="card-body">
                        <h1>Usuarios</h1>
                            <h4>
                            <a href="usuarios/view_registro.php">
                            <input type="button" class="btn btn-primary" value="Agregar">
                            </a>
                        </h4>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Status</th> <!-- Borrado -->
                                        <th scope="col">Codigo de usuario</th> <!-- Codigo_usuario -->
                                        <th scope="col">Apodo de jugador</th> <!-- nickname_usuario -->
                                        <th scope="col">Nombre</th> <!-- Nombre_usuario -->
                                        <th scope="col">Apellido(s)</th> <!-- ApellidoP_usuario -->
                                        <th scope="col">Edad</th> <!-- FechaN_usuario -->
                                        <th scope="col">Sexo</th> <!-- Genero_usuario -->
                                        <th scope="col">Telefono</th> <!-- Telefono_usuario -->
                                        <th scope="col">Correo</th> <!-- Correo_electronico -->
                                        <th scope="col">Facebook</th> <!-- FB_usuario -->
                                        <th scope="col">Youtube</th> <!-- YT_usuairo -->
                                        <th scope="col">Twitch</th> <!-- Twitch_usuario -->
                                        <th scope="col">Twitter</th>
                                        <!--Twitter_usuario -->
                                        <th scope="col">Instragram</th> <!-- IG_usuario -->
                                        <th scope="col">Monedas</th> <!-- Monedas_usuario -->
                                        <th scope="col">Rol de usuario</th> <!-- Rol_usuario -->
                                        <th scope="col">Borrado</th> <!-- Borrado -->
                                    </tr>
                                </thead>
                                <tbody>';
        $consulta = $user->allusers();
        $i = 0;
        if ($consulta->rowCount() > 0) {
            while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $i += 1;
                echo "<tr>";
                echo '<th scope="row">' . $i . '</th>';

                if ($row['Borrado'] == 0) {
                    echo '<td>
                                        <form action="../forms/eliminar.php" method="post" role="form" id="eliminar">
                                        <input name="id" type="hidden" value="' . $row['Codigo_usuario'] . '">
                                        <input type="submit" class="btn btn-danger" value="Eliminar">
                                        </form>
                                        </td>';
                } else {
                    echo '<td>
                                        <form action="../forms/activar.php" method="post" role="form" id="activar">
                                        <input name="id" type="hidden" value="' . $row['Codigo_usuario'] . '">
                                        <input type="submit" class="btn btn-success" value="Activar">
                                        </form>
                                        </td>';
                }

                echo '<td>' . $row['Codigo_usuario'] . '</td>';
                echo '<td>' . $row['nickname_usuario'] . '</td>';
                echo '<td>' . $row['Nombre_usuario'] . '</td>';
                echo '<td>' . $row['ApellidoP_usuario'] . '</td>';
                echo '<td>' . $row['FechaN_usuario'] . '</td>';
                echo '<td>' . $row['Genero_usuario'] . '</td>';
                echo '<td>' . $row['Telefono_usuario'] . '</td>';
                echo '<td>' . $row['Correo_electronico'] . '</td>';
                echo '<td>' . $row['FB_usuario'] . '</td>';
                echo '<td>' . $row['YT_usuairo'] . '</td>';
                echo '<td>' . $row['Twitch_usuario'] . '</td>';
                echo '<td>' . $row['Twitter_usuario'] . '</td>';
                echo '<td>' . $row['IG_usuario'] . '</td>';
                echo '<td>' . $row['Monedas_usuario'] . '</td>';
                echo '<td>' . $row['Rol_usuario'] . '</td>';
                if ($row['Borrado'] == 0) {
                    echo '<td>Activo</td>';
                } else {
                    echo '<td>Eliminado</td>';
                }
                echo '</tr>';
            }
            echo '</tbody>
                </table>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>';
        }
    } else {
        
        echo '<div class="row justify-content-center h-100">
        <div class="col-lg-8 mt-5 mt-lg-0">
            <div class="col-sm-12 align-self-center text-center">
                <div class="card shadow">
                    <div class="card-body">
                    <h2>Sin Permisos</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>';
    } ?>








    <!-- Vendor JS Files -->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <!--  <script src="assets/vendor/php-email-form/validateimg.js"></script>
    <script src="assets/vendor/php-email-form/social.js"></script> -->
    <script src="assets/vendor/php-email-form/admin_usuarios.js"></script>
    <script src="assets/vendor/jquery-sticky/jquery.sticky.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>


</body>

</html>