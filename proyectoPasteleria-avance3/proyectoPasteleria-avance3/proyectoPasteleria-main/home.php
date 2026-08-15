<?php
// home.php - Página principal de la tienda
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Dulce Hogar - Inicio</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Iconos de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- CSS propio -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/carrito.css">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">

            <a class="navbar-brand" href="home.php">
                Dulce Hogar
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="menu">
                <ul class="navbar-nav ms-auto align-items-center">

                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Inicio</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#productos">Productos</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="pedido.php">Pedido personalizado</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="categorias.php">Modificar categorias</a>
                    </li>

                    <li class="nav-item ms-2 me-2">
                        <button class="btn btn-outline-dark position-relative" id="open-cart-btn" type="button" onclick="cartManager.toggleSidebar(true)">
                            <i class="bi bi-cart3"></i> Carrito
                            <span id="cart-badge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                0
                            </span>
                        </button>
                    </li>

                    <li class="nav-item">
                        <a class="btn btn-light ms-3" href="index.php">Cerrar sesión</a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>

    <!-- PRESENTACIÓN -->
    <section class="container">
        <div class="hero mt-4">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Bienvenido a Dulce Hogar 💕</h2>
                    <h3>Horneando momentos dulces para ti</h3>
                    <p>
                        Descubre nuestros panes, pasteles, cupcakes y
                        postres preparados con amor y dedicación.
                    </p>
                    <a href="#productos" class="btn btn-rosa">Ver productos</a>
                </div>

                <div class="col-md-6 text-center">
                    <img src="img/banner.png" class="img-fluid" alt="Panadería Dulce Hogar">
                </div>
            </div>
        </div>
    </section>

    <!-- PRODUCTOS -->
    <section class="container mt-5" id="productos">

        <h2 class="text-center mb-5">
            Nuestros productos 🧁
        </h2>

        <div class="row g-4" id="contenedor-productos">

            <!-- PAN -->
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="img/pan.jpg" class="card-img-top" alt="Pan fresco">
                    <div class="card-body text-center d-flex flex-column">
                        <h4 class="card-title">🥖 Pan</h4>
                        <p>Pan fresco preparado cada mañana.</p>
                        <button class="btn btn-rosa w-100 mt-auto" type="button" onclick="cartManager.addItem(1, 'Pan Fresco', 1500)">
                            Agregar al Carrito
                        </button>
                    </div>
                </div>
            </div>

            <!-- PASTELES -->
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="img/pastel.avif" class="card-img-top" alt="Pastel especial">
                    <div class="card-body text-center d-flex flex-column">
                        <h4 class="card-title">🎂 Pasteles</h4>
                        <p>Diseños especiales para tus celebraciones.</p>
                        <button class="btn btn-rosa w-100 mt-auto" type="button" onclick="cartManager.addItem(2, 'Pastel Especial', 15000)">
                            Agregar al Carrito
                        </button>
                    </div>
                </div>
            </div>

            <!-- GALLETAS -->
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="img/galletas.webp" class="card-img-top" alt="Galletas">
                    <div class="card-body text-center d-flex flex-column">
                        <h4 class="card-title">🍪 Galletas</h4>
                        <p>Dulces, crujientes y deliciosas.</p>
                        <button class="btn btn-rosa w-100 mt-auto" type="button" onclick="cartManager.addItem(3, 'Galletas Crujientes', 2500)">
                            Agregar al Carrito
                        </button>
                    </div>
                </div>
            </div>

            <!-- CUPCAKES -->
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="img/cupcakes.avif" class="card-img-top" alt="Cupcakes">
                    <div class="card-body text-center d-flex flex-column">
                        <h4 class="card-title">🧁 Cupcakes</h4>
                        <p>Decoraciones únicas y sabores increíbles.</p>
                        <button class="btn btn-rosa w-100 mt-auto" type="button" onclick="cartManager.addItem(4, 'Cupcake Especial', 1800)">
                            Agregar al Carrito
                        </button>
                    </div>
                </div>
            </div>

            <!-- PEDIDO PERSONALIZADO -->
            <div class="col-md-4">
                <div class="card h-100">
                    <img src="img/pastelvariedad.webp" class="card-img-top" alt="Pedido personalizado">
                    <div class="card-body text-center d-flex flex-column">
                        <h4 class="card-title">✨ Pedido personalizado</h4>
                        <p>Crea un postre diseñado para ti.</p>
                        <a href="pedido.php" class="btn btn-rosa w-100 mt-auto">
                            Crear pedido
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- FAVORITOS -->
    <section class="container mt-5">
        <div class="hero text-center">
            <h2>⭐ Favoritos de nuestros clientes</h2>
            <p>“Las mejores tortas y cupcakes para momentos especiales.”</p>
            <div class="fs-2">⭐⭐⭐⭐⭐</div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer>
        <h4>Dulce Hogar</h4>
        <p>Horneando felicidad desde <?php echo date("Y"); ?> 💕</p>
    </footer>

    <!-- CARRITO LATERAL -->
    <aside class="cart-sidebar" id="cart-sidebar">
        <div class="cart-sidebar-header">
            <h3>Tu Pedido 🎂</h3>
            <button class="close-cart-btn" id="close-cart-btn" type="button" onclick="cartManager.toggleSidebar(false)">
                &times;
            </button>
        </div>

        <div class="cart-body" id="cart-items-list">
            <p class="empty-cart-text">No has agregado delicias aún.</p>
        </div>

        <div class="cart-sidebar-footer">
            <div class="total-container">
                <span>Total:</span>
                <span id="cart-total-price" class="total-price">₡0</span>
            </div>
            <button class="btn-checkout" id="checkout-btn" type="button" disabled>
                Confirmar Pedido
            </button>
        </div>
    </aside>

    <script src="js/cart-front.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
    fetch('obtener_productos.php')
      .then(respuesta => respuesta.json())
      .then(productos => {
          if (productos && productos.length > 0) {
              const contenedor = document.getElementById('contenedor-productos');
              productos.forEach(p => {
                  const div = document.createElement('div');
                  div.className = 'col-md-4';
                  div.innerHTML = `
                      <div class="card h-100">
                          <img src="${p.imagen}" class="card-img-top" alt="${p.nombre}">
                          <div class="card-body text-center d-flex flex-column">
                              <h4 class="card-title">${p.nombre}</h4>
                              <p>${p.descripcion}</p>
                              <button class="btn btn-rosa w-100 mt-auto" type="button" 
                                      onclick="cartManager.addItem(${p.id_producto}, '${p.nombre}', ${p.precio})">
                                  Agregar al Carrito (₡${p.precio})
                              </button>
                          </div>
                      </div>
                  `;
                  contenedor.appendChild(div);
              });
          }
      })
      .catch(err => console.log('Cargados los productos estáticos del catálogo'));
    </script>

</body>

</html>