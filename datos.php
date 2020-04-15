<?php
include_once 'forms/user.php';
include_once 'forms/roles.php';
include_once 'forms/Session.php';
include_once 'forms/dulceria.php';

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
                if(isset($_POST['id'])){
                    $dulceria->set($_POST['id']);
                    echo $dulceria->getcosto();
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
