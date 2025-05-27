<?php
//DEFINIÇÃO DAS CREDENCIAIS DE CONEXÃO AO BANCO DE DADOS
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "armazena_imagem";

//CRIAÇÃO DA CONEXÃO USANDO MYSQLI
$conexao = new mysqli($servername, $username, $password, $dbname);

//VERIFICANDO SE HOUVE ERRO DE CONEXÃO
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

?>