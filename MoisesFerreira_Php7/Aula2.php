<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula 2 PHP</title>
</head>
<body>
    <?php
    //Função usada para definir fuso horário padrão
    date_default_timezone_set('America/Sao_Paulo');
    //Manipulando HTML & PHP
    $data_hoje = date("d/m/Y", time());
    $horario = date("H:i", time());
    ?>

    <p align="center">
        Hoje é dia <?php echo $data_hoje; ?> e são <?php echo $horario; ?>hrs.
    </p>

    <?php
    echo "texto <br>";
    echo "Olá Mundo <br>";
    echo "Isso abrange
    várias linhas. As novas linhas serão
    saida também. <br>";
    echo "Isso abrange \nmultiplas linhas. A nova linha será \na saída também. <br>";
    echo "Caracteres Escaping são feitos \"Como esse\".";
    
    #UMA FORMA DE UTILIZAR O \N, com o <pre> </pre>
    echo "<pre>Isso abrange \nmultiplas linhas. A nova linha será \na saída também.</pre>";
    ?>

    <?php
        $comida_favorita = "Italiana";
        print $comida_favorita[2];

        $comida_favorita = " Cozinha " . $comida_favorita;
        print $comida_favorita;
    ?>

    <footer>
        <h2 align="center">Moises Ferreira | TDESN V3 | SENAI NORTE</h2>
    </footer>
</body>
</html>