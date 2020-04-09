<?php
include_once 'Dbconnection.php';
class dulceria extends DB
{

    private $id_producto;
    private $Nombre_producto;
    private $Costo_producto;
    private $cantidad_Stock;


    public function set($id){
        $dulce = $this->connect()->prepare('SELECT * from dulceria WHERE id_producto = :id');
        $dulce->execute(['id' => $id]);

        foreach ($dulce as $currentUser) {
            $this->id_producto = $currentUser['id_producto'];
            $this->Nombre_producto = $currentUser['Nombre_producto'];
            $this->Costo_producto = $currentUser['Costo_producto'];
            $this->cantidad_Stock = $currentUser['cantidad_Stock'];
        }
    }

    public function add($nombre, $costo, $cantidad){
        $dulceria = $this->connect()->prepare('INSERT INTO `dulceria`(`id_producto`, `Nombre_producto`, `Costo_producto`, `cantidad_Stock`) 
        VALUES (?,?,?,?)');
        $dulceria->execute([NULL, $nombre, $costo, $cantidad]);
        echo "Datos Guardados";
    }

    public function update($id,$nombre, $costo, $cantidad){
        $dulce = $this->connect()->prepare('UPDATE `dulceria` SET `Nombre_producto` = :nombre, `Costo_producto` = :costo,
        `cantidad_Stock` = :cantidad  WHERE id_producto = :id');
        $dulce->execute([
            'nombre' => $nombre,
            'costo' => $costo,
            'cantidad' => $cantidad,
            'id' => $id
        ]);
        echo "Datos Guardados";
    }

    public function delete($id){
        $consola = $this->connect()->prepare(' DELETE FROM `dulceria` WHERE id_producto = :id');
        $consola->execute([
            'id' => $id
        ]);
        echo "Datos Guardados";
    }



    public function getall(){
        $dulceria = $this->connect()->prepare('SELECT * FROM dulceria');
        $dulceria->execute();
        return $dulceria;
    }

    public function getid(){
        return $this->id_producto;
    }

    public function getnombre(){
        return $this->Nombre_producto;
    }

    public function getcosto(){
        return $this->Costo_producto;
    }

    public function getcatidad(){
        return $this->cantidad_Stock;
    }
}
