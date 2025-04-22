<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Matriz - Exemplo 5</title>
</head>
<body>
    <?php
    //ARRAY MATRIZ
    $musicas = array (
        array("Kid Abelha", "Amanhã", 1993),
        array("Ultrage A Rigor", "Pelados", 1985),
        array("Paralamas do Sucesso", "Alagados", 1987)
    );

    //FOR LINHAS E COLUNAS MATRIZ
    for ($linha=0; $linha < 3; $linha++){
        for ($coluna=0; $coluna < 3; $coluna++){
            echo $musicas[$linha][$coluna] . " | ";
        }
        echo "<br>";
    }

    ?>

    <!-- EXEMPLO AMAZON -->
    <?php
    //ARRAY MATRIZ
    $AmazonProducts = array (
        array("Código" => "Livro", "Descrição" => "Livros", "Preço" => 50),
        array("Código" => "DVDs", "Descrição" => "Filmes", "Preço" => 15),
        array("Código" => "CDs", "Descrição" => "Música", "Preço" => 20)
    );

    //FOR LINHAS E COLUNAS MATRIZ
    for ($linha=0; $linha < 3; $linha++){
        
    ?>

    <!-- HTML COM PHP (FORA DO <PHP>) -->
        <p>
            | <?= $AmazonProducts[$linha]["Código"] ?>
            | <?= $AmazonProducts[$linha]["Descrição"] ?>
            | <?= $AmazonProducts[$linha]["Preço"] ?>
        </p>
    
    <?php
    //FECHAR FOR ABERTO DE LINHAS
        }
    ?>
    
    <footer>
        <h2 align="center">Moises Ferreira | TDESN V3 | SENAI NORTE</h2>
    </footer>
</body>
</html>