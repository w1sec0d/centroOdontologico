// Funciones de la CRUD (muestran formulario respectivo)
var tablaCrud = document.getElementById("idTablaCrud").value;

switch (tablaCrud) {
    case 0:
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
                    text: '<a onclick="crear()"><i class="fas fa-plus-circle fa-fw"></i> Crear</a>',
                    titleAttr: 'Crear registro',
                    className: 'boton boton-crear'
                },
                {
                    text: '<a onclick="recuperar()"><i class="fas fa-trash-restore fa-fw"></i> Recuperar</a>',
                    titleAttr: 'Recuperar Usuarios',
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
                text: "De todas formas, podrás recuperarlo en el módulo de recuperar usuarios",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Si, Eliminar Registro',
                cancelButtonText: 'No, Cancelar',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    window.location.href = "../controller/controller.php?eliminar=true&tablaCrud=0&idUsuario=" + id;
                } else if (
                    /* Read more about handling dismissals below */
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Operación Cancelada',
                        'Tu usuario NO ha sido eliminado',
                        'info'
                    )
                }
            })
        }

        function recuperar() {
            window.location.href = "./recuperar.php?tablaCrud=0"
        }

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
                    '       <label for=\'telefonoUsuario\'>Telefono</label>' +
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
        break;

    default:
        break;
}

$(document).ready(function() {

    window.onscroll = function() { //Al hacer scroll, esconde el navbar 
        var navbar = document.getElementById('navbar');
        if (window.pageYOffset > 0) {
            navbar.style.top = '-70px'
        } else {
            navbar.style.top = '0'
        }
    }

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

    jQuery(".modulo-titulo").fitText(1, {
        minFontSize: '30px',
        maxFontSize: '70px'
    })

    jQuery(".swal2-title").fitText(1, {
        minFontSize: '10px',
        maxFontSize: '25px'
    });
});