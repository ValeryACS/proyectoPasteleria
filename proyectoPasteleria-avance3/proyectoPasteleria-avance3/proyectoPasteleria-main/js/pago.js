// js/pago.js

document.addEventListener('DOMContentLoaded', () => {
    cargarResumenPedido();
    configurarMetodosPago();
    configurarEnvioFormulario();
});

function cargarResumenPedido() {
    const subtotalEl = document.getElementById('subtotalPedido');
    const totalEl = document.getElementById('totalPedido');
    
    // Obtener el total numérico que guardó cart-front.js
    const totalGuardado = localStorage.getItem('totalPedido');

    if (totalGuardado && !isNaN(totalGuardado) && Number(totalGuardado) > 0) {
        const monto = Number(totalGuardado);
        const montoFormateado = "₡" + monto.toLocaleString("es-CR");

        if (subtotalEl) subtotalEl.textContent = montoFormateado;
        if (totalEl) totalEl.textContent = montoFormateado;
    } else {
        if (subtotalEl) subtotalEl.textContent = "₡0";
        if (totalEl) totalEl.textContent = "₡0";
    }
}

function configurarMetodosPago() {
    const radiosPago = document.querySelectorAll('input[name="metodoPago"]');
    const camposTarjeta = document.getElementById('camposTarjeta');
    const camposSinpe = document.getElementById('camposSinpe');
    const camposPaypal = document.getElementById('camposPaypal');

    radiosPago.forEach(radio => {
        radio.addEventListener('change', (e) => {
            const opcion = e.target.value;

            if (camposTarjeta) camposTarjeta.classList.add('d-none');
            if (camposSinpe) camposSinpe.classList.add('d-none');
            if (camposPaypal) camposPaypal.classList.add('d-none');

            if (opcion === 'tarjeta' && camposTarjeta) {
                camposTarjeta.classList.remove('d-none');
            } else if (opcion === 'sinpe' && camposSinpe) {
                camposSinpe.classList.remove('d-none');
            } else if (opcion === 'paypal' && camposPaypal) {
                camposPaypal.classList.remove('d-none');
            }
        });
    });
}

function configurarEnvioFormulario() {
    const btnConfirmar = document.getElementById('btnConfirmarPago');
    const formulario = document.getElementById('formularioPago');

    if (btnConfirmar) {
        btnConfirmar.addEventListener('click', (e) => {
            if (formulario && !formulario.checkValidity()) {
                formulario.reportValidity();
                return;
            }

            e.preventDefault();

            const nombre = document.getElementById('nombre')?.value || '';
            const correo = document.getElementById('correo')?.value || '';
            const telefono = document.getElementById('telefono')?.value || '';
            const direccion = document.getElementById('direccion')?.value || '';
            const metodoSeleccionado = document.querySelector('input[name="metodoPago"]:checked')?.value || 'tarjeta';

            // Guardar para admin.html
            localStorage.setItem('admin_nombre', nombre);
            localStorage.setItem('admin_correo', correo);
            localStorage.setItem('admin_telefono', telefono);
            localStorage.setItem('admin_direccion', direccion);
            localStorage.setItem('admin_metodo', metodoSeleccionado);

            alert('¡Pago confirmado con éxito!');

            localStorage.removeItem('carrito');
            window.location.href = 'home.html';
        });
    }
}