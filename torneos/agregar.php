<?php

include_once '../forms/user.php';
include_once '../forms/roles.php';
include_once '../forms/Session.php';
include_once '../forms/juegos.php';
include_once '../forms/consolas.php';
include_once '../forms/Relacion_juegos_consolas.php';

$userSession = new UserSession();
$rolesaccess = new roles;
$user = new login();
$relacion = new relacion;
$juegos = new juegos;
$consolas = new consolas;

if (isset($_SESSION['user'])) {
    $user->setUserAndfk($userSession->getCurrentUser());

    if ($user->getborrado() === 1) {
        header("location: ../info.php");
        return;
    }
    if ($rolesaccess->getrolaccess_addtorneo() === 0) {
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

    <title>Torneo</title>
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
                <h2>Seleccione el juego y la consola si no existe</h2>
            </div>
            <div class="row justify-content-center h-100">
                <div class="col-lg-8 mt-5 mt-lg-0">
                    <form action="../forms/addrelacion.php" method="post" role="form" class="promociones-form" data-aos="fade-down-left">

                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <h6>Juego: </h6>
                                <select name="juego" class="form-control">
                                    <?php
                                    $consulta = $juegos->getall();
                                    $i = 0;
                                    if ($consulta->rowCount() > 0) {
                                        while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                            echo '<option value="' . $row['idJuego'] . '">' . $row['Nombre_juego'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <h6>Consola: </h6>
                                <select name="consola" class="form-control">
                                    <?php
                                    $consulta = $consolas->getall();
                                    $i = 0;
                                    if ($consulta->rowCount() > 0) {
                                        while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                            echo '<option value="' . $row['idConsola'] . '">' . $row['Nombre_consola'] . '</option>';
                                        }
                                    }
                                    ?>
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


    <!-- ======= Contact Section ======= -->
    <section id="" class="promotion section-bg">
        <div class="containe ">

            <div class="section-title">
                <h2>Agregar Torneo</h2>
            </div>
            <div class="row justify-content-center h-100">
                <div class="col-lg-8 mt-5 mt-lg-0">
                    <form action="../forms/addtorneo.php" method="post" role="form" class="promociones-form" data-aos="fade-down-left">

                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <h6>Nombre del torneo: </h6>
                                <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre" data-rule="required" data-msg="Por favor introduzca un nombre para el torneo" />
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <h6>Descripcion del torneo: </h6>
                                <input type="text" name="descripcion" class="form-control" id="descripcion" placeholder="Descripcion" data-rule="required" data-msg="Por favor introduzca un descripcion para el torneo" />
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                 <h6>Juego y consola : </h6>
                                <select name="juego" class="form-control">
                                    <?php
                                    $consulta = $relacion->getall();
                                    $i = 0;
                                    if ($consulta->rowCount() > 0) {
                                        while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                            echo '<option value="' . $row['idJuegos_Consolas'] . '"> Juego --  ' . $row['Nombre_juego'] . ' -- Consola --' .$row['Nombre_consola'] . '</option>';
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <h6>Fecha del torneo: </h6>
                                <input type="date" class="form-control" name="fecha" id="FechaN_usuario" placeholder="FechaN_usuario" data-rule="fecha" data-msg="Por favor introduzca una fecha valida" />
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <h6>Hora del torneo: </h6>
                                <input type="time" id="appt" name="hora" class="input-group Time" required>
                            </div>
                        </div>


                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <h6>Modalidad de torneo: </h6>
                                <select name="modalidad" class="form-control">
                                    <option value="Un Jugador">Un Jugador</option>
                                    <option value="Duos">Duos</option>
                                    <option value="ambas">Ambas</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <h6>Tipo de torneo: </h6>
                                <select name="forma" class="form-control">
                                    <option value="presencial">Presencial</option>
                                    <option value="linea">línea</option>
                                    <option value="ambas">Ambas</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <h6>Cantidad de jugadores: </h6>
                                <input type="number" class="form-control" onkeydown="javascript: return event.keyCode == 69 ? false : true" name="cantidad" id="cantidad" placeholder="Cantidad maxima de jugadores" required />
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                            <h6>Premio del torneo: </h6>
                                <input type="text" name="premios" class="form-control" id="premios" placeholder="Premios del torneo" />
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <h6>Estatus del torneo: </h6>
                                <select name="estatus" class="form-control">
                                    <option value="Pendiente">Pendiente</option>
                                    <option value="En Curso">En curso</option>
                                    <option value="Finalizado">Finalizado</option>
                                    <option value="Cancelado">Cancelado</option>
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