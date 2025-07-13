<?php
require 'includes/db.php';
session_start();
$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
$contrasena = filter_input(INPUT_POST, 'contrasena', FILTER_SANITIZE_STRING);

$stmt = $pdo->prepare('SELECT id, contrasena FROM usuarios WHERE usuario = ?');
$stmt->execute([$usuario]);
$user = $stmt->fetch();
if ($user && password_verify($contrasena, $user['contrasena'])) {
    $_SESSION['usuario_id'] = $user['id'];
    header('Location: dashboard.php');
    exit;
} else {
    echo 'Credenciales inválidas';
}
?>
