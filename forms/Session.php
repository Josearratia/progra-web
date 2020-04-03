<?php

class UserSession
{

    public function __construct()
    {
        session_start();
    }

    public function setCurrentUser($user)
    {
        $_SESSION['user'] = $user;
    }

    public function getCurrentUser()
    {
        return $_SESSION['user'];
    }
    
    /*  public function setdatauser($rol,$nickname,$iduser){
        $_SESSION['nickname'] = $nickname;
        $_SESSION['rol'] = $rol;
        $_SESSION['iduser'] = $iduser;
    } */



    /*  public function getCurrentnickname(){
        $_SESSION['nickname'];
    }

    public function getCurrentrol(){
        $_SESSION['rol'];
    }

    public function getCurrentiduser(){
        $_SESSION['iduser'];
    } */


    public function closeSession()
    {
        session_unset();
        session_destroy();
    }
}
