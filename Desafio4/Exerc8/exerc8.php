<?php
require_once 'calculadora.php';

$resultado = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $valor = (float) $_POST['valor'];
    $parcelas = (int) $_POST['parcelas'];
    $juros = (float) $_POST['juros'];

    $calc = new CalculadoraFinanceira($valor, $parcelas, $juros);
    $resultado = $calc->getResumo();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercício 8 - Calculadora Financeira</title>
    <link rel="stylesheet" href="exerc8.css">
</head>
<body>
    <div class="container">
        <form method="post">
            <h1 class="titulo">📊 Calculadora Financeira</h1>

            <label>Valor da Compra (R$):</label>
            <input type="number" name="valor" step="0.01" required>

            <label>Número de Parcelas:</label>
            <input type="number" name="parcelas" required>

            <label>Taxa de Juros Mensal (%):</label>
            <input type="number" name="juros" step="0.01" required>

            <div class="botoes">
                <button type="submit">Calcular</button>
                <button type="button" class="voltar" onclick="window.location.href='../index.php'">Voltar</button>
            </div>
        </form>

        <?php if ($resultado): ?>
        <div class="resultado">
            <h2>Resumo do Financiamento</h2>
            <p><strong>Valor da Parcela:</strong> R$ <?= $resultado['parcela'] ?></p>
            <p><strong>Total a Pagar:</strong> R$ <?= $resultado['total'] ?></p>
            <p><strong>Juros Totais:</strong> R$ <?= $resultado['juros'] ?></p>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
