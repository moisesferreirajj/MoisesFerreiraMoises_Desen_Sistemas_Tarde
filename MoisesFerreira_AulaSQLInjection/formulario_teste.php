<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Login Teste</title>
</head>
<body>
    <h2>Login Inseguro: </h2>
    <form action="login_inseguro.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>
        <button type="submit">Entrar</button>
    </form>

    <h2> Login Seguro: </h2>
    <form action="login_seguro.php" method="POST">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" required>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>