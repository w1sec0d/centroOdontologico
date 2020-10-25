<?php
require_once '../model/database.php';   //Conecta con la BD
if (isset($_REQUEST["login"])) {        //En caso de hacer login
    $_SESSION["idUsuario"] = $_REQUEST["idUsuario"];
    $_SESSION["passwordUsuario"] = $_REQUEST["passwordUsuario"];
    /* Consulta si los datos ingresados son correctos */
    $consultaLogin = "SELECT nombreUsuario, rolUsuario FROM USUARIO WHERE idUsuario = " . $_SESSION["idUsuario"] . " && passwordUsuario = " . $_SESSION["passwordUsuario"] . "";
    $resultadoConsultaLogin = mysqli_query($conection, $consultaLogin);
    if ($resultadoConsultaLogin) {
        $arrayConsultaLogin = $resultadoConsultaLogin->fetch_assoc();
        if ($arrayConsultaLogin) {
            $_SESSION["rolUsuarioNavegando"] = $arrayConsultaLogin["rolUsuario"];
            switch ($_SESSION["rolUsuarioNavegando"]) {     //Guarda en la sesión el tipo de usuario que es
                case 'Administrador':
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
            $_SESSION["nombreUsuarioNavegando"] = $arrayConsultaLogin["nombreUsuario"]; // GUarda el nombre de usuario

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
}
if (isset($_REQUEST["tablaCrud"])) {
    if (isset($_REQUEST["crear"])) {  //En caso de querer crear
        $idUsuario = $_REQUEST["idUsuario"];
        $nombreUsuario = $_REQUEST["nombreUsuario"];
        $apellidoUsuario = $_REQUEST["apellidoUsuario"];
        $correoUsuario = $_REQUEST["correoUsuario"];
        $telefonoUsuario = $_REQUEST["telefonoUsuario"];
        $direccionUsuario = $_REQUEST["direccionUsuario"];
        $passwordUsuario = $_REQUEST["passwordUsuario"];
        $rolUsuario = $_REQUEST["rolUsuario"];

        $insertUsuario = "INSERT INTO USUARIO(idUsuario, nombreUsuario, apellidoUsuario, correoUsuario, telefonoUsuario, direccionUsuario, passwordUsuario, rolUsuario, estadoUsuario) VALUES ('$idUsuario', '$nombreUsuario', '$apellidoUsuario', '$correoUsuario', '$telefonoUsuario', '$direccionUsuario', '$passwordUsuario', '$rolUsuario', true);";
        $resultadoInsertUsuario = mysqli_query($conection, $insertUsuario);
        if ($resultadoInsertUsuario) {
            header("Location: ../view/crud.php?registroCorrecto=1&tablaCrud=0");
        } else {
            header("Location: ../view/crud.php?registroCorrecto=0&tablaCrud=0");
        }
    } elseif (isset($_REQUEST["actualizar"])) { //En caso de actualizar
        $idUsuario = $_REQUEST["idUsuario"];
        $nombreUsuario = $_REQUEST["nombreUsuario"];
        $apellidoUsuario = $_REQUEST["apellidoUsuario"];
        $correoUsuario = $_REQUEST["correoUsuario"];
        $telefonoUsuario = $_REQUEST["telefonoUsuario"];
        $direccionUsuario = $_REQUEST["direccionUsuario"];
        $passwordUsuario = $_REQUEST["passwordUsuario"];
        $rolUsuario = $_REQUEST["rolUsuario"];

        $updateUsuario = "UPDATE USUARIO SET nombreUsuario = '$nombreUsuario', apellidoUsuario = '$apellidoUsuario', correoUsuario = '$correoUsuario', telefonoUsuario = '$telefonoUsuario', direccionUsuario = '$direccionUsuario',passwordUsuario = '$passwordUsuario', rolUsuario = '$rolUsuario' WHERE idUsuario = '$idUsuario'";
        $resultadoUpdateUsuario = mysqli_query($conection, $updateUsuario);

        if ($resultadoUpdateUsuario) {
            header("Location: ../view/crud.php?actualizacionCorrecta=1&tablaCrud=0");
        }
    } elseif (isset($_REQUEST["eliminar"])) {       //En caso de Eliminar
        $idUsuario = $_REQUEST["idUsuario"];
        $consultaInactivacion = "UPDATE USUARIO SET estadoUsuario = false WHERE idUsuario = $idUsuario";
        $resultadoConsultaInactivacion = mysqli_query($conection, $consultaInactivacion);
        if ($resultadoConsultaInactivacion) {
            header("Location: ../view/crud.php?eliminacionCorrecta=true&tablaCrud=0");
        } else {
            echo $consultaInactivacion;
        }
    } elseif (isset($_REQUEST["recuperar"])) {
        $idUsuario = $_REQUEST["idUsuario"];

        $query = "UPDATE USUARIO SET estadoUsuario = true WHERE idUsuario = $idUsuario";
        $result = mysqli_query($conection, $query);

        if ($result) {
            header("Location: ../view/recuperar.php?recuperado=true&tablaCrud=0");
        } else {
            echo "fail";
        }
    } elseif (isset($_REQUEST["logout"])) {
        session_start();
        session_destroy();
        header("location:../index.php");
    }
}
