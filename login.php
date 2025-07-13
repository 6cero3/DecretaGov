<?php
require 'includes/header.php';
require 'includes/funciones.php';
if (esta_logueado()) {
    header('Location: dashboard.php');
    exit;
}
?>
<div class="flex items-center justify-center h-screen">
    <div class="bg-white p-8 rounded shadow-md w-96">
        <h1 class="text-2xl mb-4 text-center">Ingreso a DECRETA</h1>
        <form action="procesar_login.php" method="POST" class="space-y-4">
            <input type="text" name="usuario" placeholder="Usuario" class="w-full p-2 border rounded" required>
            <input type="password" name="contrasena" placeholder="Contraseña" class="w-full p-2 border rounded" required>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded">Entrar</button>
        </form>
    </div>
</div>
<?php require 'includes/footer.php'; ?>
