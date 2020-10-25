<?php
require_once 'header.php'
?>
<div class="container-fluid">
    <script>
        Swal.fire({
            icon: 'error',
            title: 'La página a la que intentas ingresar no existe... o estás intentando ingresar sin permiso',
            showConfirmButton: false,
            html: 'Puedes intentar <a href="../index.php">Regresar al menú principal</a>',
            footer: 'Si necesitas ayuda escribe un correo a: cadavid4003@gmail.com'
        });
    </script>
</div>