<?php
require_once('./model/Usuario.php');
require_once('./model/Lista.php');

// Iniciamos la sesión
session_start();

// Obtenemos los datos del registro
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$clave = $_POST['clave'];

// Creamos una instancia de Lista
$lista = new Lista();

// Agregamos el nuevo usuario a la base de datos
$lista->agregarUsuario($nombre, $correo, $clave);

// Redirigimos al usuario
header('Location: index.php');
?>