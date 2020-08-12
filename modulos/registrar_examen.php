<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../img/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|PT+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/style2.css">
    <title>Centro Odontológico Mundo Oral</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index_logged.php">Centro Odontológico Mundo Oral</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="index_logged.php"><i class="fas fa-home"></i></a>
                </li>
                <li class="nav-item dropdown" id="users_menu">
                    <a class="nav-link dropdown-toggle" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-users"></i>Usuarios
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="registrar_usuario.php">Registrar Usuario</a>
                        <a class="dropdown-item" href="gestionar_usuario.php">Gestionar Usuario</a>
                    </div>
                </li>
                <li class="nav-item dropdown" id="doctor">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-book"></i>Agenda Médica
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="registrar_agenda.php">Registrar Agenda</a>
                        <a class="dropdown-item" href="gestionar_agenda.php">Gestionar Agenda</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user-nurse"></i>Citas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="registrar_citas.php" id="create_dates">Asignar Citas</a>
                        <a class="dropdown-item" href="gestionar_cita.php" id="manage_dates">Gestionar Citas</a>
                        <a class="dropdown-item" href="gestionar_cita_medico.php" id="manage_dates_doctor">Gestionar Citas</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-clinic-medical"></i>Historia Clínica
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="registrar_historia.php" id="create_history">Apertura Historia</a>
                        <a class="dropdown-item" href="actualizar_historia.php" id="update_history">Actualizar Historia</a>
                        <a class="dropdown-item" href="consultar_historia.php" id="search_history">Consultar Historia</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-syringe"></i>Exámenes de Laboratorio
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="registrar_examen.php" id="register_exam">Registrar Exámen</a>
                        <a class="dropdown-item" href="consultar_examen.php">Consultar Exámen</a>
                    </div>
                </li>
                <li class="nav-item dropdown" id="reports">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-chart-bar"></i>Reportes
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Citas por médico</a>
                        <a class="dropdown-item" href="#">Asistencia pacientes</a>
                        <a class="dropdown-item" href="#">Historia Clínica</a>
                        <a class="dropdown-item" href="#">Estado de Citas</a>
                    </div>
                </li>
                <a href="" class="btn btn-dark" id="patient_view">
                    <p>Vista Paciente</p>
                </a>
                <a href="" class="btn btn-dark" id="doctor_view">
                    <p>Vista Médico</p>
                </a>
                <a href="" class="btn btn-dark" id="secretary_view">
                    <p>Vista Secretaria</p>
                </a>
                <a href="../index.php">
                    <button class="btn btn-primary"><i class="fas fa-sign-out-alt"></i></button>
                </a>
            </ul>
        </div>
    </nav>

    <div class="content">
        <div class="row">
            <div class="col register-form2">
                <h1 class="title">Formulario Exámen <i class="fas fa-syringe"></i></h1>
                <form>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="resultado">Resultado exámen:</label>
                                <textarea id="resultado" class="form-control" required></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <div class="form-group">
                                <label for="fecha">Fecha:</label>
                                <input type="date" id="fecha" class="form-control" required>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="tipo">Tipo exámen:</label>
                                <texarea id="tipo" class="form-control" required></textarea>
                            </div>
                        </div>
                    </div>

                    <input type="submit" class="btn btn-primary" value="Registrar" required>
                </form>
            </div>
            <div class="col">
                <img src="../img/exam.jpg" alt="" class="register-img">
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
    <script>
        //Modifica cambio del slider
        $('.carousel').carousel({
            interval: 5000
        })
    </script>
    <script src="../js/app.js"></script>
</body>

</html>