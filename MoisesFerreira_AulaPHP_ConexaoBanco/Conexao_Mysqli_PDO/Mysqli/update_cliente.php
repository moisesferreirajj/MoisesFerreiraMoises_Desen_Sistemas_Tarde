<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Estabelecendo conexão
$conexao = conectadb();

// Define os novos valores
$nome = 'Mark Boladao';
$endereco = 'Rua Joinville, 123';
$telefone = '(47) 5555-5555';
$email = 'mark_stolfi@estudante.sesisenai.org.br';
// Irei trocar a Ana Paula Silva para Mark Boladao ;)

// Define o ID do cliente a ser atualizado
$id_cliente = 1;

// Prepara a consulta SQL segura
$stmt = $conexao->prepare('UPDATE cliente SET nome = ?, endereco = ?, telefone = ?, email = ? WHERE id_cliente = ?');

// Associa os parâmetros aos valores da consulta
$stmt->bind_param('ssssi', $nome, $endereco, $telefone, $email, $id_cliente);

if ($stmt->execute()) {
    echo "Cliente de número $id_cliente alterado com sucesso!";
} else {
    echo "Erro ao alterar cliente $id_cliente: " . $stmt->error;
}

// Fecha a conexão com o banco de dados
$stmt->close();
$conexao->close();

?>