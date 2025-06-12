<?php
require_once 'produto.php';

$resultado = null;
$erro = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    try {
        $nome = $_POST['nome'];
        $estoque = (int) $_POST['estoque'];
        $valorUnitario = (float) $_POST['valor'];
        $movimentacao = $_POST['movimentacao'];
        $quantidade = (int) $_POST['quantidade'];

        $produto = new Produto($nome, $estoque, $valorUnitario);

        if ($movimentacao === 'entrada') {
            $produto->entradaEstoque($quantidade);
        } elseif ($movimentacao === 'saida') {
            $produto->saidaEstoque($quantidade);
        }

        $resultado = $produto->getResumo();

    } catch (Exception $e) {
        $erro = $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercício 5 - Estoque</title>
    <link rel="stylesheet" href="exerc5.css">
</head>
<body>
    <div class="container">
        <form method="post">
            <h1 class="titulo">📦 Produto - Controle de Estoque</h1>

            <label>Nome do Produto:</label>
            <input type="text" name="nome" required>

            <label>Quantidade em Estoque:</label>
            <input type="number" name="estoque" required>

            <label>Valor Unitário (R$):</label>
            <input type="number" name="valor" step="0.01" required>

            <label>Movimentação:</label>
            <select name="movimentacao" required>
                <option value="entrada">Entrada</option>
                <option value="saida">Saída</option>
            </select>

            <label>Quantidade da Movimentação:</label>
            <input type="number" name="quantidade" required>

            <div class="botoes">
                <button type="submit">Aplicar</button>
                <button type="button" class="voltar" onclick="window.location.href='../index.php'">Voltar</button>
            </div>
        </form>

        <?php if ($erro): ?>
            <div class="resultado" style="border-left-color: #e74c3c;">
                <h2>Erro</h2>
                <p><?= $erro ?></p>
            </div>
        <?php elseif ($resultado): ?>
            <div class="resultado">
                <h2>Resumo do Produto</h2>
                <p><strong>Nome:</strong> <?= $resultado['nome'] ?></p>
                <p><strong>Estoque Atual:</strong> <?= $resultado['estoque'] ?></p>
                <p><strong>Valor Unitário:</strong> R$ <?= $resultado['valor_unitario'] ?></p>
                <p><strong>Valor Total em Estoque:</strong> R$ <?= $resultado['valor_total'] ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
