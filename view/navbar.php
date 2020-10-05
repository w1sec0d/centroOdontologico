<?php
session_start();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top">
    <a class="navbar-brand" href="#">
        <img src="../assets/img/brandLogo.png" width="90" height="30" alt="" loading="lazy">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapsableMenu">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php"><i class="fas fa-home"></i></a>
            </li>
            <?php
                if ($_SESSION["rolUsuarioNavegando"] == 1 or $_SESSION["rolUsuarioNavegando"] == 0) {       //Dependiendo del rol, se muestran ciertos permisos
                    echo
                    "
                    <li class='nav-item dropdown'>
                        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <i class='fas fa-users'></i>Usuarios
                        </a>
                        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                            <a class='dropdown-item' href='./user-crud.php'>Gestión de Usuarios</a>
                            <div class='dropdown-divider'></div>
                            <a class='dropdown-item' href='./user-backup.php'>Recuperar Usuarios</a>
                        </div>
                    </li>
                    ";
                };

                if ($_SESSION["rolUsuarioNavegando"] == 2 or $_SESSION["rolUsuarioNavegando"] == 0) {
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
            if ($_SESSION["rolUsuarioNavegando"] == 1 or $_SESSION["rolUsuarioNavegando"] == 0) {
                echo("<li class='nav-item dropdown' id='reports'><a class='nav-link dropdown-toggle' href='#' id='navbarDropdownMenuLink' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'><i class='fas fa-chart-bar'></i> Reportes </a><div class='dropdown-menu' aria-labelledby='navbarDropdownMenuLink'><a class='dropdown-item' href='#'>Citas por médico</a><a class='dropdown-item' href='#'>Asistencia pacientes</a><a class='dropdown-item' href='#'>Historia Clínica</a><a class='dropdown-item' href='#'>Estado de Citas</a></div></li>");
            };
            ?>

            <a class='btn btn-primary' href="../controller/controller.php?logout=true"><i
                    class='fas fa-sign-out-alt'></i> Cerrar Sesión</a>

        </ul>
    </div>
</nav>