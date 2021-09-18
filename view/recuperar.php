<?php
session_start();
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
        require_once "navbar.php";
        ?>
    </div>
    <div class="row">
        <h1 class="modulo-titulo w-100">Recuperación de <?php echo $gestion ?></h1>
    </div>
    <div class="row justify-content-center align-items-center" id="row-tabla">
        <div id="container-tabla">
            <div class="table-responsive">
                <?php if ($_REQUEST["tablaCrud"] == 0 && ($_SESSION["rolUsuarioNavegando"] == 0 || $_SESSION["rolUsuarioNavegando"] == 1)) { ?>
                    <table class="table" id="tablaCrud">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="bg-success">Recuperar</th>
                                <th scope="col">Identificación</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Correo</th>
                                <th scope="col">Telefono</th>
                                <th scope="col">Dirección</th>
                                <th scope="col">Password</th>
                                <th scope="col">Rol</th>
                                <th scope="col">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM USUARIO WHERE estadoUsuario = false";
                            $result = mysqli_query($conection, $sql);

                            while ($arrayConsulta = mysqli_fetch_array($result)) {
                            ?>
                                <tr>
                                    <td class="bg-info">
                                        <a href="#" onclick="confirmarRestauracion(<?php echo $arrayConsulta['idUsuario'] ?>,<?php echo $_REQUEST['tablaCrud'] ?>)">
                                            <span style="color: White;">
                                                <i class="fas fa-trash-restore"></i>
                                            </span>
                                        </a>
                                    </td>
                                    <td><?php echo $arrayConsulta["idUsuario"] ?></td>
                                    <td><?php echo $arrayConsulta["nombreUsuario"] ?></td>
                                    <td><?php echo $arrayConsulta["apellidoUsuario"] ?></td>
                                    <td><?php echo $arrayConsulta["correoUsuario"] ?></td>
                                    <td><?php echo $arrayConsulta["telefonoUsuario"] ?></td>
                                    <td><?php echo $arrayConsulta["direccionUsuario"] ?></td>
                                    <td><?php echo $arrayConsulta["passwordUsuario"] ?></td>
                                    <td><?php echo $arrayConsulta["rolUsuario"] ?></td>
                                    <td><?php echo $arrayConsulta["estadoUsuario"] ? 'Activo' : 'Inactivo' ?></td>
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
                            $consulta = "SELECT * FROM AGENDA_MEDICA WHERE estadoAgenda = false";
                            $resultadoConsulta = mysqli_query($conection, $consulta);

                            while ($arrayConsulta = mysqli_fetch_array($resultadoConsulta)) {
                            ?>
                                <tr>
                                    <td class="bg-info">
                                        <a href="#" onclick="confirmarRestauracion(<?php echo $arrayConsulta['idAgenda'] ?>,<?php echo $_REQUEST['tablaCrud'] ?>)">
                                            <span style="color: White;">
                                                <i class="fas fa-trash-restore"></i>
                                            </span>
                                        </a>
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
    <script>
        function confirmarRestauracion(id, tablaCrud) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: 'btn btn-success',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            swalWithBootstrapButtons.fire({
                title: '¿Estás seguro de restaurar el usuario?',
                text: "De todas formas, podrás eliminarlo después",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, Recuperar Registro',
                cancelButtonText: 'No, Cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    window.location.href = "../controller/controller.php?recuperar=true&tablaCrud=" + tablaCrud + "&id=" + id;
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    Swal.fire({
                        icon: info,
                        title: 'Operación Cancelada',
                        text: 'Tu usuario no ha sido restaurado :)'
                    })
                }
            })
        }
        // Alerta para cuando se recupera un usuario
        <?php
        if (isset($_REQUEST["recuperado"])) {
        ?>
            Swal.fire({
                icon: 'info',
                title: 'Usuario recuperado Correctamente',
                html: 'Puedes ' +
                    '<a href="./crud.php?tablaCrud=<?php echo $_REQUEST["tablaCrud"] ?>">ir al módulo gestión de usuarios</a>' +
                    ' para editar el usuario'
            })
        <?php
        }
        if (isset($_REQUEST["recuperadoAgenda"])) {
        ?>
            Swal.fire({
                icon: 'success',
                title: 'Tu agenda ha sido restaurada',
                showCloseButton: true,
                html: 'Puedes ' +
                    '<a href=\"./crud.php?tablaCrud=1\">ir al módulo de gestión de agenda</a>' +
                    ' para editar la agenda'
            });
        <?php
        }
        ?>
        $(document).ready(function() {
            $('#tablaCrud').DataTable({
                language: spanishTable,
                fixedHeader: true,
                colReorder: true,
                responsive: true
            });
        });
        var spanishTable = {
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

        jQuery(".modulo-titulo").fitText(1, {
            minFontSize: '30px',
            maxFontSize: '70px'
        })
    </script>
    <?php require_once "./footer.php" ?>
</div>
</body>

</html>