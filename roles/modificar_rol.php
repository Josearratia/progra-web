<?php
include_once '../forms/user.php';
include_once '../forms/roles.php';
include_once '../forms/Session.php';
include_once '../forms/promociones.php';

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
        include_once '../info.php';
        return;
    } else {
        if ($user->getrol() != 2) {
            $rolesaccess->setUserrolaccess($user->getuserid());
            if ($rolesaccess->getrolaccess_modificarroles() == 1) {
                if(isset($_POST['id'])){
                    include_once 'view_modificar_rol.php';
                }else{
                    include_once '../admin.php';
                }
            } else {
                echo "error 2";
                return;
            }
        }else {
            echo "error 1";
        }
    }
} else {
    include_once '../index.php';
}
