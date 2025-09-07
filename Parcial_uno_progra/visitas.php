<?php
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Visitantes</title>
    <link rel="stylesheet" href="css/visitias.css">
</head>
<body>
    <header>
        <div class="header-top">
            <img src="logo.png" alt="Logo de la empresa" class="logo">
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Empleados</a></li>
                <li><a href="visitas.php" class="active">Visitas</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="card">
            <h1>Registro de Visitantes</h1>

            <?php
            if (isset($_GET['success'])) {
                echo '<div class="alert alert-success">' . htmlspecialchars($_GET['success']) . '</div>';
            }
            if (isset($_GET['error'])) {
                echo '<div class="alert alert-error">' . htmlspecialchars($_GET['error']) . '</div>';
            }
            ?>

            <form action="procesar_visita.php" method="POST">
                <div class="form-group">
                    <label for="nombre">Nombre completo del visitante *</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>

                <div class="form-group">
                    <label for="empresa">Empresa (opcional)</label>
                    <input type="text" id="empresa" name="empresa">
                </div>

                <div class="form-group">
                    <label for="motivo">Motivo de la visita *</label>
                    <textarea id="motivo" name="motivo" required></textarea>
                </div>

                <div class="form-group">
                    <label for="tiempo">Tiempo estimado de estancia *</label>
                    <select id="tiempo" name="tiempo" required>
                        <option value="">Seleccione una opción</option>
                        <option value="Menos de 30 minutos">Menos de 30 minutos</option>
                        <option value="30 minutos a 1 hora">30 minutos a 1 hora</option>
                        <option value="1 a 2 horas">1 a 2 horas</option>
                        <option value="2 a 4 horas">2 a 4 horas</option>
                        <option value="Medio día (4 horas)">Medio día (4 horas)</option>
                        <option value="Día completo">Día completo</option>
                        <option value="Indefinido">Indefinido</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="empleado">Persona a quien visita (opcional)</label>
                    <input type="text" id="empleado" name="empleado">
                </div>

                <button type="submit">Registrar Visita</button>
            </form>
        </div>
    </div>
</body>
</html>