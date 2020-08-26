<?php
require 'header.php';
require 'navbar.php';
?>
<div class="container-fluid" id="crud-back">

    <div class="row w-100 h-100 justify-content-center align-items-center">

        <h1 class="crud-title">Gestión de usuarios</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-condensed">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Identificación</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Password</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Estado</th>
                        <th scope="col" class="bg-success">
                            <a href="user-create.php">
                                <span style="color: White;">
                                    <i class="fas fa-plus-circle"></i>
                                </span>
                            </a>
                        </th>
                        <th scope="col" class="bg-success">Crear</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once '../model/database.php';
                    $sql = "SELECT * FROM USUARIO WHERE estadoUsuario = true";
                    $result = mysqli_query($conection, $sql);
    
                    while ($mostrar = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $mostrar["idUsuario"] ?></td>
                            <td><?php echo $mostrar["nombreUsuario"] ?></td>
                            <td><?php echo $mostrar["apellidoUsuario"] ?></td>
                            <td><?php echo $mostrar["correoUsuario"] ?></td>
                            <td><?php echo $mostrar["telefonoUsuario"] ?></td>
                            <td><?php echo $mostrar["direccionUsuario"] ?></td>
                            <td><?php echo $mostrar["passwordUsuario"] ?></td>
                            <td><?php echo $mostrar["rolUsuario"] ?></td>
                            <td><?php echo $mostrar["estadoUsuario"] ? 'Activo' : 'Inactivo' ?></td>
                            <td class="bg-info">
                                <a href="user-update.php?rolUsuario=<?php echo $mostrar["rolUsuario"] ?>&action=3&estadoUsuario=<?php echo $mostrar["estadoUsuario"] == 1 ? true : "false" ?>&idUsuarioOld=<?php echo $mostrar["idUsuario"] ?>&nombreUsuario=<?php echo $mostrar["nombreUsuario"] ?>&apellidoUsuario=<?php echo $mostrar["apellidoUsuario"] ?>&correoUsuario=<?php echo $mostrar["correoUsuario"] ?>&telefonoUsuario=<?php echo $mostrar["telefonoUsuario"] ?>&direccionUsuario=<?php echo $mostrar["direccionUsuario"] ?>&passwordUsuario=<?php echo $mostrar["passwordUsuario"] ?> ">
                                    <span style="color: White;">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                </a>
                            </td>
                            <td class="bg-danger">
                                <a href="../controller/controller.php?eliminar=true&idUsuario=<?php echo $mostrar["idUsuario"] ?>">
                                    <span style="color: White;">
                                        <i class="fas fa-trash-alt"></i>
                                    </span>
                                </a>
                            </td>
    
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<footer class="sticky-bottom ">
    <div class="row">
        <div class="col">
            <p>Copyright &copy; Sena 2019</p>
        </div>
        <div class="col">
            <div>Icons made by <a href="https://www.flaticon.es/autores/freepik" title="Freepik">Freepik and <a href="https://www.flaticon.es/autores/monkik" title="monkik">monkik</a> </a> from <a href="https://www.flaticon.es/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
        </div>
    </div>
</footer>
</body>

</html>