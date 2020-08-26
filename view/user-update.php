<?php
require_once '../model/database.php';
require_once 'header.php';
require_once 'navbar.php';

if (isset($_REQUEST["idUsuarioOld"])) {
    $_SESSION["update"] = true;
    $idUsuarioOld = $_REQUEST["idUsuarioOld"];
} else {
    $idUsuarioOld = "";
}
if (isset($_REQUEST["nombreUsuario"])) {
    $nombreUsuario = $_REQUEST["nombreUsuario"];
} else {
    $nombreUsuario = "";
}
if (isset($_REQUEST["apellidoUsuario"])) {
    $apellidoUsuario = $_REQUEST["apellidoUsuario"];
} else {
    $apellidoUsuario = "";
}
if (isset($_REQUEST["correoUsuario"])) {
    $correoUsuario = $_REQUEST["correoUsuario"];
} else {
    $correoUsuario = "";
}
if (isset($_REQUEST["telefonoUsuario"])) {
    $telefonoUsuario = $_REQUEST["telefonoUsuario"];
} else {
    $telefonoUsuario = "";
}
if (isset($_REQUEST["direccionUsuario"])) {
    $direccionUsuario = $_REQUEST["direccionUsuario"];
} else {
    $direccionUsuario = "";
}
if (isset($_REQUEST["passwordUsuario"])) {
    $passwordUsuario = $_REQUEST["passwordUsuario"];
} else {
    $passwordUsuario = "";
}
if (isset($_REQUEST["rolUsuario"])) {
    $rolUsuario = $_REQUEST["rolUsuario"];
} else {
    $rolUsuario = "";
}
if (isset($_REQUEST["estadoUsuario"])) {
    $estadoUsuario = $_REQUEST["estadoUsuario"];
} else {
    $estadoUsuario = "";
}
?>

<body class="w-100 h-100" >
    <div class="container-fluid w-100 h-100" id="crud-back">

        <div class="row w-100 h-100 justify-content-center align-items-center">
            <form method="post" class="w-60 h-70" id="edit-user-form">
                <h1 class="font-weight-bold text-center">
                    <?php
                    if ($idUsuarioOld) {
                        echo "Editar Usuario <b style='color: coral'>$nombreUsuario</b>";
                    } else {
                        echo "Nuevo Usuario";
                    };
                    ?>
                </h1>
                <div class="row">
                    <div class="col">

                        <input type="text" name="idUsuarioOld" class="hidden" value="<?php echo $idUsuarioOld ?>" />

                        <div class="form-group">
                            <label for="idUsuario">ID</label>
                            <input type="text" name="idUsuario" class="form-control" value="<?php echo $idUsuarioOld ?>" />
                        </div>
                        <div class="form-group">
                            <label for="nombreUsuario">Nombre</label>
                            <input type="text" name="nombreUsuario" class="form-control" value="<?php echo $nombreUsuario ?>" />
                        </div>
                        <div class="form-group">
                            <label for="apellidoUsuario">Apellido</label>
                            <input type="text" name="apellidoUsuario" class="form-control" value="<?php echo $apellidoUsuario ?>">
                        </div>
                        <div class="form-group">

                            <label for="correoUsuario">Correo</label>
                            <input type="email" name="correoUsuario" class="form-control" value="<?php echo $correoUsuario ?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="telefonoUsuario">Telefono</label>
                            <input type="text" name="telefonoUsuario" class="form-control" value="<?php echo $telefonoUsuario ?>">
                        </div>
                        <div class="form-group">
                            <label for="direccionUsuario">Direccion</label>
                            <input type="text" name="direccionUsuario" class="form-control" value="<?php echo $direccionUsuario ?>">
                        </div>
                        <div class="form-group">
                            <label for="rolUsuario">Rol</label>
                            <select name="rolUsuario" class="form-control">
                                <option <?php echo $rolUsuario == 'Secretaria' ? 'selected' : ''; ?> value="Secretaria"> Secretaria</option>
                                <option <?php echo $rolUsuario == 'Medico' ? 'selected' : ''; ?> value="Medico">Medico</option>
                                <option <?php echo $rolUsuario == 'Paciente' ? 'selected' : ''; ?> value="Paciente">Paciente</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="estadoUsuario">Estado</label>
                            <select name="estadoUsuario" class="form-control">
                                <option value="true" <?php echo isset($estadoUsuario) ? 'selected' : ''; ?>>Activo</option>
                                <option value="false" <?php echo isset($estadoUsuario) ? '' : 'selected'; ?>>Inactivo</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="passwordUsuario">Contraseña</label>
                    <input type="text" name="passwordUsuario" class="form-control" value="<?php echo $passwordUsuario ?>">
                </div>
                <input type="submit" name="update" value="<?php if ($idUsuarioOld) {
                                                                echo "Actualizar";
                                                            } else echo "Crear Usuario"; ?>" class="btn btn-primary btn-lg">
                <?php require_once '../controller/controller.php'; ?>
            </form>
        </div>

    </div>
</body>
<footer class="sticky-bottom">
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