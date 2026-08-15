<?php
// registro.php - Formulario para crear nuevas cuentas de usuario
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Crear cuenta - Dulce Hogar</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container">
        <div class="row vh-100 align-items-center justify-content-center">
            <div class="col-lg-8">
                <div class="login-card">

                    <div class="text-center mb-4">
                        <h1>🌸 Crear Cuenta</h1>
                        <p class="text-muted">Únete a nuestra familia de sabores dulces</p>
                    </div>

                    <form action="registro_process.php" method="POST">
                        <div class="row">

                            <!-- DATOS PERSONALES -->
                            <div class="col-md-6">
                                <h3><i class="bi bi-person-heart"></i> Datos personales</h3>

                                <div class="mb-3">
                                    <label>Nombre completo</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person"></i></span>
                                        <input type="text" name="nombre" class="form-control" placeholder="Ejemplo: María López" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label>Correo electrónico</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                        <input type="email" name="correo" class="form-control" placeholder="correo@gmail.com" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label>Teléfono</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                        <input type="text" name="telefono" class="form-control" placeholder="8888-8888">
                                    </div>
                                </div>
                            </div>

                            <!-- DATOS CUENTA -->
                            <div class="col-md-6">
                                <h3><i class="bi bi-shield-lock"></i> Cuenta</h3>

                                <div class="mb-3">
                                    <label>Usuario</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-person-badge"></i></span>
                                        <input type="text" name="usuario" class="form-control" placeholder="Nombre de usuario" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label>Contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                        <input type="password" name="password" class="form-control" placeholder="Contraseña" required>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label>Confirmar contraseña</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                                        <input type="password" name="confirm_password" class="form-control" placeholder="Repita contraseña" required>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <button type="button" class="btn btn-rosa w-100 mt-4" onclick="location.href='home.php'">
                            <i class="bi bi-check-circle"></i> Crear mi cuenta
                        </button>
                    </form>

                    <div class="text-center mt-3">
                        <a href="index.php">← Volver al inicio</a>
                    </div>

                </div>
            </div>
        </div>
    </div>

</body>

</html>