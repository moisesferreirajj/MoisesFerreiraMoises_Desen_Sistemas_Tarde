<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário Cadastro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Formulário de Cadastro</h1>
        <form action="salvar_funcionario.php" method="POST" enctype="multipart/form-data">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>
        <br>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required>
        <br>

        <label for="foto">Foto:</label>
        <input type="file" id="foto" name="foto" accept="image/*" required>
        <br>

        <input type="submit" value="Cadastrar">
        <input type="reset" value="Limpar">
        </form>
    </div>
</body>
</html>