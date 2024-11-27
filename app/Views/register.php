<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="<?= base_url('/global.css') ?>">
</head>
<body>
    <div class="register-container">
        <h1>Registro</h1>

        <!-- Mensajes de error -->
        <?php if (isset($validation)) : ?>
            <div class="error-message">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <!-- Formulario de registro -->
        <form action="<?= base_url('register') ?>" method="post">
            <div>
                <label for="username">Usuario:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div>
                <label for="password">Contraseña:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <label for="type">Tipo:</label>
                <select name="type" id="type" required>
                    <option value="standard">Standard</option>
                    <option value="admin">Admin</option>
                </select>
            </div>
            <button type="submit">Aceptar</button>
        </form>
        <p>Ya tienes cuenta? <a href="<?= base_url('login') ?>">Inicia sesión aqui</a>.</p>
    </div>
</body>
</html>