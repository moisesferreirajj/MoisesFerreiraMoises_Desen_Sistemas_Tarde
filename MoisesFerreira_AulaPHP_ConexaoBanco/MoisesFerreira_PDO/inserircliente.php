<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
</head>
<body>
    <h2>Cadastro de Cliente</h2>
    <form action="processarinsercao.php" method="POST">
        <label for="nome" id="nome" name="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="endereco" id="endereco" name="endereco">Endereço:</label>
        <input type="text" id="endereco" name="endereco" required><br><br>

        <label for="telefone" id="telefone" name="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required><br><br>

        <label for="email" id="email" name="email">Email:</label>
        <input type="email" id="email" name="email" required><br><br>

        <button type="submit">Cadastrar Cliente</button>
    </form>
</body>
</html>