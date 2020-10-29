<?php
require_once '../model/database.php';   //Conecta con la BD

if (isset($_REQUEST["login"])) {        //En caso de hacer login
    $_SESSION["idUsuario"] = $_REQUEST["idUsuario"];
    $_SESSION["passwordUsuario"] = $_REQUEST["passwordUsuario"];
    /* Consulta si los datos ingresados son correctos */
    $consultaLogin = "SELECT idUsuario, nombreUsuario, rolUsuario FROM USUARIO WHERE idUsuario = " . $_SESSION["idUsuario"] . " && passwordUsuario = " . $_SESSION["passwordUsuario"] . "";
    $resultadoConsultaLogin = mysqli_query($conection, $consultaLogin);
    if ($resultadoConsultaLogin) {
        $arrayConsultaLogin = $resultadoConsultaLogin->fetch_assoc();
        if ($arrayConsultaLogin) {
            $_SESSION["rolUsuarioNavegando"] = $arrayConsultaLogin["rolUsuario"];
            $_SESSION["idUsuarioNavegando"] = $arrayConsultaLogin["idUsuario"];
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
} elseif (isset($_REQUEST["logout"])) {
    session_start();
    session_destroy();
    header("location:../index.php");
}

if (isset($_REQUEST["tablaCrud"])) { //Dependiendo de la tabla a la que se le desee hacer crud, ejecuta un case u otro
    switch ($_REQUEST["tablaCrud"]) {
        case 0:
            if (isset($_REQUEST["crear"])) {  //En caso de querer Crear
                $idUsuario = $_REQUEST["idUsuario"];
                $nombreUsuario = $_REQUEST["nombreUsuario"];
                $apellidoUsuario = $_REQUEST["apellidoUsuario"];
                $correoUsuario = $_REQUEST["correoUsuario"];
                $telefonoUsuario = $_REQUEST["telefonoUsuario"];
                $direccionUsuario = $_REQUEST["direccionUsuario"];
                $passwordUsuario = $_REQUEST["passwordUsuario"];
                $rolUsuario = $_REQUEST["rolUsuario"];

                $insertUsuario = "CALL REGISTRAR_USUARIO('$idUsuario', '$nombreUsuario', '$apellidoUsuario', '$correoUsuario', '$telefonoUsuario', '$direccionUsuario', '$passwordUsuario', '$rolUsuario', true);";
                $resultadoInsertUsuario = mysqli_query($conection, $insertUsuario);
                if ($resultadoInsertUsuario) {
                    switch ($rolUsuario) {
                        case "Medico":
                            $especialidadMedico = $_REQUEST["especialidadMedico"];
                            $tarjetaProfesional = $_REQUEST["tarjetaProfesional"];
                            $insertMedico = "INSERT INTO MEDICO(idMedico,nombreMedico,apellidoMedico,telefonoMedico,correoMedico,especialidadMedico,tarjetaProfesional,estadoMedico,idUsuarioFK) VALUES('$idUsuario','$nombreUsuario','$apellidoUsuario','$telefonoUsuario','$correoUsuario','$especialidadMedico','$tarjetaProfesional',true,'$idUsuario')";
                            $resultadoInsertMedico = mysqli_query($conection, $insertMedico);
                            if ($resultadoInsertMedico) {
                                header("Location: ../view/crud.php?registroCorrecto=1&tablaCrud=0");
                            }
                            break;
                        case "Paciente":
                            $fechaNacimiento = $_REQUEST["fechaNacimiento"];
                            $insertPaciente = "INSERT INTO PACIENTE(idPaciente,nombrePaciente,apellidoPaciente,direccionPaciente,telefonoPaciente,fechaNacimiento,estadoPaciente,idUsuarioFK) VALUES('$idUsuario','$nombreUsuario','$apellidoUsuario','$direccionUsuario','$telefonoUsuario','$fechaNacimiento',true,'$idUsuario')";
                            $resultadoInsertPaciente = mysqli_query($conection, $insertPaciente);
                            if ($resultadoInsertPaciente) {
                                header("Location: ../view/crud.php?registroCorrecto=1&tablaCrud=0");
                            }
                            break;
                        default:
                            header("Location: ../view/crud.php?registroCorrecto=1&tablaCrud=0");
                            break;
                    }
                } else {
                    header("Location: ../view/crud.php?registroIncorrecto=1&tablaCrud=0");
                }
            } else if (isset($_REQUEST["actualizar"])) { //En caso de Actualizar
                $nuevoRolUsuario = false;
                $idUsuario = $_REQUEST["idUsuario"];
                $nombreUsuario = $_REQUEST["nombreUsuario"];
                $apellidoUsuario = $_REQUEST["apellidoUsuario"];
                $correoUsuario = $_REQUEST["correoUsuario"];
                $telefonoUsuario = $_REQUEST["telefonoUsuario"];
                $direccionUsuario = $_REQUEST["direccionUsuario"];
                $passwordUsuario = $_REQUEST["passwordUsuario"];
                $rolUsuario = $_REQUEST["rolUsuario"];

                $consultaUsuario = "SELECT rolUsuario FROM USUARIO WHERE idUsuario = '$idUsuario'";
                $resultadoConsultaUsuario = mysqli_query($conection, $consultaUsuario);
                $arrayConsultaUsuario = mysqli_fetch_array($resultadoConsultaUsuario);
                $antiguoRolUsuario = $arrayConsultaUsuario["rolUsuario"];

                if ($rolUsuario != $antiguoRolUsuario) {
                    $nuevoRolUsuario = true;
                }
                $updateUsuario = "CALL ACTUALIZAR_USUARIO('$idUsuario','$nombreUsuario','$apellidoUsuario','$correoUsuario','$telefonoUsuario','$direccionUsuario','$passwordUsuario','$rolUsuario',true)";
                $resultadoUpdateUsuario = mysqli_query($conection, $updateUsuario);

                if ($resultadoUpdateUsuario) {
                    if ($nuevoRolUsuario) {
                        switch ($antiguoRolUsuario) {
                            case "Medico":
                                $deleteMedico = "DELETE FROM MEDICO WHERE idMedico = '$idUsuario'";
                                mysqli_query($conection, $deleteMedico);
                                break;

                            case "Paciente":
                                $deletePaciente = "DELETE FROM PACIENTE WHERE idPaciente = '$idUsuario'";
                                mysqli_query($conection, $deletePaciente);
                                break;
                        }

                        switch ($rolUsuario) {
                            case "Medico":
                                $especialidadMedico = $_REQUEST["especialidadMedico"];
                                $tarjetaProfesional = $_REQUEST["tarjetaProfesional"];
                                $insertMedico = "INSERT INTO MEDICO VALUES ('$idUsuario','$nombreUsuario','$apellidoUsuario','$telefonoUsuario','$correoUsuario','$especialidadMedico','$tarjetaProfesional', true, '$idUsuario')";
                                $resultadoInsertMedico = mysqli_query($conection, $insertMedico);
                                if ($resultadoInsertMedico) {
                                    header("Location: ../view/crud.php?actualizacionCorrecta=true&tablaCrud=0");
                                }
                                break;
                            case "Paciente":
                                $fechaNacimiento = $_REQUEST["fechaNacimiento"];
                                $insertPaciente = "INSERT INTO PACIENTE VALUES('$idUsuario','$nombreUsuario','$apellidoUsuario','$direccionUsuario','$telefonoUsuario','$fechaNacimiento',true,'$idUsuario')";
                                $resultadoInsertPaciente = mysqli_query($conection, $insertPaciente);
                                if ($resultadoInsertPaciente) {
                                    header("Location: ../view/crud.php?actualizacionCorrecta=true&tablaCrud=0");
                                }
                                break;
                            default:
                                header("Location: ../view/crud.php?actualizacionCorrecta=true&tablaCrud=0");
                                break;
                        }
                    } else {
                        switch ($rolUsuario) {
                            case "Medico":
                                $especialidadMedico = $_REQUEST["especialidadMedico"];
                                $tarjetaProfesional = $_REQUEST["tarjetaProfesional"];
                                $updateMedico = "UPDATE MEDICO SET nombreMedico = '$nombreUsuario', apellidoMedico = '$apellidoUsuario', telefonoMedico = '$telefonoUsuario', correoMedico = '$correoUsuario',especialidadMedico = '$especialidadMedico',tarjetaProfesional = '$tarjetaProfesional',idUsuarioFK = '$idUsuario' WHERE idMedico = '$idUsuario'";
                                $resultadoUpdateMedico = mysqli_query($conection, $updateMedico);
                                if ($resultadoUpdateMedico) {
                                    header("Location: ../view/crud.php?actualizacionCorrecta=true&tablaCrud=0");
                                }
                                break;
                            case "Paciente":
                                $fechaNacimiento = $_REQUEST["fechaNacimiento"];
                                $updatePaciente = "UPDATE PACIENTE SET idPaciente = '$idUsuario', nombrePaciente = '$nombreUsuario',apellidoPaciente = '$apellidoUsuario',direccionPaciente = '$direccionUsuario',telefonoPaciente = '$telefonoUsuario',fechaNacimiento = '$fechaNacimiento',idUsuarioFK = '$idUsuario' WHERE idPaciente = '$idUsuario'";
                                $resultadoUpdatePaciente = mysqli_query($conection, $updatePaciente);
                                if ($resultadoUpdatePaciente) {
                                    header("Location: ../view/crud.php?actualizacionCorrecta=true&tablaCrud=0");
                                }
                                break;
                            default:
                                header("Location: ../view/crud.php?actualizacionCorrecta=true&tablaCrud=0");
                                break;
                        }
                    }
                }
            } else if (isset($_REQUEST["eliminar"])) {       //En caso de Eliminar
                $idUsuario = $_REQUEST["id"];
                $consultaInactivacion = "UPDATE USUARIO SET estadoUsuario = false WHERE idUsuario = $idUsuario";
                $resultadoConsultaInactivacion = mysqli_query($conection, $consultaInactivacion);
                if ($resultadoConsultaInactivacion) {
                    header("Location: ../view/crud.php?eliminacionCorrecta=true&tablaCrud=0");
                } else {
                    echo $consultaInactivacion;
                }
            } else if (isset($_REQUEST["recuperar"])) {      //En caso de Recuperar
                $idUsuario = $_REQUEST["id"];

                $query = "UPDATE USUARIO SET estadoUsuario = true WHERE idUsuario = $idUsuario";
                $result = mysqli_query($conection, $query);

                if ($result) {
                    header("Location: ../view/recuperar.php?recuperado=true&tablaCrud=0");
                }
            }
            break;
        case 1:
            if (isset($_REQUEST["crear"])) {
                $fecha = $_REQUEST["fecha"];
                $hora = $fecha . " " . $_REQUEST["hora"];
                $consultorio = $_REQUEST["consultorio"];
                $idMedico = $_REQUEST["idMedico"];
                $idPaciente = $_REQUEST["idPaciente"];

                if (empty($idMedico) && empty($idPaciente)) {
                    $crearAgenda = "INSERT INTO AGENDA(fechaAgenda,horaAgenda,consultorio,estadoAgenda,idMedicoFK,idPacienteFK) VALUES('$fecha','$hora','$consultorio',true,null,null)";
                } else if (empty($idMedico) && !empty($idPaciente)) {
                    $pacienteValido = "SELECT * FROM USUARIO WHERE idUsuario = '$idPaciente' AND rolUsuario = 'Paciente'";
                    $resultadoPacienteValido = mysqli_query($conection, $pacienteValido);
                    if (mysqli_num_rows($resultadoPacienteValido) > 0) {
                        $crearAgenda = "INSERT INTO AGENDA(fechaAgenda,horaAgenda,consultorio,estadoAgenda,idMedicoFK,idPacienteFK) VALUES('$fecha','$hora','$consultorio',true,null,$idPaciente)";
                    } else {
                        header("Location: ../view/crud.php?registroPacienteIncorrecto=1&tablaCrud=1");
                    }
                } else if (empty($idPaciente) && !empty($idMedico)) {
                    $medicoValido = "SELECT * FROM USUARIO WHERE idUsuario = '$idMedico' AND rolUsuario = 'Medico'";
                    $resultadoMedicoValido = mysqli_query($conection, $medicoValido);
                    if (mysqli_num_rows($resultadoMedicoValido) > 0) {
                        $crearAgenda = "INSERT INTO AGENDA(fechaAgenda,horaAgenda,consultorio,estadoAgenda,idMedicoFK,idPacienteFK) VALUES('$fecha','$hora','$consultorio',true,$idMedico,null)";
                    } else {
                        header("Location: ../view/crud.php?registroDoctorIncorrecto=1&tablaCrud=1");
                    }
                } else if (!empty($idPaciente) && !empty($idMedico)) {
                    $medicoValido = "SELECT * FROM USUARIO WHERE idUsuario = '$idMedico' AND rolUsuario = 'Medico'";
                    $resultadoMedicoValido = mysqli_query($conection, $medicoValido);

                    $pacienteValido = "SELECT * FROM USUARIO WHERE idUsuario = '$idPaciente' AND rolUsuario = 'Paciente'";
                    $resultadoPacienteValido = mysqli_query($conection, $pacienteValido);

                    if ($resultadoPacienteValido && $resultadoMedicoValido) {
                        $crearAgenda = "INSERT INTO AGENDA(fechaAgenda,horaAgenda,consultorio,estadoAgenda,idMedicoFK,idPacienteFK) VALUES('$fecha','$hora','$consultorio',true,$idMedico,$idPaciente)";
                    } else {
                        header("Location: ../view/crud.php?agendaIncorrecta=1&tablaCrud=1");
                    }
                }
                $resultadoInsertAgenda = mysqli_query($conection, $crearAgenda);
                if ($resultadoInsertAgenda) {
                    header("Location: ../view/crud.php?agendaCorrecta=1&tablaCrud=1");
                } else {
                    header("Location: ../view/crud.php?agendaIncorrecta=1&tablaCrud=1");
                }
            } else if (isset($_REQUEST["actualizar"])) {
                $idAgenda = $_REQUEST["idAgenda"];
                $fechaAgenda = $_REQUEST["fechaAgenda"];
                $horaAgenda = $_REQUEST["horaAgenda"];
                $consultorio = $_REQUEST["consultorio"];
                $idMedico = $_REQUEST["idMedico"];
                $idPaciente = $_REQUEST["idPaciente"];
                $hora = $fechaAgenda . " " . $horaAgenda;

                if (empty($idMedico) && !empty($idPaciente)) {
                    $consultaIdPaciente = "SELECT * FROM PACIENTE WHERE idPaciente = '$idPaciente'";
                    $resultadoIdPaciente = mysqli_query($conection, $consultaIdPaciente);
                    if (mysqli_num_rows($resultadoIdPaciente) > 0) {
                        $updateAgenda = "UPDATE AGENDA SET fechaAgenda = '$fechaAgenda', horaAgenda = '$hora', consultorio = '$consultorio', idPacienteFK = '$idPaciente', idMedicoFK=null WHERE idAgenda = '$idAgenda'";
                    } else {
                        header("Location: ../view/crud.php?actualizacionAgendaFallida=true&tablaCrud=1");
                    }
                } else if (!empty($idMedico) && empty($idPaciente)) {
                    $consultaIdMedico = "SELECT * FROM MEDICO WHERE idMedico = '$idMedico'";
                    $resultadoIdMedico = mysqli_query($conection, $consultaIdMedico);
                    if (mysqli_num_rows($resultadoIdMedico) > 0) {
                        $updateAgenda = "UPDATE AGENDA SET fechaAgenda = '$fechaAgenda', horaAgenda = '$hora', consultorio = '$consultorio', idMedicoFK = '$idMedico', idPacienteFK=null WHERE idAgenda = '$idAgenda'";
                    } else {
                        header("Location: ../view/crud.php?actualizacionAgendaFallida=true&tablaCrud=1");
                    }
                } else if (!empty($idMedico) && !empty($idPaciente)) {
                    $consultaIdPaciente = "SELECT * FROM PACIENTE WHERE idPaciente = '$idPaciente'";
                    $resultadoIdPaciente = mysqli_query($conection, $consultaIdPaciente);

                    $consultaIdMedico = "SELECT * FROM MEDICO WHERE idMedico = '$idMedico'";
                    $resultadoIdMedico = mysqli_query($conection, $consultaIdMedico);

                    if (mysqli_num_rows($resultadoIdMedico) > 0 && mysqli_num_rows($resultadoIdPaciente) > 0) {
                        $updateAgenda = "UPDATE AGENDA SET fechaAgenda = '$fechaAgenda', horaAgenda = '$hora', consultorio = '$consultorio', idPacienteFK = '$idPaciente', idMedicoFK = '$idMedico' WHERE idAgenda = '$idAgenda'";
                    } else {
                        header("Location: ../view/crud.php?actualizacionAgendaFallida=true&tablaCrud=1");
                    }
                } else {
                    $updateAgenda = "UPDATE AGENDA SET fechaAgenda = '$fechaAgenda', horaAgenda = '$hora', consultorio = '$consultorio', idPacienteFK = null, idMedicoFK = null WHERE idAgenda = '$idAgenda'";
                }
                $resultadoUpdateAgenda = mysqli_query($conection, $updateAgenda);
                if ($resultadoUpdateAgenda) {
                    header("Location: ../view/crud.php?actualizacionAgenda=true&tablaCrud=1");
                } else {
                    echo $updateAgenda;
                }
            } else if (isset($_REQUEST["eliminar"])) {
                $idAgenda = $_REQUEST["id"];

                $consultaInactivacion = "UPDATE AGENDA SET estadoAgenda = false WHERE idAgenda = $idAgenda";
                $resultadoConsultaInactivacion = mysqli_query($conection, $consultaInactivacion);
                if ($resultadoConsultaInactivacion) {
                    header("Location: ../view/crud.php?inactivacionAgenda=true&tablaCrud=1");
                }
            } else if (isset($_REQUEST["recuperar"])) {
                $idAgenda = $_REQUEST["id"];

                $reactivarAgenda = "UPDATE AGENDA SET estadoAgenda = true WHERE idAgenda = '$idAgenda'";
                $resultadoReactivarAgenda = mysqli_query($conection, $reactivarAgenda);

                if ($resultadoReactivarAgenda) {
                    header("Location: ../view/recuperar.php?recuperadoAgenda=true&tablaCrud=1");
                }
            }
            break;
        case 2:
            if (isset($_REQUEST["crear"])) {
                $idPaciente = $_REQUEST["idPaciente"];
                $consultaIdHistoria = "SELECT idHistoria FROM HISTORIA_CLINICA WHERE idPacienteFK = '$idPaciente'";
                $resultadoIdHistoria = mysqli_query($conection, $consultaIdHistoria);
                if (mysqli_num_rows($resultadoIdHistoria) > 0) {
                    $arrayIdHistoria = mysqli_fetch_array($resultadoIdHistoria);
                    $idHistoriaFK = $arrayIdHistoria["idHistoria"];

                    $consultaAgenda = "SELECT * FROM AGENDA WHERE idPacienteFK = '$idPaciente'";
                    $resultadoConsultaAgenda = mysqli_query($conection, $consultaAgenda);
                    $arrayConsultaAgenda = mysqli_fetch_array($resultadoConsultaAgenda);

                    $horaConsulta = $arrayConsultaAgenda["horaAgenda"];
                    $motivo = $_REQUEST["motivo"];
                    $enfermedad = $_REQUEST["enfermedad"];
                    $idAgenda = $_REQUEST["idAgenda"];

                    $insertConsultaMedica = "INSERT INTO CONSULTA_MEDICA VALUES(null,'$horaConsulta','$motivo','$enfermedad','$idHistoriaFK')";
                    $insertAgenda = "UPDATE AGENDA SET idPacienteFK = '$idPaciente' WHERE idAgenda = '$idAgenda'";
                    $resultadoConsultaMedica = mysqli_query($conection, $insertConsultaMedica);
                    $resultadoInsertAgenda = mysqli_query($conection, $insertAgenda);

                    if ($resultadoConsultaAgenda && $resultadoInsertAgenda) {
                        header("Location: ../view/crud.php?citaCorrecta=true&tablaCrud=2&crear=true");
                    }
                } else {
                    header("Location: ../view/crud.php?usuarioSinHistoria=true&tablaCrud=2&crear=true");
                }
            } else if (isset($_REQUEST["actualizar"])) {
                $idConsulta = $_REQUEST["idConsulta"];
                $idPaciente = $_REQUEST["idPaciente"];
                $motivo = $_REQUEST["motivo"];
                $enfermedad = $_REQUEST["enfermedad"];

                $consultaIdHistoria = "SELECT idHistoria FROM HISTORIA_CLINICA WHERE idPacienteFK = '$idPaciente'";
                $resultadoIdHistoria = mysqli_query($conection, $consultaIdHistoria);
                if (mysqli_num_rows($resultadoIdHistoria) > 0) {
                    $arrayIdHistoria = mysqli_fetch_array($resultadoIdHistoria);
                    $idHistoriaFK = $arrayIdHistoria["idHistoria"];

                    $consultaAgenda = "SELECT * FROM AGENDA WHERE idPacienteFK = '$idPaciente'";
                    $resultadoConsultaAgenda = mysqli_query($conection, $consultaAgenda);
                    $arrayConsultaAgenda = mysqli_fetch_array($resultadoConsultaAgenda);

                    $idAgenda = $arrayConsultaAgenda["idAgenda"];

                    $updateConsultaMedica = "UPDATE CONSULTA_MEDICA SET motivoConsulta = '$motivo', enfermedad = '$enfermedad', idHistoriaFK = '$idHistoriaFK' WHERE idConsulta = '$idConsulta'";
                    $updateAgenda = "UPDATE AGENDA SET idPacienteFK = '$idPaciente' WHERE idAgenda = '$idAgenda'";

                    $resultadoConsultaAgenda = mysqli_query($conection, $updateConsultaMedica);
                    $resultadoUpdateAgenda = mysqli_query($conection, $updateAgenda);

                    if ($resultadoUpdateAgenda && $resultadoConsultaAgenda) {
                        header("Location: ../view/crud.php?citaActualizada=true&tablaCrud=2");
                    }
                } else {
                    header("Location: ../view/crud.php?usuarioSinHistoria=true&tablaCrud=2&crear=true");
                }
            }
            break;
        case 3:
            if (isset($_REQUEST["crear"])) {
                $idPaciente = $_REQUEST["idPaciente"];
                $estatura = $_REQUEST["estatura"];
                $peso = $_REQUEST["peso"];
                $antecedentesFamiliares = $_REQUEST["antecedentesFamiliares"];
                $alergias = $_REQUEST["alergias"];

                $consultaPacienteValido = "SELECT * FROM PACIENTE WHERE idPaciente = '$idPaciente'";
                $resultadoPacienteValido = mysqli_query($conection, $consultaPacienteValido);
                if (mysqli_num_rows($resultadoPacienteValido) > 0) {
                    $consultaPacienteHistoria = "SELECT * FROM HISTORIA_CLINICA WHERE idPacienteFK = '$idPaciente'";
                    $resultadoPacienteHistoria = mysqli_query($conection, $consultaPacienteHistoria);
                    if (mysqli_num_rows($resultadoPacienteHistoria) > 0) {
                        header("Location: ../view/crud.php?historiaCreada=true&tablaCrud=3");
                    } else {
                        $insertHistoria = "INSERT INTO HISTORIA_CLINICA VALUES (NULL,$estatura,$peso,'$antecedentesFamiliares','$alergias','$idPaciente')";
                        $resultadoInsertHistoria = mysqli_query($conection, $insertHistoria);
                        if ($resultadoInsertHistoria) {
                            header("Location: ../view/crud.php?registroHistoriaCorrecto=true&tablaCrud=3");
                        }
                    }
                } else {
                    header("Location: ../view/crud.php?usuarioIncorrecto=true&tablaCrud=3");
                }
            } else if (isset($_REQUEST["actualizar"])) {
                $idHistoria = $_REQUEST["idHistoria"];
                $estatura = $_REQUEST["estatura"];
                $peso = $_REQUEST["peso"];
                $antecedentesFamiliares = $_REQUEST["antecedentesFamiliares"];
                $alergias = $_REQUEST["alergias"];
                $idPaciente = $_REQUEST["idPaciente"];

                $consultaPacienteValido = "SELECT * FROM PACIENTE WHERE idPaciente = '$idPaciente'";
                $resultadoPacienteValido = mysqli_query($conection, $consultaPacienteValido);
                if (mysqli_num_rows($resultadoPacienteValido) > 0) {
                    $updateHistoria = "UPDATE HISTORIA_CLINICA SET estatura = $estatura, peso = $peso, antecedentesFamiliares = '$antecedentesFamiliares', alergias = '$alergias' WHERE idHistoria = '$idHistoria'";
                    $resultadoUpdateHistoria = mysqli_query($conection, $updateHistoria);
                    if ($resultadoUpdateHistoria) {
                        header("Location: ../view/crud.php?actualizacionHistoria=true&tablaCrud=3");
                    }
                } else {
                    header("Location: ../view/crud.php?usuarioIncorrecto=true&tablaCrud=3");
                }
            }
            break;
        case 4:
            if (isset($_REQUEST["crear"])) {
                $idPaciente = $_REQUEST["idPaciente"];
                $valor = $_REQUEST["valor"];
                $fecha = $_REQUEST["fecha"];
                $tipo = $_REQUEST["tipo"];

                $consultaIdHistoria = "SELECT idHistoria FROM HISTORIA_CLINICA WHERE idPacienteFK = '$idPaciente'";
                $resultadoConsultaHistoria = mysqli_query($conection, $consultaIdHistoria);

                if (mysqli_num_rows($resultadoConsultaHistoria) > 0) {
                    $arrayConsultaHistoria = mysqli_fetch_array($resultadoConsultaHistoria);
                    $idHistoria = $arrayConsultaHistoria["idHistoria"];

                    $insertExamen = "INSERT INTO EXAMEN VALUES(null,$valor,'$fecha','$tipo','$idHistoria')";
                    $resultadoExamen = mysqli_query($conection, $insertExamen);
                    if ($resultadoExamen) {
                        header("Location: ../view/crud.php?registroExamen=true&tablaCrud=4");
                    }
                } else {
                    header("Location: ../view/crud.php?usuarioIncorrecto=true&tablaCrud=4");
                }
            } else if (isset($_REQUEST["actualizar"])) {
                $idExamen = $_REQUEST["idExamen"];
                $idPaciente = $_REQUEST["idPaciente"];
                $valor = $_REQUEST["valor"];
                $fechaExamen = $_REQUEST["fecha"];
                $tipoExamen = $_REQUEST["tipo"];

                $consultaIdHistoria = "SELECT idHistoria FROM HISTORIA_CLINICA WHERE idPacienteFK = '$idPaciente'";
                $resultadoConsultaHistoria = mysqli_query($conection, $consultaIdHistoria);
                if (mysqli_num_rows($resultadoConsultaHistoria) > 0) {
                    $arrayConsultaHistoria = mysqli_fetch_array($resultadoConsultaHistoria);
                    $idHistoria = $arrayConsultaHistoria["idHistoria"];
                    $updateExamen = "UPDATE EXAMEN SET valor = $valor, fechaExamen = '$fechaExamen', tipoExamen = '$tipoExamen',idHistoriaFK = '$idHistoria' WHERE idExamen = '$idExamen'";
                    $resultadoUpdateExamen = mysqli_query($conection, $updateExamen);
                    if ($resultadoUpdateExamen) {
                        header("Location: ../view/crud.php?actualizacionExamen=true&tablaCrud=4");
                    }
                } else {
                    header("Location: ../view/crud.php?usuarioIncorrecto=true&tablaCrud=4");
                }
            }
            break;
    }
}
