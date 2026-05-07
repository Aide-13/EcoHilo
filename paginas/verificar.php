<?php
$conexion = new mysqli("localhost", "root", "", "eco_hilo");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$usuario = $_POST['usuario'];
$claveIngresada = $_POST['clave'];

// Busca usuario
$sql = "SELECT clave FROM usuarios_login WHERE usuario = '$usuario'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    $fila = $resultado->fetch_assoc();
    if (password_verify($claveIngresada, $fila['clave'])) {
        echo "ok";
    } else {
        echo "error";
    }
} else {
    echo "error";
}

$conexion->close();
?>
