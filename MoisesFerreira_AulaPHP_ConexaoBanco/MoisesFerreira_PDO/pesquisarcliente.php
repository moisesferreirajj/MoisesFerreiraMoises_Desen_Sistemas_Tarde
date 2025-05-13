<?php

require_once 'conexao.php';

$conexao = conectarBanco();

$busca = $_GET["busca"] ?? "";

if (!$busca) {
    ?>
    <form action="pesquisarcliente.php" method="GET">
        <label for="busca">Digite o ID ou Nome:</label>
        <input type="text" name="busca" id="busca" required>
        <button type="submit">Pesquisar</button>
    </form>
    <?php
    exit;
}

//Escolha entre busca por ID ou Nome e faz a consulta diretamente
if (is_numeric($busca)) {
    $stmt = $conexao->prepare("SELECT id_cliente, nome, endereco, telefone, email FROM cliente WHERE id_cliente = :id");
    $stmt->bindParam("id", $busca, PDO::PARAM_INT);
} else {
    $stmt = $conexao->prepare("SELECT id_cliente, nome, endereco, telefone, email FROM cliente WHERE nome LIKE :nome");
    $buscaNome = "%$busca%";
    $stmt->bindParam("nome", $buscaNome, PDO::PARAM_STR);
}

$stmt->execute();
$clientes = $stmt->fetchAll();

if (!$clientes) {
    die("Erro: Nenhum cliente encontrado.");
}
?>

<h2>Você pesquisou "<?php echo htmlspecialchars(string: $busca); ?>", aqui estão alguns resultados abaixo:</h2>
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