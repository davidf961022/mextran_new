<?php
// Datos de conexión
$host = "localhost";
$usuario = "root";
$contrasena = ""; // ← cambia esto si tu usuario tiene contraseña
$base_de_datos = "_mextran";

// Crear conexión
$conexion = mysqli_connect($host, $usuario, $contrasena, $base_de_datos);

// Verificar conexión
if (!$conexion) {
  die("Error de conexión: " . mysqli_connect_error());
}

// Opcional: establecer codificación UTF-8
mysqli_set_charset($conexion, "utf8");
?>