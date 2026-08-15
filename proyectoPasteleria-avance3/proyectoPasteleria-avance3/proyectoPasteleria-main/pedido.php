<?php
// pedido.php - Solicitud de Pedido a la Medida
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido Personalizado - Dulce Hogar</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Iconos -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="home.php">
                🥐 Dulce Hogar
            </a>
            <div>
                <a href="home.php" class="btn btn-light">
                    <i class="bi bi-house-fill"></i> Inicio
                </a>
            </div>
        </div>
    </nav>

    <!-- FORMULARIO -->
    <div class="container mt-5">
        <div class="hero">

            <div class="text-center mb-4">
                <h2>✨ Pedido Personalizado</h2>
                <p>Cuéntanos cómo imaginas tu postre ideal 💕</p>
            </div>

            <form action="guardar_pedido_personalizado.php" method="POST">
                <div class="row">

                    <!-- COLUMNA IZQUIERDA -->
                    <div class="col-md-6">

                        <div class="mb-3">
                            <label class="form-label">
                                <i class="bi bi-cake2-fill"></i> Tipo de producto
                            </label>
                            <select name="tipo_producto" class="form-control">
                                <option value="">Seleccione una opción</option>
                                <option value="Torta">Torta</option>
                                <option value="Cupcakes">Cupcakes</option>
                                <option value="Galletas decoradas">Galletas decoradas</option>
                                <option value="Pan especial">Pan especial</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Sabor</label>
                            <input type="text" name="sabor" class="form-control" placeholder="Ejemplo: Chocolate, vainilla, fresa...">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tamaño o cantidad</label>
                            <input type="text" name="cantidad" class="form-control" placeholder="Ejemplo: 20 personas, 12 cupcakes...">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Fecha de entrega</label>
                            <input type="date" name="fecha_entrega" class="form-control">
                        </div>

                    </div>

                    <!-- COLUMNA DERECHA -->
                    <div class="col-md-6">

                        <div class="mb-3">
                            <label class="form-label">🎨 Decoración deseada</label>
                            <textarea name="decoracion" class="form-control" rows="4" placeholder="Describe los colores, diseño o temática..."></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">💌 Mensaje especial</label>
                            <textarea name="mensaje" class="form-control" rows="4" placeholder="Ejemplo: Feliz cumpleaños Ana"></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Observaciones adicionales</label>
                            <textarea name="observaciones" class="form-control" rows="3" placeholder="Algún detalle adicional..."></textarea>
                        </div>

                    </div>

                </div>

                <button type="button" class="btn btn-rosa w-100 mt-4" onclick="confirmarPedido()">
                    <i class="bi bi-send-fill"></i> Enviar pedido
                </button>
            </form>

        </div>
    </div>

    <footer>
        <h4>🥐 Dulce Hogar</h4>
        <p>Gracias por elegirnos para crear momentos especiales 💕</p>
    </footer>

    <script src="js/app.js"></script>
</body>

</html>