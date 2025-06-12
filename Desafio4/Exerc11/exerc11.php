<?php
require_once 'geometria.php';

$resultado = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $figura = $_POST['figura'];
    $valor1 = (float) $_POST['valor1'];
    $valor2 = isset($_POST['valor2']) ? (float) $_POST['valor2'] : null;

    $calc = new CalculadoraGeometrica($figura, $valor1, $valor2);
    $resultado = [
        'figura' => $calc->getFigura(),
        'area' => $calc->calcularArea()
    ];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercício 11 - Calculadora Geométrica</title>
    <link rel="stylesheet" href="exerc11.css">
    <script>
        function atualizarCampos() {
            const figura = document.querySelector("select[name='figura']").value;
            const campo2 = document.getElementById("campo2");
            if (figura === 'retangulo') {
                campo2.style.display = 'block';
                campo2.querySelector('input').required = true;
            } else {
                campo2.style.display = 'none';
                campo2.querySelector('input').required = false;
            }
        }
    </script>
</head>
<body onload="atualizarCampos()">
    <div class="container">
        <form method="post">
            <h1 class="titulo">📐 Calculadora Geométrica</h1>

            <label>Figura:</label>
            <select name="figura" onchange="atualizarCampos()" required>
                <option value="quadrado">Quadrado</option>
                <option value="retangulo">Retângulo</option>
                <option value="circulo">Círculo</option>
            </select>

            <label id="label1">Valor 1 (lado, base ou raio):</label>
            <input type="number" name="valor1" step="0.01" required>

            <div id="campo2">
                <label>Valor 2 (altura):</label>
                <input type="number" name="valor2" step="0.01">
            </div>

            <div class="botoes">
                <button type="submit">Calcular</button>
                <button type="button" class="voltar" onclick="window.location.href='../index.php'">Voltar</button>
            </div>
        </form>

        <?php if ($resultado): ?>
        <div class="resultado">
            <h2>Resultado</h2>
            <p><strong>Figura:</strong> <?= $resultado['figura'] ?></p>
            <p><strong>Área:</strong> <?= $resultado['area'] ?> m²</p>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
