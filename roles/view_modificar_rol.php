<?php


$rol = new roles;
$user = new login();

$rol->setrol($_POST['id']);
if (isset($_SESSION['user'])) {
    $user->setUserAndfk($userSession->getCurrentUser());

    if ($user->getborrado() === 1) {
        include_once 'info.php';
        return;
    }
} else {
    include_once '../index.php';
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


    <!-- ======= Contact Section ======= -->
    <section id="" class="promotion section-bg">
        <div class="containe ">

            <div class="section-title">
                <h2>Agregar Rol</h2>
            </div>
            <div class="row justify-content-center h-100">
                <div class="col-lg-8 mt-5 mt-lg-0">
                    <form action="../forms/modificarrol.php" method="post" role="form" class="promociones-form" data-aos="fade-down-left">

                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <input type="hidden" name="id" value="<?php echo $rol->getid(); ?>"/>
                                <input type="text" name="nombre" class="form-control" id="nombre" value="<?php echo $rol->getnombre(); ?>" placeholder="Nombre" data-rule="required" data-msg="Por favor introduzca un nombre para el rol" />
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="col-md-6 form-group">
                                <input type="text" name="descripcion" class="form-control" id="descripcion" value="<?php echo $rol->getdescripcion(); ?>" placeholder="Descripcion" data-rule="required" data-msg="Por favor introduzca un descripcion para el rol" />
                                <div class="validate"></div>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <h6 class="display-3 text-success">Usuarios</h6>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="form-check">
                                <?php if ($rol->getrolaccess_eliminarusuarios() == 1) {
                                    echo '<input type="checkbox" name="eliusuarios" value="1" checked="1"  class="form-check-input position-static" id="eliusuarios" />';
                                } else {
                                    echo '<input type="checkbox" name="eliusuarios" value="1" class="form-check-input position-static" id="eliusuarios" />';
                                } ?>

                                <label for="eliusuarios">Eliminar Usuarios</label>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <h6 class="display-3 text-success">Promociones</h6>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="form-check">
                                <?php if ($rol->getrolaccess_modificarpromociones() == 1) {
                                    echo '<input type="checkbox" name="modipromo" value="1" checked="1" class="form-check-input position-static" id="modipromo" />';
                                } else {
                                    echo '<input type="checkbox" name="modipromo" value="1" class="form-check-input position-static" id="modipromo" />';
                                }
                                ?>
                                <label for="modipromo">Modificar Promociones</label>
                            </div>
                        </div>

                        <div class="form-row justify-content-center">
                            <h6 class="display-3 text-success">Roles</h6>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="form-check">
                                <?php if ($rol->getrolaccess_addroles() == 1) {
                                    echo '<input type="checkbox" name="addroles" value="1" checked="1" class="form-check-input position-static" id="addroles" />';
                                } else {
                                    echo '<input type="checkbox" name="addroles" value="1" class="form-check-input position-static" id="addroles" />';
                                }
                                ?>
                                <label for="addroles">Agregar Roles</label>
                            </div>

                            <div class="form-check">
                                <?php if ($rol->getrolaccess_asignarroles() == 1) {
                                    echo '<input type="checkbox" name="asingroles" value="1" checked="1" class="form-check-input position-static" id="asingroles" />';
                                } else {
                                    echo '<input type="checkbox" name="asingroles" value="1"  class="form-check-input position-static" id="asingroles" />';
                                }
                                ?>
                                <label for="asingroles">Asignar Roles</label>
                            </div>

                            <div class="form-check">
                                <?php if ($rol->getrolaccess_deletroles() == 1) {
                                    echo '<input type="checkbox" name="eliroles" value="1" checked="1" class="form-check-input position-static" id="eliroles" />';
                                } else {
                                    echo '<input type="checkbox" name="eliroles" value="1"  class="form-check-input position-static" id="eliroles" />';
                                }
                                ?>
                                <label for="eliroles">Eliminar Roles</label>
                            </div>

                            <div class="form-check">
                                <?php if ($rol->getrolaccess_modificarroles() == 1) {
                                    echo '<input type="checkbox" name="modiroles" value="1" checked="1" class="form-check-input position-static" id="modiroles" />';
                                } else {
                                    echo '<input type="checkbox" name="modiroles" value="1" class="form-check-input position-static" id="modiroles" />';
                                }
                                ?><label for="modiroles">Modificar Roles</label>
                            </div>
                        </div>



                        <div class="form-row justify-content-center">
                            <h6 class="display-3 text-success">Consolas</h6>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="form-check">
                                <?php if ($rol->getrolaccess_addconsolas() == 1) {
                                    echo '<input type="checkbox" name="addconsolas" value="1" checked="1" class="form-check-input position-static" id="addconsolas" />';
                                } else {
                                    echo '<input type="checkbox" name="addconsolas" value="1" class="form-check-input position-static" id="addconsolas" />';
                                }
                                ?>
                                <label for="addconsolas">Agregar Consolas</label>
                            </div>

                            <div class="form-check">
                                <?php if ($rol->getrolaccess_Modificarconsolas() == 1) {
                                    echo '<input type="checkbox" name="modiconsolas" value="1" checked="1" class="form-check-input position-static" id="modiconsolas" />';
                                } else {
                                    echo '<input type="checkbox" name="modiconsolas" value="1"  class="form-check-input position-static" id="modiconsolas" />';
                                }
                                ?>
                                <label for="modiconsolas">Modificar Consolas</label>
                            </div>

                            <div class="form-check">
                                <?php if ($rol->getrolaccess_deletconsolas() == 1) {
                                    echo '<input type="checkbox" name="eliconsolas" value="1" checked="1" class="form-check-input position-static" id="eliconsolas" />';
                                } else {
                                    echo '<input type="checkbox" name="eliconsolas" value="1" class="form-check-input position-static" id="eliconsolas" />';
                                }
                                ?>
                                <label for="eliconsolas">Eliminar Consolas</label>
                            </div>
                        </div>


                        <div class="form-row justify-content-center">
                            <h6 class="display-3 text-success">Juegos</h6>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="form-check">
                                <?php if ($rol->getrolaccess_addjuegos() == 1) {
                                    echo '<input type="checkbox" name="addjuegos" value="1" checked="1" class="form-check-input position-static" id="addjuegos" />';
                                } else {
                                    echo '<input type="checkbox" name="addjuegos" value="1" class="form-check-input position-static" id="addjuegos" />';
                                }
                                ?>
                                <label for="addjuegos">Agregar Juegos</label>
                            </div>
                            <div class="form-check">
                                <?php if ($rol->getrolaccess_modificarjuegos() == 1) {
                                    echo '<input type="checkbox" name="modijuegos" value="1" checked="1" class="form-check-input position-static" id="modijuegos" />';
                                } else {
                                    echo '<input type="checkbox" name="modijuegos" value="1" class="form-check-input position-static" id="modijuegos" />';
                                }
                                ?>
                                <label for="modijuegos">Modificar Juegos</label>
                            </div>

                            <div class="form-check">
                                <?php if ($rol->getrolaccess_deletjuegos() == 1) {
                                    echo '<input type="checkbox" name="elijuegos" value="1" checked="1" class="form-check-input position-static" id="elijuegos" />';
                                } else {
                                    echo '<input type="checkbox" name="elijuegos" value="1" class="form-check-input position-static" id="elijuegos" />';
                                }
                                ?>
                                <label for="elijuegos">Eliminar Juegos</label>
                            </div>
                        </div>


                        <div class="form-row justify-content-center">
                            <h6 class="display-3 text-success">Dulceria</h6>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="form-check">
                                <?php if ($rol->getrolaccess_adddulceria() == 1) {
                                    echo '<input type="checkbox" name="adddulceria" value="1" checked="1" class="form-check-input position-static" id="adddulceria" />';
                                } else {
                                    echo '<input type="checkbox" name="adddulceria" value="1" class="form-check-input position-static" id="adddulceria" />';
                                }
                                ?>
                                <label for="adddulceria">Agregar Dulceria</label>
                            </div>

                            <div class="form-check">
                                <?php if ($rol->getrolaccess_modificardulceria() == 1) {
                                    echo '<input type="checkbox" name="modidulceria" value="1" checked="1" class="form-check-input position-static" id="modidulceria" />';
                                } else {
                                    echo '<input type="checkbox" name="modidulceria" value="1" class="form-check-input position-static" id="modidulceria" />';
                                }
                                ?>
                                <label for="modidulceria">Modificar Dulceria</label>
                            </div>

                            <div class="form-check">
                                <?php if ($rol->getrolaccess_deletdulceria() == 1) {
                                    echo '<input type="checkbox" name="elidulceria" value="1" checked="1" class="form-check-input position-static" id="elidulceria" />';
                                } else {
                                    echo '<input type="checkbox" name="elidulceria" value="1" class="form-check-input position-static" id="elidulceria" />';
                                }
                                ?>
                                <label for="elidulceria">Eliminar Dulceria</label>
                            </div>
                        </div>


                        <div class="form-row justify-content-center">
                            <h6 class="display-3 text-success">Torneos</h6>
                        </div>

                        <div class="form-row justify-content-center">
                            <div class="form-check">
                                <?php if ($rol->getrolaccess_addtorneo() == 1) {
                                    echo '<input type="checkbox" name="addtorneo" value="1" checked="1" class="form-check-input position-static" id="addtorneo" />';
                                } else {
                                    echo '<input type="checkbox" name="addtorneo" value="1" class="form-check-input position-static" id="addtorneo" />';
                                }
                                ?>
                                <label for="addtorneo">Agregar Torneos</label>
                            </div>

                            <div class="form-check">
                                <?php if ($rol->getrolaccess_modificartorneo() == 1) {
                                    echo '<input type="checkbox" name="moditorneos" value="1" checked="1" class="form-check-input position-static" id="moditorneos" />';
                                } else {
                                    echo '<input type="checkbox" name="moditorneos" value="1" class="form-check-input position-static" id="moditorneos" />';
                                }
                                ?>
                                <label for="moditorneos">Modificar Torneos</label>
                            </div>

                            <div class="form-check">
                                <?php if ($rol->getrolaccess_delettorneo() == 1) {
                                    echo '<input type="checkbox" name="elitorneos" value="1" checked="1" class="form-check-input position-static" id="elitorneos" />';
                                } else {
                                    echo '<input type="checkbox" name="elitorneos" value="1" class="form-check-input position-static" id="elitorneos" />';
                                }
                                ?>
                                <label for="elitorneos">Eliminar Torneos</label>
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