<?php
require_once 'pessoa.php';

$resultado = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $peso = (float) $_POST['peso'];
    $altura = (float) $_POST['altura'];

    $pessoa = new Pessoa($nome, $peso, $altura);
    $resultado = $pessoa->getResumo();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercício 9 - IMC</title>
    <link rel="stylesheet" href="exerc9.css">
</head>
<body>
    <div class="container">
        <form method="post">
            <h1 class="titulo">🧍‍♂️ Cálculo de IMC</h1>

            <label>Nome:</label>
            <input type="text" name="nome" required>

            <label>Peso (kg):</label>
            <input type="number" name="peso" step="0.1" required>

            <label>Altura (m):</label>
            <input type="number" name="altura" step="0.01" required>

            <div class="botoes">
                <button type="submit">Calcular</button>
                <button type="button" class="voltar" onclick="window.location.href='../index.php'">Voltar</button>
            </div>
        </form>

        <?php if ($resultado): ?>
        <div class="resultado">
            <h2>Resultado</h2>
            <p><strong>Nome:</strong> <?= $resultado['nome'] ?></p>
            <p><strong>IMC:</strong> <?= $resultado['imc'] ?></p>
            <p><strong>Classificação:</strong> <?= $resultado['classificacao'] ?></p>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
