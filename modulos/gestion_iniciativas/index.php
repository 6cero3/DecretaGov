<?php
require '../../includes/header.php';
require '../../includes/funciones.php';
require '../../includes/db.php';
redirigir_si_no_logueado();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = filter_input(INPUT_POST, 'titulo', FILTER_SANITIZE_STRING);
    $resumen = filter_input(INPUT_POST, 'resumen', FILTER_SANITIZE_STRING);
    if (isset($_FILES['documento']) && $_FILES['documento']['error'] === UPLOAD_ERR_OK) {
        $nombre = basename($_FILES['documento']['name']);
        $destino = 'uploads/' . $nombre;
        move_uploaded_file($_FILES['documento']['tmp_name'], $destino);
        $stmt = $pdo->prepare('INSERT INTO iniciativas (titulo, resumen, documento) VALUES (?,?,?)');
        $stmt->execute([$titulo, $resumen, $destino]);
    }
}
$iniciativas = $pdo->query('SELECT * FROM iniciativas ORDER BY id DESC')->fetchAll();
?>
<?php include '../../includes/sidebar.php'; ?>
<div class="ml-64 p-4">
    <h2 class="text-2xl mb-4">Gestión de Iniciativas</h2>
    <form action="" method="POST" enctype="multipart/form-data" class="mb-6 space-y-2">
        <input type="text" name="titulo" placeholder="Título" class="w-full p-2 border rounded" required>
        <textarea name="resumen" placeholder="Resumen" class="w-full p-2 border rounded" required></textarea>
        <input type="file" name="documento" class="w-full p-2 border rounded" required>
        <button type="submit" class="bg-green-500 text-white p-2 rounded">Guardar</button>
    </form>
    <table class="min-w-full bg-white">
        <thead>
            <tr>
                <th class="py-2">Título</th>
                <th class="py-2">Resumen</th>
                <th class="py-2">Documento</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($iniciativas as $ini): ?>
            <tr class="text-center border-t">
                <td class="py-2"><?= htmlspecialchars($ini['titulo']) ?></td>
                <td class="py-2"><?= htmlspecialchars($ini['resumen']) ?></td>
                <td class="py-2"><a href="<?= htmlspecialchars($ini['documento']) ?>" class="text-blue-500">Descargar</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require '../../includes/footer.php'; ?>
