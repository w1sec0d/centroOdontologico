<?php
    require_once '../model/database.php';

    if(isset($_REQUEST["login"])){
        session_start();
        $idUsuario = $_REQUEST["idUsuario"];
        $passwordUsuario = $_REQUEST["passwordUsuario"];
        
        $query = "SELECT rolUsuario FROM USUARIO WHERE idUsuario = $idUsuario && passwordUsuario = $passwordUsuario";
        $result = mysqli_query($conection,$query);
        $resultArray = $result -> fetch_assoc();
        $rolUsuarioText = $resultArray["rolUsuario"];
        switch ($rolUsuarioText) {
            case 'Secretaria':
                $rolUsuario = 1;
            break;
            case 'Medico':
                $rolUsuario = 2;
            break;
            case 'Paciente':
                $rolUsuario = 3;
            break;
            
            default:
                # code...
                break;
        }
        header("Location: ../view/navbar.php?rolUsuario=$rolUsuario&index=true");
    }

    if(isset($_REQUEST["action"])){
        
        switch ($_REQUEST["action"]) {
            case 4:
                $idUsuario = $_REQUEST["idUsuario"];
                $rolUsuario = $_REQUEST["rolUsuario"];
                $query1 = "DELETE FROM PACIENTE WHERE idPaciente = $idUsuario";
                $query2 = "DELETE FROM MEDICO WHERE idMedico = $idUsuario";
                $query3 = "DELETE FROM USUARIO WHERE idUsuario = $idUsuario";
                $result1 = mysqli_query($conection, $query1);
                $result2 = mysqli_query($conection, $query2);
                $result3 = mysqli_query($conection, $query3);

            break;
            
            default:
                # code...
                break;
        }
    }
?>