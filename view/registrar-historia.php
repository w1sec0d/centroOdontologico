<?php
require_once 'header.php';
require_once 'navbar.php';
?>

<div class="container-fluid w-100 h-100 form-container" id="crud-back">
    <div class="row w-100 h-100 justify-content-center align-items-center">
        <div class="col register-form">
            <h1>Formulario Registro Historia Clínica <i class="fas fa-hospital"></i></h1>
            <form>
                <div class="form">
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="estatura">Estatura(cm):</label>
                                <input type="number" id="estatura" class="form-control" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="peso">Peso(kg):</label>
                                <input type="number" id="peso" class="form-control" required>
                            </div>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="antecedentes">Antecedentes Familiares:</label>
                        <textarea id="antecedentes" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="alergias">Alergias:</label>
                        <textarea id="alergias" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="enfermedades">Enfermedades:</label>
                        <textarea id="enfermedades" class="form-control" required></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Registrar" required>
                </div>
            </form>
        </div>
    </div>
</div>

<footer class="page-footer font-small teal pt-4 fixed-bottom">
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