<?php
session_start();
$conn = new mysqli("localhost", "root", "", "sistema_empresa");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $sql = "SELECT * FROM empleados WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['nombre_completo'] = $user['nombre_completo'];
            $_SESSION['tipo_usuario'] = $user['tipo_usuario'];
            
            $registro_sql = "INSERT INTO registros_empleados (empleado_id, tipo) VALUES (?, 'entrada')";
            $registro_stmt = $conn->prepare($registro_sql);
            $registro_stmt->bind_param("i", $user['id']);
            $registro_stmt->execute();
            $registro_stmt->close();
            
            header("Location: empleados.php");
            exit();
        } else {
            $error = "Contraseña incorrecta";
        }
    } else {
        $error = "Usuario no encontrado";
    }
    
    $stmt->close();
}
$conn->close();

if (isset($error)) {
    header("Location: index.php?error=" . urlencode($error));
} else {
    header("Location: index.php");
}
exit();
?>