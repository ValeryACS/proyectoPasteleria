<?php
// carrito.php - Vista de catálogo con carrito desplegable en JavaScript
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras - Dulce Hogar</title>

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Iconos de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        .btn-rosa {
            background-color: #ff5ca8;
            color: white;
            border: none;
        }
        .btn-rosa:hover {
            background-color: #d63384;
            color: white;
        }
        .text-rosa {
            color: #d63384 !important;
        }
        /* Estilos del Carrito Lateral */
        .cart-sidebar {
            position: fixed;
            top: 0;
            right: -400px;
            width: 380px;
            height: 100vh;
            background-color: #ffffff;
            box-shadow: -4px 0 10px rgba(0,0,0,0.15);
            transition: right 0.3s ease;
            z-index: 1050;
            display: flex;
            flex-direction: column;
        }
        .cart-sidebar.active {
            right: 0;
        }
        .cart-header {
            padding: 1rem;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .cart-body {
            padding: 1rem;
            flex-grow: 1;
            overflow-y: auto;
        }
        .cart-footer {
            padding: 1rem;
            border-top: 1px solid #eee;
            background-color: #f8f9fa;
        }
    </style>
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-light border-bottom">
        <div class="container">
            <a class="navbar-brand fw-bold text-rosa" href="home.php">🧁 Dulce Hogar</a>
            <button class="btn btn-outline-dark position-relative" onclick="toggleCart(true)">
                <i class="bi bi-cart3"></i> Carrito
                <span id="cart-badge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    0
                </span>
            </button>
        </div>
    </nav>

    <!-- CATÁLOGO DE PRODUCTOS -->
    <main class="container my-5">
        <h2 class="text-center mb-4">Nuestros Productos</h2>
        <div class="row g-4" id="contenedor-productos">
            <!-- Las tarjetas de productos se renderizan dinámicamente con JS -->
        </div>
    </main>

    <!-- PANEL CARRITO LATERAL -->
    <aside class="cart-sidebar" id="cart-sidebar">
        <div class="cart-header">
            <h5 class="mb-0">Tu Pedido 🎂</h5>
            <button type="button" class="btn-close" onclick="toggleCart(false)"></button>
        </div>

        <div class="cart-body" id="cart-items-list">
            <p class="text-center text-muted mt-4">No has agregado productos aún.</p>
        </div>

        <div class="cart-footer">
            <div class="d-flex justify-content-between align-items-center mb-3 fw-bold fs-5">
                <span>Total:</span>
                <span id="cart-total-price" class="text-rosa">₡0</span>
            </div>
            <button id="checkout-btn" class="btn btn-rosa w-100 py-2" onclick="procesarPago()" disabled>
                Confirmar Pedido
            </button>
        </div>
    </aside>

    <!-- JAVASCRIPT -->
    <script>
        const productos = [
            { id: 1, nombre: "Pan Fresco", descripcion: "Pan crujiente recién horneado.", precio: 1500, imagen: "https://via.placeholder.com/150?text=Pan" },
            { id: 2, nombre: "Pastel Especial", descripcion: "Diseño único para tus fiestas.", precio: 15000, imagen: "https://via.placeholder.com/150?text=Pastel" },
            { id: 3, nombre: "Galletas Crujientes", descripcion: "Sabor a mantequilla y chispas.", precio: 2500, imagen: "https://via.placeholder.com/150?text=Galletas" },
            { id: 4, nombre: "Cupcake Especial", descripcion: "Relleno de crema de vainilla.", precio: 1800, imagen: "https://via.placeholder.com/150?text=Cupcake" }
        ];

        let carrito = JSON.parse(localStorage.getItem('carrito_demo')) || [];

        document.addEventListener("DOMContentLoaded", () => {
            renderizarProductos();
            actualizarCarritoUI();
        });

        function renderizarProductos() {
            const contenedor = document.getElementById("contenedor-productos");
            let html = "";
            productos.forEach(p => {
                html += `
                    <div class="col-md-3">
                        <div class="card h-100 shadow-sm text-center">
                            <img src="${p.imagen}" class="card-img-top" alt="${p.nombre}">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title">${p.nombre}</h5>
                                <p class="card-text text-muted">${p.descripcion}</p>
                                <p class="fw-bold fs-5 text-rosa mb-3">₡${p.precio.toLocaleString("es-CR")}</p>
                                <button class="btn btn-rosa mt-auto" onclick="agregarAlCarrito(${p.id})">
                                    <i class="bi bi-cart-plus"></i> Agregar
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            });
            contenedor.innerHTML = html;
        }

        function agregarAlCarrito(id) {
            const producto = productos.find(p => p.id === id);
            const itemExistente = carrito.find(item => item.id === id);

            if (itemExistente) {
                itemExistente.cantidad++;
            } else {
                carrito.push({
                    id: producto.id,
                    nombre: producto.nombre,
                    precio: producto.precio,
                    cantidad: 1
                });
            }

            guardarYActualizar();
            toggleCart(true);
        }

        function eliminarDelCarrito(id) {
            carrito = carrito.filter(item => item.id !== id);
            guardarYActualizar();
        }

        function cambiarCantidad(id, cambio) {
            const item = carrito.find(i => i.id === id);
            if (item) {
                item.cantidad += cambio;
                if (item.cantidad <= 0) {
                    eliminarDelCarrito(id);
                    return;
                }
            }
            guardarYActualizar();
        }

        function guardarYActualizar() {
            localStorage.setItem('carrito_demo', JSON.stringify(carrito));
            actualizarCarritoUI();
        }

        function actualizarCarritoUI() {
            const totalItems = carrito.reduce((acc, item) => acc + item.cantidad, 0);
            document.getElementById("cart-badge").textContent = totalItems;

            const contenedorLista = document.getElementById("cart-items-list");
            if (carrito.length === 0) {
                contenedorLista.innerHTML = '<p class="text-center text-muted mt-4">No has agregado productos aún.</p>';
            } else {
                let html = "";
                carrito.forEach(item => {
                    html += `
                        <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                            <div>
                                <h6 class="mb-0 fw-bold">${item.nombre}</h6>
                                <small class="text-muted">₡${item.precio.toLocaleString("es-CR")}</small>
                            </div>
                            <div class="d-flex align-items-center gap-2">
                                <button class="btn btn-sm btn-outline-secondary py-0 px-2" onclick="cambiarCantidad(${item.id}, -1)">-</button>
                                <span>${item.cantidad}</span>
                                <button class="btn btn-sm btn-outline-secondary py-0 px-2" onclick="cambiarCantidad(${item.id}, 1)">+</button>
                                <button class="btn btn-sm btn-outline-danger py-0 px-2 ms-2" onclick="eliminarDelCarrito(${item.id})">&times;</button>
                            </div>
                        </div>
                    `;
                });
                contenedorLista.innerHTML = html;
            }

            const total = carrito.reduce((acc, item) => acc + (item.precio * item.cantidad), 0);
            document.getElementById("cart-total-price").textContent = "₡" + total.toLocaleString("es-CR");
            document.getElementById("checkout-btn").disabled = carrito.length === 0;
        }

        function toggleCart(abrir) {
            const sidebar = document.getElementById("cart-sidebar");
            if (abrir) {
                sidebar.classList.add("active");
            } else {
                sidebar.classList.remove("active");
            }
        }

        function procesarPago() {
            alert("¡Pedido guardado! Redirigiendo a la pantalla de pago...");
            window.location.href = 'pago.php';
        }
    </script>
</body>

</html>