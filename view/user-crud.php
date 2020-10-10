<?php
require 'header.php';
require 'navbar.php';
?>
<div class="container-fluid" id="container-modulo">
    <div class="row justify-content-center align-items-center">
        <h1 class="modulo-titulo">Gestión de usuarios</h1>
        <div class="table-responsive">
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
                        <th>Password</th>
                        <th>Rol</th>
                        <th>Estado</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once '../model/database.php';
                    $sql = "SELECT * FROM USUARIO WHERE estadoUsuario = true";
                    $result = mysqli_query($conection, $sql);

                    while ($mostrar = mysqli_fetch_array($result)) {
                        ?>
                    <tr>
                        <td>
                            <div class="btn-group">
                                <a href="user-update.php?rolUsuario=<?php echo $mostrar["rolUsuario"] ?>&action=3&estadoUsuario=<?php echo $mostrar["estadoUsuario"] == 1 ? true : "false" ?>&idUsuario=<?php echo $mostrar["idUsuario"] ?>&nombreUsuario=<?php echo $mostrar["nombreUsuario"] ?>&apellidoUsuario=<?php echo $mostrar["apellidoUsuario"] ?>&correoUsuario=<?php echo $mostrar["correoUsuario"] ?>&telefonoUsuario=<?php echo $mostrar["telefonoUsuario"] ?>&direccionUsuario=<?php echo $mostrar["direccionUsuario"] ?>&passwordUsuario=<?php echo $mostrar["passwordUsuario"] ?> "
                                    id="boton-editar">
                                    <span style="color: White;">
                                        <i class="fas fa-edit fa-fw"></i>
                                    </span>
                                </a>
                                <a href="#" onclick="deleteConfirmation(<?php echo $mostrar['idUsuario'] ?>)"
                                    id="boton-eliminar">
                                    <span style="color: White;">
                                        <i class="fas fa-trash-alt fa-fw"></i>
                                    </span>
                                </a>
                            </div>
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
                        if (isset($_REQUEST["delete"])) {
                            echo
                            "
                            <script>
                            Swal.fire({
                                icon: 'info',
                                title: 'Usuario eliminado Correctamente',
                                html: 'Puedes ' +
                                '<a href=\"./user-backup.php\">ir al módulo recuperar usuarios</a>' +
                                ' para recuperar el usuario'
                            })
                            </script>
                            ";
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <footer class="bg-dark fixed-bottom">
        <div class="row">
            <div class="col">
                <p>Copyright &copy; Sena 2019</p>
            </div>
            <div class="col">
                <div>Icons made by <a href="https://www.flaticon.es/autores/freepik" title="Freepik">Freepik and <a
                            href="https://www.flaticon.es/autores/monkik" title="monkik">monkik</a> </a> from <a
                        href="https://www.flaticon.es/" title="Flaticon">www.flaticon.com</a> is licensed by <a
                        href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0"
                        target="_blank">CC 3.0 BY</a></div>
            </div>
        </div>
    </footer>
</div>

<script>
$(document).ready(function() {
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

    $('#tablaCrud').DataTable({
        language: spanishTable, //establece el idioma
        fixedHeader: true,
        colReorder: true,
        responsive: true,
        "columnDefs": [{ // Hace que algunas columnas no sean ordenables
            "orderable": false,
            "targets": [0, 1]
        }],
        dom: 'fBtp', // Establece los elementos a mostrar en la tabla
        buttons: [{
                extend: 'excelHtml5',
                text: '<i class="fas fa-file-excel"></i> Exportar Excel ',
                titleAttr: 'Exportar a Excel',
                className: 'excel'
            },
            {
                extend: 'print',
                text: '<i class="fas fa-print"></i> Imprimir',
                titleAttr: 'Imprimir',
                className: 'imprimir'
            },
            {
                text: '<i class="fas fa-plus-circle"></i> Añadir Registro',
                titleAttr: 'Crear registro',
                className: 'crear'
            }
        ]
    });


    function deleteConfirmation(id) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: '¿Estás seguro de eliminar el registro?',
            text: "De todas formas, podrás recuperarlo en el módulo de recuperar usuarios",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Si, Eliminar Registro',
            cancelButtonText: 'No, Cancelar',
            reverseButtons: true
        }).then((result) => {
            if (result.value) {
                window.location.href = "../controller/controller.php?delete=true&idUsuario=" + id;
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Operación Cancelada',
                    'Tu usuario no ha sido eliminado :)',
                    'info'
                )
            }
        })
    }

    jQuery(".modulo-titulo").fitText(1, {
        minFontSize: '30px',
        maxFontSize: '70px'
    })
});
</script>
</body>

</html>