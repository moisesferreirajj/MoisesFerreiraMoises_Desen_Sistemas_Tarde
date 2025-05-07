<?php
require 'conexao.php';

$conexao = conectarBanco();
$stmt = $conexao->prepare('SELECT * FROM cliente');
$stmt->execute();
$clientes = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Clientes</title>    
</head>

<body>
    <h2>Lista de Clientes</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Data de Nascimento</th>
        </tr>

        <?php foreach ($clientes as $cliente): ?>
            <tr>
                <td><?= htmlspecialchars($cliente["id_cliente"]) ?></td>
                <td><?= htmlspecialchars($cliente["nome"]) ?></td>
                <td><?= htmlspecialchars($cliente["endereco"]) ?></td>
                <td><?= htmlspecialchars($cliente["telefone"]) ?></td>
                <td><?= htmlspecialchars($cliente["email"]) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>