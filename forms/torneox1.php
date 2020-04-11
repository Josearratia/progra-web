<?php
include_once 'Dbconnection.php';

class x1 extends DB
{

    private $idUsuarios_Torneos;
    private $Usuario;
    private $Torneo;
    private $Lugar_del_usuario_en_torneo;

    public function set($id)
    {
        $participacion = $this->connect()->prepare('SELECT * from usuariosx1_torneos WHERE idUsuarios_Torneos = :id');
        $participacion->execute(['id' => $id]);
        if ($participacion->rowCount()) {
            foreach ($participacion as $currentUser) {
                $this->idUsuarios_Torneos = $currentUser['idUsuarios_Torneos'];
                $this->Usuario = $currentUser['Usuario'];
                $this->Torneo = $currentUser['Torneo'];
                $this->Lugar_del_usuario_en_torneo = $currentUser['Lugar_del_usuario_en_torneo'];
            }
        }
    }

    public function add($idt, $idu)
    {
        $this->findafertadd($idt, $idu);
        if ($idu != $this->Usuario) {
            $participacion = $this->connect()->prepare('INSERT INTO `usuariosx1_torneos`(`idUsuarios_Torneos`, `Usuario`, `Torneo`, `Lugar_del_usuario_en_torneo`) 
            VALUES (?,?,?,?)');
            $participacion->execute([NULL,  $idu, $idt, '']);
            echo "Participando";
        }else{
            echo "Ya te encuentras participando";
        }
    }

    public function findafertadd($idt, $idu){
        $participacion = $this->connect()->prepare('SELECT * from usuariosx1_torneos WHERE Torneo = :id AND Usuario =:idu');
        $participacion->execute(['id' => $idt, 'idu'=>$idu]);
        if ($participacion->rowCount()) {
            foreach ($participacion as $currentUser) {
                $this->idUsuarios_Torneos = $currentUser['idUsuarios_Torneos'];
                $this->Usuario = $currentUser['Usuario'];
                $this->Torneo = $currentUser['Torneo'];
                $this->Lugar_del_usuario_en_torneo = $currentUser['Lugar_del_usuario_en_torneo'];
            }
        }
    }

    public function find($id){
        $participacion = $this->connect()->prepare('SELECT * from usuariosx1_torneos WHERE Torneo = :id');
        $participacion->execute(['id' => $id]);
        return $participacion;
    }

    public function getall()
    {
        $participacion = $this->connect()->prepare('SELECT * from usuariosx1_torneos');
        $participacion->execute();
        return $participacion;
    }

    public function getid()
    {
        return $this->idUsuarios_Torneos;
    }

    public function getidusuario()
    {
        return $this->Usuario;
    }

    public function getidtorneo()
    {
        return $this->Torneo;
    }

    public function getlugar()
    {
        return $this->Lugar_del_usuario_en_torneo;
    }
}
