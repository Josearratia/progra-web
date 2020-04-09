<?php

include_once 'Dbconnection.php';

class relacion extends DB{
    private $id;
    private $idjuego;
    private $idconsola;
    
    public function getall(){
        $relacion = $this->connect()->prepare('SELECT * FROM `juegos_consolas` INNER JOIN juegos  ON juegos_consolas.Juego = juegos.idJuego INNER JOIN consolas ON juegos_consolas.Consola = consolas.idConsola;');
        $relacion->execute();
        return $relacion;
    }

    public function add($idjuego, $idconsola){
        $relacion = $this->connect()->prepare('INSERT INTO `juegos_consolas`(`idJuegos_Consolas`, `Juego`, `Consola`) 
        VALUES (?,?,?)');
        $relacion->execute([NULL, $idjuego, $idconsola]);
        echo "Datos Guardados De Relacion";
    }
}

?>