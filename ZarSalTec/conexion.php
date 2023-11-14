<?php
// Datos de conexión a la base de datos
$host = "127.0.0.1"; 
$usuario = "root"; 
$contrasena = ""; 
$base_datos = "localhost"; 

// Conectar a la base de datos
$conexion = new mysqli($host, $usuario, $contrasena, $base_datos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión a la base de datos: " . $conexion->connect_error);
}

// Recuperar los datos del formulario
$nombre_usuario = $_POST['nombre'];
$contrasena_usuario = $_POST['contrasena'];

// Consulta SQL para verificar las credenciales
$query = "SELECT * FROM usuarios WHERE nombre = '$nombre_usuario' AND contrasena = '$contrasena_usuario'";
$resultado = $conexion->query($query);

if ($resultado->num_rows > 0) {
    // Las credenciales son válidas, el usuario está autenticado
    echo "Inicio de sesión exitoso. Bienvenido, $nombre_usuario.";
} else {
    // Las credenciales son inválidas
    echo "Inicio de sesión fallido. Por favor, verifica tu nombre de usuario y contraseña.";
}

// Cerrar la conexión a la base de datos
$conexion->close();

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
