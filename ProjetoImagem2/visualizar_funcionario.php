<?php
// Conexão com o banco de dados
$host = 'localhost';
$dbname = 'bd_imagem';
$username = 'root';
$password = '';

try {
    // Cria uma nova instância de PDO para conectar ao banco de dados
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verifica se o ID foi passado na URL
    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        // Recupera os dados do funcionário do banco de dados
        $sql = "SELECT nome, telefone, tipo_foto, foto FROM funcionarios WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        // Verifica se encontrou o funcionário
        if ($stmt->rowCount() > 0) {
            $funcionario = $stmt->fetch(PDO::FETCH_ASSOC);

            // Verifica se foi solicitado a exclusão do funcionário
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['excluir_id'])) {
                $excluir_id = $_POST['excluir_id'];
                $sql_excluir = "DELETE FROM funcionarios WHERE id = :id";
                $stmt_excluir = $pdo->prepare($sql_excluir);
                $stmt_excluir->bindParam(':id', $excluir_id, PDO::PARAM_INT);
                $stmt_excluir->execute();

                // Redireciona para a página de consulta após a exclusão
                header("Location: consulta_funcionario.php");
                exit();
            }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Visualizar Funcionário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- NAVBAR -->
    <nav class="custom-navbar">
        <div class="container-navbar d-flex justify-content-between align-items-center">
            <span class="navbar-brand fw-bold">Funcionários</span>
            <div class="dropdown">
                <button class="dropbtn">Menu &#9662;</button>
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
                <div class="card p-4 mt-4 text-center">
                    <h1 class="mb-4">Dados do Funcionário</h1>
                    <p><strong>Nome:</strong> <?= htmlspecialchars($funcionario['nome']) ?></p>
                    <p><strong>Telefone:</strong> <?= htmlspecialchars($funcionario['telefone']) ?></p>
                    <p><strong>Foto:</strong></p>
                    <div class="d-flex justify-content-center mb-4">
                        <img src="data:<?= $funcionario['tipo_foto'] ?>;base64,<?= base64_encode($funcionario['foto']) ?>" alt="Foto do Funcionário" class="img-fluid rounded shadow" style="max-width: 220px;">
                    </div>
                    <div class="row justify-content-center gap-0 mb-2">
                        <div class="col-6 d-flex justify-content-start">
                            <form method="POST" class="d-inline w-100 text-end">
                                <a href="consulta_funcionario.php" class="btn btn-secondary px-4 w-100">Voltar</a>
                            </form>
                        </div>
                        <div class="col-6 d-flex justify-content-end">
                            <form method="POST" class="d-inline w-100 text-end">
                                <input type="hidden" name="excluir_id" value="<?= $id ?>">
                                <button type="submit" class="btn btn-danger px-4 w-100"
                                    onclick="return confirm('Tem certeza que deseja excluir este funcionário?');">
                                    Excluir Funcionário
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
        Moises João Ferreira | TDESN - V3
    </footer>
</body>
</html>
<?php
        } else {
            echo "<div style='text-align:center;margin-top:40px;'><b>Funcionário não encontrado.</b></div>";
        }
    } else {
        echo "<div style='text-align:center;margin-top:40px;'><b>ID do funcionário não foi fornecido.</b></div>";
    }
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>