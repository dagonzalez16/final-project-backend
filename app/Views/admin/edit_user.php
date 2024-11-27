<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('/global.css') ?>">
    <title>Editar usuario</title>
</head>
<body>
    <h1>Editar usuario</h1>

    <form action="<?= base_url('admin/update/' . $user['id']) ?>" method="post">
        <label for="username">Usuario:</label>
        <input type="text" name="username" value="<?= $user['username'] ?>" required>
        
        <label for="type">Tipo:</label>
        <select name="type">
            <option value="standard" <?= $user['type'] === 'standard' ? 'selected' : '' ?>>Standard</option>
            <option value="admin" <?= $user['type'] === 'admin' ? 'selected' : '' ?>>Admin</option>
        </select>

        <button type="submit">Aceptar</button>
    </form>
</body>
</html>