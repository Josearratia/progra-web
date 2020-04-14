<?php
include_once 'user.php';
include_once 'roles.php';
include_once 'Session.php';

include_once 'tarifa.php';

$userSession = new UserSession();
$user = new login();
$rolesaccess = new roles;
$tarifa = new tarifas;



if (isset($_SESSION['user'])) {
    $user->setUserAndfk($userSession->getCurrentUser());

    if ($user->getborrado() === 1) {
        include_once 'info.php';
        return;
    } else {
        if ($user->getrol() != 2) {
            $rolesaccess->setUserrolaccess($user->getuserid());
                if(isset($_POST['id']) ){
                    $tarifa->deleted($_POST['id']);
                }else{
                    echo "Ingrese bien los datos";
                }

        }else {
            echo "error 1";
        }
    }
} else {
    include_once 'index.php';
}