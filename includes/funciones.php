<?php
function esta_logueado() {
    return isset($_SESSION['usuario_id']);
}

function redirigir_si_no_logueado() {
    if (!esta_logueado()) {
        header('Location: /login.php');
        exit;
    }
}
?>
