<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Empleado</title>
    <link rel="stylesheet" href="css/estilo.css">
</head>
<body>
    <header>
        <div class="header-top">
            <img src="logo.png" alt="Logo de la empresa" class="logo">
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Empleados</a></li>
                <li><a href="visitas.php">Visitas</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <div class="container">
            <div class="form-section active">
                <h2>Registro de Nuevo Empleado</h2>

                <?php
                if (isset($_GET['error'])) {
                    echo '<div class="alert alert-error">' . htmlspecialchars($_GET['error']) . '</div>';
                }
                ?>

                <form action="procesar_registro_empleado.php" method="POST">
                    <div class="form-group">
                        <label for="nombre_completo">Nombre Completo *</label>
                        <input type="text" id="nombre_completo" name="nombre_completo" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Correo Electrónico *</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="username">Usuario *</label>
                        <input type="text" id="username" name="username" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Contraseña *</label>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <div class="form-group">
                        <label for="confirm_password">Confirmar Contraseña *</label>
                        <input type="password" id="confirm_password" name="confirm_password" required>
                    </div>

                    <button type="submit">Registrarse</button>

                </form>

                <div class="login-link">
                    <p>¿Ya tienes cuenta? <a href="index.php">Inicia sesión aquí</a></p>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
