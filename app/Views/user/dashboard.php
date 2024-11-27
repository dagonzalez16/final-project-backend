<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('/global.css') ?>">
    <title>Dashboard de usuario</title>
</head>
<body>
    <h1>Bienvenido al dashboard!</h1>
    <h3>Usuario estandar</h3>

    <a href="<?= base_url('logout') ?>">Salir</a>

    <hr>

    <h2>Crear nueva imagen</h2>
    <form action="<?= base_url('user/createImage') ?>" method="post">
        <label for="name">Texto en la imagen:</label>
        <input type="text" id="name" name="name" required>
        <button type="submit">Crear imagen</button>
    </form>
</body>
</html>