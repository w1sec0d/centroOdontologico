<?php
require_once 'navbar.php';
?>

<body class="w-100 h-100" style="background: url('../img/users_back.jpg'); background-size: cover; background-repeat: no-repeat">
    <div class="container-fluid w-100 h-100">

        <div class="row w-100 h-100 justify-content-center align-items-center">
            <div class="table-responsive-lg">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Identificación</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Telefono</th>
                            <th scope="col">Dirección</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Estado</th>
                            <th scope="col" class="bg-success">
                                <a href="../controller/crud.php?action=1">
                                    <span style="color: White;">
                                        <i class="fas fa-plus-circle"></i>
                                    </span>
                                </a>
                            </th>
                            <th scope="col" class="bg-success">Crear Usuario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require_once '../model/database.php';
                        $sql = "SELECT * FROM USUARIO";
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
                                <td><?php echo $mostrar["rolUsuario"] ?></td>
                                <td><?php echo $mostrar["estadoUsuario"] ?></td>
                                <td class="bg-info">
                                    <a href="user_update.php?action=3&ID=<?php echo $mostrar["ID"] ?>&NOMBRE=<?php echo $mostrar["NOMBRE"] ?>&PRECIO=<?php echo $mostrar["PRECIO"] ?>&CANTIDAD=<?php echo $mostrar["CANTIDAD"] ?>">
                                        <span style="color: White;">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                    </a>
                                </td>
                                <td class="bg-danger">
                                    <a href="../controller/controller.php?rolUsuario=1&action=4&idUsuario=<?php echo $mostrar["idUsuario"] ?>">
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
</body>
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

</html>