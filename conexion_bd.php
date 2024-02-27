<?php
// Establecer la conexión con la base de datos (cambiar los valores según corresponda)
$host = "localhost";
$dbname = "usuarios";
$username = "root";
$password = "";

try {
    // Crear la conexión PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    // Habilitar mensajes de error de PDO
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    // Mostrar mensaje de error en caso de fallo
    echo "Error de conexión a la base de datos: " . $e->getMessage();
}
?>
