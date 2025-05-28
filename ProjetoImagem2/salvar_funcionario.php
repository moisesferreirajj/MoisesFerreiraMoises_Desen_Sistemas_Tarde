<?php

function redimensionarImagem($imagem, $largura, $altura) {
    //OBTEM AS DIMENSÕES ORIGINAIS DA IMAGEM
    list($larguraOriginal, $alturaOriginal) = getimagesize($imagem);

    //CRIA UMA NOVA IMAGEM COM AS DIMENSÕES ESPECIFICADAS
    $novaImagem = imagecreatetruecolor($largura, $altura);

    //CRIA UMA NOVA IMAGEM A PARTIR DO ARQUIVO ORIGINAL
    $imagemOriginal = imagecreatefromjpeg($imagem);

    //COPIA E REDIMENSIONA A IMAGEM ORIGINAL PARA A NOVA IMAGEM
    imagecopyresampled($novaImagem, $imagemOriginal, 0, 0, 0, 0, $largura, $altura, $larguraOriginal, $alturaOriginal);
    
    //INICIA A SAÍDA EM BUFFER PARA CAPTURAR OS DADOS DA IMAGEM
    ob_start();
    imagejpeg($novaImagem);
    $dadosImagem = ob_get_clean(); //OBTEM OS DA IMAGEM NO BUFFER

    //LIBERA A MEMORIA USADA PELAS IMAGENS
    imagedestroy($novaImagem);
    imagedestroy($imagemOriginal);

    return $dadosImagem; //RETORNA OS DADOS DA IMAGEM REDIMENSIONADA
}

//CONEXAO COM O BANCO DE DADOS
$host = 'localhost';
$dbname = 'bd_imagem';
$username = 'root';
$password = '';

try {
    //CRIA UMA NOVA INSTANCIA DE PDO PARA CONECTAR AO BANCO DE DADOS
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //RECUPERA TODOS OS FUNCIONÁRIOS DO BANCO DE DADOS	
    $sql = ("SELECT * FROM funcionarios");
    $stmt = $pdo->prepare($sql);
    $stmt->execute(); //EXECUTA A CONSULTA
    $funcionarios = $stmt->fetchAll(PDO::FETCH_ASSOC); //BUSCA TODOS OS RESULTADOS COM UMA MATRIZ ASSOCIATIVA
    //VERIFICA SE FOI SOLICITADO A EXCLUSAO DE UM FORMULÁRIO
    if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['excluir_id'])) {
        $excluir_id = $_GET['excluir_id'];
        //PREPARA A INSTRUÇÃO SQL PARA EXCLUIR O FUNCIONÁRIO
        $sql_excluir = "DELETE FROM funcionarios WHERE id = :id";
        $stmt = $pdo->prepare($sql_excluir);
        $stmt->bindParam(':id', $excluir_id, PDO::PARAM_INT); //VINCULA O ID DO FUNCIONÁRIO A SER EXCLUÍDO
        //EXECUTA A CONSULTA
        if ($stmt->execute()) {
            echo "Funcionário excluído com sucesso!";
            header("Location: listar_imagens.php"); //REDIRECIONA PARA A PÁGINA DE LISTAGEM
            exit();
        } else {
            echo "Erro ao excluir funcionário.";
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //VERIFICA SE O ARQUIVO FOI ENVIADO
        if ($_FILES['foto']['error'] == 0) {
            $nome = $_POST['nome'];
            $telefone = $_POST['telefone'];
            $nomefoto = $_FILES['foto']['name'];
            $tipofoto = $_FILES['foto']['type'];

            //REDIMENSIONA A IMAGEM PARA 300x400
            $foto = redimensionarImagem($_FILES['foto']['tmp_name'], 300, 400);

            //PREPARA A INSTRUÇÃO SQL PARA INSERIR OS DADOS DO FUNCIONÁRIO NO BANCO DE DADOS
            $stmt = $pdo->prepare("INSERT INTO funcionarios (nome, telefone, nome_foto, tipo_foto, foto) VALUES (:nome, :telefone, :nome_foto, :tipo_foto, :foto)");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':telefone', $telefone);
            $stmt->bindParam(':nome_foto', $nomefoto);
            $stmt->bindParam(':tipo_foto', $tipofoto);
            $stmt->bindParam(':foto', $foto, PDO::PARAM_LOB);

            //EXECUTA A CONSULTA
            if ($stmt->execute()) {
                echo "Funcionário cadastrado com sucesso!";
            } else {
                echo "Erro ao cadastrar funcionário.";
            }
        } else {
            echo "Erro no upload da foto! " .$_FILES['foto']['error'];
        }
    }
} catch (PDOException $e) {
    echo "Erro de conexão: " . $e->getMessage();
}

?>