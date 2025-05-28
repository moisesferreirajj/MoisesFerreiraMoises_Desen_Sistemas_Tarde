<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta Funcionário</title>
</head>
<body>
    <h1>Consulta de Funcionários</h1>

    <ul>
        <?php foreach ($funcionarios as $funcionario): ?>
            <li>
                <a href="visualizar_funcionario.php?id=<? $funcionario['id'] ?>">
                    <?= htmlspecialchars($funcionario['nome']) ?>
                </a>

                <form>
                    
                </form>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>