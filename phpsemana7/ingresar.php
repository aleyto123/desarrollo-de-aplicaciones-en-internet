<?php
session_start();

require_once('./model/Lista.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $clave  = $_POST['clave'];

    $lista   = new Lista();
    $usuario = $lista->verificarCredenciales($correo, $clave);

    if ($usuario) {
        // Guardamos id, nombre y correo en la sesión
        $_SESSION['usuario_id']     = $usuario['id'];
        $_SESSION['usuario_nombre'] = $usuario['nombre'];
        $_SESSION['usuario_correo'] = $usuario['correo'];

        header("Location: index.php");
        exit();
    } else {
        $error_message = "Credenciales incorrectas.";
        header("Location: login.php?error=" . urlencode($error_message));
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}
