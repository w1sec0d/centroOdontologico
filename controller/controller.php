<?php
    require_once '../model/database.php';

    if(isset($_REQUEST["login"])){
        session_start();
        $idUsuario = $_REQUEST["idUsuario"];
        $passwordUsuario = $_REQUEST["passwordUsuario"];
        
        $query = "SELECT rolUsuario FROM USUARIO WHERE idUsuario = $idUsuario && passwordUsuario = $passwordUsuario";
        $result = mysqli_query($conection,$query);
        $resultArray = $result -> fetch_assoc();
        $rolUsuario = $resultArray["rolUsuario"];
        header("Location: ../view/navbar.php?rolUsuario=$rolUsuario");
    }

?>