<?php
require '../model/conection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.1/css/bootstrap.min.css" integrity="sha384-VCmXjywReHh4PwowAiWNagnWcLhlEJLA5buUprzK8rxFgeH0kww/aWY76TfkUoSX" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../assets/style.css">
    <title>Gestión de Inventario</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row justify-content-center align-items-center" style="height: 100vh; width: 100vw">
            <div class="jumbotron jumbotron-fluid" id="form">
                <div class="container">
                    <form method="post">
                        <h1 class="font-weight-bold text-center">ACTUALIZA UN PRODUCTO</h1>
                        <div class="form-group">
                            <label for="NOMBRE">Nombre</label>
                            <input type="text" name="NOMBRE" class="form-control" value="<?php echo $_REQUEST['NOMBRE'] ?>"/>
                        </div>
                        <div class="form-group">
                            <label for="PRECIO">Precio</label>
                            <input type="number" name="PRECIO" class="form-control" value="<?php echo $_REQUEST['PRECIO'] ?>">
                        </div>
                        <div class="form-group">
                            <label for="CANTIDAD">Cantidad</label>
                            <input type="number" name="CANTIDAD" class="form-control" value="<?php echo $_REQUEST['CANTIDAD'] ?>">
                        </div>

                        <input type="submit" name="update" value="Actualizar" class="btn btn-success botonFormulario">
                    </form>
                </div>
            </div>
        </div>
        <?php
            require '../controller/update.php';
        ?>
        <footer class="fixed-bottom">
            <div>
                Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon"> www.flaticon.com</a> Icons made by <a href="https://www.flaticon.com/authors/freepik" title="Freepik">Freepik</a> from <a href="https://www.flaticon.com/" title="Flaticon">www.flaticon.com</a> Hecho por <a href="https://github.com/w1sec0d">Carlos Ramírez</a>
            </div>
        </footer>
    </div>
</body>

</html>