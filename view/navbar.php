<?php
session_start();
?>

<body>
    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
        <a href="../index.php" class="navbar-brand">
            <img src="../assets/img/brandLogoWhite.png" alt="Centro Odontológico Mundo Oral" class="img-responsive" id="navbarBrandImg" width="100" height="30">
        </a>
        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapsableMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapsableMenu">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php"><i class="fas fa-home"></i></a>
                </li>
                <?php
                if ($_SESSION["rolUsuarioNavegando"]  == 1) {
                    echo "<li class='nav-item' id='users_menu'><a class='nav-link' href='user-crud.php'><i class='fas fa-users'></i> Usuarios </a></li>";
                };

                if ($_SESSION["rolUsuarioNavegando"]  == 2) {
                    echo "<li class='nav-item' id='doctor'><a class='nav-link' href='gestionar-cita-medico.php'><i class='fas fa-book'></i> Agenda Médica </a></li>";
                };
                ?>

                <li class='nav-item drop'>
                    <a class='nav-link' href='gestionar-cita.php'>
                        <i class='fas fa-user-nurse'></i> Citas
                    </a>
                </li>

                <li class='nav-item'>
                    <a class='nav-link' href='registrar-historia.php'>
                        <i class='fas fa-clinic-medical'></i> Historia Clínica
                    </a>
                </li>
                <li class='nav-item'>
                    <a class='nav-link' href="registrar-examen.php">
                        <i class='fas fa-syringe'></i> Exámenes de Laboratorio
                    </a>
                </li>
                <?php
                if ($_SESSION["rolUsuarioNavegando"] == 1) {
                    echo ("<li class='nav-item dropdown' id='reports'><a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='fas fa-chart-bar'></i> Reportes </a><div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'><a class='dropdown-item' href='#'>Citas por médico</a><a class='dropdown-item' href='#'>Asistencia pacientes</a><a class='dropdown-item' href='#'>Historia Clínica</a><a class='dropdown-item' href='#'>Estado de Citas</a></div></li>");
                };
                ?>
                <a href="login.php">
                    <a class='btn btn-primary' href="../controller/controller.php?logout=true"><i class='fas fa-sign-out-alt'></i></a>
                </a>
            </ul>
        </div>
    </nav>