<?php
session_start();
if (!isset($_SESSION["rolUsuarioNavegando"]) || !isset($_REQUEST["tablaCrud"])) {
    header("Location: ./error404.php");
}
require_once 'header.php';
require_once '../model/database.php';

switch ($_REQUEST["tablaCrud"]) {
    case 0:
        $gestion = "usuarios";
        break;
    case 1:
        $gestion = "agenda médica";
        break;
    case 2:
        $gestion = "citas";
        break;
    case 3:
        $gestion = "historia clínica";
        break;
    case 4:
        $gestion = "exámenes";
        break;
    case 5:
        $gestion = "reportes";
        break;
}
?>

<div class="container-fluid" id="container-modulo">
    <input type="number" value="<?php echo $_REQUEST["tablaCrud"] ?>" id="idTablaCrud" style="display: none;"> <!-- Contiene el numero de tablaCrud para poder cargarlo en javascript -->
    <div class="row">
        <?php
        require_once 'navbar.php';
        ?>
    </div>
    <div class="row">
        <h1 class="modulo-titulo w-100">Gestión de <?php echo $gestion ?></h1>
    </div>
    <div class="row justify-content-center align-items-center" id="row-tabla">
        <div id="container-tabla">
            <div class="table-responsive">
                <!-- Imprime una u otra tabla -->
                <?php if ($_REQUEST["tablaCrud"] == 0 && ($_SESSION["rolUsuarioNavegando"] == 0 || $_SESSION["rolUsuarioNavegando"] == 1)) { ?>
                    <table class="table" id="tablaCrud">
                        <thead class="thead-dark">
                            <tr>
                                <th>Acciones</th>
                                <th>Identificación</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Correo</th>
                                <th>Telefono</th>
                                <th>Dirección</th>
                                <th>Contraseña</th>
                                <th>Rol</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $consulta = "SELECT * FROM USUARIO WHERE estadoUsuario = true";
                            $resultadoConsulta = mysqli_query($conection, $consulta);

                            while ($arrayConsulta = mysqli_fetch_array($resultadoConsulta)) {
                            ?>
                                <tr>
                                    <td>
                                        <div class="btn-group">
                                            <a href="crud.php?editar=<?php echo $arrayConsulta["idUsuario"] ?>&tablaCrud=0" class="boton-editar">
                                                <span style="color: White;">
                                                    <i class="fas fa-edit fa-fw"></i>
                                                </span>
                                            </a>
                                            <a href="#" onclick="confirmacionInactivar(<?php echo $arrayConsulta['idUsuario'] ?>)" class="boton-eliminar">
                                                <span style="color: White;">
                                                    <i class="fas fa-trash-alt fa-fw"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </td>
                                    <td><?php echo $arrayConsulta["idUsuario"] ?></td>
                                    <td><?php echo $arrayConsulta["nombreUsuario"] ?></td>
                                    <td><?php echo $arrayConsulta["apellidoUsuario"] ?></td>
                                    <td><?php echo $arrayConsulta["correoUsuario"] ?></td>
                                    <td><?php echo $arrayConsulta["telefonoUsuario"] ?></td>
                                    <td><?php echo $arrayConsulta["direccionUsuario"] ?></td>
                                    <td><?php echo $arrayConsulta["passwordUsuario"] ?></td>
                                    <td><?php echo $arrayConsulta["rolUsuario"] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php } else if ($_REQUEST["tablaCrud"] == 1 && ($_SESSION["rolUsuarioNavegando"] == 0 || $_SESSION["rolUsuarioNavegando"] == 2)) { ?>
                    <table class="table" id="tablaCrud">
                        <thead class="thead-dark">
                            <tr>
                                <th>Acciones</th>
                                <th>Número de agenda</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Consultorio</th>
                                <th>Medico</th>
                                <th>Paciente</th>
                                <th>Identificación Médico</th>
                                <th>Identificación Paciente</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $consulta = "SELECT * FROM AGENDA_MEDICA WHERE estadoAgenda = true";
                            $resultadoConsulta = mysqli_query($conection, $consulta);

                            while ($arrayConsulta = mysqli_fetch_array($resultadoConsulta)) {
                            ?>
                                <tr>
                                    <td>
                                        <div class="btn-group">
                                            <a href="crud.php?editar=<?php echo $arrayConsulta["idAgenda"] ?>" class="boton-editar">
                                                <span style="color: White;">
                                                    <i class="fas fa-edit fa-fw"></i>
                                                </span>
                                            </a>
                                            <a href="#" onclick="confirmacionInactivar(<?php echo $arrayConsulta['idAgenda'] ?>)" class="boton-eliminar">
                                                <span style="color: White;">
                                                    <i class="fas fa-trash-alt fa-fw"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </td>
                                    <td><?php echo $arrayConsulta["idAgenda "] ?></td>
                                    <td><?php echo $arrayConsulta["nombreUsuario"] ?></td>
                                    <td><?php echo $arrayConsulta["apellidoUsuario"] ?></td>
                                    <td><?php echo $arrayConsulta["correoUsuario"] ?></td>
                                    <td><?php echo $arrayConsulta["telefonoUsuario"] ?></td>
                                    <td><?php echo $arrayConsulta["direccionUsuario"] ?></td>
                                    <td><?php echo $arrayConsulta["passwordUsuario"] ?></td>
                                    <td><?php echo $arrayConsulta["rolUsuario"] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php } ?>
            </div>
        </div>
    </div>
    <script src="../assets/js/app.js"></script>
    <?php
    require_once "./footer.php";
    //Sección de alertas
    if (isset($_REQUEST["registroCorrecto"])) {
        if ($_REQUEST["registroCorrecto"]) {
            echo "
        <script type='text/javascript'>
        Swal.fire({
            icon: 'success',
            title: 'Usuario Registrado Correctamente',
            timer: 5000
        }); 
        </script>  
        ";
        } else {
            echo "
        <script type='text/javascript'>
        Swal.fire({
            icon: 'error',
            title: 'Has intentado registrar un usuario existente',
            text: 'Si necesitas editar los datos de algún usuario, puedes hacerlo desde gestión de usuarios'
        }); 
        </script>  
        ";
        }
    } else if (isset($_REQUEST["actualizacionCorrecta"])) {
        echo ("
        <script type='text/javascript'>
        Swal.fire({
            icon: 'success',
            title: 'Usuario actualizado correctamente',
            showCloseButton:true,
            timer:5000
        }); 
        </script>   
        ");
    } else if (isset($_REQUEST["eliminacionCorrecta"])) {
        echo "
        <script>
            Swal.fire({
                icon: 'info',
                title: 'Usuario eliminado Correctamente',
                html: 'Puedes ' +
                '<a href=\"./recuperar.php\">ir al módulo recuperar usuarios</a>' +
                ' para recuperar el usuario'
            })
        </script>
        ";
    }
    if (isset($_REQUEST["tablaCrud"])) {
        $tablaCrud = $_REQUEST["tablaCrud"];
        switch ($_REQUEST["tablaCrud"]) {
            case 0:
                if (isset($_REQUEST["editar"])) {   //Si el usuario desea editar, se le muestra 
                    $idUsuario = $_REQUEST["editar"];

                    $consultaUsuario = "SELECT * FROM USUARIO WHERE idUsuario = $idUsuario";
                    $resultadoConsultaUsuario = mysqli_query($conection, $consultaUsuario);
                    $arrayConsultaUsuario = mysqli_fetch_array($resultadoConsultaUsuario);

                    $nombreUsuario = $arrayConsultaUsuario["nombreUsuario"];
                    $apellidoUsuario = $arrayConsultaUsuario["apellidoUsuario"];
                    $correoUsuario = $arrayConsultaUsuario["correoUsuario"];
                    $telefonoUsuario = $arrayConsultaUsuario["telefonoUsuario"];
                    $direccionUsuario = $arrayConsultaUsuario["direccionUsuario"];
                    $rolUsuario = $arrayConsultaUsuario["rolUsuario"];
                    $estadoUsuario = $arrayConsultaUsuario["estadoUsuario"];
                    $passwordUsuario = $arrayConsultaUsuario["passwordUsuario"];

                    $administrador = "";         //Haran que una u otra opcion se seleccionen al editar
                    $secretaria = "";
                    $medico = "";
                    $paciente = "";
                    switch ($rolUsuario) {
                        case 'Administrador':
                            $administrador = "selected";
                            break;

                        case 'Secretaria':
                            $secretaria = "selected";
                            break;

                        case 'Medico':
                            $medico = "selected";
                            break;
                        case 'Paciente':
                            $paciente = "selected";
                            break;
                    }

                    echo "
                    <script>
                    Swal.fire({
                        width: '85%',
                        title: '✏️ Editar usuario con el número de identificación $idUsuario',
                        showCloseButton: true,
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        html: '<form action=\'../controller/controller.php?tablaCrud=$tablaCrud\' method=\'POST\'>' +
                            '<div class=\'row align-items-center justify-content-center\'>' +
                            '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                            '       <input type=\'number\' name=\'idUsuario\' class=\'form-control\' value=\'$idUsuario\' style=\'display:none\'/>' +
                            '       <label for=\'nombreUsuario\'>Nombre</label>' +
                            '       <input type=\'text\' name=\'nombreUsuario\' class=\'form-control\' value=\'$nombreUsuario\' required/>' +
                            '   </div>' +
                            '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                            '       <label for=\'apellidoUsuario\'>Apellido</label>' +
                            '       <input type=\'text\' name=\'apellidoUsuario\' class=\'form-control\' value=\'$apellidoUsuario\' required>' +
                            '   </div>' +
                            '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                            '       <label for=\'correoUsuario\'>Correo</label>' +
                            '       <input type=\'email\' name=\'correoUsuario\' class=\'form-control\' value=\'$correoUsuario\' required>' +
                            '   </div>' +
                            '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                            '       <label for=\'telefonoUsuario\'>Telefono</label>' +
                            '       <input type=\'number\' name=\'telefonoUsuario\' class=\'form-control\' value=\'$telefonoUsuario\' required>' +
                            '   </div>' +
                            '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                            '       <label for=\'direccionUsuario\'>Direccion</label>' +
                            '       <input type=\'text\' name=\'direccionUsuario\' class=\'form-control\' value=\'$direccionUsuario\' required>' +
                            '   </div>' +
                            '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                            '       <label for=\'rolUsuario\'>Rol</label>' +
                            '       <select name=\'rolUsuario\' class=\'form-control\' required>' +
                            '           <option value=\'Administrador\' $administrador>Administrador</option>' +
                            '           <option value=\'Secretaria\' $secretaria>Secretaria</option>' +
                            '           <option value=\'Medico\' $medico>Medico</option>' +
                            '           <option value=\'Paciente\' $paciente>Paciente</option>' +
                            '       </select>' +
                            '   </div>' +
                            '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                            '       <label for=\'passwordUsuario\'>Contraseña</label>' +
                            '       <input type=\'text\' name=\'passwordUsuario\' class=\'form-control\' value=\'$passwordUsuario\' required>' +
                            '   </div>' +
                            '   <div class=\'col-sm-12 col-md-6 form-group\'>' +
                            '       <input type=\'submit\' name=\'actualizar\' class=\'btn btn-primary btn-lg w-100\' value=\'Editar Usuario\'>' +
                            '   </div>' +
                            '</div>' +
                            '</form>'
                    });
                    </script>
                    ";
                }
                break;

            default:
                # code...
                break;
        }
    }
    ?>

</div>

</body>

</html>