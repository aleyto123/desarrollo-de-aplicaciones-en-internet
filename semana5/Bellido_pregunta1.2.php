<?php
/*
Nombre: Bellido Chambi Rony Widmer
Fecha: 17/04/2025
*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $a = $_POST["a"];
    $b = $_POST["b"];
    $c = $_POST["c"];

    $p = ($a + $b + $c) / 2;
    $area = sqrt($p * ($p - $a) * ($p - $b) * ($p - $c));
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado - Área del Triángulo</title>
    <link rel="stylesheet" href="Bellido_pregunta1.3.css">
</head>
<body>
    <div class="container">
        <h1>Resultado - Área del Triángulo</h1>
        <span><strong>Lado a:</strong> <?= htmlspecialchars($a) ?></span>
        <span><strong>Lado b:</strong> <?= htmlspecialchars($b) ?></span>
        <span><strong>Lado c:</strong> <?= htmlspecialchars($c) ?></span>
        <p><strong>Área:</strong> <?= round($area, 2) ?> unidades²</p>
    </div>
</body>
</html>
