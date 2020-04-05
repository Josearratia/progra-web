<?php
    $finalruta = "";
    $directorioup = "/assets/upload/img/uploadimg/";
    $directoriodonthave = "/assets/img/";

    $imagen =  $user->getuserfoto();
   /*  echo $imagen . " "; */

    if($imagen != "img_avatar.png"){
        /* echo "ya tiene imagen ruta: "; */
        
        $finalruta = $directorioup . $imagen;
        
        if(file_exists($_SERVER['DOCUMENT_ROOT'].$finalruta )){
            /* el archivo existe */
        }else{
            $finalruta = $directoriodonthave . "img_avatar.png"; /* Error de registro en la bd */ 
            $user->updateimg("img_avatar.png",$user->getuserid()); /* solucion al error deleted*/
            /* update img  */
        }
        
    }else{
        /* NO tiene imagen por lo tanto usar una estandar para mostrar algo */
        /* echo "no tiene imagen personal"; */
        $finalruta = $directoriodonthave . "img_avatar.png";
    }
    /* echo $finalruta; */
?>