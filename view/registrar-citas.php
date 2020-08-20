<?php
require_once 'header.php';
require_once 'navbar.php';
?>

<div class="container-fluid w-100 h-100 form-container">
    <div class="row w-100 h-100 justify-content-center align-items-center">
        <div class="col register-form">
            <h1>Formulario Registro De Citas <i class="fas fa-user-md"></i></h1>
            <form>
                <div class="form">
                    <div class="col">
                        <div class="col">
                            <div class="form-group">
                                <label for="fecha">Fecha cita:</label>
                                <input type="date" id="fecha" class="form-control" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="hora">Hora cita:</label>
                                <input type="time" id="hora" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<footer class="page-footer font-small teal pt-4">
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