<?php
session_start();
?>
<!DOCTYPE html>
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


<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top w-90">
        <a class="navbar-brand" href="../view/index_body.php">Centro Odontológico Mundo Oral</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index_body.php"><i class="fas fa-home"></i></a>
                </li>
                <?php
                if ($_SESSION["rolUsuarioNavegando"]  == 1) {
                    echo "<li class='nav-item' id='users_menu'><a class='nav-link' href='user_crud.php'><i class='fas fa-users'></i>Usuarios</a></li>";
                };

                if ($_SESSION["rolUsuarioNavegando"]  == 2) {
                    echo "<li class='nav-item' id='doctor'><a class='nav-link' href='gestionar_cita_medico.php'><i class='fas fa-book'></i>Agenda Médica</a></li>";
                };
                ?>

                <li class='nav-item drop'>
                    <a class='nav-link' href='gestionar_cita.php'>
                        <i class='fas fa-user-nurse'></i>Citas
                    </a>
                </li>

                <li class='nav-item'>
                    <a class='nav-link' href='registrar_historia.php'>
                        <i class='fas fa-clinic-medical'></i>Historia Clínica
                    </a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href="registrar_examen.php">
                        <i class='fas fa-syringe'></i>Exámenes de Laboratorio
                    </a>
                </li>
                <?php
                if ($_SESSION["rolUsuarioNavegando"] == 1) {
                    echo ("<li class='nav-item dropdown' id='reports'><a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='fas fa-chart-bar'></i>Reportes</a><div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'><a class='dropdown-item' href='#'>Citas por médico</a><a class='dropdown-item' href='#'>Asistencia pacientes</a><a class='dropdown-item' href='#'>Historia Clínica</a><a class='dropdown-item' href='#'>Estado de Citas</a></div></li>");
                };
                ?>
                <a href='../index.php'>
                    <button class='btn btn-primary'><i class='fas fa-sign-out-alt'></i></button>
                </a>
            </ul>
        </div>
    </nav>