<?php
include_once 'Dbconnection.php';


class renta extends DB
{
    private $id;
    private $fecha;
    private $hora;
    private $consola;
    private $juego;


    public function set($id)
    {
        $renta = $this->connect()->prepare('SELECT * from renta WHERE idRenta = :id');
        $renta->execute(['id' => $id]);

        foreach ($renta as $currentUser) {
            $this->id = $currentUser['idRenta'];
            $this->fecha = $currentUser['Fecha_renta'];
            $this->hora = $currentUser['Hora_renta'];
            $this->consola = $currentUser['Consola_renta'];
            $this->juego = $currentUser['Juego_renta'];
        }
    }

    public function add($consola, $juego,$pago)
    {
        ini_set( 'date.timezone', 'America/Mexico_City' );
        $fecha = date('yy'). "-" . date('m'). "-" . date("d");
        $consola = $this->connect()->prepare('INSERT INTO `renta`(`idRenta`, `Fecha_renta`, `Hora_renta`, `Consola_renta`, `Juego_renta`, `Accesorios_renta`, `pago`) 
        VALUES (?,?,?,?,?,?,?)');
        $consola->execute([NULL, NULL, NULL, $consola, $juego, NULL, $pago]);
        echo "Datos Guardados";
    }

    public function getid()
    {
        return $this->id;
    }

    public function getfecha()
    {
        return $this->fecha;
    }

    public function gethora()
    {
        return $this->hora;
    }

    public function getconsola()
    {
        return $this->consola;
    }

    public function getjuego()
    {
        return $this->juego;
    }
}
