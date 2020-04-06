<?php

include_once 'user.php';  
include_once 'roles.php';
include_once 'Session.php';

$userSession = new UserSession();
$user = new login(); 
$rolesaccess = new roles;

 if (isset($_SESSION['user'])) {
    $user->setUserAndfk($userSession->getCurrentUser());
    
     if($user->getrol() != 2) {
        $rolesaccess->setUserrolaccess($user->getuserid());
        echo $rolesaccess->getrolaccess_eliminarusuarios();
        if ($rolesaccess->getrolaccess_eliminarusuarios() == 1) {
            if(isset($_POST['id'])){
                $user->activar($_POST['id']);
            }
        }else{
            echo "error";
        }
     } 
    
} else {
    include_once 'index.php';
}

?>