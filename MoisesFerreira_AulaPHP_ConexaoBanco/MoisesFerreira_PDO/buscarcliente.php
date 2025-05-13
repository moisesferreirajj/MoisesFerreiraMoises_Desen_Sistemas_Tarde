<?php
require_once 'conexao.php';

$conexao = conectarBanco();

// Consulta todos os clientes do banco
// Ordena por nome para melhor visualização
$sql = "SELECT id_cliente, nome, endereco, telefone, email FROM cliente ORDER BY nome ASC";
$stmt = $conexao->prepare($sql);
$stmt->execute();
$clientes = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
</head>
<body>
    <h2>Todos os clientes cadastrados:</h2>
    <?php if (!$clientes): ?>
        <p style="color: red;">Nenhum cliente encontrado.</p>
    <?php else: ?>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Telefone</th>
            <th>Email</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?php echo htmlspecialchars($cliente['id_cliente']); ?></td>
                <td><?php echo htmlspecialchars($cliente['nome']); ?></td>
                <td><?php echo htmlspecialchars($cliente['endereco']); ?></td>
                <td><?php echo htmlspecialchars($cliente['telefone']); ?></td>
                <td><?php echo htmlspecialchars($cliente['email']); ?></td>
                <td>
                    <a href="atualizarcliente.php?id=<?php echo $cliente['id_cliente']; ?>">Editar</a> |
                    <a href="deletarcliente.php?id=<?php echo $cliente['id_cliente']; ?>">Excluir</a>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="6">
                <a href="pesquisarcliente.php">Voltar</a>
            </td>
        </tr>
    </table>
    <?php endif; ?>
</body>
</html>