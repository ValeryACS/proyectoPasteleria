<?php
include("conexion.php");

$direccion = $_POST['direccion'];
$notas     = $_POST['notas'];
$total     = $_POST['total'];

$id_usuario     = 2;
$id_metodo_pago = 1;

$sql = "INSERT INTO pedidos (id_usuario, id_metodo_pago, total, direccion_envio, notas_adicionales) 
        VALUES ('$id_usuario', '$id_metodo_pago', '$total', '$direccion', '$notas')";

if ($conexion->query($sql) === TRUE) {

    echo "<script>
            alert('¡Pedido guardado con éxito en la Base de Datos!');
            window.location.href = 'index.html';
          </script>";
} else {
    echo "Error: " . $conexion->error;
}
?>