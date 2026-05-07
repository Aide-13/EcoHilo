<?php
$conexion = new mysqli("localhost", "root", "", "eco_hilo");

if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

$usuario = $_POST['usuario'];
$clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios_login (usuario, clave) VALUES ('$usuario', '$clave')";
if ($conexion->query($sql) === TRUE) {
    echo "Usuario registrado correctamente";
} else {
    echo "Error: " . $conexion->error;
}

$conexion->close();
?>
