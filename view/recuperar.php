<?php
session_start();
require_once 'header.php';

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
        <h1 class="modulo-titulo w-100">Recuperación de usuarios</h1>
    </div>
    <div class="row justify-content-center align-items-center" id="row-tabla">
        <div id="container-tabla">
            <div class="table-responsive">
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
                        require_once '../model/database.php';
                        $sql = "SELECT * FROM USUARIO WHERE estadoUsuario = false";
                        $result = mysqli_query($conection, $sql);

                        while ($mostrar = mysqli_fetch_array($result)) {
                        ?>
                            <tr>
                                <td class="bg-info">
                                    <a href="#" onclick="confirmarRestauracion(<?php echo $mostrar['idUsuario'] ?>,<?php echo $_REQUEST['tablaCrud'] ?>)">
                                        <span style="color: White;">
                                            <i class="fas fa-trash-restore"></i>
                                        </span>
                                    </a>
                                </td>
                                <td><?php echo $mostrar["idUsuario"] ?></td>
                                <td><?php echo $mostrar["nombreUsuario"] ?></td>
                                <td><?php echo $mostrar["apellidoUsuario"] ?></td>
                                <td><?php echo $mostrar["correoUsuario"] ?></td>
                                <td><?php echo $mostrar["telefonoUsuario"] ?></td>
                                <td><?php echo $mostrar["direccionUsuario"] ?></td>
                                <td><?php echo $mostrar["passwordUsuario"] ?></td>
                                <td><?php echo $mostrar["rolUsuario"] ?></td>
                                <td><?php echo $mostrar["estadoUsuario"] ? 'Activo' : 'Inactivo' ?></td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script>
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
        ?>
        $(document).ready(function() {
            var tablaCrud = document.getElementById("idTablaCrud").value;

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
                    window.location.href = "../controller/controller.php?recuperar=true&tablaCrud=" + tablaCrud + "&idUsuario=" + id;
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

        jQuery(".modulo-titulo").fitText(1, {
            minFontSize: '30px',
            maxFontSize: '70px'
        })
    </script>
    <?php require_once "./footer.php" ?>
</div>
</body>

</html>