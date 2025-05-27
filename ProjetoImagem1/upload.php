<?php

//INCLUI A CONEXÃO COM O BANCO DE DADOS
require_once ('conecta.php');

//OBTEM OS DADOS DO FORMULÁRIO
$evento = $_POST['evento'];
$descricao = $_POST['descricao'];
$imagem = $_FILES['imagem'];
$tamanho = $imagem['size'];
$tipo = $imagem['type'];
$nome_imagem = $imagem['name'];

//VERIFICA SE O ARQUIVO FOI ENVIADO
if (!empty($imagem) && $tamanho > 0) {
    // LÊ O CONTEÚDO DO ARQUIVO
    $fp = fopen($imagem['tmp_name'], "rb");
    $conteudo = fread($fp, filesize($imagem['tmp_name']));
    fclose($fp);

    // PROTEGE CONTRA PROBLEMAS DE CARACTERES NO SQL
    $conteudo = mysqli_real_escape_string($conexao, $conteudo);

    // INSERE OS DADOS NO BANCO DE DADOS
    $queryInsercao = "INSERT INTO tabela_imagens (evento, descricao, nome_imagem, tamanho_imagem, tipo_imagem, imagem) 
                       VALUES ('$evento', '$descricao', '$nome_imagem', '$tamanho', '$tipo', '$conteudo')";

    $resultado = mysqli_query($conexao, $queryInsercao);

    // VERIFICA SE A INSERÇÃO FOI BEM-SUCEDIDA
    if ($resultado) {
        echo "Imagem salva com sucesso!";
        header("Location: index.php");
    }
}

?>