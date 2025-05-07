<?php
require_once 'conexao.php';

$conexao = conectarBanco();

//Obtendo ID via GET
$id_cliente = $_GET['id_cliente'] ?? null;
$cliente = null;
$msgErro = "";

// Função local para buscar clientes por ID

function buscarClientePorId($idCliente, $conexao) {
    $stmt = $conexao->prepare("SELECT * FROM cliente WHERE id_cliente = :id");
    $stmt->bindParam(':id', $idCliente, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch();
}

if($idCliente && is_numeric($idCliente)) {
    $cliente = buscarClientePorId($id_cliente, $conexao);

    if ($cliente) {
    $msgErro = "Erro: Cliente não encontrado.";
    }
}
else {
    $msgErro = "Digite o ID do cliente para buscar dados.";
}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Cliente</title>
    <script>
        function habilitarEdicao(campo) {
            document.getElementById(campo).removeAttribute("readonly");
        }
    </script>
</head>
<body>
    <?php if ($msgErro): ?>
        <p style="color: red;"><?= htmlspecialchars($msgErro) ?></p>
        <form action="atualizarcliente.php" method="GET">
            <label for="id">ID do Cliente:</label>
            <input type="number" id="id" name="id" required>
            <button type="submit">Buscar</button>
        </form>
    <?php else: ?>
<!-- Se o cliente for encontrado, exibe o formulário preenchido -->
        <h2>Atualizar Cliente</h2>
        <form action="processarAtualizacao.php" method="POST">
            <input type="hidden" name="id_cliente" value="<?= htmlspecialchars($cliente['id_cliente']) ?>">
            
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" value="<?= htmlspecialchars($cliente['nome']) ?>" readonly onclick="habilitarEdicao('nome')"><br><br>

            <label for="endereco">Endereço:</label>
            <input type="text" id="endereco" name="endereco" value="<?= htmlspecialchars($cliente['endereco']) ?>" readonly onclick="habilitarEdicao('endereco')"><br><br>

            <label for="telefone">Telefone:</label>
            <input type="text" id="telefone" name="telefone" value="<?= htmlspecialchars($cliente['telefone']) ?>" readonly onclick="habilitarEdicao('telefone')"><br><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?= htmlspecialchars($cliente['email']) ?>" readonly onclick="habilitarEdicao('email')"><br><br>

            <button type="submit">Atualizar Cliente</button>
        </form>
    <?php endif; ?>
</body>
</html>