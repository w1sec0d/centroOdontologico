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
                                            <a href="#" onclick="confirmacionInactivar(<?php echo $arrayConsulta['idUsuario'] ?>,<?php echo $_REQUEST['tablaCrud'] ?>)" class="boton-eliminar">
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
    function confirmacionInactivar(id, tablaCrud) {
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

    <?php
    if (isset($_REQUEST["actualizacionCorrecta"])) {
    ?>
        Swal.fire({
            icon: 'success',
            title: 'Usuario actualizado correctamente',
            showCloseButton: true,
            timer: 5000
        });
        <?php
    }
    if (isset($_REQUEST["registroCorrecto"])) {
        if ($_REQUEST["registroCorrecto"]) {
        ?>
            Swal.fire({
                icon: 'success',
                title: 'Usuario Registrado Correctamente',
                timer: 5000
            });
        <?php
        }
    }
    if (isset($_REQUEST["registroIncorrecto"])) {
        ?>
        Swal.fire({
            icon: 'error',
            title: 'Has intentado registrar un usuario existente',
            text: 'Si necesitas editar los datos de algún usuario, puedes hacerlo desde gestión de usuarios'
        });
    <?php
    }
    if (isset($_REQUEST["eliminacionCorrecta"])) {
    ?>
        Swal.fire({
            icon: 'info',
            title: 'Usuario eliminado Correctamente',
            html: 'Puedes ' +
                '<a href=\"./recuperar.php?tablaCrud=0\">ir al módulo recuperar usuarios</a>' +
                ' para recuperar el usuario'
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
                {
                    text: '<a onclick="recuperar()"><i class="fas fa-trash-restore fa-fw"></i> Recuperar <?php echo $gestion ?></a>',
                    titleAttr: 'Recuperar <?php echo $gestion ?>',
                    className: 'boton boton-recuperar'
                },
                {
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
                    html: '<form action=\'../controller/controller.php\' method=\'POST\'>' +
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
                        '       <select name=\'rolUsuario\' class=\'form-control\' required>' +
                        '           <option value=\'Administrador\'>Administrador</option>' +
                        '           <option value=\'Secretaria\'>Secretaria</option>' +
                        '           <option value=\'Medico\'>Medico</option>' +
                        '           <option value=\'Paciente\'>Paciente</option>' +
                        '       </select>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'passwordUsuario\'>Contraseña</label>' +
                        '       <input type=\'text\' name=\'passwordUsuario\' class=\'form-control\' required>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 form-group\'>' +
                        '       <input type=\'submit\' name=\'crear\' class=\'btn btn-primary btn-lg w-100\' value=\'Crear Usuario\'>' +
                        '   </div>' +
                        '</div>' +
                        '</form>'
                });
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
            ?>
                Swal.fire({
                    width: '85%',
                    title: '✏️ Editar usuario con el número de identificación <?php echo $idUsuario ?>',
                    showCloseButton: true,
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    html: '<form action=\'../controller/controller.php?tablaCrud=\'<?php echo $_REQUEST["tablaCrud"] ?>\' method=\'POST\'>' +
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
                        '       <select name=\'rolUsuario\' class=\'form-control\' required>' +
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
                        '   <div class=\'col-sm-12 col-md-6 form-group\'>' +
                        '       <input type=\'submit\' name=\'actualizar\' class=\'btn btn-primary btn-lg w-100\' value=\'Guardar Cambios\'>' +
                        '   </div>' +
                        '</div>' +
                        '</form>'
                });
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
                    html: '<form action=\'../controller/controller.php?tablaCrud=\'<?php echo $_REQUEST["tablaCrud"] ?>\' method=\'POST\'>' +
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
                        '       <input type=\'number\' name=\'idDoctor\' class=\'form-control\' min="1" required>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 col-lg-4 form-group\'>' +
                        '       <label for=\'idPaciente\'>Número de documento paciente</label>' +
                        '       <input type=\'number\' name=\'idPaciente\' class=\'form-control\' min="1" required>' +
                        '   </div>' +
                        '   <div class=\'col-sm-12 col-md-6 form-group\'>' +
                        '       <input type=\'submit\' name=\'crear\' class=\'btn btn-primary btn-lg w-100\' value=\'Crear Agenda\'>' +
                        '   </div>' +
                        '</div>' +
                        '</form>'
                });
            }
    <?php
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