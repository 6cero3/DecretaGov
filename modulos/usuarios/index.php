<?php
require '../../includes/header.php';
require '../../includes/funciones.php';
require '../../includes/db.php';
redirigir_si_no_logueado();

$usuarios = $pdo->query('SELECT id, usuario FROM usuarios')->fetchAll();
?>
<?php include '../../includes/sidebar.php'; ?>
<div class="ml-64 p-4">
    <h2 class="text-2xl mb-4">Usuarios</h2>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">ID</th>
                <th class="py-2">Usuario</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($usuarios as $u): ?>
            <tr class="text-center border-t">
                <td class="py-2"><?= $u['id'] ?></td>
                <td class="py-2"><?= htmlspecialchars($u['usuario']) ?></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require '../../includes/footer.php'; ?>
