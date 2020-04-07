<?php
/* error_5 error al registrar usuario e intentar agregar login */
include_once 'Dbconnection.php';
include_once 'generatecode.php';

class roles extends DB
{
    private $rolid;
    private $idRolesPrimaria;	
    private $Nombre_Rol;	
    private $Descripcion_Rol;	
    private $Agregar_roles; 
    private $Asignar_roles;	
    private $Eliminar_roles;
    private $Modificar_roles; 
    private $Agregar_consolas;	
    private $Modificar_consolas;	
    private $Eliminar_consolas;		
    private $Agregar_juegos;	
    private $Modificar_juegos;		
    private $Eliminar_juego;		
    private $Agregar_dulceria;		
    private $Modificar_dulceria;	
    private $Eliminar_dulceria;		
    private $Agregar_torneo;		
    private $Modificar_torneo;	
    private $Eliminar_torneo;		
    private $Eliminar_usuario;		
    private $Modificar_promociones;		
    private $Agregar_promociones;	
    private $Eliminar_promocion;



    public function setUserrolaccess($user)
    {
        $fkuser = $this->connect()->prepare('SELECT * from usuarios WHERE idUsuario = :user ');
        $fkuser->execute(['user' => $user]);

        foreach ($fkuser as $currentUser) {
            $this->rolid = $currentUser['Rol_usuario'];
        }

        $nameuser = $this->connect()->prepare('SELECT * from roles WHERE idRoles = :id');
        $nameuser->execute(['id' => $this->rolid]);


        foreach ($nameuser as $currentUser) {
            $this->idRolesPrimaria = $currentUser['idRoles'];	
            $this->Nombre_Rol = $currentUser['Nombre_Rol'];	
            $this->Descripcion_Rol = $currentUser['Descripcion_Rol'];	
            $this->Agregar_roles = $currentUser['Agregar_roles']; 
            $this->Asignar_roles = $currentUser['Asignar_roles'];	
            $this->Eliminar_roles = $currentUser['Eliminar_roles'];
            $this->Modificar_roles = $currentUser['Modificar_roles']; 
            $this->Agregar_consolas = $currentUser['Agregar_consolas'];	
            $this->Modificar_consolas = $currentUser['Modificar_consolas'];	
            $this->Eliminar_consolas = $currentUser['Eliminar_consolas'];		
            $this->Agregar_juegos = $currentUser['Agregar_juegos'];	
            $this->Modificar_juegos = $currentUser['Modificar_juegos'];		
            $this->Eliminar_juego = $currentUser['Eliminar_juego'];		
            $this->Agregar_dulceria = $currentUser['Agregar_dulceria'];		
            $this->Modificar_dulceria = $currentUser['Modificar_dulceria'];	
            $this->Eliminar_dulceria = $currentUser['Eliminar_dulceria'] ;		
            $this->Agregar_torneo = $currentUser['Agregar_torneo'];		
            $this->Modificar_torneo = $currentUser['Modificar_torneo'];	
            $this->Eliminar_torneo = $currentUser['Eliminar_torneo']; 		
            $this->Eliminar_usuario = $currentUser['Eliminar_usuario'];		
            $this->Modificar_promociones = $currentUser['Modificar_promociones'];		
            $this->Agregar_promociones = $currentUser['Agregar_promociones'];	
            $this->Eliminar_promocion = $currentUser['Eliminar_promocion'];
        }
    }


    public function addrol($nombre,
    $descripcion,
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
    ){
        $rol = $this->connect()->prepare('INSERT INTO `roles`(`idRoles`, `Nombre_Rol`, `Descripcion_Rol`, `Agregar_roles`, `Asignar_roles`, `Eliminar_roles`, `Modificar_roles`, `Agregar_consolas`, `Modificar_consolas`, `Eliminar_consolas`, `Agregar_juegos`, `Modificar_juegos`, `Eliminar_juego`, `Agregar_dulceria`, `Modificar_dulceria`, `Eliminar_dulceria`, `Agregar_torneo`, `Modificar_torneo`, `Eliminar_torneo`, `Eliminar_usuario`, `Modificar_promociones`, `Agregar_promociones`, `Eliminar_promocion`)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)');

        $rol->execute([NULL, $nombre,$descripcion,$addroles,$asingroles,$eliroles,$modiroles
        ,$addconsolas,$modiconsolas,$eliconsolas,$addjuegos,$modijuegos,$elijuegos,$adddulceria,$modidulceria,$elidulceria,
        $addtorneo,$moditorneos,$elitorneos,$eliusuarios,$modipromo,0,0]);

        echo "Datos Guardados";
    }





    public function getnombre()
    { // Nombre del rol que tiene el usuario
        return $this->Nombre_Rol;
    }

    public function getdescripcion()
    { // Descripcion del rol  
        return $this->Descripcion_Rol;
    }

    /*  */
    /* Roles */
    /*  */
    public function getrolaccess_addroles()
    { // Agregar roles
        return $this->Agregar_roles;
    }

    public function getrolaccess_asignarroles()
    { // asignar roles a usuarios
        return $this->Asignar_roles;
    }

    public function getrolaccess_deletroles()
    { // eliminar roles creados
        return $this->Eliminar_roles;
    }

    public function getrolaccess_modificarroles()
    { // modificar roles los permisos que puede realizar
        return $this->Modificar_roles;
    }
    /*  */
    /* Consolas */
    /*  */
    public function getrolaccess_addconsolas()
    { // agregar consolas
        return $this->Agregar_consolas;
    }

    public function getrolaccess_Modificarconsolas()
    { // modificar consolas 
        return $this->Modificar_consolas;
    }
    public function getrolaccess_deletconsolas()
    { // eliminar consolas 
        return $this->Eliminar_consolas;
    }
    /*  */
    /* Juegos */
    /*  */
    public function getrolaccess_addjuegos()
    { // agregar juegos
        return $this->Agregar_juegos;
    }
    public function getrolaccess_modificarjuegos()
    { // id de usuario despues de un login 
        return $this->Modificar_juegos;
    }
    public function getrolaccess_deletjuegos()
    { // id de usuario despues de un login 
        return $this->Eliminar_juego;
    }

    /*  */
    /* Dulceria */
    /*  */

    public function getrolaccess_adddulceria()
    { // id de usuario despues de un login 
        return $this->Agregar_dulceria;
    }

    public function getrolaccess_modificardulceria()
    { // id de usuario despues de un login 
        return $this->Modificar_dulceria;
    }

    public function getrolaccess_deletdulceria()
    { // id de usuario despues de un login 
        return $this->Eliminar_dulceria;
    }

    /*  */
    /* Torneos */
    /*  */

    public function getrolaccess_addtorneo()
    { // id de usuario despues de un login 
        return $this->Agregar_torneo;
    }

    public function getrolaccess_modificartorneo()
    { // id de usuario despues de un login 
        return $this->Modificar_torneo;
    }

    public function getrolaccess_delettorneo()
    { // id de usuario despues de un login 
        return $this->Eliminar_torneo;
    }

    /*  */
    /* usuarios */
    /*  */
    public function getrolaccess_eliminarusuarios()
    { // id de usuario despues de un login 
        return $this->Eliminar_usuario;
    }
    /*  */
    /* promociones */
    /*  */

    public function getrolaccess_modificarpromociones()
    { // id de usuario despues de un login 
        return $this->Modificar_promociones;
    }
}
    
		
