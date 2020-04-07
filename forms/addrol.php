<?php
include_once 'user.php';
include_once 'roles.php';
include_once 'Session.php';
include_once 'promociones.php';

$userSession = new UserSession();
$user = new login();
$promo = new promociones();
$rolesaccess = new roles;

$eliusuarios;/*  */
$modipromo;/*  */
$addroles;/*  */
$modiroles;/*  */
$eliroles;/*  */
$asingroles;/*  */
$addconsolas;/*  */
$modiconsolas;
$eliconsolas;
$addjuegos;
$modijuegos;
$elijuegos;
$adddulceria;
$modidulceria;
$elidulceria;
$addtorneo;
$moditorneos;
$elitorneos;

if (isset($_SESSION['user'])) {
    $user->setUserAndfk($userSession->getCurrentUser());

    if ($user->getborrado() === 1) {
        include_once 'info.php';
        return;
    } else {
        if ($user->getrol() != 2) {
            $rolesaccess->setUserrolaccess($user->getuserid());
            if ($rolesaccess->getrolaccess_addroles() == 1) {
                
                if (isset($_POST['nombre']) && isset($_POST['descripcion'])) {
                    /* Ususarios */
                    if(isset($_POST['eliusuarios'])){
                        $eliusuarios = 1;
                    }else{
                        $eliusuarios = 0;
                    }

                    /* Promociones */
                    if(isset($_POST['modipromo'])){
                        $modipromo = 1;
                    }else{
                        $modipromo = 0;
                    }

                    /* Roles */

                    if(isset($_POST['addroles'])){
                        $addroles = 1;
                    }else{
                        $addroles = 0;
                    }

                    if(isset($_POST['modiroles'])){
                        $modiroles = 1;
                    }else{
                        $modiroles = 0;
                    }

                    if(isset($_POST['eliroles'])){
                        $eliroles = 1;
                    }else{
                        $eliroles = 0;
                    }

                    if(isset($_POST['asingroles'])){
                        $asingroles = 1;
                    }else{
                        $asingroles = 0;
                    }

                    /* Consolas */

                    if(isset($_POST['addconsolas'])){
                        $addconsolas = 1;
                    }else{
                        $addconsolas = 0;
                    }

                    if(isset($_POST['modiconsolas'])){
                        $modiconsolas = 1;
                    }else{
                        $modiconsolas = 0;
                    }

                    if(isset($_POST['eliconsolas'])){
                        $eliconsolas = 1;
                    }else{
                        $eliconsolas = 0;
                    }
                    
                    /* Juegos */

                    if(isset($_POST['addjuegos'])){
                        $addjuegos = 1;
                    }else{
                        $addjuegos = 0;
                    }

                    if(isset($_POST['modijuegos'])){
                        $modijuegos = 1;
                    }else{
                        $modijuegos = 0;
                    }

                    if(isset($_POST['elijuegos'])){
                        $elijuegos = 1;
                    }else{
                        $elijuegos = 0;
                    }

                    /* Dulceria */

                    if(isset($_POST['adddulceria'])){
                        $adddulceria = 1;
                    }else{
                        $adddulceria = 0;
                    }

                    if(isset($_POST['modidulceria'])){
                        $modidulceria = 1;
                    }else{
                        $modidulceria = 0;
                    }

                    if(isset($_POST['elidulceria'])){
                        $elidulceria = 1;
                    }else{
                        $elidulceria = 0;
                    }

                    /* Torneos */

                    if(isset($_POST['addtorneo'])){
                        $addtorneo = 1;
                    }else{
                        $addtorneo = 0;
                    }

                    if(isset($_POST['moditorneos'])){
                        $moditorneos = 1;
                    }else{
                        $moditorneos = 0;
                    }
                    
                    if(isset($_POST['elitorneos'])){
                        $elitorneos = 1;
                    }else{
                        $elitorneos = 0;
                    }
                    
                    
                    echo $rolesaccess->addrol(
                        $_POST['nombre'],
                        $_POST['descripcion'],
                        $eliusuarios,
                        $modipromo,
                        $addroles,
                        $modiroles,
                        $eliroles,
                        $asingroles,
                        $addconsolas,
                        $modiconsolas,
                        $eliconsolas,
                        $addjuegos,
                        $modijuegos,
                        $elijuegos,
                        $adddulceria,
                        $modidulceria,
                        $elidulceria,
                        $addtorneo,
                        $moditorneos,
                        $elitorneos
                    );
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
