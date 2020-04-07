<?php
include_once 'forms/user.php';
include_once 'forms/promociones.php';
include_once 'forms/Session.php';


$userSession = new UserSession();
$user = new login();
$promo = new promociones();

if(isset($_SESSION['user'])){
    $user->setUserAndfk($userSession->getCurrentUser());
    if(isset($_POST['id']) && isset($_POST['descripcion']) && isset($_POST['monedas'])){

        echo $promo->update($_POST['id'],$_POST['descripcion'],$_POST['monedas']);
       
   }else {
       include_once 'view_registro.php';
   }
}
