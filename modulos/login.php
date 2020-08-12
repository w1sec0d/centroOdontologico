
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.ico">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <title>Login</title>
</head>

<body>
    <form class="login-form" method="$_POST">
        <h1 class="login_title text-center">Inicio de sesión</h1>
        <img src="../img/form-icon.png" alt="Ícono Centro Odontológico" class="login-icon">
        <div class="form-group">
            <label for="idUsuario text-center">Ingresa tu documento:</label>
            <input type="text" name="idUsuario" id="input_user" class="form-control" placeholder="Usuario" required autofocus>
        </div>
        <div class="form-group">
            <label for="passwordUsuario text-center">Ingresa tu contraseña:</label>
            <input type="password" name="passwordUsuario" id="input_password" class="form-control" placeholder="Contraseña" required>
        </div>
        <input type="submit" value="Continuar" name="login" class="btn btn-primary">
    </form>
    <?php
        require_once '../controller/controller.php';
    ?>
    <script>
        localStorage.clear();
    </script>
</body>

</html>