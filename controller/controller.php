<?php
require_once '../model/database.php';

if (isset($_REQUEST["login"])) {       //En caso de hacer login
    session_start();
    $_SESSION["idUsuario"] = $_REQUEST["idUsuario"];
    $_SESSION["passwordUsuario"] = $_REQUEST["passwordUsuario"];

    $query = "SELECT rolUsuario FROM USUARIO WHERE idUsuario = " . $_SESSION["idUsuario"] . " && passwordUsuario = " . $_SESSION["passwordUsuario"] . "";
    $result = mysqli_query($conection, $query);
    if($result){
        $resultArray = $result->fetch_assoc();
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
        if (isset($_SESSION["rolUsuarioNavegando"])) {
            echo $_SESSION["rolUsuarioNavegando"];
        }
        header("Location: index.php");
    }else{
        echo "<p class='btn btn-danger'>Tu usuario o contraseña es incorrecto</p>";
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
    $idUsuarioOld = $_REQUEST["idUsuarioOld"];
    $idUsuario = $_REQUEST["idUsuario"];
    $nombreUsuario = $_REQUEST["nombreUsuario"];
    $apellidoUsuario = $_REQUEST["apellidoUsuario"];
    $correoUsuario = $_REQUEST["correoUsuario"];
    $telefonoUsuario = $_REQUEST["telefonoUsuario"];
    $direccionUsuario = $_REQUEST["direccionUsuario"];
    $passwordUsuario = $_REQUEST["passwordUsuario"];
    $rolUsuario = $_REQUEST["rolUsuario"];
    $estadoUsuario = $_REQUEST["estadoUsuario"];

    $query = "UPDATE USUARIO SET idUsuario = '$idUsuario', nombreUsuario = '$nombreUsuario', apellidoUsuario = '$apellidoUsuario', correoUsuario = '$correoUsuario', telefonoUsuario = $telefonoUsuario, direccionUsuario = '$direccionUsuario',passwordUsuario = '$passwordUsuario', rolUsuario = '$rolUsuario', estadoUsuario = $estadoUsuario WHERE (idUsuario = '$idUsuarioOld')";
    $result = mysqli_query($conection, $query);

    if ($result) {
        echo ("
            <a href='user-crud.php'>
                <p style='margin: 0;' class='btn btn-success btn-lg'>Información actualizada, toca para volver a la sección usuarios<p>
            </a>    
            ");
    }
}

if (isset($_REQUEST["create"])) {
    $idUsuario = $_REQUEST["idUsuario"];
    echo($idUsuario);
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
    }else{
        echo $query;
    }
}
?>