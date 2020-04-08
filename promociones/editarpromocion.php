<?php
include_once '../forms/user.php';
include_once '../forms/roles.php';
include_once '../forms/Session.php';
include_once '../forms/promociones.php';

$userSession = new UserSession();
$user = new login();
$promo = new promociones();
$rolesaccess = new roles;


if (isset($_SESSION['user'])) {
    $user->setUserAndfk($userSession->getCurrentUser());

    if ($user->getborrado() === 1) {
        include_once '../info.php';
        return;
    }else{
        if($user->getrol() != 2){
            $rolesaccess->setUserrolaccess($user->getuserid());
            if ($rolesaccess->getrolaccess_modificarpromociones() == 1){
                $promo->setpromocion($_GET['id']);
                include_once '../forms/imgp.php';
                include_once 'view_editarpromo.php';
            }else{
                echo "error 2";
                return;
            }
        }else{
            echo "error 1";
        }
    }
} else {
    include_once '../index.php';
}
    
?>