<?php
session_start();
require_once('./model/Usuario.php');
require_once('./model/Lista.php');

// 1) Verificar que el usuario esté logueado
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit();
}

// 2) Obtener datos del usuario desde la sesión
$nombre = $_SESSION['usuario_nombre'];
$correo = $_SESSION['usuario_correo'];

// 3) Obtener todos los usuarios para listarlos
$lista    = new Lista();
$usuarios = $lista->obtenerUsuarios();
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laboratorio 7</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
  <!-- Tarjeta de Bienvenida -->
  <div class="card mt-5">
    <div class="card-header bg-info text-white text-center fs-1">
      Bienvenido
    </div>
    <div class="card-body">
      <p><strong>Nombre:</strong> <?php echo htmlspecialchars($nombre); ?></p>
      <p><strong>E-mail:</strong> <?php echo htmlspecialchars($correo); ?></p>
    </div>
    <div class="card-footer text-end">
      <a href="salir.php" class="btn btn-danger btn-lg">Salir</a>
    </div>
  </div>

  <!-- Listado de todos los usuarios -->
  <div class="card mt-4">
    <div class="card-header text-center fs-2">
      Todos los Usuarios
    </div>
    <div class="card-body">
      <?php if (count($usuarios) === 0): ?>
        <p>No hay usuarios registrados.</p>
      <?php else: ?>
        <table class="table table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Nombre</th>
              <th>Correo</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($usuarios as $u): ?>
              <tr>
                <td><?php echo $u['id']; ?></td>
                <td><?php echo htmlspecialchars($u['nombre']); ?></td>
                <td><?php echo htmlspecialchars($u['correo']); ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      <?php endif; ?>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
