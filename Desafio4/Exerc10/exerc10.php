<?php
require_once 'reserva.php';

$resultado = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'];
    $noites = (int) $_POST['noites'];
    $quarto = $_POST['quarto'];

    $reserva = new ReservaHotel($nome, $noites, $quarto);
    $resultado = $reserva->getResumo();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercício 10 - Reserva de Hotel</title>
    <link rel="stylesheet" href="exerc10.css">
</head>
<body>
    <div class="container">
        <form method="post">
            <h1 class="titulo">🏨 Reserva de Hotel</h1>

            <label>Nome do Hóspede:</label>
            <input type="text" name="nome" required>

            <label>Número de Noites:</label>
            <input type="number" name="noites" required>

            <label>Tipo de Quarto:</label>
            <select name="quarto" required>
                <option value="simples">Simples - R$ 120</option>
                <option value="luxo">Luxo - R$ 200</option>
                <option value="suite">Suíte - R$ 350</option>
            </select>

            <div class="botoes">
                <button type="submit">Reservar</button>
                <button type="button" class="voltar" onclick="window.location.href='../index.php'">Voltar</button>
            </div>
        </form>

        <?php if ($resultado): ?>
        <div class="resultado">
            <h2>Resumo da Reserva</h2>
            <p><strong><?= $resultado['mensagem'] ?></strong></p>
            <p><strong>Quarto:</strong> <?= $resultado['quarto'] ?></p>
            <p><strong>Noites:</strong> <?= $resultado['noites'] ?></p>
            <p><strong>Valor Final:</strong> <?= $resultado['valor'] ?></p>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
