<?php
include_once 'user.php';
include_once 'roles.php';
include_once 'Session.php';
include_once 'promociones.php';

$userSession = new UserSession();
$user = new login();
$promo = new promociones();
$rolesaccess = new roles;


if (isset($_SESSION['user'])) {
    $user->setUserAndfk($userSession->getCurrentUser());

    if ($user->getborrado() === 1) {
        include_once 'info.php';
        return;
    } else {
        if ($user->getrol() != 2) {
            $rolesaccess->setUserrolaccess($user->getuserid());
            if ($rolesaccess->getrolaccess_deletroles() == 1) {
                if (isset($_POST['id'])) {
                     
                    if ($user->roleliminado($_POST['id']) == "OKEY"){
                       $rolesaccess->eliminar($_POST['id']);
                    }
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
