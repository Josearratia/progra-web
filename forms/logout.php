<?php
    include_once 'Session.php';

    $userSession = new UserSession();
    $userSession->closeSession();

    header("location: ../index.php");
    
?>