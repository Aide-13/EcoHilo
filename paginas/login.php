<?php
session_start();

$usuario = $_POST['usuario'] ?? '';
$clave = $_POST['clave'] ?? '';

// Conexión a la base de datos
$conn = new mysqli("localhost", "root", "", "nombre_de_tu_base");

if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

// Escapar caracteres para evitar inyección SQL (aunque mejor usar prepared statements)
$usuario = $conn->real_escape_string($usuario);
$clave = $conn->real_escape_string($clave);

// Verificar en la base de datos
$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$clave'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "success";
} else {
  echo "error";
}
$conn->close();
?>
