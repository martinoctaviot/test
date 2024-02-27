<?php
// Incluir el archivo de conexión a la base de datos
require_once 'conexion_bd.php';

// Inicializar la variable $mensaje para almacenar el mensaje de éxito o error
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Obtener datos del formulario de manera segura utilizando PDO
        $data = [
            'nombre' => $_POST['nombre'],
            'apellido' => $_POST['apellido'],
            'email' => $_POST['email'],
            'telefono' => $_POST['telefono'],
            'direccion' => $_POST['direccion'],
            'sexo' => $_POST['sexo'],
            'username' => filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING),
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
        ];

        // Preparar la consulta SQL para insertar el usuario
        $stmt = $conn->prepare("INSERT INTO registros (nombre, apellido, email, telefono, direccion, sexo, username, password) VALUES (:nombre, :apellido, :email, :telefono, :direccion, :sexo, :username, :password)");

        // Ejecutar la consulta con los datos
        $stmt->execute($data);

        // Asignar mensaje de éxito
        $mensaje = "Usuario registrado correctamente";
    } catch(PDOException $e) {
        // Asignar mensaje de error
        $mensaje = "Error al registrar usuario: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="styles.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
</head>
<body>
    <div class="container">
        <h1 class="title">Registro de Usuario</h1>
        <div class="form-container">
            <form id="registration-form">
                <div class="form-group">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" required>
                </div>
                <div class="form-group">
                    <label for="email">Correo electrónico:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Formato: 123-456-7890" required>
                </div>
                <div class="form-group">
                    <label for="direccion">Dirección:</label>
                    <input type="text" id="direccion" name="direccion" required>
                </div>
                <div class="form-group">
                    <label for="sexo">Sexo:</label>
                    <select id="sexo" name="sexo" required>
                        <option value="">Selecciona...</option>
                        <option value="masculino">Masculino</option>
                        <option value="femenino">Femenino</option>
                        <option value="otro">Otro</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="username">Nombre de usuario:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <input type="submit" value="Registrar">
                </div>
            </form>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>
