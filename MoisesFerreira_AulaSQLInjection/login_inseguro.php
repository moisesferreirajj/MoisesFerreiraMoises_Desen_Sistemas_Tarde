<?php
// Configuração do banco de dados
$servidor = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'empresa_teste';

$conexao = new mysqli($servidor, $usuario, $senha, $banco);

if ($conexao->connect_error) {
    die("Erro de conexão: " . $conexao->connect_error);
}

// Captura de dados do formulário
$nome = $_POST['nome'];

// Executa a consulta SQL
$sql = "SELECT * FROM cliente_teste WHERE nome = '$nome'";
$result = $conexao->query($sql);

// Se houver resultados o login é considerado bem-sucedido
if ($result->num_rows > 0) {
    header("Location: area_restrita.php");
// Garante que o código para aqui para evitar a execução indevida
    exit();
} else {
    echo "Nome não encontrado.";
}

// Fecha a conexão
$conexao->close();
?>