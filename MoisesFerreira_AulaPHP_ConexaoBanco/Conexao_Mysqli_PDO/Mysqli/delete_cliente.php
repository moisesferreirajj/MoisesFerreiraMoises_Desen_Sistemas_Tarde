<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Estabelecendo conexão
$conexao = conectadb();

// Define o ID do cliente a ser excluído
$id_cliente = 10;

// Prepara a consulta SQL segura
$stmt = $conexao->prepare('DELETE FROM cliente WHERE id_cliente = ?');
$stmt->bind_param('i', $id_cliente);

if ($stmt->execute()) {
    echo "Cliente número $id_cliente removido com sucesso!";
} else {
    echo "Erro ao remover cliente $id_cliente: " . $stmt->error;
}

// Fecha a conexão com o banco de dados
$stmt->close();
$conexao->close();

?>