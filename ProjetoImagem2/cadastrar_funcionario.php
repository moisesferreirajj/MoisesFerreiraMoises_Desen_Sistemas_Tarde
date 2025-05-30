<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav class="custom-navbar">
        <div class="container-navbar d-flex justify-content-between align-items-center">
            <span class="navbar-brand fw-bold">Funcionários</span>
            <div class="dropdown">
                <button class="dropbtn">Menu</button>
                <div class="dropdown-content">
                    <a href="index.php">Início</a>
                    <a href="cadastrar_funcionario.php">Cadastrar Funcionário</a>
                    <a href="consulta_funcionario.php">Consultar Funcionário</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="card p-4 mt-4">
                    <h1 class="mb-4 text-center">Formulário de Cadastro</h1>
                    <form action="salvar_funcionario.php" method="POST" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" id="nome" name="nome" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="telefone" class="form-label">Telefone:</label>
                            <input type="text" id="telefone" name="telefone" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto:</label>
                            <input type="file" id="foto" name="foto" accept="image/*" class="form-control" required>
                        </div>
                        <div class="d-flex justify-content-center gap-3">
                            <input type="submit" value="Cadastrar" class="btn btn-info px-4">
                            <input type="reset" value="Limpar" class="btn btn-secondary px-4">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <footer>
        Moises João Ferreira | TDESN - V3
    </footer>
</body>
</html>