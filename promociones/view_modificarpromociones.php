<!--<h1>Descripcion de la promocion</h1>-->
<div class="table-responsive">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Descripcion</th> <!-- Codigo_usuario -->
                <th scope="col">Monedas</th> <!-- Monedas_usuario -->
                <th scope="col">Accion</th> <!-- Borrado -->
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            $promo->setreferidos();
            $consulta = $promo->get();
            $i = 0;
            /* print_r($consulta); */
            if (sizeof($consulta) > 0) {
                for($i = 0; $i < sizeof($consulta); $i++){
                    echo "<tr>";
                    echo '<th scope="row">' . ($i+1) . '</th>';
                    echo '<td>' . $consulta[$i]['Descripcion'] . '</td>'; 
                    echo '<td>' . $consulta[$i]['Monedas'] . '</td>';
                    echo '<td><a href="promociones/editarpromocion.php?id='. $consulta[$i]['Promociones_id'] .  '">
                    <input type="button" class="btn btn-primary" value="Editar"></a></td>';
                    echo '</tr>';
                }
            }
            ?>
            
        </tbody>
    </table>
</div>