<?php 
include_once 'Dbconnection.php';



class tarifas extends DB {
    private $id;
    private $nombre;
    private $costo;


    public function set($id){
        $tarifa = $this->connect()->prepare('SELECT * from tarifas WHERE id = :id');
        $tarifa->execute(['id' => $id]);

        foreach ($tarifa as $currentUser) {
            $this->id = $currentUser['id'];
            $this->nombre = $currentUser['nombre'];
            $this->costo = $currentUser['costo'];
        }
    }
    public function add($nombre,$costo){
        $tarifa = $this->connect()->prepare('INSERT INTO `tarifas`(`id`, `nombre`, `costo`)  
        VALUES (?,?,?)');
        $tarifa->execute([NULL, $nombre, $costo]);
        echo "Datos Guardados";
    }

    public function update($id,$nombre,$costo){
        $tarifa = $this->connect()->prepare('UPDATE `tarifas` SET `nombre` = :nombre, costo= :costo WHERE id = :id');
        $tarifa->execute([
            'nombre' => $nombre,
            'costo' => $costo,
            'id' => $id
        ]);
        echo "Datos Guardados";
    }

    public function deleted($id){
        $consola = $this->connect()->prepare(' DELETE FROM `tarifas` WHERE id = :id');
        $consola->execute([
            'id' => $id
        ]);
        echo "dulceriaac";
    }

    public function getall(){
        $tarifa = $this->connect()->prepare('SELECT * from tarifas');
        $tarifa->execute();
        return $tarifa;
    }

    public function getid(){
        return $this->id;
    }

    public function getnombre(){
        return $this->nombre;
    }

    public function getcosto(){
        return $this->costo;
    }

}

?>