<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_clean(); //LIMPA QUALQUER SAÍDA ESPERADA ANTES DO HEADER

//CONEXÃO COM O BANCO DE DADOS
require_once ('conecta.php');

//OBTEM O ID DA IMAGEM DA URL, GARANTINDO QUE É UM NÚMERO INTEIRO
$id_image = isset($_GET['id']) ? intval($_GET['id']) : 0;

//CRIA CONSULTA 
$querySelecionaPorCodigo = "SELECT imagem, nome_imagem, tipo_imagem FROM tabela_imagens WHERE codigo = ?";

//PREPARA A CONSULTA
$stmt = $conexao->prepare($querySelecionaPorCodigo);
$stmt->bind_param("i", $id_image);
$stmt->execute();
$resultado = $stmt->get_result();
//VERIFICA SE A IMAGEM EXISTE NO BANCO DE DADOS
if ($resultado->num_rows > 0) {
    //OBTEM OS DADOS DA IMAGEM
    $imagem = $resultado->fetch_assoc();
    
    //CONFIGURA O CABEÇALHO PARA O TIPO DE IMAGEM
    $tipoImagem = !empty($imagem['tipo_imagem']) ? $imagem['tipo_imagem'] : 'image/jpeg';
    header("Content-Type: " . $tipoImagem);
    
    //EXIBE A IMAGEM
    echo $imagem['imagem'];
} else {
    echo "Imagem não encontrada.";
}

?>

