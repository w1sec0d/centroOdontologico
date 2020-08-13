<?php
require_once '../model/database.php';
require_once 'navbar.php';

if ($_REQUEST["idUsuario"]) {
    $idUsuario = $_REQUEST["idUsuario"];
    $_SESSION["update"] = true;
}
if ($_REQUEST["nombreUsuario"]) {
    $nombreUsuario = $_REQUEST["nombreUsuario"];
}
if ($_REQUEST["apellidoUsuario"]) {
    $apellidoUsuario = $_REQUEST["apellidoUsuario"];
}
if ($_REQUEST["correoUsuario"]) {
    $correoUsuario = $_REQUEST["correoUsuario"];
}
if ($_REQUEST["telefonoUsuario"]) {
    $telefonoUsuario = $_REQUEST["telefonoUsuario"];
}
if ($_REQUEST["direccionUsuario"]) {
    $direccionUsuario = $_REQUEST["direccionUsuario"];
}
if ($_REQUEST["rolUsuario"]) {
    $rolUsuario = $_REQUEST["rolUsuario"];
}
if ($_REQUEST["estadoUsuario"]) {
    $estadoUsuario = $_REQUEST["estadoUsuario"];
}
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|PT+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style2.css">
    <title>Centro Odontológico Mundo Oral</title>
</head>

<body class="w-100 h-100" style="background: url('../img/users_back.jpg'); background-size: cover; background-repeat: no-repeat">
    <div class="container-fluid w-100 h-100">

        <div class="row w-100 h-100 justify-content-center align-items-center">
            <form action="../controller/controller.php" method="post">
                <h1 class="font-weight-bold text-center">
                    <?php
                    if ($idUsuario) {
                        echo "Editar Usuario <b style='color: coral'>$nombreUsuario</b>";
                    } else {
                        echo "Nuevo Usuario";
                    };
                    ?>
                </h1>
                <div class="form-group">
                    <label for="nombreUsuario">ID</label>
                    <input type="text" name="idUsuario" class="form-control" value="<?php echo $idUsuario ?>" />
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
                    <select name="rolUsuario" class="form-control">
                        <option value="true" <?php echo isset($estadoUsuario) ? 'selected' : ''; ?>>Activo</option>
                        <option value="false" <?php echo isset($estadoUsuario) ? '' : 'selected'; ?>>Inactivo</option>
                    </select>
                </div>
                <input type="submit" name="form_button" value="<?php if ($idUsuario) {echo "Actualizar";} else echo "Crear Usuario";?>" class="btn btn-success botonFormulario">
            </form>
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