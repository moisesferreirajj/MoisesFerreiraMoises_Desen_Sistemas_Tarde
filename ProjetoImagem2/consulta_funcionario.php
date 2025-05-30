<?php
// Conexão com o banco de dados
$host = 'localhost';
$dbname = 'bd_imagem';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Busca todos os funcionários
    $sql = "SELECT id, nome, telefone FROM funcionarios";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Consulta Funcionário</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <div class="col-lg-8">
                <div class="card p-4">
                    <h1 class="mb-4 text-center">Consulta de Funcionários</h1>
                    <?php if (count($funcionarios) > 0): ?>
                        <table class="table table-striped table-hover align-middle">
                            <thead class="table-primary">
                                <tr>
                                    <th>ID</th>
                                    <th>Nome</th>
                                    <th>Telefone</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($funcionarios as $funcionario): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($funcionario['id']) ?></td>
                                        <td><?= htmlspecialchars($funcionario['nome']) ?></td>
                                        <td><?= htmlspecialchars($funcionario['telefone']) ?></td>
                                        <td>
                                            <a href="visualizar_funcionario.php?id=<?= urlencode($funcionario['id']) ?>" class="btn btn-info btn-sm">Visualizar</a>
                                            <a href="salvar_funcionario.php?excluir_id=<?= urlencode($funcionario['id']) ?>"
                                               class="btn btn-danger btn-sm ms-2"
                                               onclick="return confirm('Tem certeza que deseja excluir este funcionário?');">
                                               Excluir
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <div class="alert alert-warning text-center">Nenhum funcionário cadastrado.</div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <footer>
        Moises João Ferreira | TDESN - V3
    </footer>
</body>
</html>