<?php
/*
Nombre: Bellido Chambi Rony Widmer
Fecha: 17/04/2025
*/

function generarTrianguloPascal($n) {
    $triangulo = [];
    for ($i = 0; $i < $n; $i++) {
        $triangulo[$i] = [];
        for ($j = 0; $j <= $i; $j++) {
            if ($j == 0 || $j == $i) {
                $triangulo[$i][$j] = 1;
            } else {
                $triangulo[$i][$j] = $triangulo[$i - 1][$j - 1] + $triangulo[$i - 1][$j];
            }
        }
    }
    return $triangulo;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $filas = $_POST["filas"];
    $triangulo = generarTrianguloPascal($filas);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultado - Triángulo de Pascal</title>
    <link rel="stylesheet" href="Bellido_pregunta2.3.css">
    <style>
        
    </style>
</head>
<body>
    <div class="container">
        <h2>Pregunta 2- Triángulo de Pascal</h2>

        <?php if (isset($filas)): ?>
            <div class="numero-filas">
                Número de Filas Generadas: <?php echo $filas; ?>
            </div>
        <?php endif; ?>

        <div class="resultado">
            <?php
            foreach ($triangulo as $fila) {
                echo "<div class='fila'>";
                foreach ($fila as $valor) {
                    echo "<div class='valor'>$valor</div>";
                }
                echo "</div>";
            }
            ?>
        </div>
    </div>
</body>
</html>
















