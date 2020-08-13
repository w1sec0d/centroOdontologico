<?php
require_once '../model/database.php';

if (isset($_REQUEST["login"])) {       //En caso de hacer login
    session_start();
    $_SESSION["idUsuario"] = $_REQUEST["idUsuario"];
    $_SESSION["passwordUsuario"] = $_REQUEST["passwordUsuario"];

    $query = "SELECT rolUsuario FROM USUARIO WHERE idUsuario = " . $_SESSION["idUsuario"] . " && passwordUsuario = " . $_SESSION["passwordUsuario"] . "";
    $result = mysqli_query($conection, $query);
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
    header("Location: ../view/index_body.php");
}

if (isset($_REQUEST["eliminar"])) {     //En caso de Eliminar
    $idUsuario = $_REQUEST["idUsuario"];
    $fk_check = "SET FOREIGN_KEY_CHECKS=0";
    $query1 = "DELETE FROM PACIENTE WHERE idPaciente = $idUsuario";
    $query2 = "DELETE FROM MEDICO WHERE idMedico = $idUsuario";
    $query3 = "DELETE FROM USUARIO WHERE idUsuario = $idUsuario";

    $result0 = mysqli_query($conection, $fk_check);
    $result1 = mysqli_query($conection, $query1);
    $result2 = mysqli_query($conection, $query2);
    $result3 = mysqli_query($conection, $query3);

    header("Location: ../view/user_crud.php");  
}
