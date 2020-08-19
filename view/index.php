<?php
require 'header.php';
require 'navbar.php';
?>
<div class="container-fluid">
    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../assets/img/index.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-sm-block">
                    <h1>Centro Odontológico Mundo Oral</h1>
                    <p>Tu mejor experiencia en clínica dental</p>
                    <a href="login.php" class="btn btn-outline-light btn-lg" id="date"><b>¡Agenda ya tu cita!</b></a>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../assets/img/clinic4.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-sm-block">
                    <p>Damos el mejor servicio por tu salud dental</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../assets/img/clinic1.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-sm-block">
                    <h5><b>Estamos cerca de ti</b></h5>
                    <p>Ubicados en el centro de Britalia</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../assets/img/clinic2.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-sm-block">
                    <h5><b>Cada día buscamos mejorar</b></h5>
                    <p>Para brindarte el mejor servicio</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../assets/img/clinic3.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-sm-block">
                    <h5><b>¡No esperes más!</b></h5>
                    <p>Reserva tu cita ahora mismo</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="jumbotron">
        <div class="row">
            <div class="col-5">
                <h1>En nuestro centro odontológico encontrarás</h1>
                <div class="row">
                    <div class="col">
                        <div class="services row justify-content-center align-items-center">
                            <p class="services_p">Extracción</p>
                            <img src="../assets/img/dental/013-tooth-3.png" class="image-responsive" width="80">
                        </div>
                    </div>
                    <div class="col">
                        <div class="services row justify-content-center align-items-center">
                            <p class="services_p">Limpieza</p>
                            <img src="../assets/img/dental/007-tooth-cleaning.png" class="image-responsive" width="80">
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="col">
                        <div class="services row justify-content-center align-items-center">
                            <p class="services_p">Implantes</p>
                            <img src="../assets/img/dental/012-tooth-4.png" class="image-responsive" width="80">
                        </div>
                    </div>
                    <div class="col">
                        <div class="services row justify-content-center align-items-center">
                            <p class="services_p">Ortodoncia</p>
                            <img src="../assets/img/dental/010-smile.png" class="image-responsive" width="80">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-7">
                <p>Somos reconocidos en el sector de Britalia por prestar un servicio
                    odontológico de calidad. Contamos con más de 15 años de experiencia</p>
                <div class="map-responsive">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.8421202253944!2d-74.17204138541888!3d4.622241296642179!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9ff830f0b35f%3A0xecf906ecf70f72e3!2sCentro+Odontologico+Mundo+Oral!5e0!3m2!1ses-419!2sco!4v1560218557606!5m2!1ses-419!2sco" frameborder="0" style="border:0" allowfullscreen class="mapa"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

<footer class="bg-dark">
    <div class="row">
        <div class="col">
            <p>Copyright &copy; Sena 2019</p>
        </div>
        <div class="col">
            Imagen creada por <a href="https://www.freepik.es/fotos/mujer">jcomp - www.freepik.es</a>
        </div>
    </div>
</footer>

</body>

</html>