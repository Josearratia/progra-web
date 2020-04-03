<?php
include_once 'forms/user.php';
include_once 'forms/Session.php';

$userSession = new UserSession();
$user = new login();


if(isset($_SESSION['user'])){
    $user->setUserAndfk($userSession->getCurrentUser());
    header("location: ../dashboard.php");
}else if(isset($_POST['user']) && isset($_POST['password']) && isset($_POST['Nombre'])  
&& isset($_POST['Apellido'])  && isset($_POST['nickname'])  && isset($_POST['FechaN']) && isset($_POST['sexo']) 
&& isset($_POST['Correo_electronico']) && isset($_POST['Telefono']) ){
    echo $user->adduser($_POST['codigo'], $_POST['user'], $_POST['password'] , $_POST['Nombre'],$_POST['Apellido'],
    $_POST['nickname'],$_POST['FechaN'],$_POST['sexo'],$_POST['Correo_electronico'],$_POST['Telefono']);
    
}else {
    include_once 'view_registro.php';
}
?>