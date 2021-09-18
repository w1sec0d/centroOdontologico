<?php
session_start();
require_once 'header.php';
<<<<<<< HEAD
if (isset($_REQUEST["showLoggedAlert"])) {
=======
if (isset($_REQUEST["showLoggedAlert"]) && isset($_SESSION["nombreUsuarioNavegando"])) {
    $nombreUsuario = $_SESSION["nombreUsuarioNavegando"];
>>>>>>> 01bb4497a3834ccf83061d8c6081de56485cf2df
    echo
    "
    <script>
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        })
        Toast.fire({
            icon: 'success',
            title: 'Bienvenid@ $nombreUsuario'
        })
    </script>
    ";
}
?>

<div class="container-fluid justify-content-center align-items-center" id="container-index-modulos">
    <div class="row">
        <?php
        require_once 'navbar.php';
        ?>
    </div>
    <div class="row justify-content-center align-items-center" id="row-modulos">
        <?php
        if ($_SESSION["rolUsuarioNavegando"] == 0 or $_SESSION["rolUsuarioNavegando"] == 1) {
<<<<<<< HEAD
            ?>
        <div class="col-lg-4">
            <a href="./user-crud.php">
                <div class="modulo row justify-content-center align-items-center">
                    <h1 class="w-100">Gestión de Usuarios</h1>
                    <i class='fas fa-users fa-fw fa-7x'></i>
                </div>
            </a>
        </div>
        <?php
        }
        if ($_SESSION["rolUsuarioNavegando"] == 0 or $_SESSION["rolUsuarioNavegando"] == 2) {
            ?>
        <div class="col-lg-4">
            <a href="">
                <div class="modulo row justify-content-center align-items-center">
                    <h1 class="w-100">Agenda Médica</h1>
                    <i class='fas fa-book fa-fw fa-7x'></i>
                </div>
            </a>
        </div>
=======
        ?>
            <div class="col-lg-4">
                <a href="./crud.php?tablaCrud=0">
                    <div class="modulo row justify-content-center align-items-center">
                        <h1 class="w-100">Gestión de Usuarios</h1>
                        <i class='fas fa-users fa-fw fa-7x'></i>
                    </div>
                </a>
            </div>
        <?php
        }
        if ($_SESSION["rolUsuarioNavegando"] == 0 or $_SESSION["rolUsuarioNavegando"] == 2) {
        ?>
            <div class="col-lg-4">
                <a href="./crud.php?tablaCrud=1">
                    <div class="modulo row justify-content-center align-items-center">
                        <h1 class="w-100">Agenda Médica</h1>
                        <i class='fas fa-book fa-fw fa-7x'></i>
                    </div>
                </a>
            </div>
>>>>>>> 01bb4497a3834ccf83061d8c6081de56485cf2df
        <?php
        }
        ?>
        <div class="col-lg-4">
<<<<<<< HEAD
            <a href="">
=======
            <a href="./crud.php?tablaCrud=2">
>>>>>>> 01bb4497a3834ccf83061d8c6081de56485cf2df
                <div class="modulo row justify-content-center align-items-center">
                    <h1 class="w-100">Citas Médicas</h1>
                    <i class='fas fa-user-nurse fa-fw fa-7x'></i>
                </div>
            </a>
        </div>
        <div class="col-lg-4">
<<<<<<< HEAD
            <a href="">
=======
            <a href="./crud.php?tablaCrud=3">
>>>>>>> 01bb4497a3834ccf83061d8c6081de56485cf2df
                <div class="modulo row justify-content-center align-items-center">
                    <h1 class="w-100">Historia clínica</h1>
                    <i class='fas fa-clinic-medical fa-fw fa-7x'></i>
                </div>
            </a>
        </div>
        <div class="col-lg-4">
<<<<<<< HEAD
            <a href="">
=======
            <a href="./crud.php?tablaCrud=4">
>>>>>>> 01bb4497a3834ccf83061d8c6081de56485cf2df
                <div class="modulo row justify-content-center align-items-center">
                    <h1 class="w-100">Exámenes</h1>
                    <i class='fas fa-syringe fa-fw fa-7x'></i>
                </div>
            </a>
        </div>
<<<<<<< HEAD
        <?php
        if ($_SESSION["rolUsuarioNavegando"] == 1 or $_SESSION["rolUsuarioNavegando"] == 0) {
            ?>
        <div class="col-lg-4">
            <a href="">
                <div class="modulo row justify-content-center align-items-center">
                    <h1 class="w-100">Reportes</h1>
                    <i class='fas fa-chart-bar fa-fw fa-7x'></i>
                </div>
            </a>
        </div>
        <?php
        }
        ?>
=======
>>>>>>> 01bb4497a3834ccf83061d8c6081de56485cf2df
    </div>
</div>
</body>


</html>