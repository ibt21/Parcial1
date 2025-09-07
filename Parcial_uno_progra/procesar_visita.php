<?php
$conn = new mysqli("localhost", "root", "", "sistema_empresa");

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $empresa = $_POST['empresa'] ?? '';
    $motivo = $_POST['motivo'];
    $tiempo = $_POST['tiempo'];
    $empleado_visitado = $_POST['empleado'] ?? '';
    
    $stmt = $conn->prepare("INSERT INTO visitas (nombre_completo, empresa, motivo, tiempo_estimado, empleado_visitado) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $nombre, $empresa, $motivo, $tiempo, $empleado_visitado);
    
    if ($stmt->execute()) {
        header("Location: visitas.php?success=Visita registrada exitosamente");
    } else {
        header("Location: visitas.php?error=Error al registrar visita: " . $stmt->error);
    }
    
    $stmt->close();
} else {
    header("Location: visitas.php");
}
$conn->close();
exit();
?>