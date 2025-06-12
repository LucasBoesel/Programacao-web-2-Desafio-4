<?php
require_once 'Aluno.php';

$resultado = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = $_POST['nome'] ?? '';
    $disciplina = $_POST['disciplina'] ?? '';
    $nota1 = $_POST['nota1'] ?? 0;
    $nota2 = $_POST['nota2'] ?? 0;
    $nota3 = $_POST['nota3'] ?? 0;

    $aluno = new Aluno($nome, $disciplina, [$nota1, $nota2, $nota3]);
    $resultado = $aluno->getResumo();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <title>Exercício 2 - Classe Aluno</title>
    <link rel="stylesheet" href="exerc2.css" />
</head>

<body>
    <div class="container">
        <form method="post" action="">
            <h1>Cadastro de Aluno</h1>

            <label for="nome">Nome completo:</label>
            <input type="text" id="nome" name="nome" required />

            <label for="disciplina">Disciplina:</label>
            <input type="text" id="disciplina" name="disciplina" required />

            <label for="nota1">Nota 1:</label>
            <input type="number" id="nota1" name="nota1" step="0.01" min="0" max="10" required />

            <label for="nota2">Nota 2:</label>
            <input type="number" id="nota2" name="nota2" step="0.01" min="0" max="10" required />

            <label for="nota3">Nota 3:</label>
            <input type="number" id="nota3" name="nota3" step="0.01" min="0" max="10" required />

            <div class="botoes">
                <button type="submit">Calcular</button>
                <button class="voltar" onclick="window.location.href='../index.php'">Voltar</button>
            </div>
        </form>

        <div class="resultado-container">
            <?php if (isset($aluno)): ?>
                <ul>
                    <li>
                        Aluno: <?= htmlspecialchars($aluno->getNome()) ?><br>
                        Disciplina: <?= htmlspecialchars($aluno->getDisciplina()) ?><br>
                        Média: <?= number_format($aluno->calcularMedia(), 2, ',', '.') ?><br>
                        Status: <strong class="<?= $aluno->getStatusClass() ?>"><?= $aluno->getStatus() ?></strong>
                    </li>
                </ul>
            <?php else: ?>
                <p>Preencha o formulário e clique em calcular.</p>
            <?php endif; ?>
        </div>
</body>

</html>