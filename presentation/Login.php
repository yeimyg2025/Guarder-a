<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mordida de flujo - Iniciar sesión</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Inicia sesión en tu cuenta</h1>
        <form action="../capa_negocio/Auth.php" method="post">
            <label for="email">Tu correo electrónico</label>
            <input type="email" id="email" name="email" required>
            
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="password" required>
            
            <div class="remember-forgot-container">
                    <label class="remember-me">
                        <input type="checkbox"> Acuerdate de mi
                    </label>
                    <a href="#" class="forgot-password">¿Olvide mi contraseña?</a>
                </div>

            <button type="submit">Inicia sesión en tu cuenta</button>
        </form>
        <p><a href="#notienes">¿No tienes una cuenta?</a></p>
    </div>
</body>
</html>