<?php
include_once 'user.php';
include_once 'roles.php';
include_once 'Session.php';
include_once 'juegos.php';


$userSession = new UserSession();
$user = new login();
$rolesaccess = new roles;
$juego = new juegos;


if (isset($_SESSION['user'])) {
    $user->setUserAndfk($userSession->getCurrentUser());
    if ($user->getborrado() === 1) {
        include_once 'info.php';
        return;
    } else {
        if ($user->getrol() != 2) {
            $rolesaccess->setUserrolaccess($user->getuserid());
            if ($rolesaccess->getrolaccess_modificarjuegos() == 1) {
                if (isset($_POST['id']) && isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['oldname'])) {
                    if (file_exists($_FILES['mp']['tmp_name']) || is_uploaded_file($_FILES['mp']['tmp_name'])) {
                        $directorio = $_SERVER['DOCUMENT_ROOT'] . "/assets/upload/imgjuegos/";

                        $imgname = $_POST['oldname'];


                        $newnombre = basename($imgname);
                        $tipoArchivo = strtolower(pathinfo($imgname, PATHINFO_EXTENSION));
                        $archivo = $directorio . $newnombre;

                        if (!file_exists($_FILES['mp']['tmp_name']) || !is_uploaded_file($_FILES['mp']['tmp_name'])) {
                            echo 'No upload';
                        } else {
                            $isimg = getimagesize($_FILES["mp"]["tmp_name"]);
                        }
                        

                        if ($isimg != false) {
                            $size = $_FILES["mp"]["size"];

                            if ($size > 10000000) {
                                echo "Archivo mayor a 10mb";
                            } else {
                                if ($tipoArchivo == "jpg") {
                                    if (move_uploaded_file($_FILES["mp"]["tmp_name"], $archivo)) {
                                        $juego->update($_POST['id'], $_POST['nombre'], $_POST['descripcion'], $imgname);
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
                        $juego->updatesinimag($_POST['id'], $_POST['nombre'], $_POST['descripcion']);
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
X