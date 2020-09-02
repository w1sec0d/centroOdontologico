<?php
require_once '../model/database.php';
require_once 'header.php';
require_once 'navbar.php';
?>
<div class="container-fluid w-100 h-120" id="crud-back">

    <div class="row w-100 h-100 justify-content-center align-items-center">
        <form method="post" class="w-60 h-70" id="edit-user-form">
            <h1 class="font-weight-bold text-center">
                Nuevo Usuario
            </h1>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="idUsuario">ID</label>
                        <input type="text" name="idUsuario" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="nombreUsuario">Nombre</label>
                        <input type="text" name="nombreUsuario" class="form-control" />
                    </div>
                    <div class="form-group">
                        <label for="apellidoUsuario">Apellido</label>
                        <input type="text" name="apellidoUsuario" class="form-control">
                    </div>
                    <div class="form-group">

                        <label for="correoUsuario">Correo</label>
                        <input type="email" name="correoUsuario" class="form-control">
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="telefonoUsuario">Telefono</label>
                        <input type="text" name="telefonoUsuario" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="direccionUsuario">Direccion</label>
                        <input type="text" name="direccionUsuario" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="rolUsuario">Rol</label>
                        <select name="rolUsuario" class="form-control">
                            <option value="Secretaria"> Secretaria</option>
                            <option value="Medico">Medico</option>
                            <option value="Paciente">Paciente</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="estadoUsuario">Estado</label>
                        <select name="estadoUsuario" class="form-control">
                            <option value="true" <?php echo isset($estadoUsuario) ? 'selected' : ''; ?>>Activo</option>
                            <option value="false" <?php echo isset($estadoUsuario) ? '' : 'selected'; ?>>Inactivo</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="passwordUsuario">Contraseña</label>
                <input type="text" name="passwordUsuario" class="form-control">
            </div>
            <input type="submit" name="create" class="btn btn-primary btn-lg">
            <?php require_once '../controller/controller.php'; ?>
        </form>
    </div>

</div>
</body>
<footer class="sticky-bottom">
    <div class="row">
        <div class="col">
            <p>Copyright &copy; Sena 2019</p>
        </div>
        <div class="col">
            <div>Icons made by <a href="https://www.flaticon.es/autores/freepik" title="Freepik">Freepik and <a href="https://www.flaticon.es/autores/monkik" title="monkik">monkik</a> </a> from <a href="https://www.flaticon.es/" title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>
        </div>
    </div>
</footer>

</html>