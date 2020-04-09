<?php
include_once 'user.php';
include_once 'roles.php';
include_once 'Session.php';
include_once 'juegos.php';

$userSession = new UserSession();
$user = new login();
$rolesaccess = new roles;
$juegos = new juegos;

if (isset($_SESSION['user'])) {
    $user->setUserAndfk($userSession->getCurrentUser());

    if ($user->getborrado() === 1) {
        include_once 'info.php';
        return;
    } else {
        if ($user->getrol() != 2) {
            $rolesaccess->setUserrolaccess($user->getuserid());
            if ($rolesaccess->getrolaccess_deletjuegos() == 1) {
                if (isset($_POST['id'])) {
                    $juegos->activar($_POST['id']);
                } else {
                    echo "Ingrese bien los datos";
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
