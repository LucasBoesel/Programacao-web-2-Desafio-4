<?php
require_once 'carro.php';

$resultado = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $modelo = $_POST['modelo'];
    $combustivel = $_POST['combustivel'];
    $tanque = (float) $_POST['tanque'];
    $consumo = (float) $_POST['consumo'];
    $kmRodados = (int) $_POST['kmRodados'];

    $carro = new Carro($modelo, $combustivel, $tanque, $consumo, $kmRodados);
    $resultado = $carro->getResumo();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Exercício 4 - Carro</title>
    <link rel="stylesheet" href="exerc4.css">
</head>
<body>
    <div class="container">
        <form method="post">
            <h1 class="titulo">🚗 Carro - Autonomia e Revisão</h1>
            <label>Modelo:</label>
            <input type="text" name="modelo" required>

            <label>Combustível:</label>
            <select name="combustivel" required>
                <option value="etanol">Etanol</option>
                <option value="gasolina">Gasolina</option>
            </select>

            <label>Tanque Cheio (litros):</label>
            <input type="number" name="tanque" step="0.1" required>

            <label>Consumo (km/l):</label>
            <input type="number" name="consumo" step="0.1" required>

            <label>Km Rodados:</label>
            <input type="number" name="kmRodados" required>

            <div class="botoes">
                <button type="submit">Calcular</button>
                <button type="button" class="voltar" onclick="window.location.href='../index.php'">Voltar</button>
            </div>
        </form>

        <?php if ($resultado): ?>
        <div class="resultado">
            <h2>Resumo do Carro</h2>
            <p><strong>Modelo:</strong> <?= $resultado['modelo'] ?></p>
            <p><strong>Autonomia:</strong> <?= $resultado['autonomia'] ?> km</p>
            <p><strong>Custo por Km:</strong> R$ <?= $resultado['custo_km'] ?></p>
            <p><strong>Precisa de Revisão:</strong> <?= $resultado['revisao'] ?></p>
        </div>
        <?php endif; ?>
    </div>
</body>
</html>
