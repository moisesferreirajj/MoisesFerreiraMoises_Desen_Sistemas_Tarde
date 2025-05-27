<?php
//CONEXAO COM O BANCO DE DADOS
require_once ('conecta.php');

//OBTEM O ID DA IMAGEM DA URL, GARANTINDO QUE É UM NÚMERO INTEIRO
$id_image = isset($_GET['id']) ? intval($_GET['id']) : 0;

//VERIFICA SE O ID É VÁLIDO
if ($id_image > 0) {
    //CRIA CONSULTA PARA EXCLUIR A IMAGEM
    $queryExclusao = "DELETE FROM tabela_imagens WHERE codigo = ?";
    
    //PREPARA A CONSULTA
    $stmt = $conexao->prepare($queryExclusao);
    $stmt->bind_param("i", $id_image);
    
    //EXECUTA A CONSULTA
    if ($stmt->execute()) {
        echo "Imagem excluída com sucesso!";
    } else {
        echo "Erro ao excluir a imagem: " . $stmt->error;
    }
    $stmt->close();
} else {
    echo "ID inválido";
}

//REDIRECIONA PARA A PÁGINA PRINCIPAL
header("Location: index.php");
exit();

?>