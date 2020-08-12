<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./img/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Josefin+Sans|PT+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css" integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style2.css">
    <title>Centro Odontológico Mundo Oral</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Centro Odontológico Mundo Oral</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#"><i class="fas fa-home"></i>Inicio</a>
                </li>
                <a href="./modulos/login.php">
                    <button class="btn btn-primary"><i class="fas fa-sign-in-alt"></i>Iniciar sesión</button>
                </a>
            </ul>
        </div>
    </nav>
    <div class="content">
        <div class="row">
            <header>
                <div class="header_content">
                    <img src="./img/logo.jpg" class="header_img">
                    <p class="slogan">Servimos con Calidad, Fraternalidad y Eficiencia</p>
                </div>
            </header>
        </div>
        <div class="row">
            <div class="col">
                <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img class="d-block w-100" src="./img/fachada.jpg" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><b>Centro Odontologico Mundo Oral</b></h5>
                                <p>Damos el mejor servicio por tu salud dental</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="./img/lobby.jpg" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><b>Estamos cerca de ti</b></h5>
                                <p>Ubicados en el centro de Britalia</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="./img/lobby2.jpg" alt="Third slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><b>Cada día buscamos mejorar</b></h5>
                                <p>Para brindarte el mejor servicio</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img class="d-block w-100" src="./img/consultorio.jpg" alt="fourth slide">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><b>¡No esperes más!</b></h5>
                                <p>Reserva tu cita ahora mismo</p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>

            <div class="col" id="services_section">
                <h1 class="title">SOBRE NUESTRO SERVICIO</h1>
                <h1 class="services_p">En nuestros servicios se incluyen:</h1>
                <div class="row">
                    <div class="col">
                        <div class="services">
                            <p class="services_p">Extracción</p>
                            <img src="./img/dental/005-tooth-6.png" class="services_img">
                        </div>
                    </div>
                    <div class="col">
                        <div class="services">
                            <p class="services_p">Limpieza</p>
                            <img src="./img/dental/006-tooth-5.png" class="services_img">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="services">
                            <p class="services_p">Implantes</p>
                            <img src="./img/dental/012-tooth-4.png" class="services_img">
                        </div>
                    </div>
                    <div class="col">
                        <div class="services">
                            <p class="services_p">Ortodoncia</p>
                            <img src="./img/dental/010-smile.png" class="services_img">
                        </div>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <div class="row">
            <p class="btn btn-success" id="paragraph">Somos reconocidos en el sector de Britalia por prestar un servicio
                odontológico de calidad. Contamos con más de 15 años de experiencia.</p>
        </div>
        <div class="row">
            <div class="col">
                <div class="map_container">
                    <h1 class="title">NUESTRA UBICACIÓN <i class="fas fa-map-marked-alt"></i></h1>
                    <div class="map-responsive">
                        <iframe
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.8421202253944!2d-74.17204138541888!3d4.622241296642179!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9ff830f0b35f%3A0xecf906ecf70f72e3!2sCentro+Odontologico+Mundo+Oral!5e0!3m2!1ses-419!2sco!4v1560218557606!5m2!1ses-419!2sco"
                            frameborder="0" style="border:0" allowfullscreen class="mapa"></iframe>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="row">
                    <div class="col contact">
                        <h1 class="title">CONTACTANOS<i class="fas fa-phone-square-alt"></i></h1>
                    </div>
                </div>
                <div class="row">
                    <p class="btn btn-info" id="paragraph"><em>Dirección: Calle 46 #81-16 Sur</em></p>
                </div>
                <div class="row">
                    <p class="btn btn-info" id="paragraph"><em>Teléfono: 311 2180112</em></p>
                </div>
                <a class="fb-ic"
                    href="https://www.facebook.com/Centro-odontologico-mundo-oral-1400646953307029/?ref=br_rs"
                    target="_blank">
                    <i class="fab fa-facebook-f"></i>
                </a>
            </div>
        </div>
    </div>

    <footer class="page-footer font-small teal pt-4">
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
</body>

<script>
    //Modifica cambio del slider
    $('.carousel').carousel({
        interval: 5000
    })
</script>

</html>