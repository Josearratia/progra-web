<?php
include_once 'user.php';
include_once 'roles.php';
include_once 'Session.php';
include_once 'dulceria.php';

$userSession = new UserSession();
$user = new login();
$dulceria = new dulceria();
$rolesaccess = new roles;


if (isset($_SESSION['user'])) {
    $user->setUserAndfk($userSession->getCurrentUser());

    if ($user->getborrado() === 1) {
        include_once 'info.php';
        return;
    } else {
        if ($user->getrol() != 2) {
            $rolesaccess->setUserrolaccess($user->getuserid());
            if ($rolesaccess->getrolaccess_adddulceria() == 1) {
                if(isset($_POST['nombre']) && isset($_POST['Costo']) &&
                isset($_POST['Cantidad'])){
                    $dulceria->add($_POST['nombre'], $_POST['Costo'], $_POST['Cantidad']);
                }else{
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
