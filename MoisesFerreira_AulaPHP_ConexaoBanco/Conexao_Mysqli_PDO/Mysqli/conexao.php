<?php
# Habilita relatório detalhado de erros no MySQLi
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

/*
* Função para conectar ao banco de dados
* Retornar um objeto de conexão MySQLi ou interromper a execução do script em caso de erro
* @return mysqli
*/

function conectadb(){
    $endereco = 'localhost'; // Endereço do servidor MySQL
    $usuario = 'root'; // Usuário do banco de dados
    $senha = ''; // Senha do usuário
    $banco = 'empresa'; // Nome do banco de dados

    try {
        // Criação de conexão
        $con = new mysqli($endereco, $usuario, $senha, $banco);

        // Definição de conjunto de caracteres para evitar problemas com acentuação
        $con->set_charset('utf8mb4');
        return $con;
        }
        catch (Exception $e) {
            // Exibe uma mensagem de erro e encerra o script em caso de falha na conexão
            die ("Erro de conexão: " . $e->getMessage());
        }
    }

?>