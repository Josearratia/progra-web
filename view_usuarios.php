<div class="row justify-content-center h-100">
    <div class="col-lg-8 mt-5 mt-lg-0">
        <div class="col-sm-12 align-self-center text-center">
            <div class="card shadow">
                <div class="card-body">
                    <h1>Categoria Usuarios</h1>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Borrar</th> <!-- Borrado -->
                                    <th scope="col">Codigo de usuario</th> <!-- Codigo_usuario -->
                                    <th scope="col">Apodo de jugador</th> <!-- nickname_usuario -->
                                    <th scope="col">Nombre</th> <!-- Nombre_usuario -->
                                    <th scope="col">Apellido(s)</th> <!-- ApellidoP_usuario -->
                                    <th scope="col">Edad</th> <!-- FechaN_usuario -->
                                    <th scope="col">Sexo</th> <!-- Genero_usuario -->
                                    <th scope="col">Telefono</th> <!-- Telefono_usuario -->
                                    <th scope="col">Correo</th> <!-- Correo_electronico -->
                                    <th scope="col">Facebook</th> <!-- FB_usuario -->
                                    <th scope="col">Youtube</th> <!-- YT_usuairo -->
                                    <th scope="col">Twitch</th> <!-- Twitch_usuario -->
                                    <th scope="col">Twitter</th>
                                    <!--Twitter_usuario -->
                                    <th scope="col">Instragram</th> <!-- IG_usuario -->
                                    <th scope="col">Monedas</th> <!-- Monedas_usuario -->
                                    <th scope="col">Rol de usuario</th> <!-- Rol_usuario -->
                                    <th scope="col">Borrado</th> <!-- Borrado -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $consulta = $user->allusers();
                                $i = 0;
                                if ($consulta->rowCount() > 0) {
                                    while ($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
                                        $i += 1;
                                        echo "<tr>";
                                        echo '<th scope="row">' . $i . '</th>';

                                        if ($row['Borrado'] == 0) {
                                            echo '<td>
                                            <form action="forms/eliminar.php" method="post" role="form" id="eliminar">
                                            <input name="id" type="hidden" value="'.$row['Codigo_usuario'].'">
                                            <input type="submit" class="btn btn-danger" value="Eliminar">
                                            </form>
                                            </td>';
                                        } else {
                                            echo '<td>
                                            <form action="forms/activar.php" method="post" role="form" id="activar">
                                            <input name="id" type="hidden" value="'.$row['Codigo_usuario'].'">
                                            <input type="submit" class="btn btn-success" value="Activar">
                                            </form>
                                            </td>';
                                        }

                                        echo '<td>' . $row['Codigo_usuario'] . '</td>';
                                        echo '<td>' . $row['nickname_usuario'] . '</td>';
                                        echo '<td>' . $row['Nombre_usuario'] . '</td>';
                                        echo '<td>' . $row['ApellidoP_usuario'] . '</td>';
                                        echo '<td>' . $row['FechaN_usuario'] . '</td>';
                                        echo '<td>' . $row['Genero_usuario'] . '</td>';
                                        echo '<td>' . $row['Telefono_usuario'] . '</td>';
                                        echo '<td>' . $row['Correo_electronico'] . '</td>';
                                        echo '<td>' . $row['FB_usuario'] . '</td>';
                                        echo '<td>' . $row['YT_usuairo'] . '</td>';
                                        echo '<td>' . $row['Twitch_usuario'] . '</td>';
                                        echo '<td>' . $row['Twitter_usuario'] . '</td>';
                                        echo '<td>' . $row['IG_usuario'] . '</td>';
                                        echo '<td>' . $row['Monedas_usuario'] . '</td>';
                                        echo '<td>' . $row['Rol_usuario'] . '</td>';
                                        if ($row['Borrado'] == 0) {
                                            echo '<td>Activo</td>';
                                        } else {
                                            echo '<td>Eliminado</td>';
                                        }
                                        echo '</tr>';
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>