<?php
require_once '../model/database.php';
require_once 'navbar.php';
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
            <form method="post" class="w-60 h-70" id="edit-user-form">
                <h1 class="font-weight-bold text-center">
                    Nuevo Usuario
                </h1>
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="idUsuario">ID</label>
                            <input type="text" name="idUsuario" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="nombreUsuario">Nombre</label>
                            <input type="text" name="nombreUsuario" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <label for="apellidoUsuario">Apellido</label>
                            <input type="text" name="apellidoUsuario" class="form-control">
                        </div>
                        <div class="form-group">

                            <label for="correoUsuario">Correo</label>
                            <input type="email" name="correoUsuario" class="form-control">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="telefonoUsuario">Telefono</label>
                            <input type="text" name="telefonoUsuario" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="direccionUsuario">Direccion</label>
                            <input type="text" name="direccionUsuario" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="rolUsuario">Rol</label>
                            <select name="rolUsuario" class="form-control">
                                <option value="Secretaria"> Secretaria</option>
                                <option value="Medico">Medico</option>
                                <option value="Paciente">Paciente</option>
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
                    <input type="text" name="passwordUsuario" class="form-control">
                </div>
                <input type="submit" name="create" class="btn btn-primary btn-lg">
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