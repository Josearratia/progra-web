<?php
include_once 'Dbconnection.php';

class juegos extends DB
{

    private $id;
    private $nombre;
    private $descripcion;
    private $imagen;
    private $borrado;


    public function set($id){
        $juego = $this->connect()->prepare('SELECT * from juegos WHERE idJuego = :id');
        $juego->execute(['id' => $id]);

        foreach ($juego as $currentUser) {
            $this->id = $currentUser['idJuego'];
            $this->nombre = $currentUser['Nombre_juego'];
            $this->descripcion = $currentUser['Descripcion'];
            $this->imagen = $currentUser['Imagen_juego'];
            $this->borrado = $currentUser['borrado'];
        }
    }

    public function add($nombre,$descripcion,$imagen){
        $consola = $this->connect()->prepare('INSERT INTO `juegos`(`idJuego`, `Nombre_juego`, `Descripcion`, `Imagen_juego`, `borrado`) 
        VALUES (?,?,?,?,?)');
        $consola->execute([NULL, $nombre, $descripcion, $imagen, 0]);
        echo "Datos Guardados";
    }

    public function update($id,$nombre,$descripcion,$imagen){
        $consola = $this->connect()->prepare('UPDATE `juegos` SET `Nombre_juego` = :nombre, `Descripcion` = :descripcion,
        `Imagen_juego` = :imagen  WHERE idJuego = :id');
        $consola->execute([
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'imagen' => $imagen,
            'id' => $id
        ]);
        echo "Datos Guardados";
    }

    public function updatesinimag($id,$nombre,$descripcion){
        $consola = $this->connect()->prepare('UPDATE `juegos` SET `Nombre_juego` = :nombre, `Descripcion` = :descripcion  WHERE idJuego = :id');
        $consola->execute([
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            
            'id' => $id
        ]);
        echo "Datos Guardados";
    }

    public function eliminar($id){
        $juego = $this->connect()->prepare('UPDATE `juegos` SET borrado = :borrado  WHERE idJuego = :id');
        $juego->execute([
            'borrado' => '1',
            'id' => $id
        ]);
        echo "juegoac";
    }

    public function activar($id){
        $juego = $this->connect()->prepare('UPDATE `juegos` SET borrado = :borrado  WHERE idJuego = :id');
        $juego->execute([
            'borrado' => '0',
            'id' => $id
        ]);
        echo "juegoac";
    }

    public function getall(){
        $juegos = $this->connect()->prepare('SELECT * FROM juegos');
        $juegos->execute();
        return $juegos;
    }

    public function getid(){
        return $this->id;
    }

    public function getnombre(){
        return $this->nombre;
    }

    public function getdescripcion(){
        return $this->descripcion;
    }

    public function getimagen(){
        return $this->imagen;
    }

    public function getborrado(){
        return $this->borrado;
    }
}

?>