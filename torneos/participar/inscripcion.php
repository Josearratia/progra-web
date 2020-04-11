<?php
include_once '../../forms/user.php';
include_once '../../forms/torneox1.php';
include_once '../../forms/Session.php';

$userSession = new UserSession();
$user = new login();
$participante = new x1;



if (isset($_SESSION['user'])) {
    $user->setUserAndfk($userSession->getCurrentUser());
    if ($user->getborrado() === 1) {
        include_once 'info.php';
        return;
    } else {
        if (isset($_POST['idt']) && isset($_POST['idp'])) {
            $participante->add($_POST['idt'], $_POST['idp']);
        } else {
            echo "Ingrese bien los datos";
        }
    }
} else {
    include_once '../../index.php';
}
