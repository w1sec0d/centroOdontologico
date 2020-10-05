<?php
require_once '../model/database.php';
if (isset($_REQUEST["login"])) {        //En caso de hacer login
    session_start();
    $_SESSION["idUsuario"] = $_REQUEST["idUsuario"];
    $_SESSION["passwordUsuario"] = $_REQUEST["passwordUsuario"];
    $query = "SELECT rolUsuario FROM USUARIO WHERE idUsuario = " . $_SESSION["idUsuario"] . " && passwordUsuario = " . $_SESSION["passwordUsuario"] . "";
    $result = mysqli_query($conection, $query);
    if ($result) {
        $resultArray = $result->fetch_assoc();
        if ($resultArray) {
            $_SESSION["rolUsuarioNavegando"] = $resultArray["rolUsuario"];
            switch ($_SESSION["rolUsuarioNavegando"]) {     //Guarda en la sesión el tipo de usuario que es
                case 'Admin':
                    $_SESSION["rolUsuarioNavegando"] = 0;
                    break;
                case 'Secretaria':
                    $_SESSION["rolUsuarioNavegando"] = 1;
                    break;
                case 'Medico':
                    $_SESSION["rolUsuarioNavegando"] = 2;
                    break;
                case 'Paciente':
                    $_SESSION["rolUsuarioNavegando"] = 3;
                    break;
            }
            $_SESSION["showIndex"] = true;
            header("Location: index.php?showLoggedAlert=true");
        } else {
            echo
            "
            <script type='text/javascript'>
                Swal.fire({
                    icon: 'error',
                    title: 'Tu documento o contraseña es incorrecto',
                    text: 'Porfavor, inténtalo de nuevo',
                    showCloseButton:true,
                    timer:5000
                }); 
            </script>
            ";
        }
    } else {
        echo
        "
        <script type='text/javascript'>
            Swal.fire({
                icon: 'error',
                title: 'Tu documento o contraseña es incorrecto',
                text: 'Porfavor, inténtalo de nuevo',
                showCloseButton:true,
                timer:5000
            }); 
        </script>
        ";
    }
} elseif (isset($_REQUEST["delete"])) {       //En caso de Eliminar
    $idUsuario = $_REQUEST["idUsuario"];
    $query = "UPDATE USUARIO SET estadoUsuario = false WHERE idUsuario = $idUsuario";

    $result = mysqli_query($conection, $query);

    header("Location: ../view/user-crud.php?delete=true");
} elseif (isset($_REQUEST["update"])) {
    $idUsuario = $_REQUEST["idUsuario"];
    $nombreUsuario = $_REQUEST["nombreUsuario"];
    $apellidoUsuario = $_REQUEST["apellidoUsuario"];
    $correoUsuario = $_REQUEST["correoUsuario"];
    $telefonoUsuario = $_REQUEST["telefonoUsuario"];
    $direccionUsuario = $_REQUEST["direccionUsuario"];
    $passwordUsuario = $_REQUEST["passwordUsuario"];
    $rolUsuario = $_REQUEST["rolUsuario"];
    $estadoUsuario = $_REQUEST["estadoUsuario"];

    $query = "UPDATE USUARIO SET nombreUsuario = '$nombreUsuario', apellidoUsuario = '$apellidoUsuario', correoUsuario = '$correoUsuario', telefonoUsuario = $telefonoUsuario, direccionUsuario = '$direccionUsuario',passwordUsuario = '$passwordUsuario', rolUsuario = '$rolUsuario', estadoUsuario = $estadoUsuario WHERE (idUsuario = '$idUsuario')";
    $result = mysqli_query($conection, $query);

    if ($result) {
        echo("
        <script type='text/javascript'>
        Swal.fire({
            icon: 'success',
            title: 'Usuario actualizado correctamente',
            html: 'Puedes ' +
            '<a href=\"../view/user-crud.php\">regresar al menú usuarios</a>' +
            ' para continuar registrando cambios'
        }); 
        </script>   
        ");
    }
} elseif (isset($_REQUEST["create"])) {
    $idUsuario = $_REQUEST["idUsuario"];
    $nombreUsuario = $_REQUEST["nombreUsuario"];
    $apellidoUsuario = $_REQUEST["apellidoUsuario"];
    $correoUsuario = $_REQUEST["correoUsuario"];
    $telefonoUsuario = $_REQUEST["telefonoUsuario"];
    $direccionUsuario = $_REQUEST["direccionUsuario"];
    $passwordUsuario = $_REQUEST["passwordUsuario"];
    $rolUsuario = $_REQUEST["rolUsuario"];
    $estadoUsuario = $_REQUEST["estadoUsuario"];

    $query = "INSERT INTO USUARIO(idUsuario, nombreUsuario, apellidoUsuario, correoUsuario, telefonoUsuario, direccionUsuario, passwordUsuario, rolUsuario, estadoUsuario) VALUES ('$idUsuario', '$nombreUsuario', '$apellidoUsuario', '$correoUsuario', '$telefonoUsuario', '$direccionUsuario', '$passwordUsuario', '$rolUsuario', $estadoUsuario);";
    $result = mysqli_query($conection, $query);
    if ($idUsuario != "") {
        if ($result) {
            echo("
            <script type='text/javascript'>
            Swal.fire({
                icon: 'success',
                title: 'Usuario Registrado Correctamente',
                html: 'Puedes ' +
                '<a href=\"../view/user-crud.php\">regresar al menú usuarios</a>' +
                ' para continuar registrando cambios'
            }); 
            </script>   
            ");
        } else {
            echo("
            <script type='text/javascript'>
            Swal.fire({
                icon: 'error',
                title: 'Has ingresado un usuario existente y/o no llenaste todos los campos',
                text: 'Porfavor inténtalo de nuevo'
            }); 
            </script>   
            ");
        }
    } else {
        echo("
            <script type='text/javascript'>
            Swal.fire({
                icon: 'error',
                title: 'No has ingresado todos los datos necesarios',
                text: 'Porfavor, inténtalo de nuevo'
            }); 
            </script>   
            ");
    }
} elseif (isset($_REQUEST["restore"])) {
    $idUsuario = $_REQUEST["idUsuario"];

    $query = "UPDATE USUARIO SET estadoUsuario = true WHERE idUsuario = $idUsuario";
    $result = mysqli_query($conection, $query);

    header("Location: ../view/user-backup.php?restore=true");
} elseif (isset($_REQUEST["logout"])) {
    session_destroy();
    header("location:../index.php");
}
