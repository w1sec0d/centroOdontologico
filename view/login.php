<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/img/brandIcon.ico">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Alata&family=Open+Sans&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <link rel="stylesheet" href="../assets/css/loginStyle.css">
    <title>Login</title>
</head>

<body>
    <form class="login-form" id="login-form" method="post">
        <img src="../assets/img/loginIcon.png" alt="Mundo Oral" id="login-icon">
        <h1 class="text-nowrap" id="login-title">INICIO DE SESIÓN</h1>
        <div class="form-group">
            <label for="idUsuario" class="text-nowrap">Ingresa tu documento:</label>
            <input type="text" name="idUsuario" class="form-control" id="user" placeholder="Usuario" autofocus>
        </div>
        <div class="form-group">
            <label for="passwordUsuario text-center" class="text-nowrap">Ingresa tu contraseña:</label>
            <input type="password" name="passwordUsuario" class="form-control" id="password" placeholder="Contraseña">
        </div>
        <input type="submit" value="Continuar" name="login" class="btn btn-primary">
    </form>
    <?php
    require_once '../controller/controller.php';
    ?>
    <footer class="bg-dark fixed-bottom">
        <p>
            Fondo creado por <a href="https://www.freepik.es/vectores/personas">pch.vector</a> - www.freepik.es
        </p>
    </footer>
</body>

</html>