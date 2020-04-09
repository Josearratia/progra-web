<?php
include_once 'Dbconnection.php';

class consolas extends DB
{
    private $id;
    private $nombre;
    private $numero;
    private $serie;
    private $descripcion;
    private $borrado; 

    public function updateconsolas($id, $nombre, $descripcion, $numero, $serie, $borrado)
    {
        $consola = $this->connect()->prepare('UPDATE `consolas` SET `Nombre_consola` = :nombre, `Numero_consola` = :numero,
        `NumeroSerie_consola` = :serie, `Descripcion_consola`= :descripcion, `borrado`= :borrado  WHERE idConsola = :id');
        $consola->execute([
            'nombre' => $nombre,
            'numero' => $numero,
            'serie' => $serie,
            'descripcion' => $descripcion,
            'borrado' => $borrado,
            'id' => $id
        ]);
        echo "Datos Guardados";
    }

    public function setconsolas($id)
    {
        $consola = $this->connect()->prepare('SELECT * from consolas WHERE idConsola = :id');
        $consola->execute(['id' => $id]);

        foreach ($consola as $currentUser) {
            $this->id = $currentUser['idConsola'];
            $this->nombre = $currentUser['Nombre_consola'];
            $this->numero = $currentUser['Numero_consola'];
            $this->serie = $currentUser['NumeroSerie_consola'];
            $this->descripcion = $currentUser['Descripcion_consola'];
            $this->borrado = $currentUser['borrado'];
        }
    }

    public function addconsolas($nombre, $descripcion, $numero, $serie)
    {
        $consola = $this->connect()->prepare('INSERT INTO `consolas`(`idConsola`, `Nombre_consola`, `Numero_consola`, `NumeroSerie_consola`, `Descripcion_consola`, `borrado`) 
        VALUES (?,?,?,?,?,?)');
        $consola->execute([NULL, $nombre, $numero, $serie, $descripcion, 0]);
        echo "Datos Guardados";
    }


    public function getall(){
        $consolas = $this->connect()->prepare('SELECT * FROM consolas');
        $consolas->execute();
        return $consolas;
    }

    public function getid()
    {
        return $this->id;
    }

    public function getnombre()
    {
        return $this->nombre;
    }

    public function getnumero()
    {
        return $this->numero;
    }

    public function getserie()
    {
        return $this->serie;
    }

    public function getdescripcion()
    {
        return $this->descripcion;
    }

    public function getborrado(){
        return $this->borrado;
    }
}
