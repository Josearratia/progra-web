<?php 
include_once 'user.php';
include_once 'roles.php';
include_once 'Session.php';
include_once 'promociones.php';
include_once 'renta.php';

$userSession = new UserSession();
$user = new login();
$promo = new promociones();
$rolesaccess = new roles;
$renta = new renta();

if (isset($_SESSION['user'])) {
    $user->setUserAndfk($userSession->getCurrentUser());

    if ($user->getborrado() === 1) {
        include_once 'info.php';
        return;
    } else {
        if ($user->getrol() != 2) {
            $rolesaccess->setUserrolaccess($user->getuserid());
            if ($rolesaccess->getrolaccess_addconsolas() == 1) {
                if(isset($_POST['idconsola']) && $_POST['costo'] && isset($_POST['idjuego']) &&
                isset($_POST['pago'])){
                    if($_POST['pago'] >= $_POST['costo']){
                        $renta->add($_POST['idconsola'],$_POST['idjuego'], $_POST['pago']);
                    }else{
                        echo "Pago insuficiente";
                    }
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




?>