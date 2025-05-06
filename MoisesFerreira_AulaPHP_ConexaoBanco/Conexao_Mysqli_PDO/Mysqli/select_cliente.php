<?php
// Inclui o arquivo de conexão com o banco de dados
require_once 'conexao.php';

// Estabelecendo conexão
$conexao = conectadb();

// Definindo a consulta SQL para selecionar todos os clientes
$sql = "SELECT id_cliente, nome, email FROM cliente";

// Executa a consulta no banco de dados
$result = $conexao->query($sql);

// Verifique se há registros retornados
if ($result->num_rows > 0) {
    // Exibe os resultados
    while ($linha = $result->fetch_assoc()) {
        echo "ID: " . $linha["id_cliente"] . " - Nome: " . $linha["nome"] . " - Email: " . $linha["email"] . "<br>";
    }
} else {
    echo "Nenhum registro encontrado.";
}

// Fecha a conexão com o banco de dados
$conexao->close();

?>