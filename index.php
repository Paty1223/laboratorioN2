<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login</title>
</head>

<body>

    <div class="vh-100 row m-0 align-items-center justify-content-center">
        <div class="col-auto p-5 bg-white shadow-lg rounded">
            <div class="container">
                <?php
                    include('config.php');
                    session_start();
  
                    if (isset($_POST['login'])) {
                        $user = $_POST['usuario'];
                        $password = $_POST['password'];
  
                        $query = $conn->prepare("SELECT * FROM usuarios WHERE username=:username");
                        $query->bindParam("username", $user, PDO::PARAM_STR);
                        $query->execute();
  
                        $result = $query->fetch(PDO::FETCH_ASSOC);
  
                        if (!$result) {
                            header("location: index.php");
                        } else {
                            if (password_verify($password, $result['password'])) {
                                $_SESSION['user_id'] = $result['id'];
                                header("location: principal.php");
                            } else {
                                header("location: index.php");
                                echo '<div class="alert alert-danger" role="alert">¡Usuario O Contraseña Incorrectos!</div>';
                            }
                        }
                    } 
                ?>
                <h3 class="text-center">Iniciar Sesion</h3>
                <hr>
                <form method="post">

                    <div class="form-group">
                        <label for="usuario">Usuario:</label>
                        <input id="usuario" class="form-control" type="text" name="usuario" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input id="password" class="form-control" type="password" name="password">
                    </div>

                    <br>

                    <div class="d-grid gap-2 d-md-block">
                        <button class="btn btn-primary" name="login" type="submit">Iniciar Sesion</button>
                        <a class="btn btn-info" href="registrarse.php" type="submit">Registrarse</a>
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