<?php
    /* return ruta de img de pp */
/*     include_once 'user.php';  
    include_once 'Session.php';
    
    $userSession = new UserSession();
    $user = new login(); 
   
    $user->setUserAndfk($userSession->getCurrentUser()); */ 


    $finalruta = "";
    $directorioup = "/assets/upload/img/uploadimg/";
    $directoriodonthave = "/assets/img/";

    $imagen =  $user->getuserfoto();
   /*  echo $imagen . " "; */

    if($imagen != "img_avatar.png"){
        /* echo "ya tiene imagen ruta: "; */
        
        $finalruta = $directorioup . $imagen;
        
    }else{
        /* NO tiene imagen por lo tanto usar una estandar para mostrar algo */
        /* echo "no tiene imagen personal"; */
        $finalruta = $directoriodonthave . "img_avatar.png";
    }
    /* echo $finalruta; */
?>