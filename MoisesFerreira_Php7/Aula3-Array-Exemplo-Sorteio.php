<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array Exemplo - Sorteio</title>
</head>
<body>
    <?php
    # rand = Gera um inteiro aleatório
    $sorteio = rand(0,5);
    echo "O número sorteado foi: $sorteio";
    echo "<hr>";

    # array_merge = Combina um ou mais arrays;
    # range = Cria um array contendo uma faixa de elemento;
    # (início, fim, passo)
    $vetor =
    array_merge(range(0,10),
    range($sorteio, 10, 2),
    array($sorteio)
    );

    print_r($vetor);
    echo "<hr>";

    # embaralha
    shuffle($vetor);
    print_r($vetor);
    echo "<hr>";

    foreach ($vetor as $valor ){
        echo 'O valor ', $valor, ' tem 3 elementos. <br>';
    }    
    ?>
    
    <footer>
        <h2 align="center">Moises Ferreira | TDESN V3 | SENAI NORTE</h2>
    </footer>
</body>
</html>