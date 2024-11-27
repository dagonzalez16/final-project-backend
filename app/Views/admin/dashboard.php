<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('/admin.css') ?>">
    <title>Administrador</title>
</head>
<body>
    <h1>Administración de usuarios</h1>
    <h2>Lista de usuarios</h2>

    <?php if (session()->getFlashdata('success')) : ?>
        <p style="color: green;"><?= session()->getFlashdata('success') ?></p>
    <?php endif; ?>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Usuario</th>
                <th>Tipo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['username'] ?></td>
                    <td><?= $user['type'] ?></td>
                    <td>
                        <a href="<?= base_url('admin/edit/' . $user['id']) ?>">Editar</a>
                        <a href="<?= base_url('admin/delete/' . $user['id']) ?>" onclick="return confirm('Estás seguro?')">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
    <p><a href="<?= base_url('logout') ?>" style="color: red;">Salir</a></p>
</body>
</html>