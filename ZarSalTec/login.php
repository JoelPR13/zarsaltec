<?php
<head>
    <title>ZarSalTec</title>
</head>
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Conectarse a la base de datos (asegúrate de configurar tus propias credenciales)
    $dbHost = "ejemplo";
    $dbUser = "";
    $dbPassword = "";
    $dbName = "mydb"; // El nombre de la base de datos que creaste

    $conn = new mysqli($dbHost, $dbUser, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    // Consulta para verificar las credenciales del usuario
    $query = "SELECT id, username, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($id, $username, $hashedPassword);
        $stmt->fetch();

        if (password_verify($password, $hashedPassword)) {
            echo "Inicio de sesión exitoso. Bienvenido, $username!";
        } else {
            echo "Credenciales incorrectas. Inténtalo de nuevo.";
        }
    } else {
        echo "Credenciales incorrectas. Inténtalo de nuevo.";
    }

    $stmt->close();
    $conn->close();
}
?>




