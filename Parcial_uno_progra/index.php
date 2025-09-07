<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Login - Empresa</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>

<body>
    <header>
        <div class="header-top">
            <img src="logo.png" alt="Logo de la empresa" class="logo">
        </div>
        <nav>
            <ul>
                <li><a href="#">Empleados</a></li>
                <li><a href="visitas.php">Visitas</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="container">
            <div id="login-section" class="form-section active">
                <h2>Iniciar Sesión</h2>
                  <?php
                if (isset($_GET['error'])) {
                    echo '<div class="alert alert-error">' . htmlspecialchars($_GET['error']) . '</div>';
                }
                if (isset($_GET['success'])) {
                    echo '<div class="alert alert-success">' . htmlspecialchars($_GET['success']) . '</div>';
                }
                ?>
                <form action="login.php" method="POST">
                    <div class="form-group">
                        <label for="login-username">Usuario:</label>
                        <input type="text" id="login-username" name="username" required>
                    </div>
                    <div class="form-group">
                        <label for="login-password">Contraseña:</label>
                        <input type="password" id="login-password" name="password" required>
                    </div>
                    <button type="submit">Ingresar</button>
                </form>
            </div>
                <div class="register-link">
                    <p>¿No tienes cuenta? <a href="registrar_empleado.php">Regístrate aquí</a></p>
                </div>
            </div>
            
    </main>

</body>

</html>