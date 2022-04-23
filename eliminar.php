<?php
session_start();
include ('config.php');

if(isset($_POST['eliminar']))
{
    $Id = $_GET['eliminarid'];

    if($llamado -> Eliminar($Id))
    {
        $mensaje = "<div class='alert alert-success' role='alert'>Registro eliminado!</div>";
    }
    else
    {
        $mensaje = "<div class='alert alert-danger' role='alert'>No se logro eliminar registro!</div>";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <?php require_once "menu.php"; ?>
    <title>Eliminar</title>
</head>

<body>

    <div class="container"><br>
        <div class="row justify-content-center">
            <div class="col-6 p-5 bg-white shadow-lg rounded">
                <?php
                    if(isset($mensaje))
                    {
                        echo $mensaje;
                    }
                ?>
                <h3>Eliminar</h3>
                <hr>
                <form method="post">
                    <div class="form-group">
                        <label for="label1">Esta seguro de eliminar el registro</label>
                    </div>

                    <br>
                    <div class="d-grid gap-2 d-md-block">
                        <button class="btn btn-primary" name="eliminar" type="submit">Eliminar</button>
                        <a class="btn btn-info" href="mostrar.php" type="submit">Volver</a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>