<?php
require '../model/database.php';
if (isset($_REQUEST["updater"])) {

    $rolUsuarioNavbar = $_REQUEST["rolUsuarioNavbar"];

    $idUsuario = $_REQUEST["idUsuario"];
   /* if($idUsuario){
        echo "$idUsuario";
    }*/
    $nombreUsuario = $_REQUEST["nombreUsuario"];
    /*if($nombreUsuario){
        echo "$nombreUsuario";
    }*/
    $apellidoUsuario = $_REQUEST["apellidoUsuario"];
    /*if($apellidoUsuario){
        echo "$apellidoUsuario";
    }*/
    $correoUsuario = $_REQUEST["correoUsuario"];
    /*if($correoUsuario){
        echo("$correoUsuario");
    }*/
    $telefonoUsuario = $_REQUEST["telefonoUsuario"];
    /*if($telefonoUsuario){
        echo("$telefonoUsuario");
    }*/
    $direccionUsuario = $_REQUEST["direccionUsuario"];
    /*if($direccionUsuario){
        echo($direccionUsuario);
    }*/
    $rolUsuario = $_REQUEST["rolUsuario"];
    /*if($rolUsuario){
        echo("$rolUsuario");
    }*/
    $estadoUsuario = $_REQUEST["estadoUsuario"];
    /*if($estadoUsuario){
        echo("$estadoUsuario");
    }*/

    $query = "UPDATE USUARIO SET nombreUsuario = '$nombreUsuario', apellidoUsuario = '$apellidoUsuario', correoUsuario = '$correoUsuario', telefonoUsuario = '$telefonoUsuario', direccionUsuario = '$direccionUsuario', rolUsuario = '$rolUsuario', estadoUsuario = $estadoUsuario WHERE idUsuario = $idUsuario";

    $result = mysqli_query($conection, $query);

    header("Location: ../view/user_crud.php");

}
?>