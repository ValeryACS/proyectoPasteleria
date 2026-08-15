<?php
// admin.php - Panel de Control General
// Aquí puedes validar inicio de sesión del administrador
?>
<!DOCTYPE html>
<html lang="es">
 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración - Dulce Hogar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/style.css">

    <style>
        .table-pink {
            background-color: #ffe0ee !important;
            color: #d63384 !important;
        }
        .bg-rosa-badge {
            background-color: #ff5ca8;
            color: white;
        }
        .text-rosa {
            color: #d63384 !important;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="home_2.php">
                🥐 Dulce Hogar - Administración
            </a>
            <div>
                <a href="index.php" class="btn btn-light">
                    <i class="bi bi-box-arrow-left"></i> Cerrar Sesión
                </a>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="hero mb-4">
            <h2>✨ Panel de Control General</h2>
            <p>Monitoreo en tiempo real de las ventas del carrito y solicitudes especiales.</p>
        </div>

        <ul class="nav nav-tabs mb-4" id="adminTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active fw-bold text-rosa" id="ordenes-tab" data-bs-toggle="tab" data-bs-target="#ordenes" type="button" role="tab">
                    <i class="bi bi-credit-card-2-front-fill"></i> Órdenes en Tiempo Real
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link fw-bold text-rosa" id="personalizados-tab" data-bs-toggle="tab" data-bs-target="#personalizados" type="button" role="tab">
                    <i class="bi bi-cake2-fill"></i> Pedidos Personalizados
                </button>
            </li>
        </ul>

        <div class="tab-content" id="adminTabsContent">
            
            <div class="tab-pane fade show active" id="ordenes" role="tabpanel">
                <div class="card p-4 shadow-sm">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="text-rosa mb-0"><i class="bi bi-receipt"></i> Cola de Ventas Recientes</h4>
                        <button class="btn btn-sm btn-outline-secondary" onclick="limpiarHistorial()">
                            <i class="bi bi-trash3"></i> Limpiar Simulación
                        </button>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-pink">
                                <tr>
                                    <th>Órden #</th>
                                    <th>Datos del Cliente</th>
                                    <th>Dirección de Entrega</th>
                                    <th>Productos Comprados</th>
                                    <th>Método de Pago</th>
                                    <th>Total Cobrado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody id="tabla-ordenes-carrito">
                               <!-- Cargado dinámicamente -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="personalizados" role="tabpanel">
                <div class="card p-4 shadow-sm">
                    <h4 class="mb-3 text-rosa"><i class="bi bi-magic"></i> Solicitudes Especiales (A la Medida)</h4>
                    <div class="table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-pink">
                                <tr>
                                    <th>Código</th>
                                    <th>Categoría</th>
                                    <th>Sabor Sugerido</th>
                                    <th>Tamaño / Cantidad</th>
                                    <th>Fecha Requerida</th>
                                    <th>Diseño y Mensajes</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>#P-901</strong></td>
                                    <td><span class="badge bg-rosa-badge">Torta</span></td>
                                    <td>Vainilla con relleno de dulce de leche</td>
                                    <td>Para 20 personas</td>
                                    <td>18/07/2026</td>
                                    <td>
                                        <small>
                                            <strong>Decoración:</strong> Tonos pastel y flores de fondant.<br>
                                            <strong>Mensaje:</strong> "Feliz Cumpleaños Ana"
                                        </small>
                                    </td>
                                    <td>
                                        <button class="btn btn-sm btn-rosa text-white" onclick="completarFlujoCustom('P-901')">
                                            <i class="bi bi-journal-check"></i> Hornear
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer class="mt-5">
        <h4>Dulce Hogar</h4>
        <p>Panel de Control y Operaciones Internas <?php echo date("Y"); ?> 💕</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            cargarOrdenesReales();
        });

        function cargarOrdenesReales() {
            const tbody = document.getElementById("tabla-ordenes-carrito");
            if (!tbody) return;

            const nombre = localStorage.getItem("admin_nombre");
            const correo = localStorage.getItem("admin_correo");
            const telefono = localStorage.getItem("admin_telefono");
            const direccion = localStorage.getItem("admin_direccion");
            const metodoPago = localStorage.getItem("admin_metodo");
            const total = localStorage.getItem("totalPedido");
            const productosRaw = localStorage.getItem("productosPedido");

            if (!nombre) {
                tbody.innerHTML = `
                    <tr>
                        <td><strong>#2026-01</strong></td>
                        <td>
                            <strong>María López</strong><br>
                            <small class="text-muted"><i class="bi bi-envelope"></i> maria@gmail.com</small><br>
                            <small class="text-muted"><i class="bi bi-telephone"></i> 8888-8888</small>
                        </td>
                        <td><small>Calle Central, Av 4, Heredia, CR.</small></td>
                        <td>
                            <ul class="mb-0 ps-3">
                                <li>Pan Fresco (x2)</li>
                                <li>Cupcake Especial (x3)</li>
                            </ul>
                        </td>
                        <td><span class="badge bg-light text-dark text-capitalize"><i class="bi bi-credit-card"></i> tarjeta</span></td>
                        <td class="fw-bold text-rosa">₡8.400</td>
                        <td>
                            <button class="btn btn-sm btn-outline-success" onclick="despacharOrden('2026-01')">
                                <i class="bi bi-truck"></i> Despachar
                            </button>
                        </td>
                    </tr>`;
                return;
            }

            let listaProductosHTML = '<ul class="mb-0 ps-3">';
            if (productosRaw) {
                try {
                    const productos = JSON.parse(productosRaw);
                    productos.forEach(item => {
                        listaProductosHTML += `<li>${item.name} (x${item.quantity})</li>`;
                    });
                } catch (e) {
                    listaProductosHTML += '<li>Productos del pedido</li>';
                }
            }
            listaProductosHTML += '</ul>';

            const totalFormateado = total ? "₡" + Number(total).toLocaleString("es-CR") : "₡0";

            let iconoPago = "bi-credit-card";
            if (metodoPago === "sinpe") iconoPago = "bi-phone";
            if (metodoPago === "paypal") iconoPago = "bi-paypal";

            tbody.innerHTML = `
                <tr>
                    <td><strong>#2026-NUEVA</strong></td>
                    <td>
                        <strong>${nombre}</strong><br>
                        <small class="text-muted"><i class="bi bi-envelope"></i> ${correo}</small><br>
                        <small class="text-muted"><i class="bi bi-telephone"></i> ${telefono}</small>
                    </td>
                    <td><small>${direccion}</small></td>
                    <td>${listaProductosHTML}</td>
                    <td>
                        <span class="badge bg-light text-dark text-capitalize">
                            <i class="bi ${iconoPago}"></i> ${metodoPago}
                        </span>
                    </td>
                    <td class="fw-bold text-rosa">${totalFormateado}</td>
                    <td>
                        <button class="btn btn-sm btn-outline-success" onclick="despacharOrden('NUEVA')">
                            <i class="bi bi-truck"></i> Despachar
                        </button>
                    </td>
                </tr>
            `;
        }

        function despacharOrden(id) {
            alert("¡Excelente! La orden #" + id + " ha sido marcada como despachada y va en camino al cliente.");
        }
        
        function completarFlujoCustom(codigo) {
            alert("La orden de diseño especial #" + codigo + " pasó a la cocina para su respectiva preparación.");
        }

        function limpiarHistorial() {
            localStorage.removeItem("admin_nombre");
            localStorage.removeItem("admin_correo");
            localStorage.removeItem("admin_telefono");
            localStorage.removeItem("admin_direccion");
            localStorage.removeItem("admin_metodo");
            location.reload();
        }
    </script>
</body>

</html>