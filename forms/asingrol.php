<?php
include_once 'user.php';
include_once 'roles.php';
include_once 'Session.php';
include_once 'promociones.php';

$userSession = new UserSession();
$user = new login();
$promo = new promociones();
$rolesaccess = new roles;

$eliusuarios;/*  */
$modipromo;/*  */
$addroles;/*  */
$modiroles;/*  */
$eliroles;/*  */
$asingroles;/*  */
$addconsolas;/*  */
$modiconsolas;
$eliconsolas;
$addjuegos;
$modijuegos;
$elijuegos;
$adddulceria;
$modidulceria;
$elidulceria;
$addtorneo;
$moditorneos;
$elitorneos;

if (isset($_SESSION['user'])) {
    $user->setUserAndfk($userSession->getCurrentUser());

    if ($user->getborrado() === 1) {
        include_once 'info.php';
        return;
    } else {
        if ($user->getrol() != 2) {
            $rolesaccess->setUserrolaccess($user->getuserid());
            if ($rolesaccess->getrolaccess_asignarroles() == 1) {
                
                if (isset($_POST['us']) && isset($_POST['rol'])) {
                    $user->updaterol($_POST['us'],$_POST['rol']);
                }else {
                    echo "error 3";
                }
            } else {
                echo "error 2";
                return;
            }
        } else {
            echo "error 1";
        }
    }
} else {
    include_once 'index.php';
}
