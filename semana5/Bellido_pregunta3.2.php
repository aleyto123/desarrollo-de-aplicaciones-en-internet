<?php
/*
Nombre: Bellido Chambi Rony Widmer
Fecha: 17/04/2025
*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cantidad = $_POST["cantidad"];
    $tipo = $_POST["tipo"];
    $tamano = $_POST["tamano"];
    $precio = $_POST["precio"];

    if ($tipo == "A") {
        if ($tamano == "1") {
            $ajuste = 0.20;
        } else {
            $ajuste = 0.30;
        }
        $precioFinal = $precio + $ajuste;
    } else { 
        if ($tamano == "1") {
            $ajuste = -0.30;
        } else {
            $ajuste = -0.50;
        }
        $precioFinal = $precio + $ajuste;
    }

    $gananciaFinal = $cantidad * $precioFinal;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado Asociación de Vinicultores</title>
    <link rel="stylesheet" href="Bellido_pregunta3.4.css">
</head>
<body>
    <div class="container">
        <h2>Pregunta 3 - Asociación de Vinicultores</h2>
        <div class="resultado-grid">
            <div>
                <div><strong>Cantidad de uva (kg):</strong></div>
                <div><?= $cantidad ?></div>
                <div><strong>Precio inicial por kg (S/):</strong></div>
                <div><?= number_format($precio, 2) ?></div>
            </div>
            <div>
                <div><strong>Tipo de uva:</strong></div>
                <div><?= $tipo == "A" ? "Tipo A" : "Tipo B" ?></div>
                <div><strong>Tamaño de uva:</strong></div>
                <div>Tamaño <?= $tamano ?></div>
            </div>
        </div>
        <div class="ganancia-final">
            Ganancia Final: S/ <?= number_format($gananciaFinal, 2) ?>
        </div>
        <div class="footer">
            Desarrollo de Aplicaciones en Internet
        </div>
    </div>
</body>
</html>