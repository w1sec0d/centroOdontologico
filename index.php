<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Carga Bootstrap y JQuery -->
    <script src="./assets/libraries/jquery.js"></script>
    <link rel="stylesheet" href="./assets/libraries/bootstrap.css">
    <script src="./assets/libraries/bootstrap.js"></script>

    <!-- Carga DataTables -->
    <link rel="stylesheet" href="./assets/libraries/datatables.css">
    <script src="./assets/libraries/datatables.js"></script>

    <!-- Carga SweetAlert -->
    <script src="./assets/libraries/sweetAlert.js"></script>

    <!-- Carga FitText -->
    <script src="./assets/libraries/jquery.fittext.js"></script>

    <!-- Carga FontAwesome -->
    <script src="https://kit.fontawesome.com/482fb72b25.js" crossorigin="anonymous"></script>

    <!-- Carga Favicon y estilos -->
    <link rel="icon" href="./assets/img/icono.ico">
    <link rel="stylesheet" href="./assets/css/estiloPrincipal.css">
    <title>Centro odontológico Mundo Oral</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <nav class="navbar navbar-expand navbar-light bg-light sticky-top w-100">
                <a class="navbar-brand">
                    <img src="./assets/img/logoMarca.png" alt="Centro Odontológico Mundo Oral" width="100" height="30"
                        loading="lazy">
                </a>
                <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapsableMenu">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapsableMenu">
                    <ul class="navbar-nav ml-auto">
                        <li class='nav-item d-flex align-items-center' id="boton-cerrarSesion">
                            <a class='nav-link' href="./view/login.php">
                                <i class='fas fa-sign-in-alt fa-fw'></i> Iniciar sesion
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="row justify-content-center align-items-center" id="contenedor-carousel">
            <div id="carousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                    <li data-target="#carousel" data-slide-to="3"></li>
                    <li data-target="#carousel" data-slide-to="4"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="./assets/img/consultorio0.png">
                        <div class="carousel-caption">
                            <h1 class="carousel-caption-resize1">Centro Odontológico Mundo Oral
                            </h1>
                            <p class="carousel-caption-resize2">Tu mejor experiencia en clínica dental</p>
                            <a href="https://api.whatsapp.com/send?phone=0573112180112" class="btn btn-success"
                                id="boton-whatsapp">
                                <i class="fab fa-whatsapp"></i>
                                ¡Escríbenos y agenda tu cita!
                            </a>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./assets/img/consultorio1.png">
                        <div class="carousel-caption">
                            <h1 class="carousel-caption-resize3">¡No dudes en contactarnos!</h1>
                            <p class="carousel-caption-resize4">Damos el mejor servicio por tu salud dental</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./assets/img/consultorio2.png">
                        <div class="carousel-caption">
                            <h1 class="carousel-caption-resize3">¡Estamos cerca de ti!</h1>
                            <p class="carousel-caption-resize4">Ubicados en el sector de Britalia</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./assets/img/consultorio3.png">
                        <div class="carousel-caption">
                            <h1 class="carousel-caption-resize3">Cada día buscamos mejorar</h1>
                            <p class="carousel-caption-resize4">Para brindarte el mejor servicio</p>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="./assets/img/consultorio4.png">
                        <div class="carousel-caption">
                            <h1 class="carousel-caption-resize3">¡No esperes más!</h1>
                            <a href="https://api.whatsapp.com/send?phone=0573112180112" class="btn btn-success"
                                id="boton-whatsapp">
                                <i class="fab fa-whatsapp"></i>
                                ¡Escríbenos y agenda tu cita!
                            </a>
                            <p>O</p>
                            <a href="tel:+573112180112" class="btn btn-primary" style="margin-top: 0">
                                <i class="fas fa-phone-square-alt"></i>
                                ¡Llámanos!
                            </a>
                        </div>
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <i style="color:gray" class="fas fa-chevron-left carousel-flechas"></i>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <i style="color:gray" class="fas fa-chevron-right carousel-flechas"></i>
                </a>
            </div>
        </div>
        <div class="row" id="row-principal">
            <h1 class="resize1 w-100">¡Somos tu mejor opción!</h1>
            <div class="col-md-4 justify-content-center align-items-center">
                <div class="card">
                    <img class="card-img-top" src="./assets/img/carta1.png" alt="Card image cap">
                    <div class="row card-body justify-content-center align-items-center">
                        <h2 class="card-title resize2">Deja todo en nuestras manos</h2>
                        <p class="card-text resize2">Nuestro personal
                            certificado cuidará de ti</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="./assets/img/carta2.png" alt="Card image cap">
                    <div class="row card-body justify-content-center align-items-center">
                        <h2 class="card-title resize2">Nos adaptamos a tu bolsillo</h2>
                        <p class="card-text resize2">Brindandote los mejores precios y calidades</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img class="card-img-top" src="./assets/img/carta3.png" alt="Card image cap">
                    <div class="row card-body justify-content-center align-items-center">
                        <h2 class="card-title resize2">Cuidamos de tu bienestar</h2>
                        <p class="card-text resize2">Contamos con medidas de bioseguridad</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="row-secundario">
            <div class="col">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-4">
                        <h1 class="resize2 w-100">
                            <i class="fas fa-tooth"></i>
                            Entre nuestros servicios
                        </h1>
                        <div class="row row-servicios">
                            <div class="col-6">
                                <div class="contenedor-servicio">
                                    <p>Extracción</p>
                                    <img src="assets/img/dental/013-tooth-3.png" class="img-fluid rounded">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="contenedor-servicio">
                                    <p>Limpieza</p>
                                    <img src="assets/img/dental/007-tooth-cleaning.png" class="img-fluid rounded">
                                </div>
                            </div>
                        </div>
                        <div class="row row-servicios">
                            <div class="col-6">
                                <div class="contenedor-servicio">
                                    <p>Implantes</p>
                                    <img src="assets/img/dental/012-tooth-4.png" class="img-fluid rounded">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="contenedor-servicio">
                                    <p>Ortodoncia</p>
                                    <img src="assets/img/dental/010-smile.png" class="img-fluid rounded">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <h1 class="resize2 w-100">
                            <i class="fas fa-map-marked-alt"></i>
                            Nuestra Ubicación
                        </h1>
                        <div class="mapa">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.8420902200896!2d-74.17204138589855!3d4.622246643621478!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9ff830f0b35f%3A0xecf906ecf70f72e3!2sCentro%20Odontologico%20Mundo%20Oral!5e0!3m2!1sen!2sco!4v1602031475425!5m2!1sen!2sco"
                                width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""
                                aria-hidden="false" tabindex="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center align-items-center" id="row-siguenos">
            <h1>
                <i class="fas fa-shoe-prints"></i>
                ¡Siguenos!
            </h1>
            <br style="">
            <a href="https://www.facebook.com/Centro-odontologico-mundo-oral-1400646953307029" class="fa fa-facebook"
                target="_BLANK"></a>
            <a href="https://www.instagram.com/dradianahermida/" class="fa fa-instagram" target="_BLANK"></a>
        </div>
        <footer class="row align-items-center justify-content-center text-center bg-dark">
            <div class="col">
                <p>Copyright &copy; Sena 2020</p>
                <p>Hecho con ❤️ por <a href="https://www.github.com/w1sec0d" target="_BLANK">Carlos Ramírez<a></p>
            </div>
            <div class="col">
                <p>
                    Imágenes y recursos visuales creados por <a href="https://www.freepik.es/"
                        target="_BLANK">www.freepik.es</a>
                </p>
            </div>
        </footer>
    </div>
    <script>
    window.onload = function() { //Cuando el documento carga, se ejecuta el código
        function resizeText() {
            jQuery(".carousel-caption-resize1").fitText(1.2);
            jQuery(".carousel-caption-resize2").fitText(2);
            jQuery(".carousel-caption-resize3").fitText(1.8);
            jQuery(".carousel-caption-resize4").fitText(2.2);
            jQuery(".resize1").fitText(2, {
                minFontSize: '20px',
                maxFontSize: '40px'
            });
            jQuery(".resize2").fitText(2, {
                minFontSize: '20px',
                maxFontSize: '30px'
            });
            jQuery(".resize3").fitText(3, {
                minFontSize: '20px',
                maxFontSize: '40px'
            });

        }

        resizeText();
        $('.carousel').carousel({ //Establece cada cuando el carousel hace slide
            interval: 5000
        })
        $('#carousel').on('slid.bs.carousel', function() { //Se ejecuta cada vez que se hace un slide
            resizeText();
        })
    }
    </script>
</body>

</html>