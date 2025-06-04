<?php
// dashboard.php
require_once 'config.php';

//verifica autenticação
if (!isset($_SESSION['usuario_id'])) {
    header('Location: login.php');
    exit;
}

$pdo = conectarBanco();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f2f5;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .header {
            background: #007bff;
            color: white;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .header a {
            color: white;
            text-decoration: none;
            background: #0056b3;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background 0.3s ease;
        }

        .header a:hover {
            background: #003f7f;
        }

        .menu {
            margin: 20px;
            text-align: center;
        }

        .menu a {
            text-decoration: none;
            color: #007bff;
            font-size: 18px;
            padding: 10px 20px;
            border: 1px solid #007bff;
            border-radius: 5px;
            transition: all 0.3s ease;
        }

        .menu a:hover {
            background: #007bff;
            color: white;
        }

        h2 {
            text-align: center;
            margin: 20px 0;
            color: #333;
        }

        table {
            width: 90%;
            margin: 0 auto;
            border-collapse: collapse;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background: white;
            border-radius: 8px;
            overflow: hidden;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        td {
            color: #555;
        }

        td:last-child {
            text-align: right;
        }

        @media (max-width: 768px) {
            table {
                width: 100%;
            }

            .header h1 {
                font-size: 20px;
            }

            .menu a {
                font-size: 16px;
            }
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Bem-vindo, <?php echo htmlspecialchars($_SESSION['usuario_nome']); ?>!</h1>
        <a href="logout.php">Sair</a>
    </div>
    <div class="menu">
        <a href="relatorio.php">Gerar Relatório PDF</a>
    </div>
    <h2>Lista de Produtos</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Estoque</th>
            <th>Valor Unitário</th>
        </tr>
        <?php
        $stmt = $pdo->query("SELECT * FROM produto");
        while ($produto = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
        <tr>
            <td><?= $produto['id_produto'] ?></td>
            <td><?= htmlspecialchars($produto['nome_prod']) ?></td>
            <td><?= htmlspecialchars($produto['descricao']) ?></td>
            <td><?= htmlspecialchars($produto['qtde']) ?></td>
            <td>R$ <?= number_format($produto['valor_unit'], 2, ',', '.') ?></td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>