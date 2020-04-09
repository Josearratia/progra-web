<?php
include_once 'user.php';
include_once 'roles.php';
include_once 'Session.php';
include_once 'torneos.php';

$userSession = new UserSession();
$user = new login();
$rolesaccess = new roles;
$torneo = new torneos;

if (isset($_SESSION['user'])) {
    $user->setUserAndfk($userSession->getCurrentUser());

    if ($user->getborrado() === 1) {
        include_once 'info.php';
        return;
    } else {
        if ($user->getrol() != 2) {
            $rolesaccess->setUserrolaccess($user->getuserid());
            if ($rolesaccess->getrolaccess_delettorneo() == 1) {
                if (
                    isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['descripcion']) &&
                    isset($_POST['juego']) && isset($_POST['fecha']) && isset($_POST['hora']) && isset($_POST['modalidad']) &&
                    isset($_POST['forma']) && isset($_POST['cantidad']) && isset($_POST['premios']) && isset($_POST['estatus'])
                ) {
                    $torneo->update(
                        $_POST['id'],
                        $_POST['nombre'],
                        $_POST['descripcion'],
                        $_POST['juego'],
                        $_POST['fecha'],
                        $_POST['hora'],
                        $_POST['modalidad'],
                        $_POST['forma'],
                        $_POST['cantidad'],
                        $_POST['premios'],
                        $_POST['estatus']
                    );
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
