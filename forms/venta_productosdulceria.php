<?php
include_once 'Dbconnection.php';
/* SELECT MAX(idUsuario) AS idUsuario FROM usuarios */
class venta_productosdulceria extends DB
{
    private $idVenta_productosDulceria;
    private $venta;
    private $dulceria;

    public function add($idproducto,$total,$cantidades,$pago)
    {
        ini_set( 'date.timezone', 'America/Mexico_City' );
        $fecha = date('yy'). "-" . date('m'). "-" . date("d");
        for ($i = 0; $i < sizeof($idproducto); $i++) {
            if ($i == 0) {
                $dulceriap = $this->connect()->prepare('INSERT INTO `venta_productosdulceria`(`idVenta_productosDulceria`, `venta`, `dulceria`, `cantidad`)
            VALUES (?,?,?,?)');
                $dulceriap->execute([NULL, NULL, $idproducto[$i],$cantidades[$i]]);

                $primer = $this->connect()->prepare('SELECT MAX(idVenta_productosDulceria) AS idVenta_productosDulceria FROM venta_productosdulceria');
                $primer->execute();

                foreach ($primer as $currentUser) {
                    $this->dulceria = $currentUser['idVenta_productosDulceria'];
                }

                

                $venta = $this->connect()->prepare('INSERT INTO `venta_dulceria`(`idventa_dulceria`, `Fecha`, `Productos`, `Total`, `pago`) 
            VALUES (?,?,?,?,?)');
                $venta->execute([NULL, $fecha,$this->dulceria,$total,$pago]);
                
                $primerventa = $this->connect()->prepare('SELECT MAX(idventa_dulceria) AS idventa_dulceria FROM venta_dulceria');
                $primerventa->execute();

                foreach ($primerventa as $currentUser) {
                    $this->venta = $currentUser['idventa_dulceria'];
                }

                $updateduleria1 = $this->connect()->prepare('UPDATE `venta_productosdulceria` SET `venta`= :venta
                WHERE `idVenta_productosDulceria`= :id');
                $updateduleria1->execute(['venta' => $this->venta, 'id'=>$this->dulceria]);

                
            }else{
                $dulceriap = $this->connect()->prepare('INSERT INTO `venta_productosdulceria`(`idVenta_productosDulceria`, `venta`, `dulceria`, `cantidad`)
            VALUES (?,?,?,?)');
                $dulceriap->execute([NULL, $this->venta, $idproducto[$i],$cantidades[$i]]);
                
            }
        }
        return "Venta Realizada";
    }
}
