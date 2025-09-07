<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.html");
    exit();
}

$conn = new mysqli("localhost", "root", "", "sistema_empresa");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Empleado</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <header>
        <div class="header-top">
            <img src="logo.png" alt="Logo de la empresa" class="logo">
        </div>
        <nav>
            <ul>
                <li><a href="empleados.php" class="active">Mi Panel</a></li>
                <li><a href="visitas.php">Registrar Visita</a></li>
                <li><a href="logout.php">Cerrar Sesión (<?php echo $_SESSION['username']; ?>)</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="card">
            <h1>Bienvenido, <?php echo $_SESSION['nombre_completo']; ?></h1>
            <p>Usuario: <?php echo $_SESSION['username']; ?></p>
            <p>Hora de entrada: <?php echo date('Y-m-d H:i:s'); ?></p>
            
            <h2>Mis últimos registros</h2>
            <?php
            $sql = "SELECT * FROM registros_empleados WHERE empleado_id = ? ORDER BY fecha_hora DESC LIMIT 5";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("i", $_SESSION['user_id']);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                echo "<table>";
                echo "<tr><th>Fecha/Hora</th><th>Tipo</th></tr>";
                while ($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row['fecha_hora'] . "</td><td>" . $row['tipo'] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<p>No hay registros disponibles.</p>";
            }
            $stmt->close();
            ?>
        </div>
    </div>
</body>
</html>
<?php $conn->close(); ?>