<?php
require_once '../model/database.php';

if (isset($_REQUEST["login"])) {       //En caso de hacer login
    session_start();
    $_SESSION["idUsuario"] = $_REQUEST["idUsuario"];
    $_SESSION["passwordUsuario"] = $_REQUEST["passwordUsuario"];

    $query = "SELECT rolUsuario FROM USUARIO WHERE idUsuario = " . $_SESSION["idUsuario"] . " && passwordUsuario = " . $_SESSION["passwordUsuario"] . "";
    $result = mysqli_query($conection, $query);
    if ($result) {
        $resultArray = $result->fetch_assoc();
        if ($resultArray) 
        {
            $_SESSION["rolUsuarioNavegando"] = $resultArray["rolUsuario"];
            switch ($_SESSION["rolUsuarioNavegando"]) {
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
                    showCloseButton: true
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
            }); 
        </script>
        ";
    }
}

if (isset($_REQUEST["eliminar"])) {       //En caso de Eliminar
    $idUsuario = $_REQUEST["idUsuario"];
    $fk_check = "SET FOREIGN_KEY_CHECKS=0";
    $query1 = "DELETE FROM PACIENTE WHERE idPaciente = $idUsuario";
    $query2 = "DELETE FROM MEDICO WHERE idMedico = $idUsuario";
    $query3 = "DELETE FROM USUARIO WHERE idUsuario = $idUsuario";

    $result0 = mysqli_query($conection, $fk_check);
    $result1 = mysqli_query($conection, $query1);
    $result2 = mysqli_query($conection, $query2);
    $result3 = mysqli_query($conection, $query3);

    header("Location: ../view/user-crud.php");
}

if (isset($_REQUEST["update"])) {
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
            title: 'Usuario Registrado Correctamente',
            html: 'Puedes ' +
            '<a href=\"../view/user-crud.php\">regresar al menú usuarios</a>' +
            ' para continuar registrando cambios'
        }); 
        </script>   
        ");
    }
}

if (isset($_REQUEST["create"])) {
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

    if ($result) {
        echo ("
            <a href='user-crud.php'>
                <p style='margin: 0;' class='btn btn-success btn-lg'>Información registrada, toca para volver a la sección usuarios<p>
            </a>    
            ");
    } else {
        echo $query;
    }
}

if(isset($_REQUEST["logout"]))
{
    session_destroy();
    header("location:../view/login.php");
}

?>