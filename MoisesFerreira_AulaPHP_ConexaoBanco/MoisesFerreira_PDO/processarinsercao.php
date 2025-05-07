<?php
require_once('conexao.php');

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] === "POST") { //FUNCIONAR NO FIVE
    $conexao = conectarBanco();

    $sql = "INSERT INTO cliente (nome, endereco, telefone, email) VALUES (:nome, :endereco, :telefone, :email)";
    
    $stmt = $conexao->prepare($sql);
    $stmt->bindParam(":nome", $_POST["nome"]);
    $stmt->bindParam(":endereco", $_POST["endereco"]);
    $stmt->bindParam(":telefone", $_POST["telefone"]);
    $stmt->bindParam(":email", $_POST["email"]);
    
    try {
        $stmt->execute();
        echo "Cliente cadastrado com sucesso!";
    } catch (PDOException $e) {
        error_log('Erro ao cadastrar cliente: ' . $e->getMessage());
        echo "Erro ao cadastrar cliente.";
    }

}

?>