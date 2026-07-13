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
});