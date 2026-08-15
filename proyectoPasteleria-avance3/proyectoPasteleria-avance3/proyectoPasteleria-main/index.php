<?php
// index.php - Formulario de Inicio de Sesión
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Panadería Dulce Hogar</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container">
        <div class="row vh-100 align-items-center">

            <!-- Imagen -->
            <div class="col-lg-6 text-center d-none d-lg-block">
                <img src="img/logo.webp" class="img-fluid" style="max-height:550px;">
            </div>

            <!-- Login -->
            <div class="col-lg-6">
                <div class="login-card">

                    <div class="text-center mb-4">
                        <h1> Dulce Hogar</h1>
                        <p class="text-muted">Horneando momentos dulces para ti.</p>
                    </div>

                    <form action="login_process.php" method="POST">
                        <div class="mb-3">
                            <label>Usuario</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-person-fill"></i>
                                </span>
                                <input type="text" name="usuario" class="form-control" placeholder="Ingrese su usuario" required>
                            </div>
                        </div>

                        <div class="mb-4">
                            <label>Contraseña</label>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="bi bi-lock-fill"></i>
                                </span>
                                <input type="password" name="password" class="form-control" placeholder="Ingrese su contraseña" required>
                            </div>
                        </div>

                        <button type="button" class="btn btn-rosa w-100" onclick="location.href='home.php'">
                            <i class="bi bi-box-arrow-in-right"></i> Ingresar
                        </button>
                    </form>

                    <div class="text-center mt-4">
                        ¿No tienes una cuenta?<br><br>
                        <a href="registro.php" class="btn btn-outline-danger">
                            Crear cuenta
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>

</body>

</html>