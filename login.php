<?php
include_once 'forms/user.php';
include_once 'forms/Session.php';

$userSession = new UserSession();
$user = new login();


if(isset($_SESSION['user'])){
    $user->setUserAndfk($userSession->getCurrentUser());
    header("location: ../dashboard.php");
}else if(isset($_POST['user']) && isset($_POST['password'])){
    $userForm = $_POST['user'];
    $passwordForm = $_POST['password'];
    if($user->userExists($userForm,$passwordForm)){
        $userSession->setCurrentUser($userForm);
        echo "Bienvenido";
    }else{
        echo "Nombre de usuario y/o password incorrecto";
    } 
}else {
    include_once 'view_login.php';
}


?>