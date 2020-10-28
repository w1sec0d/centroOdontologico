<?php
session_start();
if (!isset($_SESSION["rolUsuarioNavegando"]) || !isset($_REQUEST["tablaCrud"])) {
    header("Location: ./error404.php");
}
require_once 'header.php';
require_once '../model/database.php';

switch ($_REQUEST["tablaCrud"]) { //Estbalece que se está gestinando
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
        <h1 class="modulo-titulo w-100">
            Gestión de <?php echo $gestion ?>
            <?php
            if (isset($_REQUEST["id"])) {
                $consultaNombre = "SELECT nombrePaciente FROM VISTA_CONSULTA_MEDICA";
                $resultadoConsultaNombre = mysqli_query($conection, $consultaNombre);
                $arrayConsultaNombre = mysqli_fetch_array($resultadoConsultaNombre);

                echo $arrayConsultaNombre["nombrePaciente"];
            }
            ?>
        </h1>

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
                                <th>Teléfono</th>
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
                                <th>Fecha y hora</th>
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
                                            <a href="crud.php?editar=<?php echo $arrayConsulta["idAgenda"] ?>&tablaCrud=1" class="boton-editar">
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
                                    <td><?php echo $arrayConsulta["idAgenda"] ?></td>
                                    <td><?php echo $arrayConsulta["Fecha y hora agenda"] ?></td>
                                    <td><?php echo $arrayConsulta["consultorio"] ?></td>
                                    <td><?php echo $arrayConsulta["nombreMedico"] ?></td>
                                    <td><?php echo $arrayConsulta["nombrePaciente"] ?></td>
                                    <td><?php echo $arrayConsulta["idMedico"] ?></td>
                                    <td><?php echo $arrayConsulta["idPaciente"] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php } else if ($_REQUEST["tablaCrud"] == 2) { ?>
                    <table class="table" id="tablaCrud">
                        <thead class="thead-dark">
                            <tr>
                                <th>Acciones</th>
                                <th>Paciente</th>
                                <th>Número de consulta</th>
                                <th>Fecha y hora consulta</th>
                                <th>Motivo</th>
                                <th>Enfermedad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($_REQUEST["id"])) {
                                $id = $_REQUEST["id"];
                                $consulta = "SELECT * FROM VISTA_CONSULTA_MEDICA WHERE idPacienteFK = '$id'";
                            } else {
                                $consulta = "SELECT * FROM VISTA_CONSULTA_MEDICA";
                            }
                            $resultadoConsulta = mysqli_query($conection, $consulta);

                            while ($arrayConsulta = mysqli_fetch_array($resultadoConsulta)) {
                            ?>
                                <tr>
                                    <td>
                                        <div class="btn-group">
                                            <a href="crud.php?editar=<?php echo $arrayConsulta["idAgenda"] ?>&tablaCrud=1" class="boton-editar">
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
                                    <td><?php echo $arrayConsulta["nombrePaciente"] ?></td>
                                    <td><?php echo $arrayConsulta["idConsulta"] ?></td>
                                    <td><?php echo $arrayConsulta["horaConsulta"] ?></td>
                                    <td><?php echo $arrayConsulta["motivoConsulta"] ?></td>
                                    <td><?php echo $arrayConsulta["enfermedad"] ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php } else if ($_REQUEST["tablaCrud"] == 3) { ?>
                    <table class="table" id="tablaCrud">
                        <thead class="thead-dark">
                            <tr>
                                <th>Acciones</th>
                                <th>Número de Historia</th>
                                <th>Estatura</th>
                                <th>Peso</th>
                                <th>Antecedentes familiares</th>
                                <th>Alergias</th>
                                <th>Identificación Paciente</th>
                                <th>Ver historial de citas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $consulta = "SELECT * FROM HISTORIA_CLINICA";
                            $resultadoConsulta = mysqli_query($conection, $consulta);

                            while ($arrayConsulta = mysqli_fetch_array($resultadoConsulta)) {
                            ?>
                                <tr>
                                    <td>
                                        <div class="btn-group">
                                            <a href="crud.php?editar=<?php echo $arrayConsulta["idHistoria"] ?>&tablaCrud=3" class="boton-editar" style="border-radius: 5px;">
                                                <span style="color: White;">
                                                    <i class="fas fa-edit fa-fw"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </td>
                                    <td><?php echo $arrayConsulta["idHistoria"] ?></td>
                                    <td><?php echo $arrayConsulta["estatura"] ?></td>
                                    <td><?php echo $arrayConsulta["peso"] ?></td>
                                    <td><?php echo $arrayConsulta["antecedentesFamiliares"] ?></td>
                                    <td><?php echo $arrayConsulta["alergias"] ?></td>
                                    <td><?php echo $arrayConsulta["idPacienteFK"] ?></td>
                                    <td>
                                        <a href="crud.php?tablaCrud=2&id=<?php echo $arrayConsulta["idPacienteFK"] ?>" class="boton-citas">
                                            <span style="color: White;">
                                                <i class="fas fa-eye fa-fw"></i>
                                            </span>
                                        </a>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                <?php } else if ($_REQUEST["tablaCrud"] == 4) { ?>
                    <table class="table" id="tablaCrud">
                        <thead class="thead-dark">
                            <tr>
                                <th>Acciones</th>
                                <th>Identificación Paciente</th>
                                <th>Nombre Paciente</th>
                                <th>Valor</th>
                                <th>Fecha</th>
                                <th>Tipo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $consulta = "SELECT * FROM VISTA_EXAMEN";
                            $resultadoConsulta = mysqli_query($conection, $consulta);

                            while ($arrayConsulta = mysqli_fetch_array($resultadoConsulta)) {
                            ?>
                                <tr>
                                    <td>
                                        <a href="crud.php?editar=<?php echo $arrayConsulta["idExamen"] ?>&tablaCrud=4" class="boton-editar" style="border-radius: 5px;">
                                            <span style="color: White;">
                                                <i class="fas fa-edit fa-fw"></i>
                                            </span>
                                        </a>
                                    </td>
                                    <td><?php echo $arrayConsulta["idPacienteFK"] ?></td>
                                    <td><?php echo $arrayConsulta["nombrePaciente"] ?></td>
                                    <td>$<?php echo $arrayConsulta["valor"] ?></td>
                                    <td><?php echo $arrayConsulta["fechaExamen"] ?></td>
                                    <td><?php echo $arrayConsulta["tipoExamen"] ?></td>
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

    <?php
    require_once "./footer.php";
    ?>
</div>
<script>
    var spanishTable = { // Variable que almacena la traduccion a español de la tabla
        "sProcessing": "Procesando...",
        "sLengthMenu": "Mostrar _MENU_ registros",
        "sZeroRecords": "No se encontraron resultados",
        "sEmptyTable": "Ningún dato disponible en esta tabla",
        "sInfo": "Registros del _START_ al _END_ de un total de _TOTAL_ ",
        "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
        "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
        "sInfoPostFix": "",
        "sSearch": "Buscar:",
        "sUrl": "",
        "sInfoThousands": ",",
        "sLoadingRecords": "Cargando...",
        "oPaginate": {
            "sFirst": "Primero",
            "sLast": "Último",
            "sNext": "Siguiente",
            "sPrevious": "Anterior"
        },
        "oAria": {
            "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
            "sSortDescending": ": Activar para ordenar la columna de manera descendente"
        },
        "buttons": {
            "copy": "Copiar",
            "colvis": "Visibilidad"
        }
    }
    // Alertas y confirmaciones
    function confirmacionInactivar(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: '¿Estás seguro de eliminar el registro?',
            text: "De todas formas, podrás recuperarlo en el módulo de recuperar <?php echo $gestion ?>",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, Eliminar Registro',
            cancelButtonText: 'No, Cancelar',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                window.location.href = "../controller/controller.php?eliminar=true&tablaCrud=<?php echo $_REQUEST["tablaCrud"] ?>&id=" + id;
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Operación Cancelada',
                    'El registro NO ha sido eliminado',
                    'info'
                )
            }
        })
    }

    <?php //Sección de alertas
    if (isset($_REQUEST["actualizacionCorrecta"])) {
    ?>
        Swal.fire({
            icon: 'success',
            title: 'Usuario actualizado correctamente',
            showCloseButton: true,
            timer: 5000
        });
        <?php
    } else if (isset($_REQUEST["registroCorrecto"])) {
        if ($_REQUEST["registroCorrecto"]) {
        ?>
            Swal.fire({
                icon: 'success',
                title: 'Usuario Registrado Correctamente',
                timer: 5000
            });
        <?php
        }
    } else if (isset($_REQUEST["registroIncorrecto"])) {
        ?>
        Swal.fire({
            icon: 'error',
            title: 'Has intentado registrar un usuario existente',
            text: 'Si necesitas editar los datos de algún usuario, puedes hacerlo desde gestión de usuarios'
        });
    <?php
    } else if (isset($_REQUEST["eliminacionCorrecta"])) {
    ?>
        Swal.fire({
            icon: 'info',
            title: 'Usuario eliminado Correctamente',
            html: 'Puedes ' +
                '<a href=\"./recuperar.php?tablaCrud=0\">ir al módulo recuperar usuarios</a>' +
                ' para recuperar el usuario'
        });
    <?php
    } else if (isset($_REQUEST["registroPacienteIncorrecto"])) {
    ?>
        Swal.fire({
            icon: 'error',
            title: 'Has ingresado una identificación de paciente que no existe',
            footer: 'Porfavor, inténtalo de nuevo'
        });
    <?php
    } else if (isset($_REQUEST["registroDoctorIncorrecto"])) {
    ?>
        Swal.fire({
            icon: 'error',
            title: 'Has ingresado una identificación de doctor que no existe',
            footer: 'Porfavor, inténtalo de nuevo'
        });
    <?php
    } else if (isset($_REQUEST["agendaCorrecta"])) {
    ?>
        Swal.fire({
            icon: 'success',
            title: 'Agenda registrada correctamente',
            showCloseButton: true,
            timer: 5000
        });
    <?php
    } else if (isset($_REQUEST["agendaIncorrecta"])) {
    ?>
        Swal.fire({
            icon: 'error',
            title: 'Has ingresado una identificación de doctor y/o paciente que no existe',
            footer: 'Porfavor, inténtalo de nuevo'
        });
    <?php
    } else if (isset($_REQUEST["actualizacionAgenda"])) {
    ?>
        Swal.fire({
            icon: 'success',
            title: 'El agenda ha sido actualizada',
            timer: 5000,
            showCloseButton: true
        });
    <?php
    } else if (isset($_REQUEST["inactivacionAgenda"])) {
    ?>
        Swal.fire({
            icon: 'success',
            title: 'El agenda ha sido eliminada',
            showCloseButton: true,
            html: 'Puedes ' +
                '<a href=\"./recuperar.php?tablaCrud=1\">ir al módulo recuperar agenda médica</a>' +
                ' para recuperar la agenda'
        });
    <?php
    } else if (isset($_REQUEST["actualizacionExamen"])) {
    ?>
        Swal.fire({
            icon: 'success',
            title: 'El agenda ha sido actualizada',
            timer: 5000,
            showCloseButton: true
        });
    <?php
    } else if (isset($_REQUEST["usuarioIncorrecto"])) {
    ?>
        Swal.fire({
            icon: 'error',
            title: 'Has ingresado una identificación de usuario que no existe',
            footer: 'Porfavor, inténtalo de nuevo',
            showCloseButton: true
        });
    <?php
    } else if (isset($_REQUEST["inactivacionExamen"])) {
    ?>
        Swal.fire({
            icon: 'success',
            title: 'El exámen ha sido eliminado',
            showCloseButton: true,
            html: 'Puedes ' +
                '<a href=\"./recuperar.php?tablaCrud=1\">ir al módulo recuperar agenda médica</a>' +
                ' para recuperar la agenda'
        });
    <?php
    } else if (isset($_REQUEST["historiaCreada"])) {
    ?>
        Swal.fire({
            icon: 'info',
            title: 'El usuario que ingresaste ya tiene una historia clínica',
            showCloseButton: true
        });
    <?php
    } else if (isset($_REQUEST["registroHistoriaCorrecto"])) {
    ?>
        Swal.fire({
            icon: 'success',
            title: 'La historia clínica se ha registrado con éxito',
            showCloseButton: true
        });
    <?php
    } else if (isset($_REQUEST["actualizacionHistoria"])) {
    ?>
        Swal.fire({
            icon: 'success',
            title: 'La historia clínica se ha actualizado con éxito',
            showCloseButton: true
        });
    <?php
    }
    ?>
    window.onload = function() {
        window.onscroll = function() { //Al hacer scroll, esconde el navbar 
            var navbar = document.getElementById('navbar');
            if (window.pageYOffset > 0) {
                navbar.style.top = '-70px'
            } else {
                navbar.style.top = '0'
            }
        }

        $('#tablaCrud').DataTable({
            language: spanishTable, //establece el idioma
            fixedHeader: true,
            colReorder: true,
            responsive: true,
            "columnDefs": [{ // Hace que algunas columnas no sean ordenables
                "orderable": false,
                "targets": 0
            }],
            dom: 'fBtlp', // Establece los elementos a mostrar en la tabla
            buttons: [{
                    text: '<a onclick="crear()"><i class="fas fa-plus-circle fa-fw"></i> Crear <?php echo $gestion ?></a>',
                    titleAttr: 'Crear <?php echo $gestion ?>',
                    className: 'boton boton-crear'
                },
                <?php
                if ($_REQUEST["tablaCrud"] != 4 && $_REQUEST["tablaCrud"] != 3) {
                ?> {
                        text: '<a onclick="recuperar()"><i class="fas fa-trash-restore fa-fw"></i> Recuperar <?php echo $gestion ?></a>',
                        titleAttr: 'Recuperar <?php echo $gestion ?>',
                        className: 'boton boton-recuperar'
                    },
                <?php
                }
                ?> {
                    extend: 'excelHtml5',
                    text: '<i class="fas fa-file-excel fa-fw"></i> Exportar Excel ',
                    titleAttr: 'Exportar a Excel',
                    className: 'boton boton-excel'
                },
                {
                    extend: 'print',
                    text: '<i class="fas fa-print fa-fw"></i> Imprimir',
                    titleAttr: 'Imprimir',
                    className: 'boton boton-imprimir'
                }
            ]
        });
    }

    // Funciones de la CRUD (muestran formulario respectivo)
    function recuperar() {
        window.location.href = "./recuperar.php?tablaCrud=<?php echo $_REQUEST["tablaCrud"] ?>";
    }

    <?php
    switch ($_REQUEST["tablaCrud"]) {
        case 0:
    ?>

            function crear() {
                Swal.fire({
                    width: '85%',
                    title: '🧑 Crear Usuario',
                    showCloseButton: true,
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    html: '<form action=\'../controller/controller.php?tablaCrud=0\' method=\'POST\'>' +
                        '<div class=\'row align-items-center justify-content-center\'>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'idUsuario\'>Número de documento</label>' +
                        '       <input type=\'number\' name=\'idUsuario\' class=\'form-control\' required/>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'nombreUsuario\'>Nombre</label>' +
                        '       <input type=\'text\' name=\'nombreUsuario\' class=\'form-control\' required/>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'apellidoUsuario\'>Apellido</label>' +
                        '       <input type=\'text\' name=\'apellidoUsuario\' class=\'form-control\'required>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'correoUsuario\'>Correo</label>' +
                        '       <input type=\'email\' name=\'correoUsuario\' class=\'form-control\' required>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'telefonoUsuario\'>Teléfono</label>' +
                        '       <input type=\'number\' name=\'telefonoUsuario\' class=\'form-control\' required>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'direccionUsuario\'>Direccion</label>' +
                        '       <input type=\'text\' name=\'direccionUsuario\' class=\'form-control\' required>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'rolUsuario\'>Rol</label>' +
                        '       <select name=\'rolUsuario\' class=\'form-control\' id=\'rolUsuario\' onchange=\'inputsExtra()\' required>' +
                        '           <option value=\'Administrador\'>Administrador</option>' +
                        '           <option value=\'Secretaria\'>Secretaria</option>' +
                        '           <option value=\'Medico\'>Medico</option>' +
                        '           <option value=\'Paciente\'>Paciente</option>' +
                        '       </select>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'passwordUsuario\'>Contraseña</label>' +
                        '       <input type=\'text\' name=\'passwordUsuario\' class=\'form-control\'>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group hidden\' id=\'fechaNacimiento\'>' +
                        '       <label for=\'fechaNacimiento\'>Fecha de nacimiento</label>' +
                        '       <input type=\'date\' name=\'fechaNacimiento\' id="fechaNacimientoInput" class=\'form-control\'>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group hidden\' id=\'especialidadMedico\'>' +
                        '       <label for=\'especialidadMedico\'>Especialidad Médico</label>' +
                        '       <input type=\'text\' name=\'especialidadMedico\' id="especialidadMedicoInput" class=\'form-control\'>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group hidden\' id=\'tarjetaProfesional\'>' +
                        '       <label for=\'tarjetaProfesional\'>Tarjeta Profesional</label>' +
                        '       <input type=\'number\' name=\'tarjetaProfesional\' id="tarjetaProfesionalInput" class=\'form-control\'>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 form-group\'>' +
                        '       <input type=\'submit\' name=\'crear\' class=\'btn btn-primary btn-lg w-100\' value=\'Crear Usuario\'>' +
                        '   </div>' +
                        '</div>' +
                        '</form>'
                });
            }


            function inputsExtra() { //muestra los inputs extra si son necesarios
                var selectUsuario = document.getElementById("rolUsuario"); // carga un input con el select de tipo usuario
                var fechaNacimiento = document.getElementById("fechaNacimiento");
                var fechaNacimientoInput = document.getElementById("fechaNacimientoInput");
                var especialidadMedico = document.getElementById("especialidadMedico");
                var especialidadMedicoInput = document.getElementById("especialidadMedicoInput");
                var tarjetaProfesional = document.getElementById("tarjetaProfesional");
                var tarjetaProfesionalInput = document.getElementById("tarjetaProfesionalInput");
                // Muestra campos adicionales dependiendo del rol y les agrega o quita required
                if (selectUsuario.value == "Medico") {
                    especialidadMedico.style.display = "block";
                    especialidadMedicoInput.setAttribute("required", "");

                    tarjetaProfesional.style.display = "block";
                    tarjetaProfesionalInput.setAttribute("required", "");

                    fechaNacimiento.style.display = "none";
                    fechaNacimientoInput.removeAttribute("required");
                } else if (selectUsuario.value == "Paciente") {
                    fechaNacimiento.style.display = "block";
                    fechaNacimientoInput.setAttribute("required", "");

                    especialidadMedico.style.display = "none";
                    especialidadMedicoInput.removeAttribute("required");

                    tarjetaProfesional.style.display = "none";
                    tarjetaProfesionalInput.removeAttribute("required");
                } else {
                    fechaNacimiento.style.display = "none";
                    fechaNacimiento.removeAttribute("required");

                    especialidadMedico.style.display = "none";
                    especialidadMedico.removeAttribute("required");

                    tarjetaProfesional.style.display = "none";
                    tarjetaProfesional.removeAttribute("required");
                }
            }

            <?php
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

                $tarjetaProfesional = ""; // Conjunto de variables que almacenarán algunos datos extra
                $fechaNacimiento = "";
                $especialidadMedico = "";
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
                        $consultaMedico = "SELECT * FROM MEDICO WHERE idMedico = '$idUsuario'";
                        $resultadoConsultaMedico = mysqli_query($conection, $consultaMedico);
                        $arrayConsultaMedico = mysqli_fetch_array($resultadoConsultaMedico);

                        $tarjetaProfesional = $arrayConsultaMedico["tarjetaProfesional"];
                        $especialidadMedico = $arrayConsultaMedico["especialidadMedico"];
                        $medico = "selected";
                        break;
                    case 'Paciente':
                        $consultaPaciente = "SELECT * FROM PACIENTE WHERE idPaciente = '$idUsuario'";
                        $resultadoConsultaPaciente = mysqli_query($conection, $consultaPaciente);
                        $arrayConsultaPaciente = mysqli_fetch_array($resultadoConsultaPaciente);

                        $fechaNacimiento = $arrayConsultaPaciente["fechaNacimiento"];
                        $paciente = "selected";
                        break;
                }
            ?>
                Swal.fire({
                    width: '85%',
                    title: '✏️ Editar usuario con el número de identificación <?php echo $idUsuario ?>',
                    showCloseButton: true,
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    html: '<form action=\'../controller/controller.php?tablaCrud=\'<?php echo $_REQUEST["tablaCrud"] ?>\'\' method=\'POST\'>' +
                        '<div class=\'row align-items-center justify-content-center\'>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <input type=\'number\' name=\'idUsuario\' class=\'form-control\' value=\'<?php echo $idUsuario ?>\' style=\'display:none\'/>' +
                        '       <label for=\'nombreUsuario\'>Nombre</label>' +
                        '       <input type=\'text\' name=\'nombreUsuario\' class=\'form-control\' value=\'<?php echo $nombreUsuario ?>\' required/>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'apellidoUsuario\'>Apellido</label>' +
                        '       <input type=\'text\' name=\'apellidoUsuario\' class=\'form-control\' value=\'<?php echo $apellidoUsuario ?>\' required>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'correoUsuario\'>Correo</label>' +
                        '       <input type=\'email\' name=\'correoUsuario\' class=\'form-control\' value=\'<?php echo $correoUsuario ?>\' required>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'telefonoUsuario\'>Teléfono</label>' +
                        '       <input type=\'number\' name=\'telefonoUsuario\' class=\'form-control\' value=\'<?php echo $telefonoUsuario ?>\' required>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'direccionUsuario\'>Direccion</label>' +
                        '       <input type=\'text\' name=\'direccionUsuario\' class=\'form-control\' value=\'<?php echo $direccionUsuario ?>\' required>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'rolUsuario\'>Rol</label>' +
                        '       <select name=\'rolUsuario\' class=\'form-control\' id=\'rolUsuario\' onchange=\'inputsExtra()\'required>' +
                        '           <option value=\'Administrador\' <?php echo $administrador ?>>Administrador</option>' +
                        '           <option value=\'Secretaria\' <?php echo $secretaria ?>>Secretaria</option>' +
                        '           <option value=\'Medico\' <?php echo $medico ?>>Medico</option>' +
                        '           <option value=\'Paciente\' <?php echo $paciente ?>>Paciente</option>' +
                        '       </select>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'passwordUsuario\'>Contraseña</label>' +
                        '       <input type=\'text\' name=\'passwordUsuario\' class=\'form-control\' value=\'<?php echo $passwordUsuario ?>\' required>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group hidden\' id=\'fechaNacimiento\'>' +
                        '       <label for=\'fechaNacimiento\'>Fecha de nacimiento</label>' +
                        '       <input type=\'date\' name=\'fechaNacimiento\' id="fechaNacimientoInput" class=\'form-control\' value=\'<?php echo $fechaNacimiento ?>\'>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group hidden\' id=\'especialidadMedico\'>' +
                        '       <label for=\'especialidadMedico\'>Especialidad Médico</label>' +
                        '       <input type=\'text\' name=\'especialidadMedico\' id="especialidadMedicoInput" class=\'form-control\' value=\'<?php echo $especialidadMedico ?>\'>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group hidden\' id=\'tarjetaProfesional\'>' +
                        '       <label for=\'tarjetaProfesional\'>Tarjeta Profesional</label>' +
                        '       <input type=\'number\' name=\'tarjetaProfesional\' id="tarjetaProfesionalInput" class=\'form-control\' value=\'<?php echo $tarjetaProfesional ?>\'>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 form-group\'>' +
                        '       <input type=\'submit\' name=\'actualizar\' class=\'btn btn-primary btn-lg w-100\' value=\'Guardar Cambios\'>' +
                        '   </div>' +
                        '</div>' +
                        '</form>'
                });
                inputsExtra();
            <?php
            }
            break;
        case 1:
            ?>

            function crear() {
                Swal.fire({
                    width: '85%',
                    title: '👩‍⚕️ Crear Agenda Médica',
                    showCloseButton: true,
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    html: '<form action=\'../controller/controller.php?tablaCrud=1\' method=\'POST\'>' +
                        '<div class=\'row align-items-center justify-content-center\'>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'fecha\'>Fecha Agenda Médica</label>' +
                        '       <input type=\'date\' name=\'fecha\' class=\'form-control\' required/>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'hora\'>Hora Agenda Médica</label>' +
                        '       <input type=\'time\' name=\'hora\' class=\'form-control\'required>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'consultorio\'>Número de consultorio</label>' +
                        '       <input type=\'number\' name=\'consultorio\' class=\'form-control\' min="1" required>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'idDoctor\'>Número de documento doctor</label>' +
                        '       <input type=\'number\' name=\'idMedico\' class=\'form-control\' min="0">' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'idPaciente\'>Número de documento paciente</label>' +
                        '       <input type=\'number\' name=\'idPaciente\' class=\'form-control\' min="0">' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 form-group\'>' +
                        '       <input type=\'submit\' name=\'crear\' class=\'btn btn-primary btn-lg w-100\' value=\'Crear Agenda\'>' +
                        '   </div>' +
                        '</div>' +
                        '</form>'
                });
            }
            <?php
            if (isset($_REQUEST["editar"])) {
                $idAgenda = $_REQUEST["editar"];
                $consultaAgenda = "SELECT * FROM AGENDA_MEDICA WHERE idAgenda = $idAgenda";
                $resultadoConsultaAgenda = mysqli_query($conection, $consultaAgenda);

                $arrayConsultaAgenda = mysqli_fetch_array($resultadoConsultaAgenda);
                $fechaAgenda = $arrayConsultaAgenda["fechaAgenda"];
                $horaAgenda = $arrayConsultaAgenda["horaAgenda"];
                $consultorio = $arrayConsultaAgenda["consultorio"];
                $idMedico = $arrayConsultaAgenda["idMedico"];
                $idPaciente = $arrayConsultaAgenda["idPaciente"];
            ?>
                Swal.fire({
                    width: '85%',
                    title: '👩‍⚕️ Editar Agenda Médica',
                    showCloseButton: true,
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    html: '<form action=\'../controller/controller.php?tablaCrud=1\' method=\'POST\'>' +
                        '<div class=\'row align-items-center justify-content-center\'>' +
                        '   <input type=\'number\' name=\'idAgenda\' class=\'form-control hidden\' value=\'<?php echo $idAgenda ?>\' required/>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'fecha\'>Fecha Agenda Médica</label>' +
                        '       <input type=\'date\' name=\'fechaAgenda\' class=\'form-control\' value=\'<?php echo $fechaAgenda ?>\' required/>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'hora\'>Hora Agenda Médica</label>' +
                        '       <input type=\'time\' name=\'horaAgenda\' class=\'form-control\' value=\'<?php echo $horaAgenda ?>\' required>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'consultorio\'>Número de consultorio</label>' +
                        '       <input type=\'number\' name=\'consultorio\' class=\'form-control\' min="1" value=\'<?php echo $consultorio ?>\' required>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'idDoctor\'>Número de documento doctor</label>' +
                        '       <input type=\'number\' name=\'idMedico\' class=\'form-control\' value=\'<?php echo $idMedico ?>\' min="0">' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'idPaciente\'>Número de documento paciente</label>' +
                        '       <input type=\'number\' name=\'idPaciente\' class=\'form-control\' value=\'<?php echo $idPaciente ?>\' min="0">' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 form-group\'>' +
                        '       <input type=\'submit\' name=\'actualizar\' class=\'btn btn-primary btn-lg w-100\' value=\'Editar Agenda\'>' +
                        '   </div>' +
                        '</div>' +
                        '</form>'
                });
            <?php
            }
            break;
        case 2:
            ?>

        <?php
            break;
        case 3:
        ?>

            function crear() {
                Swal.fire({
                    width: '85%',
                    title: '🏥 Crear Historia Clínica',
                    showCloseButton: true,
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    html: '<form action=\'../controller/controller.php?tablaCrud=3\' method=\'POST\'>' +
                        '<div class=\'row align-items-center justify-content-center\'>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'idPaciente\'>Identificación Paciente</label>' +
                        '       <input type=\'number\' name=\'idPaciente\' class=\'form-control\' required/>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'estatura\'>Estatura (en metros)</label>' +
                        '       <input type=\'number\' name=\'estatura\' class=\'form-control\' min="0" step="0.01" required>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'peso\'>Peso (en kilogramos)</label>' +
                        '       <input type=\'number\' name=\'peso\' class=\'form-control\' min="0" required>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'antecedentesFamiliares\'>Antecedentes familiares</label>' +
                        '       <textarea name=\'antecedentesFamiliares\' class=\'form-control\'></textarea>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'alergias\'>Alergias</label>' +
                        '       <textarea name=\'alergias\' class=\'form-control\'></textarea>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 form-group\'>' +
                        '       <input type=\'submit\' name=\'crear\' class=\'btn btn-primary btn-lg w-100\' value=\'Crear Agenda\'>' +
                        '   </div>' +
                        '</div>' +
                        '</form>'
                });
            }
            <?php
            if (isset($_REQUEST["editar"])) {
                $id = $_REQUEST["editar"];
                $consultaHistoria = "SELECT * FROM HISTORIA_CLINICA WHERE idHistoria = '$id'";
                $resultadoConsultaHistoria = mysqli_query($conection, $consultaHistoria);
                $arrayConsultaHistoria = mysqli_fetch_array($resultadoConsultaHistoria);
            ?>
                Swal.fire({
                    width: '85%',
                    title: '🏥 Editar Historia Clínica',
                    showCloseButton: true,
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    html: '<form action=\'../controller/controller.php?tablaCrud=3\' method=\'POST\'>' +
                        '<div class=\'row align-items-center justify-content-center\'>' +
                        '   <input type=\'number\' name=\'idHistoria\' class=\'form-contro hidden\' value=\'<?php echo $id ?>\' required/>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'idPaciente\'>Identificación Paciente</label>' +
                        '       <input type=\'number\' name=\'idPaciente\' class=\'form-control\' value=\'<?php echo $arrayConsultaHistoria["idPacienteFK"] ?>\' required/>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'estatura\'>Estatura (en metros)</label>' +
                        '       <input type=\'number\' name=\'estatura\' class=\'form-control\' min="0" step="0.01" value=\'<?php echo $arrayConsultaHistoria["estatura"] ?>\' required>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'peso\'>Peso (en kilogramos)</label>' +
                        '       <input type=\'number\' name=\'peso\' class=\'form-control\' min="0" value=\'<?php echo $arrayConsultaHistoria["peso"] ?>\' required>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'antecedentesFamiliares\'>Antecedentes familiares</label>' +
                        '       <textarea name=\'antecedentesFamiliares\' class=\'form-control\'><?php echo $arrayConsultaHistoria["antecedentesFamiliares"] ?></textarea>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'alergias\'>Alergias</label>' +
                        '       <textarea name=\'alergias\' class=\'form-control\'><?php echo $arrayConsultaHistoria["alergias"] ?></textarea>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 form-group\'>' +
                        '       <input type=\'submit\' name=\'actualizar\' class=\'btn btn-primary btn-lg w-100\' value=\'Editar Historia Clínica\'>' +
                        '   </div>' +
                        '</div>' +
                        '</form>'
                });
            <?php
            }
            ?>
        <?php
            break;
        case 4:
        ?>

            function crear() {
                Swal.fire({
                    width: '85%',
                    title: '💉 Registrar Exámen Médico',
                    showCloseButton: true,
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    html: '<form action=\'../controller/controller.php?tablaCrud=4\' method=\'POST\'>' +
                        '<div class=\'row align-items-center justify-content-center\'>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'idPaciente\'>Identificación Paciente</label>' +
                        '       <input type=\'number\' name=\'idPaciente\' class=\'form-control\' min="1" required/>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'valor\'>Valor (en pesos)</label>' +
                        '       <input type=\'number\' name=\'valor\' class=\'form-control\' min="0" required>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'fecha\'>Fecha</label>' +
                        '       <input type=\'date\' name=\'fecha\' class=\'form-control\' required>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'tipo\'>Tipo de exámen</label>' +
                        '       <input type=\'text\' name=\'tipo\' class=\'form-control\' required>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 form-group\'>' +
                        '       <input type=\'submit\' name=\'crear\' class=\'btn btn-primary btn-lg w-100\' value=\'Registrar Exámen\'>' +
                        '   </div>' +
                        '</div>' +
                        '</form>'
                });
            }
            <?php
            if (isset($_REQUEST["editar"])) {
                $consultaExamen = "SELECT * FROM VISTA_EXAMEN";
                $resultadoConsultaExamen = mysqli_query($conection, $consultaExamen);
                $arrayConsultaExamen = mysqli_fetch_array($resultadoConsultaExamen);
            ?>
                Swal.fire({
                    width: '85%',
                    title: '💉 Editar exámen médico',
                    showCloseButton: true,
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    html: '<form action=\'../controller/controller.php?tablaCrud=4\' method=\'POST\'>' +
                        '<input type=\'number\' name=\'idExamen\' class=\'form-control hidden\' value=\'<?php echo $arrayConsultaExamen["idExamen"] ?>\' required/>' +
                        '<div class=\'row align-items-center justify-content-center\'>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'idPaciente\'>Identificación Paciente</label>' +
                        '       <input type=\'number\' name=\'idPaciente\' class=\'form-control\' min="1" value=\'<?php echo $arrayConsultaExamen["idPacienteFK"] ?>\' required/>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'valor\'>Valor (en pesos)</label>' +
                        '       <input type=\'number\' name=\'valor\' class=\'form-control\' min="0" value=\'<?php echo $arrayConsultaExamen["valor"] ?>\' required>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'fecha\'>Fecha</label>' +
                        '       <input type=\'date\' name=\'fecha\' class=\'form-control\' value=\'<?php echo $arrayConsultaExamen["fechaExamen"] ?>\' required>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'tipo\'>Tipo de exámen</label>' +
                        '       <input type=\'text\' name=\'tipo\' class=\'form-control\' value=\'<?php echo $arrayConsultaExamen["tipoExamen"] ?>\' required>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 form-group\'>' +
                        '       <input type=\'submit\' name=\'actualizar\' class=\'btn btn-primary btn-lg w-100\' value=\'Editar Exámen\'>' +
                        '   </div>' +
                        '</div>' +
                        '</form>'
                });
    <?php
            }
            break;
    }
    ?>

    // Titulos y textos responsive
    jQuery(".modulo-titulo").fitText(1, {
        minFontSize: '30px',
        maxFontSize: '70px'
    })

    jQuery(".swal2-title").fitText(1, {
        minFontSize: '10px',
        maxFontSize: '25px'
    });
</script>
</body>

</html>