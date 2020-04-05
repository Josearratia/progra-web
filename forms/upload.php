<?php

include_once 'user.php';  
include_once 'Session.php';

$userSession = new UserSession();
$user = new login(); 

 if (isset($_SESSION['user'])) {
    $user->setUserAndfk($userSession->getCurrentUser());
    $directorio = $_SERVER['DOCUMENT_ROOT'] . "/assets/upload/img/uploadimg/";
    /* echo exec('whoami');  */ /* muestra el usuario del servidor que tiene acceso a al php */
    
    
    $tipoArchivo = strtolower(pathinfo($_FILES['mp']["name"], PATHINFO_EXTENSION));
    $newnombre = basename($user->getusercode()) . '.' . $tipoArchivo;
    /* echo $newnombre; */
    $archivo = $directorio . $newnombre;

    $isimg = getimagesize($_FILES["mp"]["tmp_name"]);
    
    if($isimg != false){
        $size = $_FILES["mp"]["size"];

        if($size > 10000000){
            echo "Archivo mayor a 10mb";
        }else {
            if($tipoArchivo == "jpg"){
                if(move_uploaded_file($_FILES["mp"]["tmp_name"],$archivo)){
                    $user->updateimg($newnombre,$user->getuserid());
                    echo "Archivo guardado";
                }else{
                    echo "error al guardar el archivo";
                }
            }else{
                echo "solo se permitente archivos jpg";
            }
        }

    }else {
        echo "Archivo no valido";
    }   
} else {
    include_once 'index.php';
} 
    
?>