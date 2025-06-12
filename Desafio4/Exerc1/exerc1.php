<?php require_once 'Funcionario.php'; ?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Funcionário</title>
    <link rel="stylesheet" href="exerc1.css">
</head>

<body>
    <div class="container">
        <form method="post">
            <h2>Informações do Funcionário</h2>
            <label>Nome: <input type="text" name="nome" required></label>
            <label>Cargo: <input type="text" name="cargo" required></label>
            <label>Salário: <input type="number" step="0.01" name="salario" required></label>
            <label>Carga Horária Semanal: <input type="number" name="carga" required></label>
            <label>Bônus: <input type="number" step="0.01" name="bonus" required></label>
            <label>Horas Extras: <input type="number" name="extras" required></label>
            <div class="botoes">
                <button type="submit">Calcular</button>
                <button class="voltar" onclick="window.location.href='../index.php'">Voltar</button>
            </div>
        </form>

        <?php
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $func = new Funcionario(
                $_POST['nome'],
                $_POST['cargo'],
                (float)$_POST['salario'],
                (int)$_POST['carga']
            );
            echo "<div class='resultado-container'>";
            echo "<h3>Resultado:</h3>";
            echo $func->exibirDetalhes((float)$_POST['bonus'], (int)$_POST['extras']);
            echo "</div>";
        }
        ?>
    </div>
</body>


</html>