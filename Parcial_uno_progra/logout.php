<?php
session_start();

if (isset($_SESSION['user_id'])) {
    $conn = new mysqli("localhost", "root", "", "sistema_empresa");
    
    $sql = "INSERT INTO registros_empleados (empleado_id, tipo) VALUES (?, 'salida')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $_SESSION['user_id']);
    $stmt->execute();
    $stmt->close();
    $conn->close();
}

session_destroy();
header("Location: index.php");
exit();
?>