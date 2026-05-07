<?php
$conexion = new mysqli("localhost", "root", "", "eco_hilo");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$nombre = $_POST['nombre'];
$email = $_POST['email'];
$modelo = $_POST['modelo'];
$comentarios = $_POST['comentarios'];

$sql = "INSERT INTO formulario_datos (nombre, email, modelo, comentarios)
        VALUES ('$nombre', '$email', '$modelo', '$comentarios')";

if ($conexion->query($sql) === TRUE) {
    echo "ok";
} else {
    echo "error";
}

$conexion->close();
?>
