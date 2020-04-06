<?php
include_once 'Dbconnection.php';
class referidos extends DB
{
    private $data = array();
    public function setreferidos($id)
    {
        $fkuser = $this->connect()->prepare('SELECT * FROM referidos WHERE usuario_refirio = :user');
        $fkuser->execute(['user' => $id]);


        if ($fkuser->rowCount() > 0) {
            while ($row = $fkuser->fetch(PDO::FETCH_ASSOC)) {
                $nameuser = $this->connect()->prepare('SELECT * from usuarios WHERE idUsuario = :fk');
                $nameuser->execute(['fk' => $row['usuario_referido']]);
                while ($row = $nameuser->fetch(PDO::FETCH_ASSOC)) {
                    $this->data[] = $row;
                }                
            }
        }
    }
    public function get(){
        return $this->data;
    }
}
