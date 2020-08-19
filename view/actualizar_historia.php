    <?php
    require_once 'header.php';
    require_once 'navbar.php';
    ?>

    <div class="content">
        <div class="row">
            <div class="col register-form2">
                <h1 class="title">Actualizar Historia Clínica <i class="fas fa-clinic-medical"></i></h1>
                <form>
                    <div class="form-row">
                        <div class="col">
                            <h2 class="crud-title">Para actualizar historial clínico, seleccione su historial a editar
                                por medio de su ID</h2>
                            <label for="id">Id:</label><br>
                            <input type="number" name="id" class="form-control crud-input" autocomplete="off" autofocus>
                            <div class="crud-buttons">
                                <div class="btn btn-primary" id="search">
                                    <i class="fas fa-search"></i>
                                </div>
                                <div class="btn btn-secondary" id="update">
                                    <i class="fas fa-sync"></i>
                                </div>
                                <div class="btn btn-danger" id="delete">
                                    <i class="fas fa-user-minus"></i>
                                </div>
                                <div class="btn btn-success" id="check">
                                    <i class="fas fa-check"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col">
                <img src="../img/historia.png" alt="" class="register-img">
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