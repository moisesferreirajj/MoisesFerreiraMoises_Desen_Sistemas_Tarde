<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Primeiro Programa PHP</title>
</head>
<body>
    <?php
        echo "<h1>Hello World, PHP!</h1>";
    ?>

    <?php
        phpinfo()
    ?>

    <?php
        print("teste <br>\n");
        print("Olá mundo <br>\n");
        print("Escape 'chars' são os MESMOS como em C <br>\n");
        print("Você pode ter quebra de linhas em uma string. <br>");
        print('Uma string pode usar "aspas-duplas", isso é muito legal! <br>');
        print('Ainda pode-se usar apenas aspas simples dessa forma It\'s cool! <br>');
    ?>

    <?php
        echo("
        <h2 align='center'>
        O meu programa está ecoando corretamente
        no meu servidor PHP!
        ");
    ?>

    <footer>
        <h2 align="center">Moises Ferreira | TDESN V3 | SENAI NORTE</h2>
    </footer>
</body>
</html>