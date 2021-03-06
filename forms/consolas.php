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
    private $costo;
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

    public function eliminar($id)
    {
        $consolael = $this->connect()->prepare('UPDATE `consolas` SET borrado = :borrado  WHERE idConsola = :id');
        $consolael->execute([
            'borrado' => '1',
            'id' => $id
        ]);
        echo "consolaac";
    }

    public function activar($id)
    {
        $consolaac = $this->connect()->prepare('UPDATE `consolas` SET `borrado`= :borrado  WHERE idConsola = :id');
        $consolaac->execute([
            'borrado' => '0',
            'id' => $id
        ]);
        echo "consolaac";
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

    public function addconsolas($nombre, $tarifa, $descripcion, $numero, $serie)
    {
        $consola = $this->connect()->prepare('INSERT INTO `consolas`(`idConsola`, `idtarifa`, `Nombre_consola`, `Numero_consola`, `NumeroSerie_consola`, `Descripcion_consola`, `borrado`) 
        VALUES (?,?,?,?,?,?,?)');
        $consola->execute([NULL,  $tarifa, $nombre, $numero, $serie, $descripcion, 0]);
        echo "Datos Guardados";
    }

    public function getall()
    {
        $consolas = $this->connect()->prepare('SELECT * FROM consolas');
        $consolas->execute();
        return $consolas;
    }

    public function getallandtarifa()
    {
        $consolas = $this->connect()->prepare('SELECT * FROM consolas JOIN tarifas ON consolas.idtarifa = tarifas.id');
        $consolas->execute();
        return $consolas;
    }

    public function getallonlyone($id)
    {
        $consolas = $this->connect()->prepare('SELECT * FROM consolas JOIN tarifas ON consolas.idtarifa = tarifas.id WHERE idConsola = :id');
        $consolas->execute(['id' => $id]);
        foreach ($consolas as $currentUser) {
            $this->id = $currentUser['idConsola'];
            $this->nombre = $currentUser['Nombre_consola'];
            $this->numero = $currentUser['Numero_consola'];
            $this->serie = $currentUser['NumeroSerie_consola'];
            $this->descripcion = $currentUser['Descripcion_consola'];
            $this->costo = $currentUser['costo'];
            $this->borrado = $currentUser['borrado'];
        }
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

    public function getcosto(){
        return $this->costo;
    }


    public function getborrado()
    {
        return $this->borrado;
    }
}
