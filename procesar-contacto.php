<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $nombre = trim($_POST['nombre'] ?? '');
  $email = trim($_POST['email'] ?? '');
  $mensaje = trim($_POST['mensaje'] ?? '');

  // Validación básica
  if (!$nombre || !filter_var($email, FILTER_VALIDATE_EMAIL) || !$mensaje) {
    echo "Completa todos los campos correctamente.";
    exit;
  }

  // Conexión a la base de datos (ajusta tus credenciales)
  $conn = new mysqli('localhost', 'root', '', '_mextran');

  if ($conn->connect_error) {
    echo "Error de conexión a la base de datos.";
    exit;
  }

  // Guardar mensaje
  $stmt = $conn->prepare("INSERT INTO contactos (nombre, email, mensaje) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $nombre, $email, $mensaje);

  if ($stmt->execute()) {
    echo "Mensaje enviado correctamente";
  } else {
    echo "Error al guardar el mensaje.";
  }

  $stmt->close();
  $conn->close();
} else {
  echo "Acceso no permitido.";
}
?>