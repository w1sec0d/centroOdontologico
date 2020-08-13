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
    <?php
    require_once 'navbar.php';
    ?>

    <div class="content">
        <h1 class="title">Formulario Registro Historia Clínica <i class="fas fa-hospital"></i></h1>
        <form action="">
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

        </form>
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
    
</body>

</html>