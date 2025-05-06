<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Estabelecendo conexão
$conexao = conectadb();

// Definição dos valores para inserção
$nome = 'Moises Ferreira';
$endereco = 'Rua Joinvile, 801';
$telefone = '(47) 5555-5555';
$email = 'moises_j_ferreira@estudante.sesisenai.org.br';

// Prepara a consulta sql usando prepare para evitar SQL Injection
$stmt = $conexao->prepare('INSERT INTO cliente (nome, endereco, telefone, email) VALUES (?, ?, ?, ?)');

// Associa os parâmetros aos valores da consulta
$stmt->bind_param('ssss', $nome, $endereco, $telefone, $email);

if ($stmt->execute()) {
    echo "Novo cliente inserido com sucesso!";
} else {
    echo "Erro ao inserir cliente: " . $stmt->error;
}

// Fecha a conexão com o banco de dados
$stmt->close();
$conexao->close();

?>