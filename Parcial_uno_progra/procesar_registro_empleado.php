<?php
$conn = new mysqli("localhost", "root", "", "sistema_empresa");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre_completo = $_POST['nombre_completo'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        header("Location: registrar_empleado.php?error=Las contraseñas no coinciden");
        exit();
    }

    if (strlen($password) < 6) {
        header("Location: registrar_empleado.php?error=La contraseña debe tener al menos 6 caracteres");
        exit();
    }

    $check_sql = "SELECT * FROM empleados WHERE username = ? OR email = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("ss", $username, $email);
    $check_stmt->execute();
    $result = $check_stmt->get_result();

    if ($result->num_rows > 0) {
        header("Location: registrar_empleado.php?error=El usuario o email ya existen");
        exit();
    }

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    $insert_sql = "INSERT INTO empleados (nombre_completo, email, username, password, tipo_usuario) VALUES (?, ?, ?, ?, 'empleado')";
    $insert_stmt->bind_param("ssss", $nombre_completo, $email, $username, $password_hash);
    if ($insert_stmt->execute()) {
        header("Location: index.php?success=Registro exitoso. Ahora puedes iniciar sesión");
    } else {
        header("Location: registrar_empleado.php?error=Error al registrar: " . $conn->error);
    }

    $insert_stmt->close();
    $check_stmt->close();
}

$conn->close();
exit();
?>