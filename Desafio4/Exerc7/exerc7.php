<?php
require_once 'viagem.php';

$resultado = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $origem = $_POST['origem'];
    $destino = $_POST['destino'];
    $distancia = (float) $_POST['distancia'];
    $tempo = (float) $_POST['tempo'];
    $veiculo = $_POST['veiculo'];
    $precoCombustivel = (float) $_POST['precoCombustivel'];

    $viagem = new Viagem($origem, $destino, $distancia, $tempo, $veiculo, $precoCombustivel);
    $resultado = $viagem->getResumo();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercício 7 - Viagem</title>
    <link rel="stylesheet" href="exerc7.css">
</head>
<body>
    <div class="container">
        <form method="post">
            <h1 class="titulo">🧭 Planejamento de Viagem</h1>

            <label>Origem:</label>
            <input type="text" name="origem" required>

            <label>Destino:</label>
            <input type="text" name="destino" required>

            <label>Distância (km):</label>
            <input type="number" name="distancia" step="0.1" required>

            <label>Tempo Estimado (horas):</label>
            <input type="number" name="tempo" step="0.1" required>

            <label>Tipo de Veículo:</label>
            <select name="veiculo" required>
                <option value="carro">Carro (10 km/l)</option>
                <option value="moto">Moto (25 km/l)</option>
                <option value="caminhao">Caminhão (5 km/l)</option>
            </select>

            <label>Preço do Combustível (R$/litro):</label>
            <input type="number" name="precoCombustivel" step="0.01" required>

            <div class="botoes">
                <button type="submit">Calcular</button>
                <button type="button" class="voltar" onclick="window.location.href='../index.php'">Voltar</button>
            </div>
        </form>

        <?php if ($resultado): ?>
        <div class="resultado">
            <h2>Resumo da Viagem</h2>
            <p><strong>De:</strong> <?= $resultado['origem'] ?> <strong>até</strong> <?= $resultado['destino'] ?></p>
            <p><strong>Velocidade Média:</strong> <?= $resultado['velocidade'] ?> km/h</p>
            <p><strong>Consumo Estimado:</strong> <?= $resultado['consumo'] ?> litros</p>
            <p><strong>Custo da Viagem:</strong> R$ <?= $resultado['custo'] ?></p>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
