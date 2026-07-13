document.addEventListener("DOMContentLoaded", function () {
    const opcionesPago = document.querySelectorAll(
        'input[name="metodoPago"]'
    );

    const camposTarjeta = document.getElementById("camposTarjeta");
    const camposSinpe = document.getElementById("camposSinpe");
    const camposPaypal = document.getElementById("camposPaypal");

    function mostrarMetodoPago() {
        const metodoSeleccionado = document.querySelector(
            'input[name="metodoPago"]:checked'
        ).value;

        camposTarjeta.classList.add("d-none");
        camposSinpe.classList.add("d-none");
        camposPaypal.classList.add("d-none");

        if (metodoSeleccionado === "tarjeta") {
            camposTarjeta.classList.remove("d-none");
        }

        if (metodoSeleccionado === "sinpe") {
            camposSinpe.classList.remove("d-none");
        }

        if (metodoSeleccionado === "paypal") {
            camposPaypal.classList.remove("d-none");
        }
    }

    opcionesPago.forEach(function (opcion) {
        opcion.addEventListener("change", mostrarMetodoPago);
    });

    mostrarMetodoPago();
        const botonConfirmar = document.getElementById("btnConfirmarPago");

    botonConfirmar.addEventListener("click", function () {
        const nombre = document.getElementById("nombre").value.trim();
        const correo = document.getElementById("correo").value.trim();
        const telefono = document.getElementById("telefono").value.trim();
        const direccion = document.getElementById("direccion").value.trim();

        const metodoSeleccionado = document.querySelector(
            'input[name="metodoPago"]:checked'
        ).value;

        if (!nombre || !correo || !telefono || !direccion) {
            alert("Complete todos los datos del cliente.");
            return;
        }

        if (metodoSeleccionado === "tarjeta") {
            const titular = document.getElementById("titular").value.trim();
            const numeroTarjeta = document
                .getElementById("numeroTarjeta")
                .value.trim();
            const vencimiento = document
                .getElementById("vencimiento")
                .value.trim();
            const cvv = document.getElementById("cvv").value.trim();

            if (!titular || !numeroTarjeta || !vencimiento || !cvv) {
                alert("Complete todos los datos de la tarjeta.");
                return;
            }
        }

        if (metodoSeleccionado === "sinpe") {
            const comprobante = document
                .getElementById("comprobante")
                .value.trim();

            if (!comprobante) {
                alert("Ingrese el número de comprobante de SINPE Móvil.");
                return;
            }
        }

        alert(
            "Pago confirmado correctamente. Su pedido ha sido registrado."
        );
    });
})