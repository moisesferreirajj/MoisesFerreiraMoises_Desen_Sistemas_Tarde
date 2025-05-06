<?php
//Definição das credenciais de acesso ao banco de dados:
$nomeservidor = 'localhost'; //Endereço do servidor MySQL
$usuario = 'root'; //Usuário do banco de dados
$senha = ''; //Senha do usuário (vazia para o root no MySQL local)
$bancodedados = 'empresa'; //Nome do banco de dados

// Conexão com o banco de dados:
$conn = mysqli_connect($nomeservidor, $usuario, $senha, $bancodedados);
if (!$conn) {
    die("Erro de conexão: " . mysqli_connect_error());
} else {
    // Se a conexão for bem-sucedida, exibe uma mensagem de sucesso:
    echo "Conectado com sucesso ao banco de dados: $bancodedados<br><br>";
};

// Configuração do conjunto de caracteres para UTF-8, que suporta acentuação e emojis:
mysqli_set_charset($conn, 'utf8mb4');

// Consulta SQL para obter clientes
$sql = "SELECT id_cliente, nome, email FROM cliente";
$result = mysqli_query($conn, $sql);

// Verifica se a consulta retornou resultados
if (mysqli_num_rows($result) > 0) {
    // Exibe os resultados da tabela:
    while ($linha = mysqli_fetch_assoc($result)) {
        echo "ID: " . $linha["id_cliente"] . " - Nome: " . $linha["nome"] . " - Email: " . $linha["email"] . "<br>";
    }
} else {
    echo "Nenhum registro encontrado.";
    
// Fecha a conexão com o banco de dados:
mysqli_close($conn);
}

?>