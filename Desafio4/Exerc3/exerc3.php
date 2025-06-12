<?php
require_once 'pedido.php';

$resultado = null;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produto = $_POST['produto'];
    $quantidade = (int) $_POST['quantidade'];
    $preco = (float) $_POST['preco'];
    $cliente = $_POST['cliente'];

    $pedido = new Pedido($produto, $quantidade, $preco, $cliente);
    $resultado = $pedido->getResumo();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Exercício 3 - Pedido</title>
    <link rel="stylesheet" href="exerc3.css">
</head>

<body>
    <div class="container">
        <form method="post">
            <h1 class="titulo">📦 Pedido - Cálculo de Totais</h1>
            <label>Produto:</label>
            <input type="text" name="produto" required>

            <label>Quantidade:</label>
            <input type="number" name="quantidade" min="1" required>

            <label>Preço Unitário (R$):</label>
            <input type="number" name="preco" step="0.01" min="0" required>

            <label>Tipo de Cliente:</label>
            <select name="cliente" required>
                <option value="normal">Normal</option>
                <option value="premium">Premium</option>
            </select>
            <div class="botoes">
                <button type="submit">Calcular</button>
                <button class="voltar" onclick="window.location.href='../index.php'">Voltar</button>
            </div>
        </form>

        <?php if ($resultado): ?>
            <div class="resultado">
                <h2>Resumo do Pedido</h2>
                <p><strong>Produto:</strong> <?= $resultado['produto'] ?></p>
                <p><strong>Total Bruto:</strong> R$ <?= $resultado['total_bruto'] ?></p>
                <p><strong>Desconto:</strong> R$ <?= $resultado['desconto'] ?></p>
                <p><strong>Imposto:</strong> R$ <?= $resultado['imposto'] ?></p>
                <p><strong>Total Final:</strong> R$ <?= $resultado['total_final'] ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>