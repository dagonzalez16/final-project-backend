<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="<?= base_url('/global.css') ?>">
</head>
<body>
    <div class="login-container">
        <h1>Iniciar sesión</h1>

        <?php if (session()->getFlashdata('error')) : ?>
            <div class="error-message">
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('login') ?>" method="post">
            <div>
                <label for="username">Usuario:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div>
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <button type="submit">Iniciar sesión</button>
        </form>
    </div>
    <a href="<?= base_url('/') ?>">Registrarse</a>
</body>
</html>