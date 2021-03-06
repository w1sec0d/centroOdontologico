<nav class="navbar navbar-expand-lg navbar-light bg-light sticky-top w-100" id="navbar">
    <a class="navbar-brand" href="#">
        <img src="../assets/img/logoMarca.png" width="100" height="30" alt="Centro Odontológico Mundo Oral" loading="lazy">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapsableMenu" aria-controls="navbarCollapsableMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarCollapsableMenu">
        <ul class="navbar-nav" class="justify-content-center">
            <li class="nav-item active d-flex align-items-center">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-home fa-fw"></i>
                    <span class="sr-only">(current)</span>
                </a>
            </li>
            <?php
            if ($_SESSION["rolUsuarioNavegando"] == 1 or $_SESSION["rolUsuarioNavegando"] == 0) {       //Dependiendo del rol, se muestran ciertos permisos
                echo
                    "
                    <li class='nav-item dropdown d-flex align-items-center'>
                        <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                        <i class='fas fa-users fa-fw'></i>Usuarios
                        </a>
                        <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                            <a class='dropdown-item' href='./crud.php?tablaCrud=0'>Gestión de Usuarios</a>
                            <div class='dropdown-divider'></div>
                            <a class='dropdown-item' href='./recuperar.php?tablaCrud=0'>Recuperar Usuarios</a>
                        </div>
                    </li>
                    ";
            };

            if ($_SESSION["rolUsuarioNavegando"] == 2 or $_SESSION["rolUsuarioNavegando"] == 0) {
                echo
                    "
                <li class='nav-item dropdown d-flex align-items-center'>
                    <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                    <i class='fas fa-book fa-fw'></i>Agenda médica
                    </a>
                    <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                        <a class='dropdown-item' href='./crud.php?tablaCrud=1'>Gestión de agenda</a>
                        <div class='dropdown-divider'></div>
                        <a class='dropdown-item' href='./recuperar.php?tablaCrud=1'>Recuperar agenda</a>
                    </div>
                </li>
                ";
            };
            ?>

            <li class='nav-item d-flex align-items-center'>
                <a class='nav-link' href='./crud.php?tablaCrud=2'>
                    <i class='fas fa-user-nurse fa-fw'></i> Citas
                </a>
            </li>

            <li class='nav-item d-flex align-items-center'>
                <a class='nav-link' href='./crud.php?tablaCrud=3'>
                    <i class='fas fa-clinic-medical fa-fw'></i> Historia Clínica
                </a>
            </li>
            <li class='nav-item d-flex align-items-center'>
                <a class='nav-link' href="./crud.php?tablaCrud=4">
                    <i class='fas fa-syringe fa-fw'></i> Exámenes de Laboratorio
                </a>
            </li>
            <li class='nav-item d-flex align-items-center' id="boton-cerrarSesion">
                <a class='nav-link' href="../controller/controller.php?logout=true">
                    <i class='fas fa-sign-out-alt fa-fw'></i> Cerrar sesion
                </a>
            </li>
        </ul>
    </div>
</nav>