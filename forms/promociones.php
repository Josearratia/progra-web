<?php
include_once 'Dbconnection.php';
class promociones extends DB
{
    private $data = array();
    private $descrip;
    private $monedas;
    
    public function setreferidos()
    {
        $nameuser = $this->connect()->prepare('SELECT * from promociones');
        $nameuser->execute();

        while ($row = $nameuser->fetch(PDO::FETCH_ASSOC)) {
            $this->data[] = $row;
        }       
    }



    public function setpromocion($id)
    {
        $nameuser = $this->connect()->prepare('SELECT * from promociones WHERE  Promociones_id = :id');
        $nameuser->execute(['id' => $id]);

        foreach ($nameuser as $currentUser) {
            $this->descrip = $currentUser['Descripcion'];
            $this->monedas = $currentUser['Monedas'];
        }
            
    }
    
    public function get(){
        return $this->data;
    }

    public function getdes(){
        return $this->descrip;
    }

    public function getmonedas(){
        return $this->monedas;
    }

    public function update($id,$descrip,$monedas){
        $exist = $this->connect()->prepare('SELECT * FROM `promociones` WHERE Promociones_id = :id');
        $exist->execute(['id' => $id]);

        if ($exist->rowCount()) {
            $query = $this->connect()->prepare('UPDATE `promociones` SET `Descripcion`=:descrip,
             `Monedas`=:moendas
                WHERE Promociones_id = :id');

            $query->execute([
                'descrip' =>$descrip,
                'moendas' => $monedas,
                 'id' => $id
            ]);
            return "Datos Guardados";
        } else {
            return "A Ocurrido un error";
        }
    }
}


