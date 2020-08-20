<?php
require_once 'header.php';
require_once 'navbar.php';
?>

<div class="container-fluid w-100 h-100 form-container">
    <div class="row w-100 h-100 justify-content-center align-items-center">
        <div class="col register-form">
            <h1>Gestionar Agenda <i class="fas fa-clinic-medical"></i></h1>
            <form>
                <div class="form">
                    <div class="col">
                        <label for="id">Id:</label><br>
                        <input type="number" name="id" class="form-control crud-input" autocomplete="off" autofocus>
                        <div class="crud-buttons">
                            <div class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </div>
                            <div class="btn btn-secondary">
                                <i class="fas fa-sync"></i>
                            </div>
                            <div class="btn btn-danger">
                                <i class="fas fa-user-minus"></i>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <label for="date">Fecha:</label><br>
                        <input type="date" name="date" class="form-control crud-input" autocomplete="off">
                        <div class="crud-buttons">
                            <div class="btn btn-primary">
                                <i class="fas fa-search"></i>
                            </div>
                            <div class="btn btn-secondary">
                                <i class="fas fa-sync"></i>
                            </div>
                            <div class="btn btn-danger">
                                <i class="fas fa-user-minus"></i>
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