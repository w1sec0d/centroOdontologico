<?php
require 'header.php';
require 'navbar.php';
?>
<div class="container-fluid" id="crud-back">

    <div class="row w-100 h-100 justify-content-center align-items-center">

        <h1 class="crud-title">Recuperación de usuarios</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover table-condensed dt-responsive" id="tableUser" class="display">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">Identificación</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Dirección</th>
                        <th scope="col">Password</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Estado</th>
                        <th scope="col" class="bg-success">Recuperar Usuario</th>
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
                            <td><?php echo $mostrar["idUsuario"] ?></td>
                            <td><?php echo $mostrar["nombreUsuario"] ?></td>
                            <td><?php echo $mostrar["apellidoUsuario"] ?></td>
                            <td><?php echo $mostrar["correoUsuario"] ?></td>
                            <td><?php echo $mostrar["telefonoUsuario"] ?></td>
                            <td><?php echo $mostrar["direccionUsuario"] ?></td>
                            <td><?php echo $mostrar["passwordUsuario"] ?></td>
                            <td><?php echo $mostrar["rolUsuario"] ?></td>
                            <td><?php echo $mostrar["estadoUsuario"] ? 'Activo' : 'Inactivo' ?></td>
                            <td class="bg-info">
                                <a href="#" onclick="restoreConfirmation(<?php echo $mostrar['idUsuario'] ?>)">
                                    <span style="color: White;">
                                        <i class="fas fa-trash-restore"></i>
                                    </span>
                                </a>
                            </td>
                        </tr>
                    <?php
                        if (isset($_REQUEST["restore"])){
                            echo
                            "
                            <script>
                            Swal.fire({
                                icon: 'info',
                                title: 'Usuario recuperado Correctamente',
                                html: 'Puedes ' +
                                '<a href=\"./user-crud.php\">ir al módulo gestión de usuarios</a>' +
                                ' para editar el usuario'
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

</div>

<script>
    $(document).ready(function() {
        $('#tableUser').DataTable({
            "language": spanishTable
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

    function restoreConfirmation(id) {
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
                window.location.href = "../controller/controller.php?restore=true&idUsuario=" + id;
            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Operación Cancelada',
                    'Tu usuario no ha sido restaurado :)',
                    'info'
                )
            }
        })
    }
</script>
<footer class="sticky-bottom ">
    <div class="row">
        <div class="col">
            <p>Copyright &copy; Sena 2019</p>
        </div>
        <div class="col">
            <div>Icons made by <a href="https://www.flaticon.es/autores/freepik" title="Freepik">Freepik and <a href="https://www.flaticon.es/autores/monkik" title="monkik">monkik</a> </a> from <a href="https://www.flaticon.es/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
        </div>
    </div>
</footer>
</body>

</html>