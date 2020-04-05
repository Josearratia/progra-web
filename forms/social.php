<?php
include_once 'user.php';
include_once 'Session.php';

$userSession = new UserSession();
$user = new login();

if(isset($_SESSION['user'])){
$user->setUserAndfk($userSession->getCurrentUser());
}else{
    include_once 'view_login.php';
}



if(isset($_POST['user-Instagram']) || isset($_POST['user-Facebook']) || isset($_POST['user-Twitch'])  
|| isset($_POST['user-Youtube'])  || isset($_POST['user-Twitter'])){
    echo $user->updatesocial($_POST['user-Facebook'],$_POST['user-Instagram'],$_POST['user-Twitch'],$_POST['user-Youtube'],$_POST['user-Twitter'], $user->getuserid());
}

?>