<?php
include_once 'user.php';
include_once 'roles.php';
include_once 'Session.php';
include_once 'juegos.php';
include_once 'generatecode.php';

$userSession = new UserSession();
$user = new login();
$rolesaccess = new roles;
$juego = new juegos;
$code = new unicodeuser();

if (isset($_SESSION['user'])) {
    $user->setUserAndfk($userSession->getCurrentUser());
    if ($user->getborrado() === 1) {
        include_once 'info.php';
        return;
    } else {
        if ($user->getrol() != 2) {
            $rolesaccess->setUserrolaccess($user->getuserid());
            if ($rolesaccess->getrolaccess_addconsolas() == 1) {
                if (isset($_POST['nombre']) && isset($_POST['descripcion'])) {
                    $directorio = $_SERVER['DOCUMENT_ROOT'] . "/assets/upload/imgjuegos/";
                    $newgeneratecode = $code->generatecode($code->generatelong());
                    $imgname = $_POST['nombre'].$newgeneratecode;

                    $tipoArchivo = strtolower(pathinfo($_FILES['mp']["name"], PATHINFO_EXTENSION));
                    $newnombre = basename($imgname) . '.' . $tipoArchivo;
                    
                    $archivo = $directorio . $newnombre;
                    
                    $isimg = getimagesize($_FILES["mp"]["tmp_name"]);

                    if ($isimg != false) {
                        $size = $_FILES["mp"]["size"];

                        if ($size > 10000000) {
                            echo "Archivo mayor a 10mb";
                        } else {
                            if ($tipoArchivo == "jpg") {
                                if (move_uploaded_file($_FILES["mp"]["tmp_name"], $archivo)) {
                                    $juego->add($_POST['nombre'],$_POST['descripcion'],$newnombre);
                                } else {
                                    echo "error al guardar el archivo";
                                }
                            } else {
                                echo "solo se permitente archivos jpg";
                            }
                        }
                    } else {
                        echo "Archivo no valido";
                    } 
                } else {
                    echo "Ingrese bien los datos";
                }
            } else {
                echo "error 2";
                return;
            }
        } else {
            echo "error 1";
        }
    }
} else {
    include_once 'index.php';
}
