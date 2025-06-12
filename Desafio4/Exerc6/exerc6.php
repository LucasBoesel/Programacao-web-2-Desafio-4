<?php
require_once 'conversor.php';

$resultado = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $valor = (float) $_POST['valor'];
    $moeda = $_POST['moeda'];
    $cotacao = (float) $_POST['cotacao'];

    $conversor = new ConversorMoeda($valor, $moeda, $cotacao);
    $resultado = $conversor->converter();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercício 6 - Conversor de Moeda</title>
    <link rel="stylesheet" href="exerc6.css">
</head> 
<body>
    <div class="container">
        <form method="post">
            <h1 class="titulo">💱 Conversor de Moeda</h1>

            <label>Valor em Reais (R$):</label>
            <input type="number" name="valor" step="0.01" required>

            <label>Moeda de Destino:</label>
            <select name="moeda" required>
                <option value="USD">Dólar (USD)</option>
                <option value="EUR">Euro (EUR)</option>
            </select>

            <label>Cotação Atual:</label>
            <input type="number" name="cotacao" step="0.01" required>

            <div class="botoes">
                <button type="submit">Converter</button>
                <button type="button" class="voltar" onclick="window.location.href='../index.php'">Voltar</button>
            </div>
        </form>

        <?php if ($resultado !== null): ?>
        <div class="resultado">
            <h2>Resultado</h2>
            <p><strong>Valor Convertido:</strong> <?= $resultado ?></p>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
