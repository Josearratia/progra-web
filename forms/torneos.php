<?php
include_once "Dbconnection.php";

class torneos extends DB
{
    private $idTorneos;
    private $Nombre_torneo;
    private $Descripcion_torneo;
    private $Juego_torneo;
    private $Fecha_torneo;
    private $Hora_torneo;
    private $Modalidad_torneo;
    private $Forma_torneo;
    private $Cantidad_Max_Jugadores_torneo;
    private $Premios_torneo;
    private $Estatus_torneo;
    private $borrado;


    public function set($id)
    {
        $torneo = $this->connect()->prepare('SELECT * from torneos WHERE idTorneos = :id');
        $torneo->execute(['id' => $id]);

        foreach ($torneo as $currentUser) {
            $this->idTorneos = $currentUser['idTorneos'];
            $this->Nombre_torneo = $currentUser['Nombre_torneo'];
            $this->Descripcion_torneo = $currentUser['Descripcion_torneo'];
            $this->Juego_torneo = $currentUser['Juego_torneo'];
            $this->Fecha_torneo = $currentUser['Fecha_torneo'];
            $this->Hora_torneo = $currentUser['Hora_torneo'];
            $this->Modalidad_torneo = $currentUser['Modalidad_torneo'];
            $this->Forma_torneo = $currentUser['Forma_torneo'];
            $this->Cantidad_Max_Jugadores_torneo = $currentUser['Cantidad_Max_Jugadores_torneo'];
            $this->Premios_torneo = $currentUser['Premios_torneo'];
            $this->Estatus_torneo = $currentUser['Estatus_torneo'];
            $this->borrado = $currentUser['borrado'];
        }
    }

    public function update($id, $nombre, $descripcion, $juego, $fecha, $hora, $modalidad, $forma, $cantidad, $premios, $estatus)
    {
        $torneo = $this->connect()->prepare('UPDATE `torneos` SET `Nombre_torneo`= :nombre,
        `Descripcion_torneo`=:descripcion,`Juego_torneo`=:juego,`Fecha_torneo`=:fecha,`Hora_torneo`=:hora,
        `Modalidad_torneo`=:modalidad,`Forma_torneo`=:forma,`Cantidad_Max_Jugadores_torneo`=:cantidadmax,
        `Premios_torneo`=:premios,`Estatus_torneo`=:estatus,`borrado`=:borrado 
        WHERE idTorneos = :id');
        $torneo->execute([
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'juego' => $juego,
            'fecha' => $fecha,
            'hora' => $hora,
            'modalidad' => $modalidad,
            'forma' => $forma,
            'cantidadmax' => $cantidad,
            'premios' =>  $premios,
            'estatus' => $estatus,
            'borrado' => 0,
            'id' => $id
        ]);
        echo "Datos Guardados";
    }

    public function add($nombre, $descripcion, $juego, $fecha, $hora, $modalidad, $forma, $cantidad, $premios, $estatus)
    {
        $consola = $this->connect()->prepare('INSERT INTO `torneos`(`idTorneos`, `Nombre_torneo`, `Descripcion_torneo`, `Juego_torneo`, `Fecha_torneo`, `Hora_torneo`, `Modalidad_torneo`, `Forma_torneo`, `Cantidad_Max_Jugadores_torneo`, `Premios_torneo`, `Estatus_torneo`, `borrado`) 
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?)');
        $consola->execute([NULL, $nombre, $descripcion, $juego,$fecha,$hora,$modalidad,$forma,$cantidad,$premios,$estatus, 0]);
        echo "Datos Guardados";
    }

    public function eliminar($id){
        $torneo = $this->connect()->prepare('UPDATE `torneos` SET borrado = :borrado  WHERE idTorneos = :id');
        $torneo->execute([
            'borrado' => '1',
            'id' => $id
        ]);
        echo "torneoac";
    }

    public function activar($id){
        $torneo = $this->connect()->prepare('UPDATE `torneos` SET borrado = :borrado  WHERE idTorneos = :id');
        $torneo->execute([
            'borrado' => '0',
            'id' => $id
        ]);
        echo "torneoac";
    }

    public function getall(){
        $torneo = $this->connect()->prepare('SELECT * FROM torneos');
        $torneo->execute();
        return $torneo;
    }

    public function getid()
    {
        return $this->idTorneos;
    }

    public function getnombre()
    {
        return $this->Nombre_torneo;
    }

    public function getdescripcion()
    {
        return $this->Descripcion_torneo;
    }

    public function getjuego()
    {
        return $this->Juego_torneo;
    }

    public function getfecha()
    {
        return $this->Fecha_torneo;
    }

    public function gethora()
    {
        return $this->Hora_torneo;
    }

    public function getmodalidad()
    {
        return $this->Modalidad_torneo;
    }

    public function getforma()
    {
        return $this->Forma_torneo;
    }

    public function getcantidad()
    {
        return $this->Cantidad_Max_Jugadores_torneo;
    }

    public function getpremio()
    {
        return $this->Premios_torneo;
    }

    public function getestatus()
    {
        return $this->Estatus_torneo;
    }

    public function getborrado()
    {
        return $this->borrado;
    }
}
